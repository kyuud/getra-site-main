<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sistema\MonthAttendanceFormRequest;
use App\Models\Sistema\MonthAttendance;
use App\Models\Sistema\MonthYear;
use App\Models\Sistema\YearAttendance;

class MonthAttendanceController extends StandardController
{
    protected $model;
    protected $month;
    protected $year;

    protected $title = "Mês de Atendimento";
    protected $view = "Sistema.attendance.attendance-month";
    protected $route = "attendance";

    public function __construct(MonthAttendance $monthAttendance,
                                MonthYear $monthYear, YearAttendance $yearAttendance)
    {
        $this->model  = $monthAttendance;
        $this->month  = $monthYear;
        $this->year   = $yearAttendance;
    }

    public function getMonth($id)
    {
        #TITULO DA PAGE
        $title = $this->title;

        $data = $this->month
            ->select('year_month.id', 'year_month.month_id',
                     'year_month.year_id', 'year_month.created_at',
                     'year_month.updated_at', 'year_month.deleted_at',
                     'month_attendances.month')
            ->join('month_attendances','month_attendances.id', 'year_month.id',
                   'month_attendances.month')
            ->where("year_id", '=', $id)
            ->get();

        $year = $this->year
            ->where("deleted_at", '=', null)
            ->find($id);

        # NOME DA ROTA
        $route = $this->route;

        # MENU ATIVO
        $active = $this->route;

        return view($this->view . ".index",
            compact("title", "route", "active", "data", "year"));
    }

    public function create() {

        # TITLE DA PÁGINA
        $title = "Cadastrar {$this->title}";

        # MENU ATIVO
        $active = $this->route;

        # NOME DA ROTA
        $route = $this->route;

        $model = $this->model
            ->where("deleted_at", '=', null)
            ->orderBy('id', 'asc')
            ->paginate(12);

        return view("{$this->view}.create-edit", compact("title", "route", "active", "model"));
    }

    public function storeAdd(MonthAttendanceFormRequest $request)
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

        $insert = $this->data->create($dataForm);

        if ($insert)
            return redirect()
                ->route("{$this->route}.create")
                ->with(['success' => 'Cadastro realizado com sucesso!']);
        else
            return redirect()->route("{$this->route}.create")
                ->withErrors(['errors' => 'Falha ao cadastrar!'])
                ->withInput();
    }
}
