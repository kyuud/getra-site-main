<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Requests\Sistema\AttendanceFormRequest;
use App\Models\Sistema\attendance;
use App\Models\Sistema\Company;
use App\Models\Sistema\Doctor;
use App\Models\Sistema\Employee;
use App\Models\Sistema\Exam;
use App\Models\Sistema\HealthTechnicians;
use App\Models\Sistema\HourAttendance;
use App\Models\Sistema\Modality;
use App\Models\Sistema\MonthDay;
use App\Models\Sistema\MonthYear;
use App\Models\Sistema\YearAttendance;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use PDF;

class AttendanceController extends StandardController
{
    protected $model, $month, $year, $employee, $modality,$exam, $day, $data, $technician, $hour, $company, $doctor, $attendance;

    protected $title = "Atendimento";
    protected $view = "Sistema.attendance.";
    protected $route = "attendance";
    protected $permissions = "attendance";
    protected $name = ["single" => "atendimento", "plus" => "atendimentos"];


    public function __construct(YearAttendance    $yearAttendance,
                                MonthYear         $monthYear,
                                MonthDay          $monthDay,
                                Employee          $employee,
                                Company           $company,
                                Doctor            $doctor,
                                HealthTechnicians $technician,
                                Attendance        $attendance,
                                Exam              $exam,
                                Modality          $modality)
    {
        $this->technician = $technician;
        $this->model = $yearAttendance;
        $this->month = $monthYear;
        $this->day = $monthDay;
        $this->employee = $employee;
        $this->company = $company;
        $this->doctor = $doctor;
        $this->attendance = $attendance;
        $this->exam = $exam;
        $this->modality = $modality;

        # FUNCTION PERMISSÕES DE ACESSOS
        $this->acl();
    }

    public function index(Request $request)
    {
        # TÍTULO DA PÁGINA
        $title = $this->title;

        # NOME DA ROTA
        $route = $this->route;

        # MENU ATIVO
        $active = $this->route;

        $model = $this->model
            ->whereNull('deleted_at')
            ->orderBy('id', 'asc')
            ->paginate(12);

        # CARREGA A VIEW PASSANDO OS PARAMETROS DA PÁGINA
        return view($this->view . "attendance-year.index",
            compact("title", "route", "active", "model"));

    }

    public function year($year){

        # TÍTULO DA PÁGINA
        $title = $this->title;

        # NOME DA ROTA
        $route = $this->route;

        # MENU ATIVO
        $active = $this->route;

        $model = $this->model
            ->whereNull('deleted_at')
            ->orderBy('id', 'asc')
            ->paginate(12);

        $data = $this->month
            ->select('year_month.id', 'year_month.month',
                'year_month.year', 'year_month.created_at',
                'year_month.deleted_at')
            ->join('month_attendances', 'month_attendances.month', 'year_month.month')
            ->where("year", '=', $year)
            ->get();

        return view($this->view . "attendance-month.index", compact( 'year', 'model', 'data', 'active', 'route', 'title'));
    }

    public function month($year, $month){

        # TÍTULO DA PÁGINA
        $title = $this->title;

        # NOME DA ROTA
        $route = $this->route;

        # MENU ATIVO
        $active = $this->route;

        $data = $this->day
            ->select('month_day.id', 'month_day.day', 'month_day.deleted_at',
                'month_day.month')
            ->join('day_attendances', 'day_attendances.day', 'month_day.day')
            ->where("month", '=', $month)
            ->orderBy('day', 'asc')
            ->get("day");

        # Quantida de Registros
        $attendanceCount = $this->attendance::whereDate('attendance_date', '=', "$year-$month-$data")
            ->where("deleted_at", '=', null)
            ->count();

        return view($this->view . "attendance-day.index", compact( 'year', 'data', 'month', 'title', 'route', 'active', 'attendanceCount'));
    }

