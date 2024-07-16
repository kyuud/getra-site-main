<?php

    namespace App\Http\Controllers\Painel;

    use App\Http\Controllers\Controller;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
    use Illuminate\Routing\Redirector;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Str;

    use Gate;
    use Illuminate\View\View;
    use PDF;

    class StandardController extends Controller
    {
        protected $totalPage = 5;
        protected $upload    = false;

        public function acl()
        {
            # PERMISSÕES DE NÍVEL 1
            $this->middleware("can:$this->permissions");
            $this->middleware("can:$this->permissions-create",
                            ['only' => ['create', 'store']]
            );

            # PERMISSÕES DE NÍVEL 2
            $this->middleware("can:$this->permissions-destroyFake",
                            ['only' => ['destroyWithAjaxFake', 'destroyMultWithAjaxFake']]
            );

            $this->middleware("can:$this->permissions-clearTable", ['only' => ['clearTable']]);

            # PERMISSÕES DE NÍVEL 3
            $this->middleware("can:$this->permissions-edit", ['only' => ['edit']]);
            $this->middleware("can:$this->permissions-update", ['only' => [ 'update']]);

            # PERMISSÕES DE NÍVEL 4
            $this->middleware("can:$this->permissions-trash", ['only' => ['trash']]);
            $this->middleware("can:$this->permissions-editTrash", ['only' => ['editTrash']]);

            # PERMISSÕES DE NÍVEL 5
            $this->middleware("can:$this->permissions-updateTrash", ['only' => ['updateTrash']]);

            $this->middleware("can:$this->permissions-restore",
                            ['only' => ['restoreWithAjax', 'restoreMultWithAjax']]
            );

            # PERMISSÕES DE NÍVEL 6
            $this->middleware("can:$this->permissions-destroy",
                            ['only' => ['destroyWithAjax', 'destroyMultWithAjax']]
            );

            $this->middleware("can:$this->permissions-clearTableForce", ['only' => ['clearTableForce']]);


        }

        /**
         * Display a listing of the resource.
         *
         * @return Application|Factory|RedirectResponse|Redirector|View
         */
        public function index()
        {
            # TÍTUO DA PÁGINA
            $title = "{$this->title}s";

            # NOME PARA MSG
            $name = $this->name;

            # NOME DA ROTA
            $route = $this->route;

            # MENU ATIVO
            $active = $route;

            # DADOS DO MODEL
            $data = $this->model
                ->where("deleted_at", '=', null)
                ->orderBy('title', 'asc')
                ->paginate($this->totalPage);

            # VALOR NUMÉRICO DA ÚLTIMA PÁGINA
            $lastPage = $data->lastPage();

            # VALOR NUMÉRICO DA PÁGINA ATUAL
            $currentPage = $data->currentPage();

            # QUANTIDADE DE REGISTROS POR PÁGINA
            $perPage = $data->perPage();

            # TOTAL DE REGISTROS
            $totalItens = $data->total();

            # QUANTIDADE DE ITENS DA PÁGINA ATUAL
            $itemsCurrentPage = count($data->items());

            # MMC DO TOTAL DE REGISTROS PELA QUANTIDADE DE REGISTRO POR PÁGINA
            $restaPage = $totalItens % $perPage;

            # SE O RESTO DO MMC FOR IGUAL A ZERO
            if ($restaPage == 0) {
                # RECEBE O VALOR DA QUANTIDADE DE REGISTRO POR PÁGINA INICIAL
                $restaPage = $perPage;
            }

            # SE NÃO HOUVER REGISTROS
            if ($totalItens == 0) {

                # ITENS CORRENTES IGUAL A ZERO
                $itensCurrent = 0;

                # SE HOUVER REGISTROS
            } else {

                # QUANDO FOR A ÚLTIMA PÁGINA
                if ($currentPage < $lastPage) {
                    # QUANTIDADE DE ITENS ATUAL POR PÁGINA SEM RESTO
                    $itensCurrent = ($currentPage * $perPage);

                    # QUANDO FOR AS DEMAIS PÁGINA
                } else {
                    # QUANTIDADE DE ITENS ATUAL POR PÁGINA COM O RESTO
                    $itensCurrent = ($currentPage * $perPage) - $perPage + $restaPage;
                }

                # SE A PÁGINA NÃO TIVER NENHUM REGISTRO
                if ($itemsCurrentPage == 0) {
                    # REDIRECIONA PARA A ÚLTIMA PÁGINA COM REGISTROS
                    return redirect("/painel/$this->route?page=$lastPage");
                }
            }

            # CARREGA A VIEW PASSANDO OS PARAMETROS DA PÁGINA
            return view("{$this->view}.index", compact("title", "data", "totalItens", "itensCurrent", "name", "route", "active"));
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return Response
         */
        public function create()
        {
            $title = "Cadastrar {$this->title}";

            # MENU ATIVO
            $active = $this->route;

            # NOME DA ROTA
            $route = $this->route;

            # NOME PARA MSG
            $name = $this->name;

            return view("{$this->view}.create-edit", compact('title', 'active', 'route', 'name'));
        }

        /**
         * Display the specified resource.
         *
         * @param int $id
         * @return Response
         */
        public function show($id)
        {

        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param int $id
         * @return Response
         */
        public function edit($id)
        {
            $data  = $this->model->find($id);

            $title = "Editar {$this->title}: {$data->title}";

            # MENU ATIVO
            $active = $this->route;

            # NOME DA ROTA
            $route = $this->route;

            # NOME PARA MSG
            $name = $this->name;

            return view("{$this->view}.create-edit", compact('data', 'title', 'active', 'route', 'name'));
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param int $id
         * @return Response
         */
        public function editTrash($id)
        {
            $data = $this->model->where("deleted_at", '!=', null)->find($id);
            if($data == null)
            return redirect()->route("$this->route.trash");

            $title = "Editar {$this->title}: {$data->title}";
            # MENU ATIVO
            $active = "$this->route.trash";
            return view("{$this->view}.trash.create-edit", compact('data', 'title', 'active'));
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param int $id
         * @return Response
         */
        public function destroy($id)
        {
            //Recupera o categoria
            $data = $this->model->find($id);

            //deleta
            $delete = $data->delete();

            if ($delete) {
                return redirect()
                    ->route("{$this->route}.index")
                    ->with(['success' => "<b> $data->title </b> excluído com sucesso!"]);
            } else {
                return redirect()->route("{$this->route}.index", ['id' => $id])
                                ->withErrors(['errors' => 'Falha ao excluir']);
            }
        }

        /**
         * Search the specified resource from storage.
         *
         * @param Request $request
         * @return Response
         */
        public function search(Request $request)
        {
            # NOME PARA MSG
            $name = $this->name;

            # NOME DA ROTA
            $route = $this->route;

            # MENU ATIVO
            $active = $route;

            //Recupera os dados do formulário
            $dataForm = $request->except('_token');

            $title = "Resultado da Pesquisa";

            if(!isset($dataForm["key-search"])){
                return redirect()->route("{$this->route}.index")
                    ->with(['success' => 'Alteração realizada com sucesso!']);
            } else {
                $keySearch = $dataForm["key-search"];
            }

            //Filtra os usuários
            $data = $this->model
                ->where("deleted_at", '=', null)
                ->where('title', 'LIKE', "%{$keySearch}%")
                ->orWhere('url', $dataForm['key-search'])
                ->orWhere('description', 'LIKE', "%{$keySearch}%")
                ->where("deleted_at", '=', null)
                ->paginate($this->totalPage);

            # VALOR NUMÉRICO DA ÚLTIMA PÁGINA
            $lastPage = $data->lastPage();

            # VALOR NUMÉRICO DA PÁGINA ATUAL
            $currentPage = $data->currentPage();

            # QUANTIDADE DE REGISTROS POR PÁGINA
            $perPage = $data->perPage();

            # TOTAL DE REGISTROS
            $totalItens = $data->total();

            # QUANTIDADE DE ITENS DA PÁGINA ATUAL
            $itemsCurrentPage = count($data->items());

            # MMC DO TOTAL DE REGISTROS PELA QUANTIDADE DE REGISTRO POR PÁGINA
            $restaPage = $totalItens % $perPage;

            # SE O RESTO DO MMC FOR IGUAL A ZERO
            if ($restaPage == 0) {
                # RECEBE O VALOR DA QUANTIDADE DE REGISTRO POR PÁGINA INICIAL
                $restaPage = $perPage;
            }

            # SE NÃO HOUVER REGISTROS
            if ($totalItens == 0) {

                # ITENS CORRENTES IGUAL A ZERO
                $itensCurrent = 0;

                # SE HOUVER REGISTROS
            } else {

                # QUANDO FOR A ÚLTIMA PÁGINA
                if ($currentPage < $lastPage) {
                    # QUANTIDADE DE ITENS ATUAL POR PÁGINA SEM RESTO
                    $itensCurrent = ($currentPage * $perPage);

                    # QUANDO FOR AS DEMAIS PÁGINA
                } else {
                    # QUANTIDADE DE ITENS ATUAL POR PÁGINA COM O RESTO
                    $itensCurrent = ($currentPage * $perPage) - $perPage + $restaPage;
                }

                # SE A PÁGINA NÃO TIVER NENHUM REGISTRO
                if ($itemsCurrentPage == 0) {
                    # REDIRECIONA PARA A ÚLTIMA PÁGINA COM REGISTROS
                    return redirect("/painel/$this->route/pesquisar?key-search=$keySearch&page=$lastPage");
                }
            }

            # CARREGA A VIEW PASSANDO OS PARAMETROS DA PÁGINA
            return view("{$this->view}.index", compact("title", "data", "name", "route", 'dataForm', "totalItens", "itensCurrent", "active"));
        }

        /**
         * Search the specified resource from storage.
         *
         * @param Request $request
         * @return Response
         */
        public function searchTrash(Request $request)
        {
            # NOME PARA MSG
            $name = $this->name;

            # NOME DA ROTA
            $route = $this->route;

            # MENU ATIVO
            $active = $route . ".trash";

            //Recupera os dados do formulário
            $dataForm = $request->except('_token');

            $title = "Resultado da Pesquisa";

            if(!isset($dataForm["key-search"])){
                return redirect()->route("{$this->route}.trash")
                    ->with(['success' => 'Alteração realizada com sucesso!']);
            } else {
                $keySearch = $dataForm["key-search"];
            }

            //Filtra os usuários
            $data = $this->model
                ->where("deleted_at", '!=', null)
                ->where('title', 'LIKE', "%{$keySearch}%")
                ->orWhere('url', $dataForm['key-search'])
                ->orWhere('description', 'LIKE', "%{$keySearch}%")
                ->where("deleted_at", '!=', null)
                ->paginate($this->totalPage);

            # VALOR NUMÉRICO DA ÚLTIMA PÁGINA
            $lastPage = $data->lastPage();

            # VALOR NUMÉRICO DA PÁGINA ATUAL
            $currentPage = $data->currentPage();

            # QUANTIDADE DE REGISTROS POR PÁGINA
            $perPage = $data->perPage();

            # TOTAL DE REGISTROS
            $totalItens = $data->total();

            # QUANTIDADE DE ITENS DA PÁGINA ATUAL
            $itemsCurrentPage = count($data->items());

            # MMC DO TOTAL DE REGISTROS PELA QUANTIDADE DE REGISTRO POR PÁGINA
            $restaPage = $totalItens % $perPage;

            # SE O RESTO DO MMC FOR IGUAL A ZERO
            if ($restaPage == 0) {
                # RECEBE O VALOR DA QUANTIDADE DE REGISTRO POR PÁGINA INICIAL
                $restaPage = $perPage;
            }

            # SE NÃO HOUVER REGISTROS
            if ($totalItens == 0) {

                # ITENS CORRENTES IGUAL A ZERO
                $itensCurrent = 0;

                # SE HOUVER REGISTROS
            } else {

            # QUANDO FOR A ÚLTIMA PÁGINA
            if ($currentPage < $lastPage) {
                # QUANTIDADE DE ITENS ATUAL POR PÁGINA SEM RESTO
                $itensCurrent = ($currentPage * $perPage);

                # QUANDO FOR AS DEMAIS PÁGINA
            } else {
                # QUANTIDADE DE ITENS ATUAL POR PÁGINA COM O RESTO
                $itensCurrent = ($currentPage * $perPage) - $perPage + $restaPage;
            }

            # SE A PÁGINA NÃO TIVER NENHUM REGISTRO
            if ($itemsCurrentPage == 0) {
                # REDIRECIONA PARA A ÚLTIMA PÁGINA COM REGISTROS
                return redirect("/painel/$this->route/trash/pesquisar?key-search=$keySearch&page=$lastPage");
            }
        }

            # CARREGA A VIEW PASSANDO OS PARAMETROS DA PÁGINA
            return view("{$this->view}.trash.index", compact("title", "data", "name", "route", 'dataForm', "totalItens", "itensCurrent", "active"));
        }

        /**
         * Destroy With Ajax the specified resource from storage.
         *
         * @param Request $request
         * @return Response
         */
        public function destroyWithAjax(Request $request)
        {
            $id = $request->id;

            $data = $this->model->find($id);

            $delete = $data->delete();

            return json_encode($delete);
        }

        /**
         * Destroy Multiples With Ajax the specified resource from storage.
         *
         * @param Request $request
         * @return Response
         */
        public function destroyMultWithAjax(Request $request)
        {
            $ids = $request->ids;

            $data = $this->model->whereIn('id', $ids);

            $delete = $data->delete();

            return json_encode($delete);
        }

        /**
         * Update no registro para "excluir"
         * @param Request $request
         * @return false|string
         */
        public function destroyWithAjaxFake(Request $request)
        {
            $id   = $request->id;

            $data = $this->model->find($id);

            $data["deleted_at"] = date("Y-m-d H:m:s");

            $update = $data->update();

            return json_encode($update);
        }

        /**
         * Update multiples nos registros para "excluir"
         * @param Request $request
         * @return false|string
         */
        public function destroyMultWithAjaxFake(Request $request)
        {
            $ids = $request->ids;

            $data = $this->model->whereIn('id', $ids);

            $fakeDelete["deleted_at"] = date("Y-m-d H:m:s");

            $delete = $data->update($fakeDelete);

            return json_encode($delete);
        }

        /**
         * Destroy todos os registros da tabela
         * @return false|string
         */
        public function clearTable()
        {
            $data = $this->model->where('deleted_at', '=', null);

            $fakeDelete["deleted_at"] = date("Y-m-d H:m:s");

            $update = $data->update($fakeDelete);

            return json_encode($update);
        }

        /**
         * Destroy todos os registros da tabela
         * @return false|string
         */
        public function clearTableForce()
        {
            $data = $this->model->where('deleted_at', '!=', null);

            $delete = $data->delete();

            return json_encode($delete);
        }

        public function trash()
        {
            # TÍTUO DA PÁGINA
            $title = "{$this->title}s";

            # NOME  PARA MSG
            $name = $this->name;

            # NOME DA ROTA
            $route = $this->route;

            # MENU ATIVO
            $active = $route . ".trash";

            # DADOS DO MODEL
            $data = $this->model->where("deleted_at", '!=', null)->orderBy('title', 'asc')->paginate($this->totalPage);

            # VALOR NUMÉRICO DA ÚLTIMA PÁGINA
            $lastPage = $data->lastPage();

            # VALOR NUMÉRICO DA PÁGINA ATUAL
            $currentPage = $data->currentPage();

            # QUANTIDADE DE REGISTROS POR PÁGINA
            $perPage = $data->perPage();

            # TOTAL DE REGISTROS
            $totalItens = $data->total();

            # QUANTIDADE DE ITENS DA PÁGINA ATUAL
            $itemsCurrentPage = count($data->items());

            # MMC DO TOTAL DE REGISTROS PELA QUANTIDADE DE REGISTRO POR PÁGINA
            $restaPage = $totalItens % $perPage;

            # SE O RESTO DO MMC FOR IGUAL A ZERO
            if ($restaPage == 0) {
                # RECEBE O VALOR DA QUANTIDADE DE REGISTRO POR PÁGINA INICIAL
                $restaPage = $perPage;
            }

            # SE NÃO HOUVER REGISTROS
            if ($totalItens == 0) {

                # ITENS CORRENTES IGUAL A ZERO
                $itensCurrent = 0;

                # SE HOUVER REGISTROS
            } else {

            # QUANDO FOR A ÚLTIMA PÁGINA
            if ($currentPage < $lastPage) {
                # QUANTIDADE DE ITENS ATUAL POR PÁGINA SEM RESTO
                $itensCurrent = ($currentPage * $perPage);

                # QUANDO FOR AS DEMAIS PÁGINA
            } else {
                # QUANTIDADE DE ITENS ATUAL POR PÁGINA COM O RESTO
                $itensCurrent = ($currentPage * $perPage) - $perPage + $restaPage;
            }

            # SE A PÁGINA NÃO TIVER NENHUM REGISTRO
            if ($itemsCurrentPage == 0) {
                # REDIRECIONA PARA A ÚLTIMA PÁGINA COM REGISTROS
                return redirect("/painel/$this->route/trash?page=$lastPage");
            }
        }

        # CARREGA A VIEW PASSANDO OS PARAMETROS DA PÁGINA
        return view("{$this->view}.trash.index", compact("title", "data", "totalItens", "itensCurrent", "name", "route", "active"));

    }

        /**
         * Destroy With Ajax the specified resource from storage.
         *
         * @param Request $request
         * @return Response
         */
        public function restoreWithAjax(Request $request)
        {
            $id   = $request->id;

            $data = $this->model->find($id);

            $data["deleted_at"] = null;

            $update = $data->update();

            return json_encode($update);
        }

        /**
         * Update multiples nos registros para "excluir"
         * @param Request $request
         * @return false|string
         */
        public function restoreMultWithAjax(Request $request)
        {
            $ids = $request->ids;

            $data = $this->model->whereIn('id', $ids);

            $fakeDelete["deleted_at"] = null;

            $delete = $data->update($fakeDelete);

            return json_encode($delete);
        }

        /* VERIFICA SE O USUÁRIO É SUPER ADMINISTRADOR */
        public function verifySuperAdm()
        {
            $response = false;

            if(Auth::user()->roles[0]->name === "super-adm"){
                $response = true;
            }

            return $response;

        }

        public function pdf()
        {
            # TITLE
            $title = "Relatório de $this->title" . "s Cadastrado(a)s";

            # DADOS
            $data  = $this->model->where("deleted_at", '=', null)->get();

            # QUANTIDADE
            $qty = $this->model->where("deleted_at", '=', null)->count();

            # CARREGA A VIEW PARA PDF
            $pdf = PDF::loadView("Painel/$this->route/pdf/index", compact('data', 'title', 'qty'));

            # SETA O PAPEL E A POSIÇÃO
            $pdf->setPaper('a4', 'landscape');

            # HABILITA O PHP PARA PDF
            $pdf->getDOMPdf()->set_option('isPhpEnabled', true);

            $name = $this->name['plus'];

            # RETORNA O PDF COM UM NOME
            return $pdf->stream("$name.pdf");
            // return $pdf->download('cells.pdf');
        }

    }
