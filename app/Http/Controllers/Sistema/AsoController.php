<?php

    namespace App\Http\Controllers\Sistema;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;

    use App\Http\Requests\Sistema\AsoFormRequest;

    use App\Models\Sistema\Aso;
    use App\Models\Sistema\Employee;
    use App\Models\Sistema\Doctor;
    use App\Models\Sistema\Company;
    use Illuminate\Support\Facades\Storage;
    use DOMDocument;
    use PDF;

    // use Symfony\Component\HttpFoundation\Request;
    // use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\HttpFoundation\Response;

    class AsoController extends StandardController
    {
        protected $model, $employee, $company;
        protected $title       = "Aso";
        protected $view        = "Sistema.aso";
        protected $route       = "aso";
        protected $permissions = "aso";
        protected $name        = ["single" => "Aso", "plus" => "Aso"];


        public function __construct(Aso $aso, Employee $employee, Company $company, Doctor $doctor)
        {
            $this->model    = $aso;
            $this->employee = $employee;
            $this->doctor   = $doctor;
            $this->company  = $company;

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
            $data = $this->model->where("deleted_at", '=', null)->orderBy('id', 'desc')->paginate($this->totalPage);

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

            # ARRAY DE Médicos
            $doctors = $this->doctor->where('deleted_at', null)
                                        ->where('status', '1')->pluck("name", "id");

            return view("{$this->view}.create-edit",
                                compact('title', 'active', 'route', 'name', 'companies', 'employees', 'doctors'));
        }


        /**
         * Store a newly created resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
        public function store(asoFormRequest $request)
        {
            # Pega todos os dados do categoria
            $data = $request->all();

            $company = $this->company->where('id', '=', $data['company_id'])->first();

            $data['company_name'] = $company->name;
            $data['cnpj'] = $company->cnpj;

            $employee = $this->employee->where('id', '=', $data['employee_id'])->first();

            $data['name']       = $employee->name;
            $data['matricula']  = $employee->matricula;
            $data['nis']        = $employee->nis;
            $data['cpf']        = $employee->cpf;

            $doctor = $this->doctor->where('id', '=', $data['doctor_id'])->first();

            $data['doctorname'] = $doctor->name;
            $data['doctorcpf']  = $doctor->cpf;
            $data['crm']        = $doctor->crm;
            $data['uf']         = $doctor->uf;

            $doctor = $this->doctor->where('id', '=', $data['doctor_id2'])->first();

            $data['doctorname2'] = $doctor->name;
            $data['doctorcpf2']  = $doctor->cpf;
            $data['crm2']        = $doctor->crm;
            $data['uf2']         = $doctor->uf;

            #XML
            $xml =  new DOMDocument( "1.0", "UTF-8" );

            $xml->preserveWhiteSpace = FALSE;
            $xml->formatOutput = TRUE;

            #CRIANDO ELEMENTO DO XML
            $esocial         = $xml->createElement('esocial');
            $esocial         = $xml->createElementNS('http://www.esocial.gov.br/schema/evt/evtMonit/v02_05_00', 'esocial');

            $evtMonit        = $xml->createElement('evtMonit');
            $evtMonit->setAttribute('id', 'ID'.$data['cnpj']);

            $exMedOcup       = $xml->createElement('exMedOcup');
            $tpExameOcup     = $xml->createElement('tpExameOcup', '4');

            $aso             = $xml->createElement('aso');
            $dtAso           = $xml->createElement('dtAso', date('Y-m-d', strtotime($data['dataexam16'])));
            $resAso          = $xml->createElement('resAso', $data['attest']);

            $exame           = $xml->createElement('exame');
            $dtExm           = $xml->createElement('dtExm', $data['dataexam16']);
            $procRealizado   = $xml->createElement('procRealizado', '0295');
            $obsProc         = $xml->createElement('obsProc', 'Normal');
            $ordExame        = $xml->createElement('ordExame', '2');
            $indResult       = $xml->createElement('indResult', '1');

            $medico          = $xml->createElement('medico');
            $cpfMed          = $xml->createElement('cpfMed', $data['doctorcpf']);
            $nmMed           = $xml->createElement('nmMed', $data['doctorname']);
            $nrCRM           = $xml->createElement('nrCRM', $data['crm']);
            $ufCRM           = $xml->createElement('ufCRM',  $data['uf']);

            $respMonit       = $xml->createElement('respMonit');
            $cpfResp         = $xml->createElement('cpfMed', $data['doctorcpf2']); //n
            $nmResp          = $xml->createElement('nmResp', $data['doctorname2']); //n
            $YnrCRM          = $xml->createElement('nrCRM', $data['crm2']);  //repetido em médico nrCRM
            $XufCRM          = $xml->createElement('ufCRM', $data['uf2']);   //repetido em médico ufCRM

            $ideVinculo      = $xml->createElement('ideVinculo');
            $cpfTrab         = $xml->createElement('cpfTrab', $data['cpf']);
            $nisTrab         = $xml->createElement('nisTrab', $data['nis']);
            $matricula       = $xml->createElement('matricula', $data['matricula']);

            $ideEmpregador   = $xml->createElement('ideEmpregador');
            $tpInsc          = $xml->createElement('tpInsc', '1');
            $nrInsc          = $xml->createElement('nrInsc', '02317123');

            $ideEvento       = $xml->createElement('ideEvento');
            $indRetif        = $xml->createElement('indRetif', '1');
            $tpAmb           = $xml->createElement('tpAmb', '2');
            $procEmi         = $xml->createElement('procEmi', '1');
            $verProc         = $xml->createElement('verProc', 'SGG 1.0');

            #MONTANDO A ÁRVORE DO XML O DA ESQUERDA É PAI DO DA DIREITA

            $medico->appendChild($cpfMed);
            $medico->appendChild($nmMed);
            $medico->appendChild($nrCRM);
            $medico->appendChild($ufCRM);

            $aso->appendChild($dtAso);
            $aso->appendChild($resAso);
            $aso->appendChild($exame);
            $aso->appendChild($medico);

            $exame->appendChild($dtExm);
            $exame->appendChild($procRealizado);
            $exame->appendChild($obsProc);
            $exame->appendChild($ordExame);
            $exame->appendChild($indResult);

            $respMonit->appendChild($cpfResp);
            $respMonit->appendChild($nmResp);
            $respMonit->appendChild($YnrCRM); //repetido em médico nrCRM
            $respMonit->appendChild($XufCRM); //repetido em médico ufCRM

            $exMedOcup->appendChild($tpExameOcup);
            $exMedOcup->appendChild($aso);
            $exMedOcup->appendChild($respMonit);

            $ideVinculo->appendChild($cpfTrab);
            $ideVinculo->appendChild($nisTrab);
            $ideVinculo->appendChild($matricula);

            $ideEmpregador->appendChild($tpInsc);
            $ideEmpregador->appendChild($nrInsc);

            $ideEvento->appendChild($indRetif);
            $ideEvento->appendChild($tpAmb);
            $ideEvento->appendChild($procEmi);
            $ideEvento->appendChild($verProc);

            $evtMonit->appendChild($ideEvento);
            $evtMonit->appendChild($ideEmpregador);
            $evtMonit->appendChild($ideVinculo);
            $evtMonit->appendChild($exMedOcup);

            $esocial->appendChild($evtMonit);

            $xml->appendChild($esocial);
            // dd($xml);

            Header('Content-type: text/xml');
            // print $xml->saveXML();

            $name_xml = 'ASO' . uniqid(date('dmYHis')).".xml";


            Storage::put("asos/xmls/$name_xml", $xml->saveXML());
            #XML FINAL

            # TITLE
            $title = "Relatório de $this->title" . "s Cadastradas";

            # CARREGA A VIEW PARA PDF
            $pdf = PDF::loadView("Sistema/$this->route/pdf/report", compact('data'));

            # SETA O PAPEL E A POSIÇÃO
            $pdf->setPaper('a4', 'retration');

            # CARREGA A VIEW PARA PDF
            $digpdf = PDF::loadView("Sistema/$this->route/pdf/reportdigital", compact('data'));

            # SETA O PAPEL E A POSIÇÃO
            $digpdf->setPaper('a4', 'retration');

            ## IGNORA POSSIVEIS ERROS DE CERTIFICADO
            $contxt = stream_context_create([
                                                'ssl' => [
                                                'verify_peer'       => FALSE,
                                                'verify_peer_name'  => FALSE,
                                                'allow_self_signed' => TRUE
                                                ]
                                            ]);

            # HABILITA O PHP PARA PDF
            $pdf->getDOMPdf()->set_option('isPhpEnabled', true)->setHttpContext($contxt);

            # CRIA UM NOME ÚNICO
            $name = uniqid(date('YmdHis')) . ".pdf";

            # CHAMA A FUNCTION PARA SALVAR O PDF EM UPLOADS
            $save = $this->savePdf("uploads/asos/pdfs/$name", $pdf);

            $url = "../uploads/asos/pdfs/$name";

            # CRIA UM NOME ÚNICO
            $name_dig = uniqid(date('YmdHis')) . ".pdf";

            # CHAMA A FUNCTION PARA SALVAR O PDF EM UPLOADS
            $save = $this->saveDigPdf("uploads/asos/digpdfs/$name_dig", $digpdf);

            $url = "../uploads/asos/digpdfs/$name_dig";

            $url_xml = "../uploads/asos/xmls/$name_xml";


            # CADASTRA NO BANCO DE DADOS O ID DO CLINETE E O CAMINHO DO PDF QUE FOI GERADO A REVISÃO DA FATURA
            $insert = $this->model->create([
                                                'employee_id' => $data['employee_id'],
                                                'doctor_id'   => $data['doctor_id'],
                                                'pdf'         => $name,
                                                'digpdf'      => $name_dig,
                                                'xml'         => $name_xml
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
                        <i class="fas fa-download"></i> <b>Clique aqui para baixar!</b></a>']);
                        // <a target="_blank" class="btn btn-info" href="' . $url_xml . '" download>
                        // <i class="fas fa-download"></i> <b>Clique aqui para baixar!</b></a>
                        //
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
        public function storeAdd(AsoFormRequest $request)
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
        public function update(AsoFormRequest $request, $id)
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
        public function updateTrash(AsoFormRequest $request, $id)
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


        /**
         * Recuperar dados do funcionário
         * @param Request $request
         * @return \Illuminate\Http\JsonResponse
         */
        public function dataEmployeesAjax(Request $request)
        {
            $id = $request->input('id');

            $data = $this->employee->where("id", $id)->first();

            return response()->json(['employee' => $data]);
        }


        /**
         * SALVAR O PDF EM DISCO NO SERVIDOR
         */
        function savePdf($namePath, $pdf)
        {
            # SALVA O PDF NO UPLOADS
            return file_put_contents("$namePath", $pdf->output());

        }
        
        /**
         * SALVAR O PDF EM DISCO NO SERVIDOR
         */
        function saveDigPdf($namePath, $digpdf)
        {
            # SALVA O PDF NO UPLOADS
            return file_put_contents("$namePath", $digpdf->output());

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
            ->select("asos.*")
            ->where("asos.deleted_at", '=', null)
            ->leftJoin('employees', 'employees.id', '=', 'asos.employee_id')
            ->where('employees.name', 'LIKE', "%{$keySearch}%")
            ->where("asos.deleted_at", '=', null)
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


        public function searchPeriod(Request $request)
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

            if (!isset($dataForm["date1"]) && !isset($dataForm["date2"])) {
                return redirect()->route("{$this->route}.index")
                                ->with(['error' => 'Data não encontrada']);
            } else {
                $date1      = $dataForm["date1"];
                $day1       = date('d', strtotime($date1));
                $month1     = date('m', strtotime($date1));
                $year1      = date('Y', strtotime($date1));

                $date2      = $dataForm["date2"];
                $day2       = date('d', strtotime ($date2));
                $month2     = date('m', strtotime ($date2));
                $year2      = date('Y', strtotime ($date2));
            }

            //FILTRA OS FUNCIONÁRIOS E OU EXAMES
            $data = $this->model->select('asos.*')
                                ->where("asos.deleted_at", '=', null)
                                ->leftJoin('employees', 'employees.id', '=', 'asos.employee_id')
                                ->whereDay('asos.created_at', '>=', "{$day1}")
                                ->whereMonth('asos.created_at', '>=', "{$month1}")
                                ->whereYear('asos.created_at', '>=', "{$year1}")
                                ->whereDay('asos.created_at', '<=', "{$day2}")
                                ->whereMonth('asos.created_at', '<=', "{$month2}")
                                ->whereYear('asos.created_at', '<=', "{$year2}")
                                ->orderBy('asos.created_at', 'desc')
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
                    return redirect("/painel/$this->route/pesquisar-periodo?date1=$date1&date2=$date2&=$lastPage");
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

            # Recupera os dados do formulário
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
                ->select("asos.*")
                ->where("asos.deleted_at", '!=', null)
                ->leftJoin('employees', 'employees.id', '=', 'asos.employee_id')
                ->where('employees.name', 'LIKE', "%{$keySearch}%")
                ->where("asos.deleted_at", '!=', null)
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
            return view("{$this->view}.trash.index",
                        compact("title", "data", "name", "route", 'dataForm', "totalItens", "itensCurrent",
                                "active"));
        }


    }
