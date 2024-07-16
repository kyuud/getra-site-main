<?php

    namespace App\Http\Controllers\Painel\acl;

    use App\Http\Controllers\Controller;
    use App\Http\Controllers\Painel\StandardController;
    use App\Http\Requests\Painel\PermissionRoleFormRequest;
    use App\Models\Painel\acl\Role;
    use App\Models\Painel\acl\PermissionRole;
    use App\Models\Painel\acl\Permission;
    use Illuminate\Http\Request;
    use Illuminate\Support\Str;
    use Gate;
    use Auth;

    class PermissionRoleController extends StandardController
    {
        private   $role;
        private   $permission;
        protected $model;
        protected $title        = "Premissão a Papel";
        protected $view         = "Painel.permissions-roles";
        protected $route        = "permissions-roles";
        protected $permissions  = "permission-role";
        protected $name         = ["single" => "permissão a papel", "plus" => "permissões a papeis"];

        public function __construct(PermissionRole $rolePermission, Role $role, Permission $permission)
        {
            $this->model      = $rolePermission;
            $this->role       = $role;
            $this->permission = $permission;

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
            $data = $this->role
                ->where("deleted_at", '=', null)
                ->orderBy('label', 'asc')
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

            $permissions = $this->permission->where("deleted_at", "=", null)->orderBy('label')->pluck("label", "id");
            $roles       = $this->role->where("deleted_at", "=", null)->orderBy('label')->pluck("label", "id");

            return view("{$this->view}.create-edit", compact('title', 'route', 'name', 'permissions', 'roles', 'active'));
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
        public function store(PermissionRoleFormRequest $request)
        {
            $dataForm = $request->all();

            // dd($dataForm["permission_id"]);

            foreach ($dataForm["permission_id"] as $permission){
                $insert = $this->model->create(["permission_id" => $permission, "role_id" => $dataForm["role_id"]]);
            }

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
        public function storeAdd(PermissionRoleFormRequest $request)
        {
            $dataForm = $request->all();

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
            $data  = $this->model->where("role_id",'=', $id)->where("deleted_at", '=', null)->get();

            $roleEdit = $this->role->find($id);

            $array = [];

            // PEGANDO APENAS OS IDS DAS PERMISSÕES
            foreach($data as $d){
                array_push($array, $d->permission_id);
            }

            $data = $array;

            $title = "Editar {$this->title}: {$roleEdit->label}";

            $permissions = $this->permission->where("deleted_at", "=", null)->orderBy('label')->pluck("label", "id");
            $roles       = $this->role->where("deleted_at", "=", null)->orderBy('label')->pluck("label", "id");

            # MENU ATIVO
            $active = $this->route;

            # NOME DA ROTA
            $route = $this->route;

            # NOME PARA MSG
            $name = $this->name;

            return view("{$this->view}.create-edit",
                        compact('data', 'route', 'name', 'permissions', 'roles', 'roleEdit', 'title', 'active', 'id')
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

            $title = "Editar {$this->title}: {$data->title}";

            $permissions = $this->permission->orderBy('label')->pluck("label", "id");
            $roles       = $this->role->orderBy('label')->pluck("label", "id");

            # MENU ATIVO
            $active = "$this->route.trash";

            return view("{$this->view}.trash.create-edit", compact('data','permissions', 'roles', 'title', 'active'));
        }

        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param int                      $id
         * @return \Illuminate\Http\Response
         */
        public function update(PermissionRoleFormRequest $request, $id)
        {
            $dataForm = $request->all();

            // PERMISSÕES ESCOLHIDAS DO FORMULÁRIO
            $permissionForm = $dataForm['permission_id'];

            // PERMISSÕES ESCOLHIDAS DO FORMULÁRIO
            $permissions  = $this->permission->find($permissionForm);

            // ROLES DO USUÁRIO LOGADO
            $rolesUserLoged = \Illuminate\Support\Facades\Auth::user()->roles;

            // PEGA AS PERMISSÕES DO PAPEL ESCOLHIDO
            $permissionsRoleSelected = $this->model->where("role_id", "=", $dataForm['role_id'])
                                                   ->where("deleted_at", "=", null)
                                                   ->pluck("permission_id");

            // SELEÇÃO DOS NAMES DAS PERMISSÕES
            $permissionsRoleSelected = $this->permission->find($permissionsRoleSelected);

            // SELEÇÃO
            $response   = false;

            // ADM
            $adm        = false;

            // PERMISSÕES JÁ EXISTENTES
            $per        = false;

            // SABER SE USUÁRIO LOGADO É SUPER ADM
            foreach ($rolesUserLoged as $roles){

                if ($roles->name == 'super-adm') {
                    $adm = true;
                    break;
                }

            }

            // SABER SE A PERMISSÃO SUPER ADM FOI ESCOLHIDA
            foreach ($permissions as $permission){

                if($permission->name == "super-adm" ||
                   substr($permission->name, -7, 7 ) == "destroy" ||
                   substr($permission->name, -15, 15) == "clearTableForce"){
                    $response = true;
                    break;
                }

            }

            // SABER SE NO PAPEL ESCOLHIDO JÁ TEM A PERMISSÃO DE SUPER ADM
            foreach ($permissionsRoleSelected as $permissionRoleSelected){

                if($permissionRoleSelected->name == "super-adm"){
                    $per = true;
                    break;
                }

            }

            // SE TIVER ESCOLHIDO SUPER ADM E O USUÁRIO LOGADO NÃO FOR SUPER ADM
            if($response && !$adm){
                return redirect()->route("{$this->route}.index")
                                 ->withErrors(['errors' => 'Você não tem permissão para adicionar a permissão de 
                                        Super Usuário a este papel do sistema.']);
            }

            // SE O PAPEL JÁ CONTER SUPER ADM E O USUÁRIO LOGADO NÃO FOR SUPER ADM
            if($per && !$adm){
                return redirect()->route("{$this->route}.index")
                                 ->withErrors(['errors' => 'Você não tem permissão para remover a permissão de 
                                        Super Usuário a este papel do sistema.']);
            }

            // SELECIONA TODAS A PERMISSÕES POR PAPEL SELECIONADO
            $data = $this->model->where('role_id', '=', $id);

            // DESTROY
            $delete = $data->delete();

            // RECRIA DE ACORDA COM AS PERMISSÕES SELECIONADAS
            foreach ($dataForm["permission_id"] as $permission){
                $insert = $this->model->create(["permission_id" => $permission, "role_id" => $dataForm["role_id"]]);
            }

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
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param int                      $id
         * @return \Illuminate\Http\Response
         */
        public function updateTrash(PermissionRoleFormRequest $request, $id)
        {
            //Pega todos os dados do categoria
            $dataForm = $request->all();

            # URL DA PÁGINA COM A PAGINAÇÃO
            $url = $dataForm['redirects_to'];

            //Cria o objeto de categoria
            $data = $this->model->find($id);

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
         * Update no registro para "excluir"
         * @param Request $request
         * @return false|string
         */
        public function destroyWithAjaxFake(Request $request)
        {
            $id   = $request->id;

            $data = $this->model->where(
                "role_id", "=", $id
            );

            $fakeDelete["deleted_at"] = date("Y-m-d H:m:s");

            $delete = $data->update($fakeDelete);

            return json_encode($delete);
        }

        /**
         * Update multiples nos registros para "excluir"
         * @param Request $request
         * @return false|string
         */
        public function destroyMultWithAjaxFake(Request $request)
        {
            $ids = $request->ids;

            $data = $this->model->whereIn('role_id', $ids);

            $fakeDelete["deleted_at"] = date("Y-m-d H:m:s");

            $delete = $data->update($fakeDelete);

            return json_encode($delete);
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
                ->select('permission_role.id', 'permission_role.permission_id', 'permission_role.role_id', 'permission_role.created_at', 'permission_role.updated_at', 'permission_role.deleted_at',
                         'permissions.id as permission_id', 'permissions.name as permission_name', 'permissions.label as permission_label',
                         'roles.id as role_id', 'roles.name as role_name', 'roles.label as role_label'
                )
                ->join('permissions', 'permissions.id', '=', 'permission_role.permission_id')
                ->join('roles', 'roles.id', '=', 'permission_role.role_id')
                ->where("permission_role.deleted_at", '!=', null)
                ->orderBy('permission_label', 'asc')
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
                return redirect()->route("{$this->route}.index")
                    ->with(['success' => 'Alteração realizada com sucesso!']);
            } else {
                $keySearch = $dataForm["key-search"];
            }

            # DADOS DO MODEL
            $data = $this->model
                ->select('permission_role.id', 'permission_role.permission_id', 'permission_role.role_id', 'permission_role.created_at', 'permission_role.updated_at', 'permission_role.deleted_at',
                         'permissions.id as permission_id', 'permissions.name as permission_name', 'permissions.label as permission_label',
                         'roles.id as role_id', 'roles.name as role_name', 'roles.label as role_label'
                )
                ->join('permissions', 'permissions.id', '=', 'permission_role.permission_id')
                ->join('roles', 'roles.id', '=', 'permission_role.role_id')
                ->where("permission_role.deleted_at", '=', null)
                ->where('permissions.label', 'LIKE', "%{$keySearch}%")
                ->orWhere('roles.label', $dataForm['key-search'])
                ->where("permission_role.deleted_at", '=', null)
                ->orderBy('permission_label', 'asc')
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
                ->select('permission_role.id', 'permission_role.permission_id', 'permission_role.role_id', 'permission_role.created_at', 'permission_role.updated_at', 'permission_role.deleted_at',
                         'permissions.id as permission_id', 'permissions.name as permission_name', 'permissions.label as permission_label',
                         'roles.id as role_id', 'roles.name as role_name', 'roles.label as role_label'
                )
                ->join('permissions', 'permissions.id', '=', 'permission_role.permission_id')
                ->join('roles', 'roles.id', '=', 'permission_role.role_id')
                ->where("permission_role.deleted_at", '!=', null)
                ->where('permissions.label', 'LIKE', "%{$keySearch}%")
                ->orWhere('roles.label', $dataForm['key-search'])
                ->where("permission_role.deleted_at", '!=', null)
                ->orderBy('permission_label', 'asc')
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