    public function day($year, $month, $day, $attendee){

        #TITULO DA PAGE
        $title = $this->title;

        # NOME DA ROTA
        $route = $this->route;

        # MENU ATIVO
        $active = $this->route;

        # NOME PARA MSG
        $name = $this->name;

        $technician = $this->technician
            ->whereNull('deleted_at')
            ->orderBy('id', 'asc')
            ->paginate(5);

        $attendant = $this->technician
            ->whereNull('deleted_at')
            ->where('id', '=', $attendee)
            ->find($attendee);

        $attendance = $this->attendance::whereDate('attendance_date', '=', "$year-$month-$day")
            ->where('technician_id', '=', $attendee)
            ->whereNull("deleted_at")
            ->orderBy('attendance_date', 'asc')
            ->get();

        return view($this->view . "index", compact( 'year', /*'data',*/ 'month', 'name', 'active', 'route', 'day','title', 'technician', 'attendee', 'attendance', 'attendant'));

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

        $employee = [];

        $exam = $this->exam
            ->whereNull('deleted_at')
            ->where('status', '1')
            ->pluck("name", "id");

        # ARRAY DE EMPRESAS
        $companies = $this->company
            ->where('deleted_at', null)
            ->where('status', '1')
            ->pluck("name", "id");

        # ARRAY DE MÉDICOS
        $doctors = $this->doctor
            ->whereNull('deleted_at')
            ->where('status', '1')
            ->pluck("name", "id");

        # ARRAY DE TÉCNICOS
        $technician = $this->technician
            ->whereNull('deleted_at')
            ->where('status', '1')
            ->pluck("name", "id");

        # ARRAY DE MODALIDADES
        $modality = $this->modality
            ->whereNull('deleted_at')
            ->where('status', '1')
            ->pluck("name", "id");

        return view("{$this->view}.create-edit", compact('title', 'active', 'route', 'name', 'employee', 'companies', 'doctors', 'technician', 'exam', 'modality'));

    }

    public function edit($id)
    {
        $data  = $this->attendance->find($id);

        $title = "Editar {$this->title}: {$data->title}";

        # MENU ATIVO
        $active = $this->route;

        # NOME DA ROTA
        $route = $this->route;

        # NOME PARA MSG
        $name = $this->name;

        # ARRAY DE EMPRESAS
        $companies = $this->company
            ->where('deleted_at', null)
            ->where('status', '1')
            ->orderBy('name', 'asc')
            ->pluck("name", "id");

        $employee = [];

        $exam = $this->exam
            ->whereNull('deleted_at')
            ->where('status', '1')
            ->pluck("name", "id");

        # ARRAY DE MÉDICOS
        $doctors = $this->doctor
            ->whereNull('deleted_at')
            ->where('status', '1')
            ->pluck("name", "id");

        # ARRAY DE TÉCNICOS
        $technician = $this->technician
            ->whereNull('deleted_at')
            ->where('status', '1')
            ->pluck("name", "id");

        # ARRAY DE MODALIDADES
        $modality = $this->modality
            ->whereNull('deleted_at')
            ->where('status', '1')
            ->pluck("name", "id");

        return view("{$this->view}.create-edit", compact('data', 'title', 'active', 'route', 'name', 'companies', 'employee', 'modality', 'exam', 'technician', 'doctors'));
    }

