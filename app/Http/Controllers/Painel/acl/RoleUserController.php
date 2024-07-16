<?php

    namespace App\Http\Controllers\Painel\acl;

    use App\Http\Controllers\Controller;
    use App\Http\Controllers\Painel\StandardController;
    use App\Http\Requests\Painel\RoleUserFormRequest;
    use App\Models\Painel\acl\RoleUser;
    use App\Models\Painel\acl\Role;
    use App\Models\Painel\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Str;
    use Gate;
    use Auth;

    class RoleUserController extends StandardController
    {
        private   $role;
        private   $user;
        protected $model;
        protected $title        = "Papel a Usuário";
        protected $view         = "Painel.roles-users";
        protected $route        = "roles-users";
        protected $permissions  = "role-user";
        protected $name         = ["single" => "papel a usuário", "plus" => "papeis a usuários"];

        public function __construct(RoleUser $roleUser, Role $role, User $user)
        {
            $this->model = $roleUser;
            $this->role  = $role;
            $this->user  = $user;

            # FUNCTION PERMISSÕES DE ACESSOS
            $this->acl();

        }

        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            # TÍTUO DA PÁGINA
            $title = "{$this->title}";

            # NOME PARA MSG
            $name = $this->name;

            # NOME DA ROTA
            $route = $this->route;

            # MENU ATIVO
            $active = $route;

            # DADOS DO MODEL
            $data = $this->model
                ->select('role_user.id', 'role_user.role_id', 'role_user.user_id', 'role_user.created_at', 'role_user.updated_at', 'role_user.deleted_at',
                         'roles.id as tb_role_id', 'roles.name as role_name', 'roles.label as role_label',
                         'users.id as user_id', 'users.name as user_name', 'users.email as user_email'
                )
                ->join('roles', 'roles.id', '=', 'role_user.role_id')
                ->join('users', 'users.id', '=', 'role_user.user_id')
                ->where("role_user.deleted_at", '=', null)
                ->orderBy('role_label', 'asc')
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
         * @return \Illuminate\Http\Response
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

            $users       = $this->user->where("deleted_at", "=", null)->orderBy('name')->pluck("name", "id");
            $roles       = $this->role->where("deleted_at", "=", null)->orderBy('label')->pluck("label", "id");

            return view("{$this->view}.create-edit", compact('title', 'route', 'name', 'users', 'roles', 'active'));
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
        public function store(RoleUserFormRequest $request)
        {
            $dataForm = $request->all();

            /*if($dataForm['role_id'] == 6){
                if(!$this->verifySuperAdm()){
                    return redirect()
                        ->route("{$this->route}.index")
                        ->withErrors(['errors' => 'Você não pode designar um usuário como Super Usuário!'])
                        ->withInput();
                }
            }*/

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
        public function storeAdd(RoleUserFormRequest $request)
        {
            $dataForm = $request->all();

            /*if($dataForm['role_id'] == 6){
                if(!$this->verifySuperAdm()){
                    return redirect()
                        ->route("{$this->route}.index")
                        ->withErrors(['errors' => 'Você não pode designar um usuário como Super Usuário!'])
                        ->withInput();
                }
            }*/

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
         * Show the form for editing the specified resource.
         *
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            $data  = $this->model->find($id);

            $title = "Editar {$this->title}: {$data->id}";

            $users  = $this->user->where("deleted_at", "=", null)->orderBy('name')->pluck("name", "id");
            $roles  = $this->role->where("deleted_at", "=", null)->orderBy('label')->pluck("label", "id");

            # MENU ATIVO
            $active = $this->route;

            # NOME DA ROTA
            $route = $this->route;

            # NOME PARA MSG
            $name = $this->name;

            return view("{$this->view}.create-edit",
                        compact('data','users', 'route', 'name', 'roles', 'title', 'active')
            );
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

            $title = "Editar {$this->title}: {$data->id}";

            $users  = $this->user->orderBy('name')->pluck("name", "id");
            $roles  = $this->role->orderBy('label')->pluck("label", "id");

            # MENU ATIVO
            $active = "$this->route.trash";

            return view("{$this->view}.trash.create-edit", compact('data','users', 'roles', 'title', 'active'));
        }

        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param int                      $id
         * @return \Illuminate\Http\Response
         */
        public function update(RoleUserFormRequest $request, $id)
        {
            //Pega todos os dados do categoria
            $dataForm = $request->all();

            # URL DA PÁGINA COM A PAGINAÇÃO
            $url = $dataForm['redirects_to'];

            //Cria o objeto de categoria
            $data = $this->model->find($id);

            // PAPEL ESCOLHIDO DO FORMULÁRIO
            $roleForm = $this->role->find($dataForm['role_id']);

            // RESPOSTA VERIFICADORA
            $response = false;

            // ROLES DO USUÁRIO LOGADO
            $rolesUserLoged = \Illuminate\Support\Facades\Auth::user()->roles;

            // VERIFICA SE O USUÁRIO ESCOLHIDO TEM A OPÇÃO DE SUPER USUÁRIO
            if($roleForm->name == "super-adm"){

                // CONTA E VERIFICA SE O USUÁRIO TEM PERMISSÃO DE SUPER USUÁRIO
                if (count($rolesUserLoged) > 0) {
                    for ($i = 0; $i < count($rolesUserLoged); $i++) {
                        if ($rolesUserLoged[$i]->name == 'super-adm') {
                            $response = true;
                            break;
                        }
                    }
                }

                // SE O USUÁRIO LOGADO NÃO TIVER PERMISSÃO DE SUPER USUÁRIO, NÃO DEIXA SE EDITAR SUPER USUÁRIO
                if(!$response){
                    return redirect()->route("{$this->route}.index")
                                     ->withErrors(['errors' => 'Você não tem permissão para editar este papel do sistema.'])
                                     ->withInput();
                }
            }

            // PAPEIS DO USUÁRIO SELECIONADO PARA ATUALIZAR
            $roleUserSelected = $this->user->with("roles")->find($dataForm['user_id']);
            $roleUserSelected = $roleUserSelected->roles;

            $responseTwo = false;

            // CONTA E VERIFICA SE O USUÁRIO SELECIONADO TEM PERMISSÃO DE SUPER USUÁRIO
            if (count($roleUserSelected) > 0) {
                for ($i = 0; $i < count($roleUserSelected); $i++) {
                    if ($roleUserSelected[$i]->name == 'super-adm') {
                        $responseTwo = true;
                        break;
                    }
                }
            }

            // CONTA E VERIFICA SE O USUÁRIO LOGADO TEM PERMISSÃO DE SUPER USUÁRIO
            if (count($rolesUserLoged) > 0) {
                for ($i = 0; $i < count($rolesUserLoged); $i++) {
                    if ($rolesUserLoged[$i]->name == 'super-adm') {
                        $response = true;
                        break;
                    }
                }
            }

            // SE O USUÁRIO LOGADO NÃO TIVER PERMISSÃO DE SUPER USUÁRIO, NÃO DEIXA SE EDITAR SUPER USUÁRIO
            if($responseTwo && !$response){
                return redirect()->route("{$this->route}.index")
                                 ->withErrors(['errors' => 'Você não tem permissão para editar este papel do sistema.'])
                                 ->withInput();
            }

            //Altera os dados do categoria
            $update = $data->update($dataForm);

            if ($update)
                return redirect()
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
        public function updateTrash(RoleUserFormRequest $request, $id)
        {
            //Pega todos os dados do categoria
            $dataForm = $request->all();

            # URL DA PÁGINA COM A PAGINAÇÃO
            $url = $dataForm['redirects_to'];

            //Cria o objeto de categoria
            $data = $this->model->find($id);

            // PAPEL ESCOLHIDO DO FORMULÁRIO
            $roleForm = $this->role->find($dataForm['role_id']);

            // RESPOSTA VERIFICADORA
            $response = false;

            // ROLES DO USUÁRIO LOGADO
            $rolesUserLoged = \Illuminate\Support\Facades\Auth::user()->roles;

            // VERIFICA SE O USUÁRIO ESCOLHIDO TEM A OPÇÃO DE SUPER USUÁRIO
            if($roleForm->name == "super-adm"){

                // CONTA E VERIFICA SE O USUÁRIO TEM PERMISSÃO DE SUPER USUÁRIO
                if (count($rolesUserLoged) > 0) {
                    for ($i = 0; $i < count($rolesUserLoged); $i++) {
                        if ($rolesUserLoged[$i]->name == 'super-adm') {
                            $response = true;
                            break;
                        }
                    }
                }

                // SE O USUÁRIO LOGADO NÃO TIVER PERMISSÃO DE SUPER USUÁRIO, NÃO DEIXA SE EDITAR SUPER USUÁRIO
                if(!$response){
                    return redirect()->to($url)
                                     ->withErrors(['errors' => 'Você não tem permissão para editar este papel do sistema.'])
                                     ->withInput();
                }
            }

            // PAPEIS DO USUÁRIO SELECIONADO PARA ATUALIZAR
            $roleUserSelected = $this->user->with("roles")->find($dataForm['user_id']);
            $roleUserSelected = $roleUserSelected->roles;

            $responseTwo = false;

            // CONTA E VERIFICA SE O USUÁRIO SELECIONADO TEM PERMISSÃO DE SUPER USUÁRIO
            if (count($roleUserSelected) > 0) {
                for ($i = 0; $i < count($roleUserSelected); $i++) {
                    if ($roleUserSelected[$i]->name == 'super-adm') {
                        $responseTwo = true;
                        break;
                    }
                }
            }

            // CONTA E VERIFICA SE O USUÁRIO LOGADO TEM PERMISSÃO DE SUPER USUÁRIO
            if (count($rolesUserLoged) > 0) {
                for ($i = 0; $i < count($rolesUserLoged); $i++) {
                    if ($rolesUserLoged[$i]->name == 'super-adm') {
                        $response = true;
                        break;
                    }
                }
            }

            // SE O USUÁRIO LOGADO NÃO TIVER PERMISSÃO DE SUPER USUÁRIO, NÃO DEIXA SE EDITAR SUPER USUÁRIO
            if($responseTwo && !$response){
                return redirect()->to($url)
                                 ->withErrors(['errors' => 'Você não tem permissão para editar este papel do sistema.'])
                                 ->withInput();
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
            $title = "{$this->title}";

            # NOME PARA MSG
            $name = $this->name;

            # NOME DA ROTA
            $route = $this->route;

            # MENU ATIVO
            $active = $route . ".trash";

            # DADOS DO MODEL
            $data = $this->model
                ->select('role_user.id', 'role_user.role_id', 'role_user.user_id', 'role_user.created_at', 'role_user.updated_at', 'role_user.deleted_at',
                         'roles.id as tb_role_id', 'roles.name as role_name', 'roles.label as role_label',
                         'users.id as user_id', 'users.name as user_name', 'users.email as user_email'
                )
                ->join('roles', 'roles.id', '=', 'role_user.role_id')
                ->join('users', 'users.id', '=', 'role_user.user_id')
                ->where("role_user.deleted_at", '!=', null)
                ->orderBy('role_label', 'asc')
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
                    return redirect("/painel/$this->route/trash?page=$lastPage");
                }
            }

            # CARREGA A VIEW PASSANDO OS PARAMETROS DA PÁGINA
            return view("{$this->view}.trash.index", compact("title", "data", "totalItens", "itensCurrent", "name", "route", "active"));

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
            $name = $this->name;

            # NOME DA ROTA
            $route = $this->route;

            # MENU ATIVO
            $active = $route;

            //Recupera os dados do formulário
            $dataForm = $request->except('_token');

            $title = "Resultado da Pesquisa";

            if(!isset($dataForm["key-search"])){
                return redirect()->route("{$this->route}.trash")
                                 ->with(['success' => 'Alteração realizada com sucesso!']);
            } else {
                $keySearch = $dataForm["key-search"];
            }

            # DADOS DO MODEL
            $data = $this->model
                ->select('role_user.id', 'role_user.role_id', 'role_user.user_id', 'role_user.created_at', 'role_user.updated_at', 'role_user.deleted_at',
                         'roles.id as tb_role_id', 'roles.name as role_name', 'roles.label as role_label',
                         'users.id as user_id', 'users.name as user_name', 'users.email as user_email'
                )
                ->join('roles', 'roles.id', '=', 'role_user.role_id')
                ->join('users', 'users.id', '=', 'role_user.user_id')
                ->where("role_user.deleted_at", '=', null)
                ->where('roles.label', 'LIKE', "%{$keySearch}%")
                ->orWhere('users.name', 'LIKE', "%{$keySearch}%")
                ->where("role_user.deleted_at", '=', null)
                ->orderBy('role_label', 'asc')
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

            if(!isset($dataForm["key-search"])){
                return redirect()->route("{$this->route}.trash")
                                 ->with(['success' => 'Alteração realizada com sucesso!']);
            } else {
                $keySearch = $dataForm["key-search"];
            }

            # DADOS DO MODEL
            $data = $this->model
                ->select('role_user.id', 'role_user.role_id', 'role_user.user_id', 'role_user.created_at', 'role_user.updated_at', 'role_user.deleted_at',
                         'roles.id as tb_role_id', 'roles.name as role_name', 'roles.label as role_label',
                         'users.id as user_id', 'users.name as user_name', 'users.email as user_email'
                )
                ->join('roles', 'roles.id', '=', 'role_user.role_id')
                ->join('users', 'users.id', '=', 'role_user.user_id')
                ->where("role_user.deleted_at", '!=', null)
                ->where('roles.label', 'LIKE', "%{$keySearch}%")
                ->orWhere('users.name', 'LIKE', "%{$keySearch}%")
                ->where("role_user.deleted_at", '!=', null)
                ->orderBy('role_label', 'asc')
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
