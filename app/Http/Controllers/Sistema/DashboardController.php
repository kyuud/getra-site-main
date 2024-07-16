<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use App\Models\Painel\acl\Role;
use App\Models\Painel\acl\RoleUser;
use App\Models\Painel\Log;
use App\Models\Painel\User;
use App\Models\Sistema\Anamnese;
use App\Models\Sistema\Appraisal;
use App\Models\Sistema\Aso;
use App\Models\Sistema\Company;
use App\Models\Sistema\Doctor;
use App\Models\Sistema\Employee;
use App\Models\Sistema\Financial;
use App\Models\Sistema\Screening;
use App\Models\Sistema\Training;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class DashboardController extends Controller
{
    protected $company, $user, $role, $roleUser, $log;
    protected $title = "Dashboard";
    protected $view = "Sistema.dashboard";
    protected $route = "dashboard";
    protected $upload = [
        "name" => "image",
        "path" => "dashboard"
    ];

    public function __construct(Company $company, User $user, Role $role, RoleUser $roleUser, Log $log, Employee $employee,
                                Doctor  $doctor, Financial $financial, Training $training, Appraisal $appraisal,
                                Aso     $aso, Anamnese $anamnese, Screening $screening)
    {
        $this->company   = $company;
        $this->user      = $user;
        $this->role      = $role;
        $this->roleUser  = $roleUser;
        $this->log       = $log;
        $this->employee  = $employee;
        $this->doctor    = $doctor;
        $this->financial = $financial;
        $this->training  = $training;
        $this->appraisal = $appraisal;
        $this->aso       = $aso;
        $this->anamnese  = $anamnese;
        $this->screening = $screening;

    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        # TÍTULO DA PÁGINA
        $title = $this->title;

        # NOME DA ROTA
        $route = $this->route;

        # MENU ATIVO
        $active = $this->route;

        $companies = $this->company
            ->where("deleted_at", '=', null)
            ->count();

        $users = $this->user
            ->where("deleted_at", '=', null)
            ->count();

        $roles = $this->role
            ->where("deleted_at", '=', null)
            ->count();

        $roleUsers = $this->roleUser
            ->where("deleted_at", '=', null)
            ->count();

        $logsCount = $this->log
            ->where("deleted_at", '=', null)
            ->count();

        $employees = $this->employee
            ->where("deleted_at", '=', null)
            ->count();

        $doctors = $this->doctor
            ->where("deleted_at", '=', null)
            ->count();

        $financials = $this->financial
            ->where("deleted_at", '=', null)
            ->count();

        $trainings = $this->training
            ->where("deleted_at", '=', null)
            ->count();

        $appraisals = $this->appraisal
            ->where("deleted_at", '=', null)
            ->count();

        $asos = $this->aso
            ->where("deleted_at", '=', null)
            ->count();

        $anamneses = $this->anamnese
            ->where("deleted_at", '=', null)
            ->count();

        $screenings = $this->screening
            ->where("deleted_at", '=', null)
            ->count();

        $logs = $this->log
            ->with('user', 'roleUser')
            ->where("deleted_at", '=', null)
            ->orderBy("created_at", 'desc')
            ->limit(5)
            ->get();

        # CARREGA A VIEW PASSANDO OS PARAMETROS DA PÁGINA
        return view($this->view . ".index",
            compact("title", "route", "active", 'companies', 'logsCount', 'users', 'roles',
                'roleUsers', 'logs', 'employees', 'doctors', 'financials', 'trainings', 'appraisals',
                'asos', 'anamneses', 'screenings'));
    }


}
