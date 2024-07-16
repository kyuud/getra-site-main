<?php

    namespace App\Http\Controllers\Sistema;

    use Illuminate\Http\Request;
    use App\Http\Requests\Sistema\AdditionalExamsFormRequest;
    use App\Models\Sistema\AdditionalExams;
    use App\Models\Sistema\Company;
    use App\Models\Sistema\Supplier;
    use App\Models\Sistema\ExamsList;
    use PDF;
    use Carbon\Carbon; // Classe para manipulação de datas


    class SuppliersController extends StandardController
    {
        protected $model, $company;
        protected $title       = "Fornecedores";
        protected $view        = "Sistema.suppliers";
        protected $route       = "suppliers";
        protected $permissions = "suppliers";
        protected $name        = ["single" => "Fornecedor", "plus" => "Fornecedores"];
        protected $totalPage   = 20;


        public function __construct(Supplier $suppliers, Company $company, AdditionalExams $additional_exams)
        {
            $this->model   = $suppliers;
            $this->company = $company;
            $this->additional_exams = $additional_exams;

            # FUNCTION PERMISSÕES DE ACESSOS
            $this->acl();

        }


        public function index(Request $request)
{
    $title = "{$this->title}s";
    $name = $this->name;
    $route = $this->route;
    $active = $route;

    // Inicia a consulta aos fornecedores
    $query = $this->model->with(['additionalExams' => function ($query) use ($request) {
        // Verifica se apenas uma data específica foi selecionada
        if ($request->filled('start_date') && !$request->filled('end_date')) {
            $date = Carbon::parse($request->input('start_date'))->startOfDay();
            $query->whereDate('examdate', '=', $date);
        } 
        // Verifica se um intervalo de datas foi selecionado
        else if ($request->filled('start_date') && $request->filled('end_date')) {
            $startDate = Carbon::parse($request->input('start_date'))->startOfDay();
            $endDate = Carbon::parse($request->input('end_date'))->endOfDay();
            $query->whereBetween('examdate', [$startDate, $endDate]);
        }
        // Se nenhuma data for selecionada, não aplica nenhum filtro de data
    }])->orderBy('id', 'asc');

    // Paginação dos resultados
    $data = $query->paginate($this->totalPage);

    // Calcula o valor total dos exames para cada fornecedor
    foreach ($data as $supplier) {
        $totalExamsValue = $supplier->additionalExams->sum('exam_fee');
        $supplier->totalExamsValue = $totalExamsValue;
    }
    $additional_exams = $this->additional_exams->where("deleted_at", '=', null)->get();
    
    // Retorna a view com os fornecedores
    return view("{$this->view}.index", compact("title", "name", "route", "active", "data", "additional_exams"));
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
            $companies = Company::where('deleted_at', null)
                ->where('status', '1')
                ->orderBy('name', 'asc')
                ->pluck("name", "id");

            #Array de fornecedores
            $supplier = Supplier::all();

            #retorno da view (adicionar as variáveis no compact)
            return view("{$this->view}.create-edit", compact('title', 'active', 'route', 'name', 'companies','supplier'));     
            
        }
            
        /**
         * Store a newly created resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
        public function store(AdditionalExamsFormRequest $request)
        {
            $dataForm = $request->all();
        
            # FORMATAR DATA
            $dataForm['duedate'] = formatDate($dataForm['duedate'], 'Y-m-d');
        
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
        
            $insertData = array_merge($dataForm, ['exam_id' => $dataForm['exam_id']]);
        
            $insert = $this->model->create($insertData);
        
            if ($insert) {
                return redirect()
                    ->route("{$this->route}.index")
                    ->with(['success' => 'Cadastro realizado com sucesso!']);
            } else {
                return redirect()->route("{$this->route}.create")
                    ->withErrors(['errors' => 'Falha ao cadastrar!'])
                    ->withInput();
            }
        }


        /**
         * Store a newly created resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
        public function storeAdd(AdditionalExamsFormRequest $request)
        {
            $dataForm = $request->all();

            # FORMATAR DATA
            $dataForm['duedate'] = formatDate($dataForm['duedate'], 'Y-m-d');

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

            # ARRAY DE SERVIÇOS
            $companies = $this->company->where('deleted_at', null)
            ->where('status', '1')->pluck("name", "id");

            return view("{$this->view}.create-edit", compact('data', 'title', 'active', 'route', 'name', 'companies'));
        }


        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param int                      $id
         * @return \Illuminate\Http\Response
         */
        public function update(AdditionalExamsFormRequest $request, $id)
        {
            //Pega todos os dados do categoria
            $dataForm = $request->all();

            # URL DA PÁGINA COM A PAGINAÇÃO
            $url = $dataForm['redirects_to'];

            # FORMATAR DATA
            $dataForm['duedate'] = formatDate($dataForm['duedate'], 'Y-m-d');

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
        public function updateTrash(AdditionalExamsFormRequest $request, $id)
        {
            //Pega todos os dados do categoria
            $dataForm = $request->all();

            # URL DA PÁGINA COM A PAGINAÇÃO
            $url = $dataForm['redirects_to'];

            # FORMATAR DATA
            $dataForm['duedate'] = formatDate($dataForm['duedate'], 'Y-m-d');

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
        public function companiesAjax(Request $request)
        {
            $id = $request->input('id');

            $data = $this->company->where("id", $id)->get();

            return response()->json(['companies' => $data]);
        }


        /**
         * SALVAR O PDF EM DISCO NO SERVIDOR
         * @param $name
         * @param $pdf
         * @return false|int
         */
        public function savePdf($namePath, $pdf)
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

            if (!isset($dataForm["key-search"])) {
                return redirect()->route("{$this->route}.index")
                                ->with(['success' => 'Alteração realizada com sucesso!']);
            } else {
                $keySearch = $dataForm["key-search"];
            }

            # FILTRO
            $data = $this->model
                    ->select("supplier.*")
                    ->whereNull("supplier.deleted_at")
                    ->where(function($query) use ($keySearch) {
                        $query->where('supplier.id', '=', $keySearch)
                            ->orWhere('supplier.name', 'LIKE', "%{$keySearch}%")
                            ->orWhere('supplier.cnpj', 'LIKE', "%{$keySearch}%");
                    })
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
            return view("{$this->view}.index", compact("title", "data", "name", "route", 'dataForm', "totalItens", "itensCurrent", "active",));
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

            # FILTRO
            $data = $this->model
                    ->onlyTrashed() // Apenas registros excluídos
                    ->where(function($query) use ($keySearch) {
                        $query->where('name', 'LIKE', "%{$keySearch}%")
                            ->orWhere('cnpj', 'LIKE', "%{$keySearch}%");
                    })
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



        public function pdfCompany(Request $request, $id)
        {
            $title = "Relatório de Fornecedor";
        
            // Verifica se as datas de início e término foram fornecidas
            if ($request->has('start_date') && $request->has('end_date')) {
                $startDate = Carbon::createFromFormat('Y-m-d', $request->query('start_date'))->startOfDay();
                $endDate = Carbon::createFromFormat('Y-m-d', $request->query('end_date'))->endOfDay();
                
                $data = $this->model->with(['additionalExams' => function ($query) use ($startDate, $endDate) {
                    $query->whereBetween('examdate', [$startDate, $endDate]);
                }])->where('id', $id)->get();
            } else {
                // Se não houver datas fornecidas, busca todos os registros para o ID fornecido
                $data = $this->model->with('additionalExams')->where('id', $id)->get();
            }
        
            // Geração do PDF
            $pdf = PDF::loadView("Sistema/$this->route/pdf/report", compact('data', 'title'));
            $pdf->setPaper('a4', 'landscape');
            return $pdf->stream("relatorio-fornecedor-{$id}.pdf");
        }
        

        
        public function show($id)
    {
        $additionalExam = AdditionalExams::findOrFail($id);

        // Obtendo a empresa associada ao exame adicional
        $company = $additionalExam->company;

        // Obtendo o fornecedor associado ao exame adicional
        $supplier = $additionalExam->supplier;

        return view('additional_exams.show', compact('additionalExam', 'company', 'supplier'));
    }

}
