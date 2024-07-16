<?php

    namespace App\Http\Controllers\Painel;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\Painel\LogFormRequest;
    use App\Models\Painel\Log;
    use App\Models\Painel\User;
    use Illuminate\Http\Request;

    class LogController extends StandardController
    {
        protected $model, $user;
        protected         $title       = "Log";
        protected         $view        = "Painel.logs";
        protected         $route       = "logs";
        protected         $permissions = "log";
        protected         $name        = ["single" => "log", "plus" => "logs"];

        public function __construct(Log $log, User $user)
        {
            $this->model = $log;
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
            $title = "{$this->title}s";

            # NOME PARA MSG
            $name = $this->name;

            # NOME DA ROTA
            $route = $this->route;

            # MENU ATIVO
            $active = $route;

            # DADOS DO MODEL
            $data = $this->model->with('user', 'roleUser')
                                ->where("deleted_at", '=', null)
                                ->orderBy("created_at", 'desc')
                                ->limit(5)
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
         * Store a newly created resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
        public function store($email)
        {
            $user = $this->user->where("email", "=", $email)->first();

            $dados = [
                'user_id' => $user->id,
                'ip'      => request()->ip()
            ];

            $insert = $this->model->create($dados);

            if ($insert) {
                return true;
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

            $data = $this->model->select('logs.id', 'logs.user_id', 'logs.ip', 'logs.created_at',
                                        'users.id as user_id', 'users.name as users_name', 'users.image', 'users.email',
                                        'role_user.id as role_user_id', 'role_user.role_id',
                                        'roles.label'
            )
                                ->join('users', 'users.id', '=', 'logs.user_id')
                                ->join('role_user', 'role_user.user_id', '=', 'logs.user_id')
                                ->join('roles', 'roles.id', '=', 'role_user.role_id')
                                ->where("logs.deleted_at", '=', null)
                                ->where('roles.label', 'LIKE', "%{$keySearch}%")
                                ->orWhere('users.name', 'LIKE', "%{$keySearch}%")
                                ->orWhere('users.email', 'LIKE', "%{$keySearch}%")
                                ->orWhere('logs.ip', 'LIKE', "%{$keySearch}%")
                                ->where("role_user.deleted_at", '=', null)
                                ->orderBy('logs.created_at', 'desc')
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


    }
