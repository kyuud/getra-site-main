<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use App\Models\Sistema\DayAttendance;
use App\Models\Sistema\MonthAttendance;
use App\Models\Sistema\MonthDay;
use App\Models\Sistema\YearAttendance;
use Illuminate\Http\Request;

class DayAttendanceController extends Controller
{
    protected $day;
    protected $model;
    protected $month;
    protected $year;

    protected $title = "Dias de Atendimento";
    protected $view = "Sistema.attendance.attendance-day";
    protected $route = "attendance";

    public function __construct(DayAttendance $dayAttendance, MonthAttendance $monthAttendance,
                                YearAttendance $yearAttendance, MonthDay $monthDay)
    {
        $this->model  = $dayAttendance;
        $this->month  = $monthAttendance;
        $this->year   = $yearAttendance;
        $this->day    = $monthDay;
    }

    public function getAll()
    {
        $results = $this->day
            ->where('deleted_at', null)
            ->where('status', '1')
            ->orderBy('created_at', 'desc')
            ->paginate(31);

        return $results;
    }

    public function getDay($id) {

        #TITULO DA PAGE
        $title = 'Dia de Atendimento';

        # NOME DA ROTA
        $route = $this->route;

        # MENU ATIVO
        $active = $this->route;

        $data = $this->day
            ->select('month_day.id', 'month_day.day_id', 'month_day.created_at',
                     'month_day.updated_at', 'month_day.deleted_at',
                     'day_attendances.day')
            ->join('day_attendances', 'day_attendances.id','month_day.id',
                   'day_attendances.day')
            ->where("month_id", '=', $id)->get();

        $month = $this->month->find($id);

        $year = $this->year->where("id", '=', $id)->get();

        # CARREGA A VIEW PASSANDO OS PARAMETROS DA PÁGINA
        return view($this->view . ".index",
            compact( "route", "active", "data", "title", "month", "year"));
    }
}