    public function update(AttendanceFormRequest $request, $id)
    {
        //Pega todos os dados do categoria
        $dataForm = $request->all();

        # URL DA PÁGINA COM A PAGINAÇÃO
        $url = $dataForm['redirects_to'];

        # AJUSTA O STATUS PARA PODER ATUALIZAR NO BANCO
        $dataForm['status'] = isset($dataForm['status']) ? 1 : 0;

        # AJUSTA O EXAME SE REALIZADO PARA PODER ATUALIZAR NO BANCO
        $dataForm['accomplished'] = isset($dataForm['accomplished']) ? 1 : 0;

        //Cria o objeto de categoria
        $data = $this->attendance->find($id);

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

    public function pdfCompany($id)
    {
        # TITLE
        $title = "Relatório de $this->title" . "s Cadastrado(a)s Por Empresa";

        # DADOS
        $data = $this->model
            ->where("deleted_at", '=', null)
            ->where("company_id", '=', $id)->get();

        # QUANTIDADE
        $qty = $this->model->where("deleted_at", '=', null)->count();

        # CARREGA A VIEW PARA PDF
        $pdf = PDF::loadView("Sistema/$this->route/pdf/report", compact('data', 'title', 'qty'));

        # SETA O PAPEL E A POSIÇÃO
        $pdf->setPaper('a4', 'landscape');

        # IGNORA POSSIVEIS ERROS DE CERTIFICADO
        $contxt = stream_context_create([
            'ssl' => [
                'verify_peer'       => FALSE,
                'verify_peer_name'  => FALSE,
                'allow_self_signed' => TRUE
            ]
        ]);

        # HABILITA O PHP PARA PDF
        $pdf->getDOMPdf()->set_option('isPhpEnabled', true)->setHttpContext($contxt);

        $name = $this->name['plus'];

        # RETORNA O PDF COM UM NOME
        return $pdf->stream("$name.pdf");
        // return $pdf->download('cells.pdf');
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

        $remove = ['-', '/', '.'];

        $keySearch = str_replace($remove, '', $keySearch);

        //Filtra os usuários
        $data = $this->data
            ->where("deleted_at", '=', null)
            ->where('name', 'LIKE', "%{$keySearch}%")
            ->orWhere('cnpj', 'LIKE', "%{$keySearch}%")
            ->orWhere('fantasyname', 'LIKE', "%{$keySearch}%")
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

    /* Receber funcionário da empresa*/
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function companiesAjax(Request $request): JsonResponse
    {
        $cnpj = $request->input('cnpj');

        $data = $this->company->where("cnpj", $cnpj)->get();

        return response()->json(['companies' => $data]);

    }

    public function store(AttendanceFormRequest $request)
    {
        $dataForm = $request->all();

        # AJUSTA O STATUS PARA PODER ATUALIZAR NO BANCO
          $dataForm['status'] = isset($dataForm['status']) ? 1 : 0;

        # AJUSTA O EXAME SE REALIZADO PARA PODER ATUALIZAR NO BANCO
        $dataForm['accomplished'] = isset($dataForm['accomplished']) ? 1 : 0;

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

        $insert = $this->attendance->create($dataForm);

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
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeAdd(AttendanceFormRequest $request)
    {
        $dataForm = $request->all();

        # FORMATAR DATA
        $dataForm['duedate'] = formatDate($dataForm['duedate'], 'Y-m-d');

        # AJUSTA O STATUS PARA PODER ATUALIZAR NO BANCO
        $dataForm['status'] = isset($dataForm['status']) ? 1 : 0;

        # AJUSTA O EXAME SE REALIZADO PARA PODER ATUALIZAR NO BANCO
        $dataForm['accomplished'] = isset($dataForm['accomplished']) ? 1 : 0;

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

        $insert = $this->attendance->create($dataForm);

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
     * Destroy With Ajax the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroyWithAjax(Request $request)
    {
        $id = $request->id;

        $data = $this->attendance->find($id);

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

        $data = $this->attendance->whereIn('id', $ids);

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

        $data = $this->attendance->find($id);

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

        $data = $this->attendance->whereIn('id', $ids);

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
        $data = $this->attendance->where('deleted_at', '=', null);

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
        $data = $this->attendance->where('deleted_at', '!=', null);

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
        $data = $this->attendance->where("deleted_at", '!=', null)->orderBy('title', 'asc')->paginate($this->totalPage);

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

    /**
     * Destroy With Ajax the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function restoreWithAjax(Request $request)
    {
        $id   = $request->id;

        $data = $this->attendance->find($id);

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

        $data = $this->attendance->whereIn('id', $ids);

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
        $data  = $this->attendance->where("deleted_at", '=', null)->get();

        # QUANTIDADE
        $qty = $this->attendance->where("deleted_at", '=', null)->count();

        # CARREGA A VIEW PARA PDF
        $pdf = PDF::loadView("Sistema/$this->route/pdf/index", compact('data', 'title', 'qty'));

        # SETA O PAPEL E A POSIÇÃO
        $pdf->setPaper('a4', 'landscape');

        # IGNORA POSSIVEIS ERROS DE CERTIFICADO
        $contxt = stream_context_create([
            'ssl' => [
                'verify_peer'       => FALSE,
                'verify_peer_name'  => FALSE,
                'allow_self_signed' => TRUE
            ]
        ]);

        # HABILITA O PHP PARA PDF
        $pdf->getDOMPdf()->set_option('isPhpEnabled', true)->setHttpContext($contxt);

        $name = $this->name['plus'];

        # RETORNA O PDF COM UM NOME
        return $pdf->stream("$name.pdf");
        // return $pdf->download('cells.pdf');
    }


}
