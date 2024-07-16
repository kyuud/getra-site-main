<?php

    namespace App\Http\Controllers\Painel\backups;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;

    class Standard extends Controller
    {
        protected $totalPage = 5;
        protected $upload    = false;


        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            # TÍTUO DA PÁGINA
            $title = "{$this->title}s";

            # NOME PARA MSG
            $name = $this->title;

            # NOME DA ROTA
            $route = $this->route;

            # MENU ATIVO
            $active = $route;

            # DADOS DO MODEL
            $data = $this->model->where("deleted_at", '=', null)->orderBy('title', 'asc')->paginate($this->totalPage);

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
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            $title = "Cadastrar {$this->title}";

            # MENU ATIVO
            $active = $this->route;

            return view("{$this->view}.create-edit", compact('title', 'active'));
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            # METODO DA REQUISIÇÃO
            $metod = $request->getMethod();

            # CHAMA A VALIDAÇÃO DO FORMULÁRIO
            $this->validate($request, $this->model->rules($metod), $this->model->messages());

            $dataForm = $request->all();

            # AJUSTA O STATUS PARA PODER ATUALIZAR NO BANCO
            $dataForm['status'] = isset($dataForm['status']) ? 1 : 0;

            if ($this->upload && $request->hasFile($this->upload['name'])) {

                $image = $request->file($this->upload['name']);

                $nameFile = uniqid(date('YmdHis')) . '.' . $image->getClientOriginalExtension();

                $upload = $image->storeAs($this->upload['path'], $nameFile);

                if ($upload) {
                    $dataForm[$this->upload['name']] = $nameFile;
                } else {
                    return redirect()
                        ->route("{$this->route}.create")
                        ->withErrors(['errors' => 'Erro no Upload!'])
                        ->withInput();
                }

            }

            $insert = $this->model->create($dataForm);

            if ($insert)
                return redirect()
                    ->route("{$this->route}.index")
                    ->with(['success' => 'Cadastro realizado com sucesso!']);
            else
                return redirect()->route("{$this->route}.create")
                                 ->withErrors(['errors' => 'Falha ao cadastrar!'])
                                 ->withInput();
        }

        /**
         * Display the specified resource.
         *
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {

        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            $data  = $this->model->find($id);

            $title = "Editar {$this->title}: {$data->title}";

            # MENU ATIVO
            $active = $this->route;

            return view("{$this->view}.create-edit", compact('data', 'title', 'active'));
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function editTrash($id)
        {
            $data = $this->model->find($id);

            $title = "Editar {$this->title}: {$data->title}";

            # MENU ATIVO
            $active = "$this->route.trash";

            return view("{$this->view}.trash.create-edit", compact('data', 'title', 'active'));
        }

        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param int                      $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
        {
            # METODO DA REQUISIÇÃO
            $metod = $request->getMethod();

            # CHAMA A VALIDAÇÃO DO FORMULÁRIO
            $this->validate($request, $this->model->rules($metod), $this->model->messages());

            //Pega todos os dados do categoria
            $dataForm = $request->all();

            # URL DA PÁGINA COM A PAGINAÇÃO
            $url = $dataForm['redirects_to'];

            # AJUSTA O STATUS PARA PODER ATUALIZAR NO BANCO
            $dataForm['status'] = isset($dataForm['status']) ? 1 : 0;

            # AJUSTA O STATUS PARA PODER ATUALIZAR NO BANCO
            $dataForm['status'] = isset($dataForm['status']) ? 1 : 0;

            //Cria o objeto de categoria
            $data = $this->model->find($id);

            //Verifica se existe a imagem
            if ($this->upload && $request->hasFile($this->upload['name'])) {
                //Pega a imagem
                $image = $request->file($this->upload['name']);

                if ($data->image == '') {
                    $nameImage                       = uniqid(date('YmdHis')) . '.' . $image->getClientOriginalExtension();
                    $dataForm[$this->upload['name']] = $nameImage;
                } else {
                    $nameImage = $data->image;
                }

                $upload = $image->storeAs($this->upload['path'], $nameImage);

                if ($upload) {
                    $dataForm[$this->upload['name']] = $nameImage;

                } else {
                    return redirect()->route("{$this->route}.edit", ['id' => $id])
                                     ->withErrors(['errors' => 'Erro no Upload'])
                                     ->withInput();
                }

            }

            //Altera os dados do categoria
            $update = $data->update($dataForm);

            if ($update)
                return redirect()
                    //->back()
                    //->route("{$this->route}.index")
                    ->to($url)
                    ->with(['success' => 'Alteração realizada com sucesso!']);
            else
                return redirect()->route("{$this->route}.edit", ['id' => $id])
                                 ->withErrors(['errors' => 'Falha ao editar'])
                                 ->withInput();
        }

        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param int                      $id
         * @return \Illuminate\Http\Response
         */
        public function updateTrash(Request $request, $id)
        {
            # METODO DA REQUISIÇÃO
            $metod = $request->getMethod();

            # CHAMA A VALIDAÇÃO DO FORMULÁRIO
            $this->validate($request, $this->model->rules($metod), $this->model->messages());

            //Pega todos os dados do categoria
            $dataForm = $request->all();

            # URL DA PÁGINA COM A PAGINAÇÃO
            $url = $dataForm['redirects_to'];

            //Cria o objeto de categoria
            $data = $this->model->find($id);

            //Verifica se existe a imagem
            if ($this->upload && $request->hasFile($this->upload['name'])) {
                //Pega a imagem
                $image = $request->file($this->upload['name']);

                if ($data->image == '') {
                    $nameImage                       = uniqid(date('YmdHis')) . '.' . $image->getClientOriginalExtension();
                    $dataForm[$this->upload['name']] = $nameImage;
                } else {
                    $nameImage = $data->image;
                }

                $upload = $image->storeAs($this->upload['path'], $nameImage);

                if ($upload) {
                    $dataForm[$this->upload['name']] = $nameImage;

                } else {
                    return redirect()->route("{$this->route}.edit.trash", ['id' => $id])
                                     ->withErrors(['errors' => 'Erro no Upload'])
                                     ->withInput();
                }

            }

            //Altera os dados do categoria
            $update = $data->update($dataForm);

            if ($update)
                return redirect()
                    ->to($url)
                    ->with(['success' => 'Alteração realizada com sucesso!']);
            else
                return redirect()->route("{$this->route}.edit.trash", ['id' => $id])
                                 ->withErrors(['errors' => 'Falha ao editar'])
                                 ->withInput();
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param int $id
         * @return \Illuminate\Http\Response
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
         * @return \Illuminate\Http\Response
         */
        public function search(Request $request)
        {
            # NOME PARA MSG
            $name = $this->title;

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
         * @return \Illuminate\Http\Response
         */
        public function searchTrash(Request $request)
        {
            # NOME PARA MSG
            $name = $this->title;

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
         * @return \Illuminate\Http\Response
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
         * @return \Illuminate\Http\Response
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

            # NOME PARA MSG
            $name = $this->title;

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
         * @return \Illuminate\Http\Response
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

    }
