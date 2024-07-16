<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\Painel\acl\Role;
use App\Models\Painel\acl\RoleUser;
use App\Models\Painel\Banner;
use App\Models\Painel\Blog;
use App\Models\Painel\Company;
use App\Models\Painel\Funfact;
use App\Models\Painel\Log;
use App\Models\Painel\Portfolio;
use App\Models\Painel\Service;
use App\Models\Painel\Team;
use App\Models\Painel\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $model, $banner, $service, $funfact, $portfolio, $team, $blog, $company, $user, $role, $roleUser, $log;
    protected $title  = "Dashboard";
    protected $view   = "Painel.standard";
    protected $route  = "dashboard";
    protected $upload = [
        "name" => "image",
        "path" => "dashboard"
    ];

    public function __construct(Banner $banner, Service $service, Funfact $funfact, Portfolio $portfolio, Team $team, Blog $blog, Company $company, User $user, Role $role, RoleUser $roleUser, Log $log)
    {
        $this->banner    = $banner;
        $this->service   = $service;
        $this->funfact   = $funfact;
        $this->portfolio = $portfolio;
        $this->team      = $team;
        $this->blog      = $blog;
        $this->company   = $company;
        $this->user      = $user;
        $this->role      = $role;
        $this->roleUser  = $roleUser;
        $this->log       = $log;
    }

    public function index()
    {
        # TÍTULO DA PÁGINA
        $title = $this->title;

        # NOME DA ROTA
        $route = $this->route;

        # MENU ATIVO
        $active = $this->route;

        $banners = $this->banner
            ->where("deleted_at", '=', null)
            ->count();

        $services = $this->service
            ->where("deleted_at", '=', null)
            ->count();

        $funfacts = $this->funfact
            ->where("deleted_at", '=', null)
            ->count();

        $portfolios = $this->portfolio
            ->where("deleted_at", '=', null)
            ->count();

        $teams = $this->team
            ->where("deleted_at", '=', null)
            ->count();

        $blogs = $this->blog
            ->where("deleted_at", '=', null)
            ->count();

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

        $logs = $this->log
            ->with('user', 'roleUser')
            ->where("deleted_at", '=', null)
            ->orderBy("created_at", 'desc')
            ->limit(5)->get();

        # CARREGA A VIEW PASSANDO OS PARAMETROS DA PÁGINA
        return view("Painel.standard.index",
            compact("title", "active", 'route', 'banners', 'services', 'funfacts', 'portfolios', 'teams', 'blogs', 'companies', 'logsCount', 'users', 'roles', 'roleUsers', 'logs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
