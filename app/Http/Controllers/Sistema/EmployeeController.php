<?php

    namespace App\Http\Controllers\Sistema;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\Sistema\EmployeeFormRequest;
    use App\Models\Sistema\Employee;
    use App\Models\Sistema\Company;
    use Illuminate\Http\Request;

    class EmployeeController extends StandardController
    {
        protected $model;
        protected $company;
        protected $title       = "Funcionário";
        protected $view        = "Sistema.employees";
        protected $route       = "employees";
        protected $permissions = "employee";
        protected $name        = ["single" => "funcionario", "plus" => "funcionarios"];


        public function __construct(Employee $employee, Company $company)
        {
            $this->model   = $employee;
            $this->company = $company;

            # FUNCTION PERMISSÕES DE ACESSOS
            $this->acl();

        }


        public function index(Request $request)
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
                ->orderBy('id', 'asc')
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
                    return redirect("/sistema/$this->route?page=$lastPage");
                }
            }

            # CARREGA A VIEW PASSANDO OS PARAMETROS DA PÁGINA
            return view("{$this->view}.index", compact("title", "data", "totalItens", "itensCurrent", "name", "route", "active"));
        }


        public function create()
        {
            $title = "Cadastrar {$this->title}";

            # MENU ATIVO
            $active = $this->route;

            # NOME DA ROTA
            $route = $this->route;

            # NOME PARA MSG
            $name = $this->name;

            # ARRAY DE SERVIÇOS
            $companies = $this->company
                ->where('deleted_at', null)
                ->where('status', '1')
                ->pluck("name", "id");

            return view("{$this->view}.create-edit", compact('title', 'active', 'route', 'name', 'companies'));
        }

        public function edit($id)
        {
            $data = $this->model->find($id);

            $title = "Editar {$this->title}: {$data->title}";

            # MENU ATIVO
            $active = $this->route;

            # NOME DA ROTA
            $route = $this->route;

            # NOME PARA MSG
            $name = $this->name;

            # ARRAY DE SERVIÇOS
            $companies = $this->company
                ->where('deleted_at', null)
                ->where('status', '1')
                ->pluck("name", "id");

            return view("{$this->view}.create-edit", compact('data', 'title', 'active', 'route', 'name', 'companies'));
        }


        /**
         * Show the form for editing the specified resource.
         *
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function editTrash($id)
        {
            $data = $this->model->where("deleted_at", '!=', null)->find($id);
            if ($data == null)
                return redirect()->route("$this->route.trash");

            $title = "Editar {$this->title}: {$data->title}";
            # MENU ATIVO
            $active = "$this->route.trash";

            # NOME DA ROTA
            $route = $this->route;

            # NOME PARA MSG
            $name = $this->name;

            # ARRAY DE SERVIÇOS
            $companies = $this->company->where('deleted_at', null)
                                       ->where('status', '1')->pluck("name", "id");

            return view("{$this->view}.trash.create-edit", compact('data', 'title', 'active', 'route', 'name', 'companies'));
        }


        /**
         * Store a newly created resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
        public function store(EmployeeFormRequest $request)
        {
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
         * Store a newly created resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
        public function storeAdd(EmployeeFormRequest $request)
        {
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
                    ->route("{$this->route}.create")
                    ->with(['success' => 'Cadastro realizado com sucesso!']);
            else
                return redirect()->route("{$this->route}.create")
                                 ->withErrors(['errors' => 'Falha ao cadastrar!'])
                                 ->withInput();
        }


        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param int                      $id
         * @return \Illuminate\Http\Response
         */
        public function update(EmployeeFormRequest $request, $id)
        {
            //Pega todos os dados do categoria
            $dataForm = $request->all();

            # URL DA PÁGINA COM A PAGINAÇÃO
            $url = $dataForm['redirects_to'];

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
        public function updateTrash(EmployeeFormRequest $request, $id)
        {
            //Pega todos os dados do categoria
            $dataForm = $request->all();

            # URL DA PÁGINA COM A PAGINAÇÃO
            $url = $dataForm['redirects_to'];

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


        public function trash()
        {
            # TÍTUO DA PÁGINA
            $title = "{$this->title}s";

            # NOME PARA MSG
            $name = $this->name;

            # NOME DA ROTA
            $route = $this->route;

            # MENU ATIVO
            $active = $route . ".trash";

            # DADOS DO MODEL
            $data = $this->model->where("deleted_at", '!=', null)->orderBy('id', 'asc')->paginate($this->totalPage);

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
                    return redirect("/sistema/$this->route/trash?page=$lastPage");
                }
            }

            # CARREGA A VIEW PASSANDO OS PARAMETROS DA PÁGINA
            return view("{$this->view}.trash.index", compact("title", "data", "totalItens", "itensCurrent", "name", "route", "active"));

        }


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

            if (!isset($dataForm["key-search"])) {
                return redirect()->route("{$this->route}.index")
                                 ->with(['success' => 'Alteração realizada com sucesso!']);
            } else {
                $keySearch = $dataForm["key-search"];
            }

            //Filtra os usuários
            $data = $this->model
                ->where("deleted_at", '=', null)
                ->where('name', 'LIKE', "%{$keySearch}%")
                ->orWhere('occupation', 'LIKE', "%{$keySearch}%")
                ->orWhere('age', 'LIKE', "%{$keySearch}%")
                ->orWhere('rg', 'LIKE', "%{$keySearch}%")
                ->orWhere('cpf', 'LIKE', "%{$keySearch}%")
                ->orWhere('sex', 'LIKE', "%{$keySearch}%")
                ->orWhere('birth', 'LIKE', "%{$keySearch}%")
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
            $name = $this->name;

            # NOME DA ROTA
            $route = $this->route;

            # MENU ATIVO
            $active = $route . ".trash";

            //Recupera os dados do formulário
            $dataForm = $request->except('_token');

            $title = "Resultado da Pesquisa";

            if (!isset($dataForm["key-search"])) {
                return redirect()->route("{$this->route}.trash")
                                 ->with(['success' => 'Alteração realizada com sucesso!']);
            } else {
                $keySearch = $dataForm["key-search"];
            }

            //Filtra os usuários
            $data = $this->model
                ->where("deleted_at", '!=', null)
                ->where('name', 'LIKE', "%{$keySearch}%")
                ->orWhere('occupation', 'LIKE', "%{$keySearch}%")
                ->orWhere('age', 'LIKE', "%{$keySearch}%")
                ->orWhere('rg', 'LIKE', "%{$keySearch}%")
                ->orWhere('cpf', 'LIKE', "%{$keySearch}%")
                ->orWhere('sex', 'LIKE', "%{$keySearch}%")
                ->orWhere('birth', 'LIKE', "%{$keySearch}%")
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


    }
