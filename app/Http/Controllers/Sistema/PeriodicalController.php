<?php

    namespace App\Http\Controllers\Sistema;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;

    use App\Http\Requests\Sistema\PeriodicalFormRequest;


    use App\Models\Sistema\Periodical;
    use App\Models\Sistema\Employee;
    use App\Models\Sistema\Company;
    use PDF;

    class PeriodicalController extends StandardController
        {
        protected $model, $employee, $company;
        protected $title       = "Periódico";
        protected $view        = "Sistema.periodical";
        protected $route       = "periodical";
        protected $permissions = "periodical";
        protected $name        = ["single" => "Periódico", "plus" => "Periódicos"];


        public function __construct(Periodical $periodical, Employee $employee, Company $company)
        {
            $this->model   = $periodical;
            $this->employee = $employee;
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
            $data = $this->model->where("deleted_at", '=', null)->orderBy('id', 'asc')->paginate($this->totalPage);

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

            # ARRAY DE EMPRESAS
            $companies = $this->company->where('deleted_at', null)
                                    ->where('status', '1')->pluck("name", "id");

            $employees = [];

            return view("{$this->view}.create-edit", compact('title', 'active', 'route', 'name', 'companies', 'employees'));
        }


        /**
         * Store a newly created resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
        public function store(PeriodicalFormRequest $request)
        {
            # Pega todos os dados do categoria
            $data = $request->all();

            $company = $this->company->where('id','=',$data['company_id'])->first();

            $data['company_name'] = $company->name;

            $employee = $this->employee->where('id','=',$data['employee_id'])->first();

            $data['name'] = $employee->name;

            # TITLE
            $title = "Relatório de $this->title" . "s Cadastradas";

            # CARREGA A VIEW PARA PDF
            $pdf = PDF::loadView("Sistema/$this->route/pdf/report", compact('data'));

            # SETA O PAPEL E A POSIÇÃO
            $pdf->setPaper('a4', 'retration');

            # HABILITA O PHP PARA PDF
            $pdf->getDOMPdf()->set_option('isPhpEnabled', true);

            # CRIA UM NOME ÚNICO
            $name = uniqid(date('YmdHis')) . ".pdf";

            # CHAMA A FUNCTION PARA SALVAR O PDF EM UPLOADS
            $save = $this->savePdf("uploads/periodicals/pdfs/$name", $pdf);

            $url  = "../uploads/periodicals/pdfs/$name";


            # CADASTRA NO BANCO DE DADOS O ID DO CLINETE E O CAMINHO DO PDF QUE FOI GERADO A REVISÃO DA FATURA
            $insert = $this->model->create([
                                            'employee_id' => $data['employee_id'],
                                            'pdf'         => $name
                                        ]);

            # RETORNO PARA INFORMAR QUE A EMPRESA NÃO ESTÁ CADASTRADA OU INATIVA
            if (!$insert) {
                return redirect()->route("{$this->route}.index")
                                ->withErrors(['errors' => "Erro ao salvar informações do exame!\n
                                                            Entre em contato com o administrador do sistema."]);
            }

            # RETORNO PARA BAIXAR O PDF
            if ($save) {

                return redirect()
                    ->route("{$this->route}.index")
                    ->with(['success' => 'Exame realizado com sucesso! -
                        <a target="_blank" class="btn btn-primary" href="' . $url . '">
                        <i class="fas fa-download"></i> <b>Clique aqui para baixar!</b></a>'
                        ]);
            } else {
                return redirect()->route("{$this->route}.index")
                                ->withErrors(['errors' => "Erro ao salvar PDF gerado do exame!\n
                                                            Entre em contato com o administrador do sistema."]);
            }

        }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeAdd(PeriodicalFormRequest $request)
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
        public function update(PeriodicalFormRequest $request, $id)
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
    public function updateTrash(PeriodicalFormRequest $request, $id)
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

        /* Receber funcionário da empresa*/
        public function employeesAjax(Request $request)
        {
            $id = $request->input('id');

            $data = $this->employee->where("company_id", $id)->get();

            return response()->json(['employees' => $data]);
        }

        /* Recuperar dados do funcionário*/
        public function dataEmployeesAjax(Request $request)
        {
            $id = $request->input('id');

            $data = $this->employee->where("id", $id)->first();

            return response()->json(['employee' => $data]);
        }

        /**
         * SALVAR O PDF EM DISCO NO SERVIDOR
         * @param $name
         * @param $pdf
         * @return false|int
         */
        function savePdf($namePath, $pdf)
        {
            # SALVA O PDF NO UPLOADS
            return file_put_contents("$namePath", $pdf->output());

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

            if(!isset($dataForm["key-search"])){
                return redirect()->route("{$this->route}.index")
                    ->with(['success' => 'Alteração realizada com sucesso!']);
            } else {
                $keySearch = $dataForm["key-search"];
            }
            
            //FILTRA OS FUNCIONÁRIOS E OU EXAMES
            $data = $this->model->select('*')
                                ->join('employees', 'employees.id', '=', 'periodicals.employee_id')
                                ->where("periodicals.deleted_at", '=', null)
                                ->where('employees.name', 'LIKE', "%{$keySearch}%")
                                ->orderBy('periodicals.created_at', 'desc')
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

            //FILTRA OS FUNCIONÁRIOS E OU EXAMES
            $data = $this->model->select('*'
                                        )
                                ->join('employees', 'employees.id', '=', 'periodicals.employee_id')
                                ->where("periodicals.deleted_at", '!=', null)
                                ->where('employees.name', 'LIKE', "%{$keySearch}%")
                                ->orderBy('periodicals.created_at', 'desc')
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
