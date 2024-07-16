<?php

/* GRUPO DE IMPORTAÇÕES DAS ROTAS PARA WEBSITE */

use App\Http\Controllers\Site\BlogController;
use App\Http\Controllers\Site\ContactController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\ProposalController;
use App\Http\Controllers\Site\UnityController;
use App\Http\Controllers\Site\WorkWithUsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\Sistema\AdditionalExamsController;
use App\Http\Controllers\Sistema\SuppliersController;
use App\Http\Controllers\Sistema\ExamListController;

/* GRUPO DE ROTAS PARA WEBSITE */
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/blogs-site', [BlogController::class, 'index'])->name('blogs-site');
Route::get('/blogs/{id}/{title}', [BlogController::class, 'getBlog'])->name('blogpost');
Route::get('/contato', [ContactController::class, 'index'])->name('contact');
Route::get('/nossas-unidades', [UnityController::class, 'index'])->name('unit');
Route::get('/trabalhe-conosco', [WorkWithUsController::class, 'index'])->name('trabalhe');
Route::get('/proposta', [ProposalController::class, 'index'])->name('proposal');
Route::post('/proposta-enviar', [ProposalController::class, 'sendProposal'])->name('proposal-contact');
Route::post('/contato-enviar', [ContactController::class, 'sendMail'])->name('contact-send');
Route::post('/trabalhe-enviar', [WorkWithUsController::class, 'workMail'])->name('work-send');

/* GRUPO DE ROTAS PARA AUTENTICAÇÃO */

Auth::routes();

/*teste de banco de dados*/
Route::get('/test-database-query', [ExcelController::class, 'testDatabaseQuery']);


/*Rota para upload de arquivo Excel */
Route::post('/process-upload', [ExcelController::class, 'processUpload'])->name('process.upload');

/*Rota para download de arquivo Excel */
Route::get('/download-updated-companies', [ExcelController::class, 'downloadUpdatedCompanies'])
    ->name('download.updated_companies');


/* GRUPO DE ROTAS PARA PAINEL ADM */
Route::group(['namespace' => 'Painel', 'middleware' => 'auth'], function () {

    Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');

    /* GRUPO DE ROTAS PARA BANNERS */
    Route::group(['prefix' => 'banners'], function () {
        Route::any('trash', 'BannerController@trash')->name('banners.trash');
        Route::any('trash/{id}/edit', 'BannerController@editTrash')->name('banners.edit.trash');
        Route::any('trash/{id}/update', 'BannerController@updateTrash')->name('banners.update.trash');
        Route::any('trash/pesquisar', 'BannerController@searchTrash')->name('banners.search.trash');
        Route::any('pesquisar', 'BannerController@search')->name('banners.search');
        Route::any('destroyWithAjaxFake', 'BannerController@destroyWithAjaxFake')->name('banners.destroyWithAjaxFake');
        Route::any('destroyMultWithAjaxFake', 'BannerController@destroyMultWithAjaxFake')->name('banners.destroyMultWithAjaxFake');
        Route::any('destroyWithAjax', 'BannerController@destroyWithAjax')->name('banners.destroyWithAjax');
        Route::any('destroyMultWithAjax', 'BannerController@destroyMultWithAjax')->name('banners.destroyMultWithAjax');
        Route::any('clearTable', 'BannerController@clearTable')->name('banners.clearTable');
        Route::any('clearTableForce', 'BannerController@clearTableForce')->name('banners.clearTableForce');
        Route::any('restoreWithAjax', 'BannerController@restoreWithAjax')->name('banners.restoreWithAjax');
        Route::any('restoreMultWithAjax', 'BannerController@restoreMultWithAjax')->name('banners.restoreMultWithAjax');
        Route::any('storeAdd', 'BannerController@storeAdd')->name('banners.storeAdd');
    });
    Route::resource('banners', 'BannerController');

    /* GRUPO DE ROTAS PARA SERVICES */
    Route::group(['prefix' => 'services'], function () {
        Route::any('trash', 'ServiceController@trash')->name('services.trash');
        Route::any('trash/{id}/edit', 'ServiceController@editTrash')->name('services.edit.trash');
        Route::any('trash/{id}/update', 'ServiceController@updateTrash')->name('services.update.trash');
        Route::any('trash/pesquisar', 'ServiceController@searchTrash')->name('services.search.trash');
        Route::any('pesquisar', 'ServiceController@search')->name('services.search');
        Route::any('destroyWithAjaxFake', 'ServiceController@destroyWithAjaxFake')->name('services.destroyWithAjaxFake');
        Route::any('destroyMultWithAjaxFake', 'ServiceController@destroyMultWithAjaxFake')->name('services.destroyMultWithAjaxFake');
        Route::any('destroyWithAjax', 'ServiceController@destroyWithAjax')->name('services.destroyWithAjax');
        Route::any('destroyMultWithAjax', 'ServiceController@destroyMultWithAjax')->name('services.destroyMultWithAjax');
        Route::any('clearTable', 'ServiceController@clearTable')->name('services.clearTable');
        Route::any('clearTableForce', 'ServiceController@clearTableForce')->name('services.clearTableForce');
        Route::any('restoreWithAjax', 'ServiceController@restoreWithAjax')->name('services.restoreWithAjax');
        Route::any('restoreMultWithAjax', 'ServiceController@restoreMultWithAjax')->name('services.restoreMultWithAjax');
        Route::any('storeAdd', 'ServiceController@storeAdd')->name('services.storeAdd');
    });
    Route::resource('services', 'ServiceController');

    /* GRUPO DE ROTAS PARA TEAMS */
    Route::group(['prefix' => 'teams'], function () {
        Route::any('trash', 'TeamController@trash')->name('teams.trash');
        Route::any('trash/{id}/edit', 'TeamController@editTrash')->name('teams.edit.trash');
        Route::any('trash/{id}/update', 'TeamController@updateTrash')->name('teams.update.trash');
        Route::any('trash/pesquisar', 'TeamController@searchTrash')->name('teams.search.trash');
        Route::any('pesquisar', 'TeamController@search')->name('teams.search');
        Route::any('destroyWithAjaxFake', 'TeamController@destroyWithAjaxFake')->name('teams.destroyWithAjaxFake');
        Route::any('destroyMultWithAjaxFake', 'TeamController@destroyMultWithAjaxFake')->name('teams.destroyMultWithAjaxFake');
        Route::any('destroyWithAjax', 'TeamController@destroyWithAjax')->name('teams.destroyWithAjax');
        Route::any('destroyMultWithAjax', 'TeamController@destroyMultWithAjax')->name('teams.destroyMultWithAjax');
        Route::any('clearTable', 'TeamController@clearTable')->name('teams.clearTable');
        Route::any('clearTableForce', 'TeamController@clearTableForce')->name('teams.clearTableForce');
        Route::any('restoreWithAjax', 'TeamController@restoreWithAjax')->name('teams.restoreWithAjax');
        Route::any('restoreMultWithAjax', 'TeamController@restoreMultWithAjax')->name('teams.restoreMultWithAjax');
        Route::any('storeAdd', 'TeamController@storeAdd')->name('teams.storeAdd');
    });
    Route::resource('teams', 'TeamController');

    /* GRUPO DE ROTAS PARA BLOGS */
    Route::group(['prefix' => 'blogs'], function () {
        Route::any('trash', 'BlogController@trash')->name('blogs.trash');
        Route::any('trash/{id}/edit', 'BlogController@editTrash')->name('blogs.edit.trash');
        Route::any('trash/{id}/update', 'BlogController@updateTrash')->name('blogs.update.trash');
        Route::any('trash/pesquisar', 'BlogController@searchTrash')->name('blogs.search.trash');
        Route::any('pesquisar', 'BlogController@search')->name('blogs.search');
        Route::any('destroyWithAjaxFake', 'BlogController@destroyWithAjaxFake')->name('blogs.destroyWithAjaxFake');
        Route::any('destroyMultWithAjaxFake', 'BlogController@destroyMultWithAjaxFake')->name('blogs.destroyMultWithAjaxFake');
        Route::any('destroyWithAjax', 'BlogController@destroyWithAjax')->name('blogs.destroyWithAjax');
        Route::any('destroyMultWithAjax', 'BlogController@destroyMultWithAjax')->name('blogs.destroyMultWithAjax');
        Route::any('clearTable', 'BlogController@clearTable')->name('blogs.clearTable');
        Route::any('clearTableForce', 'BlogController@clearTableForce')->name('blogs.clearTableForce');
        Route::any('restoreWithAjax', 'BlogController@restoreWithAjax')->name('blogs.restoreWithAjax');
        Route::any('restoreMultWithAjax', 'BlogController@restoreMultWithAjax')->name('blogs.restoreMultWithAjax');
        Route::any('storeAdd', 'BlogController@storeAdd')->name('blogs.storeAdd');
    });
    Route::resource('blogs', 'BlogController');

    /* GRUPO DE ROTAS PARA UNIDADES */
    Route::group(['prefix' => 'units'], function () {
        Route::any('trash', 'UnitController@trash')->name('units.trash');
        Route::any('trash/{id}/edit', 'UnitController@editTrash')->name('units.edit.trash');
        Route::any('trash/{id}/update', 'UnitController@updateTrash')->name('units.update.trash');
        Route::any('trash/pesquisar', 'UnitController@searchTrash')->name('units.search.trash');
        Route::any('pesquisar', 'UnitController@search')->name('units.search');
        Route::any('destroyWithAjaxFake', 'UnitController@destroyWithAjaxFake')->name('units.destroyWithAjaxFake');
        Route::any('destroyMultWithAjaxFake', 'UnitController@destroyMultWithAjaxFake')->name('units.destroyMultWithAjaxFake');
        Route::any('destroyWithAjax', 'UnitController@destroyWithAjax')->name('units.destroyWithAjax');
        Route::any('destroyMultWithAjax', 'UnitController@destroyMultWithAjax')->name('units.destroyMultWithAjax');
        Route::any('clearTable', 'UnitController@clearTable')->name('units.clearTable');
        Route::any('clearTableForce', 'UnitController@clearTableForce')->name('units.clearTableForce');
        Route::any('restoreWithAjax', 'UnitController@restoreWithAjax')->name('units.restoreWithAjax');
        Route::any('restoreMultWithAjax', 'UnitController@restoreMultWithAjax')->name('units.restoreMultWithAjax');
        Route::any('storeAdd', 'UnitController@storeAdd')->name('units.storeAdd');
    });
    Route::resource('units', 'UnitController');

    /* GRUPO DE ROTAS PARA COMPANIES */
    Route::group(['prefix' => 'companies'], function () {
        Route::any('trash', 'CompanyController@trash')->name('companies.trash');
        Route::any('trash/{id}/edit', 'CompanyController@editTrash')->name('companies.edit.trash');
        Route::any('trash/{id}/update', 'CompanyController@updateTrash')->name('companies.update.trash');
        Route::any('trash/pesquisar', 'CompanyController@searchTrash')->name('companies.search.trash');
        Route::any('pesquisar', 'CompanyController@search')->name('companies.search');
        Route::any('destroyWithAjaxFake', 'CompanyController@destroyWithAjaxFake')->name('companies.destroyWithAjaxFake');
        Route::any('destroyMultWithAjaxFake', 'CompanyController@destroyMultWithAjaxFake')->name('companies.destroyMultWithAjaxFake');
        Route::any('destroyWithAjax', 'CompanyController@destroyWithAjax')->name('companies.destroyWithAjax');
        Route::any('destroyMultWithAjax', 'CompanyController@destroyMultWithAjax')->name('companies.destroyMultWithAjax');
        Route::any('clearTable', 'CompanyController@clearTable')->name('companies.clearTable');
        Route::any('clearTableForce', 'CompanyController@clearTableForce')->name('companies.clearTableForce');
        Route::any('restoreWithAjax', 'CompanyController@restoreWithAjax')->name('companies.restoreWithAjax');
        Route::any('restoreMultWithAjax', 'CompanyController@restoreMultWithAjax')->name('companies.restoreMultWithAjax');
        Route::any('storeAdd', 'CompanyController@storeAdd')->name('companies.storeAdd');
    });
    Route::resource('companies', 'CompanyController');

    /* GRUPO DE ROTAS PARA PORTFOLIOS */
    Route::group(['prefix' => 'portfolios'], function () {
        Route::any('trash', 'PortfolioController@trash')->name('portfolios.trash');
        Route::any('trash/{id}/edit', 'PortfolioController@editTrash')->name('portfolios.edit.trash');
        Route::any('trash/{id}/update', 'PortfolioController@updateTrash')->name('portfolios.update.trash');
        Route::any('trash/pesquisar', 'PortfolioController@searchTrash')->name('portfolios.search.trash');
        Route::any('pesquisar', 'PortfolioController@search')->name('portfolios.search');
        Route::any('destroyWithAjaxFake', 'PortfolioController@destroyWithAjaxFake')->name('portfolios.destroyWithAjaxFake');
        Route::any('destroyMultWithAjaxFake', 'PortfolioController@destroyMultWithAjaxFake')->name('portfolios.destroyMultWithAjaxFake');
        Route::any('destroyWithAjax', 'PortfolioController@destroyWithAjax')->name('portfolios.destroyWithAjax');
        Route::any('destroyMultWithAjax', 'PortfolioController@destroyMultWithAjax')->name('portfolios.destroyMultWithAjax');
        Route::any('clearTable', 'PortfolioController@clearTable')->name('portfolios.clearTable');
        Route::any('clearTableForce', 'PortfolioController@clearTableForce')->name('portfolios.clearTableForce');
        Route::any('restoreWithAjax', 'PortfolioController@restoreWithAjax')->name('portfolios.restoreWithAjax');
        Route::any('restoreMultWithAjax', 'PortfolioController@restoreMultWithAjax')->name('portfolios.restoreMultWithAjax');
        Route::any('storeAdd', 'PortfolioController@storeAdd')->name('portfolios.storeAdd');
    });
    Route::resource('portfolios', 'PortfolioController');

    /* GRUPO DE ROTAS PARA FUNFACTS */
    Route::group(['prefix' => 'funfacts'], function () {
        Route::any('trash', 'FunfactController@trash')->name('funfacts.trash');
        Route::any('trash/{id}/edit', 'FunfactController@editTrash')->name('funfacts.edit.trash');
        Route::any('trash/{id}/update', 'FunfactController@updateTrash')->name('funfacts.update.trash');
        Route::any('trash/pesquisar', 'FunfactController@searchTrash')->name('funfacts.search.trash');
        Route::any('pesquisar', 'FunfactController@search')->name('funfacts.search');
        Route::any('destroyWithAjaxFake', 'FunfactController@destroyWithAjaxFake')->name('funfacts.destroyWithAjaxFake');
        Route::any('destroyMultWithAjaxFake', 'FunfactController@destroyMultWithAjaxFake')->name('funfacts.destroyMultWithAjaxFake');
        Route::any('destroyWithAjax', 'FunfactController@destroyWithAjax')->name('funfacts.destroyWithAjax');
        Route::any('destroyMultWithAjax', 'FunfactController@destroyMultWithAjax')->name('funfacts.destroyMultWithAjax');
        Route::any('clearTable', 'FunfactController@clearTable')->name('funfacts.clearTable');
        Route::any('clearTableForce', 'FunfactController@clearTableForce')->name('funfacts.clearTableForce');
        Route::any('restoreWithAjax', 'FunfactController@restoreWithAjax')->name('funfacts.restoreWithAjax');
        Route::any('restoreMultWithAjax', 'FunfactController@restoreMultWithAjax')->name('funfacts.restoreMultWithAjax');
        Route::any('storeAdd', 'FunfactController@storeAdd')->name('funfacts.storeAdd');
    });
    Route::resource('funfacts', 'FunfactController');

    /* GRUPO DE ROTAS PARA USERS */
    Route::group(['prefix' => 'users'], function () {
        Route::any('trash', 'UserController@trash')->name('users.trash');
        Route::any('trash/{id}/edit', 'UserController@editTrash')->name('users.edit.trash');
        Route::any('trash/{id}/update', 'UserController@updateTrash')->name('users.update.trash');
        Route::any('trash/pesquisar', 'UserController@searchTrash')->name('users.search.trash');
        Route::any('pesquisar', 'UserController@search')->name('users.search');
        Route::any('destroyWithAjaxFake', 'UserController@destroyWithAjaxFake')->name('users.destroyWithAjaxFake');
        Route::any('destroyMultWithAjaxFake', 'UserController@destroyMultWithAjaxFake')->name('users.destroyMultWithAjaxFake');
        Route::any('destroyWithAjax', 'UserController@destroyWithAjax')->name('users.destroyWithAjax');
        Route::any('destroyMultWithAjax', 'UserController@destroyMultWithAjax')->name('users.destroyMultWithAjax');
        Route::any('clearTable', 'UserController@clearTable')->name('users.clearTable');
        Route::any('clearTableForce', 'UserController@clearTableForce')->name('users.clearTableForce');
        Route::any('restoreWithAjax', 'UserController@restoreWithAjax')->name('users.restoreWithAjax');
        Route::any('restoreMultWithAjax', 'UserController@restoreMultWithAjax')->name('users.restoreMultWithAjax');
        Route::any('storeAdd', 'UserController@storeAdd')->name('users.storeAdd');
    });
    Route::resource('users', 'UserController');

    /* GRUPO DE ROTAS PARA PERFIL */
    Route::group(['prefix' => 'profiles'], function () {
        Route::any('trash', 'ProfileController@trash')->name('profiles.trash');
        Route::any('trash/{id}/edit', 'ProfileController@editTrash')->name('profiles.edit.trash');
        Route::any('trash/{id}/update', 'ProfileController@updateTrash')->name('profiles.update.trash');
        Route::any('trash/pesquisar', 'ProfileController@searchTrash')->name('profiles.search.trash');
        Route::any('pesquisar', 'ProfileController@search')->name('profiles.search');
        Route::any('destroyWithAjaxFake', 'ProfileController@destroyWithAjaxFake')->name('profiles.destroyWithAjaxFake');
        Route::any('destroyMultWithAjaxFake', 'ProfileController@destroyMultWithAjaxFake')->name('profiles.destroyMultWithAjaxFake');
        Route::any('destroyWithAjax', 'ProfileController@destroyWithAjax')->name('profiles.destroyWithAjax');
        Route::any('destroyMultWithAjax', 'ProfileController@destroyMultWithAjax')->name('profiles.destroyMultWithAjax');
        Route::any('clearTable', 'ProfileController@clearTable')->name('profiles.clearTable');
        Route::any('clearTableForce', 'ProfileController@clearTableForce')->name('profiles.clearTableForce');
        Route::any('restoreWithAjax', 'ProfileController@restoreWithAjax')->name('profiles.restoreWithAjax');
        Route::any('restoreMultWithAjax', 'ProfileController@restoreMultWithAjax')->name('profiles.restoreMultWithAjax');
        Route::any('storeAdd', 'ProfileController@storeAdd')->name('profiles.storeAdd');
        Route::any('pdf', 'ProfileController@pdf')->name('profiles.pdf');
    });
    Route::resource('profiles', 'ProfileController');

    /* GRUPO DE ROTAS PARA PERMISSÕES */
    Route::group(['prefix' => 'permissions'], function () {
        Route::any('trash', 'acl\PermissionController@trash')->name('permissions.trash');
        Route::any('trash/{id}/edit', 'acl\PermissionController@editTrash')->name('permissions.edit.trash');
        Route::any('trash/{id}/update', 'acl\PermissionController@updateTrash')->name('permissions.update.trash');
        Route::any('trash/pesquisar', 'acl\PermissionController@searchTrash')->name('permissions.search.trash');
        Route::any('pesquisar', 'acl\PermissionController@search')->name('permissions.search');
        Route::any('destroyWithAjaxFake', 'acl\PermissionController@destroyWithAjaxFake')->name('permissions.destroyWithAjaxFake');
        Route::any('destroyMultWithAjaxFake', 'acl\PermissionController@destroyMultWithAjaxFake')->name('permissions.destroyMultWithAjaxFake');
        Route::any('destroyWithAjax', 'acl\PermissionController@destroyWithAjax')->name('permissions.destroyWithAjax');
        Route::any('destroyMultWithAjax', 'acl\PermissionController@destroyMultWithAjax')->name('permissions.destroyMultWithAjax');
        Route::any('clearTable', 'acl\PermissionController@clearTable')->name('permissions.clearTable');
        Route::any('clearTableForce', 'acl\PermissionController@clearTableForce')->name('permissions.clearTableForce');
        Route::any('restoreWithAjax', 'acl\PermissionController@restoreWithAjax')->name('permissions.restoreWithAjax');
        Route::any('restoreMultWithAjax', 'acl\PermissionController@restoreMultWithAjax')->name('permissions.restoreMultWithAjax');
        Route::any('storeAdd', 'acl\PermissionController@storeAdd')->name('permissions.storeAdd');
    });
    Route::resource('permissions', 'acl\PermissionController');

    /* GRUPO DE ROTAS PARA PAPEIS */
    Route::group(['prefix' => 'roles'], function () {
        Route::any('trash', 'acl\RoleController@trash')->name('roles.trash');
        Route::any('trash/{id}/edit', 'acl\RoleController@editTrash')->name('roles.edit.trash');
        Route::any('trash/{id}/update', 'acl\RoleController@updateTrash')->name('roles.update.trash');
        Route::any('trash/pesquisar', 'acl\RoleController@searchTrash')->name('roles.search.trash');
        Route::any('pesquisar', 'acl\RoleController@search')->name('roles.search');
        Route::any('destroyWithAjaxFake', 'acl\RoleController@destroyWithAjaxFake')->name('roles.destroyWithAjaxFake');
        Route::any('destroyMultWithAjaxFake', 'acl\RoleController@destroyMultWithAjaxFake')->name('roles.destroyMultWithAjaxFake');
        Route::any('destroyWithAjax', 'acl\RoleController@destroyWithAjax')->name('roles.destroyWithAjax');
        Route::any('destroyMultWithAjax', 'acl\RoleController@destroyMultWithAjax')->name('roles.destroyMultWithAjax');
        Route::any('clearTable', 'acl\RoleController@clearTable')->name('roles.clearTable');
        Route::any('clearTableForce', 'acl\RoleController@clearTableForce')->name('roles.clearTableForce');
        Route::any('restoreWithAjax', 'acl\RoleController@restoreWithAjax')->name('roles.restoreWithAjax');
        Route::any('restoreMultWithAjax', 'acl\RoleController@restoreMultWithAjax')->name('roles.restoreMultWithAjax');
        Route::any('storeAdd', 'acl\RoleController@storeAdd')->name('roles.storeAdd');
    });
    Route::resource('roles', 'acl\RoleController');


    /* GRUPO DE ROTAS PARA PERMISSÕE DE PAPEIS */
    Route::group(['prefix' => 'permissions-roles'], function () {
        Route::any('trash', 'acl\PermissionRoleController@trash')->name('permissions-roles.trash');
        Route::any('trash/{id}/edit', 'acl\PermissionRoleController@editTrash')->name('permissions-roles.edit.trash');
        Route::any('trash/{id}/update', 'acl\PermissionRoleController@updateTrash')->name('permissions-roles.update.trash');
        Route::any('trash/pesquisar', 'acl\PermissionRoleController@searchTrash')->name('permissions-roles.search.trash');
        Route::any('pesquisar', 'acl\PermissionRoleController@search')->name('permissions-roles.search');
        Route::any('destroyWithAjaxFake', 'acl\PermissionRoleController@destroyWithAjaxFake')->name('permissions-roles.destroyWithAjaxFake');
        Route::any('destroyMultWithAjaxFake', 'acl\PermissionRoleController@destroyMultWithAjaxFake')->name('permissions-roles.destroyMultWithAjaxFake');
        Route::any('destroyWithAjax', 'acl\PermissionRoleController@destroyWithAjax')->name('permissions-roles.destroyWithAjax');
        Route::any('destroyMultWithAjax', 'acl\PermissionRoleController@destroyMultWithAjax')->name('permissions-roles.destroyMultWithAjax');
        Route::any('clearTable', 'acl\PermissionRoleController@clearTable')->name('permissions-roles.clearTable');
        Route::any('clearTableForce', 'acl\PermissionRoleController@clearTableForce')->name('permissions-roles.clearTableForce');
        Route::any('restoreWithAjax', 'acl\PermissionRoleController@restoreWithAjax')->name('permissions-roles.restoreWithAjax');
        Route::any('restoreMultWithAjax', 'acl\PermissionRoleController@restoreMultWithAjax')->name('permissions-roles.restoreMultWithAjax');
        Route::any('storeAdd', 'acl\PermissionRoleController@storeAdd')->name('permissions-roles.storeAdd');
    });
    Route::resource('permissions-roles', 'acl\PermissionRoleController');

    /* GRUPO DE ROTAS PARA LOGS */
    Route::group(['prefix' => 'logs'], function ()
    {
        Route::any('trash', 'LogController@trash')->name('logs.trash');
        Route::any('trash/{id}/edit', 'LogController@editTrash')->name('logs.edit.trash');
        Route::any('trash/{id}/update', 'LogController@updateTrash')->name('logs.update.trash');
        Route::any('trash/pesquisar', 'LogController@searchTrash')->name('logs.search.trash');
        Route::any('pesquisar', 'LogController@search')->name('logs.search');
        Route::any('destroyWithAjaxFake', 'LogController@destroyWithAjaxFake')->name('logs.destroyWithAjaxFake');
        Route::any('destroyMultWithAjaxFake', 'LogController@destroyMultWithAjaxFake')->name('logs.destroyMultWithAjaxFake');
        Route::any('destroyWithAjax', 'LogController@destroyWithAjax')->name('logs.destroyWithAjax');
        Route::any('destroyMultWithAjax', 'LogController@destroyMultWithAjax')->name('logs.destroyMultWithAjax');
        Route::any('clearTable', 'LogController@clearTable')->name('logs.clearTable');
        Route::any('clearTableForce', 'LogController@clearTableForce')->name('logs.clearTableForce');
        Route::any('restoreWithAjax', 'LogController@restoreWithAjax')->name('logs.restoreWithAjax');
        Route::any('restoreMultWithAjax', 'LogController@restoreMultWithAjax')->name('logs.restoreMultWithAjax');
        Route::any('storeAdd', 'LogController@storeAdd')->name('logs.storeAdd');
    });
    Route::resource('logs', 'LogController');

    /* GRUPO DE ROTAS PARA PAPEIS DE USUÁRIOS */
    Route::group(['prefix' => 'roles-users'], function () {
        Route::any('trash', 'acl\RoleUserController@trash')->name('roles-users.trash');
        Route::any('trash/{id}/edit', 'acl\RoleUserController@editTrash')->name('roles-users.edit.trash');
        Route::any('trash/{id}/update', 'acl\RoleUserController@updateTrash')->name('roles-users.update.trash');
        Route::any('trash/pesquisar', 'acl\RoleUserController@searchTrash')->name('roles-users.search.trash');
        Route::any('pesquisar', 'acl\RoleUserController@search')->name('roles-users.search');
        Route::any('destroyWithAjaxFake', 'acl\RoleUserController@destroyWithAjaxFake')->name('roles-users.destroyWithAjaxFake');
        Route::any('destroyMultWithAjaxFake', 'acl\RoleUserController@destroyMultWithAjaxFake')->name('roles-users.destroyMultWithAjaxFake');
        Route::any('destroyWithAjax', 'acl\RoleUserController@destroyWithAjax')->name('roles-users.destroyWithAjax');
        Route::any('destroyMultWithAjax', 'acl\RoleUserController@destroyMultWithAjax')->name('roles-users.destroyMultWithAjax');
        Route::any('clearTable', 'acl\RoleUserController@clearTable')->name('roles-users.clearTable');
        Route::any('clearTableForce', 'acl\RoleUserController@clearTableForce')->name('roles-users.clearTableForce');
        Route::any('restoreWithAjax', 'acl\RoleUserController@restoreWithAjax')->name('roles-users.restoreWithAjax');
        Route::any('restoreMultWithAjax', 'acl\RoleUserController@restoreMultWithAjax')->name('roles-users.restoreMultWithAjax');
        Route::any('storeAdd', 'acl\RoleUserController@storeAdd')->name('roles-users.storeAdd');
    });
    Route::resource('roles-users', 'acl\RoleUserController');

});

/* GRUPO DE ROTAS PARA SISTEMA */
Route::group(['prefix' => 'system', 'namespace' => 'Sistema', 'middleware' => 'auth'], function () {

    Route::get('dashboard', 'DashboardController@index')->name('system.dashboard.index');

    Route::group(['prefix' => 'attendance'], function () {
        Route::any('date/{year}', 'AttendanceController@year')->name('year-attendance');
        Route::any('date/{year}/{month}', 'AttendanceController@month')->name('month-attendance');
        Route::any('date/{year}/{month}/{day}', 'AttendanceController@day')->name('day-attendance');
        Route::any('date/{year}/{month}/{day}/{attendee}', 'AttendanceController@day')->name('attendee');

        Route::any('trash', 'AttendanceController@trash')->name('attendance.trash');
        Route::any('trash/{id}/edit', 'AttendanceController@editTrash')->name('attendance.edit.trash');
        Route::any('trash/{id}/update', 'AttendanceController@updateTrash')->name('attendance.update.trash');
        Route::any('trash/pesquisar', 'AttendanceController@searchTrash')->name('attendance.search.trash');
        Route::any('pesquisar', 'AttendanceController@search')->name('attendance.search');
        Route::any('companiesAjax', 'AttendanceController@companiesAjax')->name('attendance.companiesAjax');
        Route::any('dataCompaniesAjax', 'AttendanceController@dataCompaniesAjax')->name('attendance.dataCompaniesAjax');
        Route::any('destroyWithAjax', 'AttendanceController@destroyWithAjax')->name('attendee.destroyWithAjax');
        Route::any('destroyWithAjaxFake', 'AttendanceController@destroyWithAjaxFake')->name('attendee.destroyWithAjaxFake');
        Route::any('destroyMultWithAjax', 'AttendanceController@destroyMultWithAjax')->name('attendee.destroyMultWithAjax');
        Route::any('destroyMultWithAjaxFake', 'AttendanceController@destroyMultWithAjaxFake')->name('attendee.destroyMultWithAjaxFake');
        Route::any('clearTable', 'AttendanceController@clearTable')->name('attendance.clearTable');
        Route::any('clearTableForce', 'AttendanceController@clearTableForce')->name('attendance.clearTableForce');
        Route::any( 'restoreWithAjax', 'AttendanceController@restoreWithAjax')->name('attendance.restoreWithAjax');
        Route::any('restoreMultWithAjax', 'AttendanceController@restoreMultWithAjax')->name('attendance.restoreMultWithAjax');
        Route::any('storeAdd', 'AttendanceController@storeAdd')->name('attendance.storeAdd');
        Route::any('pdf', 'AttendanceController@pdf')->name('attendance.pdf');
    });
    Route::resource('attendance', 'AttendanceController');

    /* GRUPO DE ROTAS PARA EMPRESAS */
    Route::group(['prefix' => 'system-companies'], function () {
        Route::any('trash', 'CompanyController@trash')->name('system-companies.trash');
        Route::any('trash/{id}/edit', 'CompanyController@editTrash')->name('system-companies.edit.trash');
        Route::any('trash/{id}/update', 'CompanyController@updateTrash')->name('system-companies.update.trash');
        Route::any('trash/pesquisar', 'CompanyController@searchTrash')->name('system-companies.search.trash');
        Route::any('pesquisar', 'CompanyController@search')->name('system-companies.search');
        Route::any('destroyWithAjaxFake', 'CompanyController@destroyWithAjaxFake')->name('system-companies.destroyWithAjaxFake');
        Route::any('destroyMultWithAjaxFake', 'CompanyController@destroyMultWithAjaxFake')->name('system-companies.destroyMultWithAjaxFake');
        Route::any('destroyWithAjax', 'CompanyController@destroyWithAjax')->name('system-companies.destroyWithAjax');
        Route::any('destroyMultWithAjax', 'CompanyController@destroyMultWithAjax')->name('system-companies.destroyMultWithAjax');
        Route::any('clearTable', 'CompanyController@clearTable')->name('system-companies.clearTable');
        Route::any('clearTableForce', 'CompanyController@clearTableForce')->name('system-companies.clearTableForce');
        Route::any('restoreWithAjax', 'CompanyController@restoreWithAjax')->name('system-companies.restoreWithAjax');
        Route::any('restoreMultWithAjax', 'CompanyController@restoreMultWithAjax')->name('system-companies.restoreMultWithAjax');
        Route::any('storeAdd', 'CompanyController@storeAdd')->name('system-companies.storeAdd');
        Route::any('pdf', 'CompanyController@pdf')->name('system-companies.pdf');
    });
    Route::resource('system-companies', 'CompanyController');

    /* GRUPO DE ROTAS PARA FUNCIONÀRIOS */
    Route::group(['prefix' => 'employees'], function () {
        Route::any('trash', 'EmployeeController@trash')->name('employees.trash');
        Route::any('trash/{id}/edit', 'EmployeeController@editTrash')->name('employees.edit.trash');
        Route::any('trash/{id}/update', 'EmployeeController@updateTrash')->name('employees.update.trash');
        Route::any('trash/pesquisar', 'EmployeeController@searchTrash')->name('employees.search.trash');
        Route::any('pesquisar', 'EmployeeController@search')->name('employees.search');
        Route::any('destroyWithAjaxFake', 'EmployeeController@destroyWithAjaxFake')->name('employees.destroyWithAjaxFake');
        Route::any('destroyMultWithAjaxFake', 'EmployeeController@destroyMultWithAjaxFake')->name('employees.destroyMultWithAjaxFake');
        Route::any('destroyWithAjax', 'EmployeeController@destroyWithAjax')->name('employees.destroyWithAjax');
        Route::any('destroyMultWithAjax', 'EmployeeController@destroyMultWithAjax')->name('employees.destroyMultWithAjax');
        Route::any('clearTable', 'EmployeeController@clearTable')->name('employees.clearTable');
        Route::any('clearTableForce', 'EmployeeController@clearTableForce')->name('employees.clearTableForce');
        Route::any('restoreWithAjax', 'EmployeeController@restoreWithAjax')->name('employees.restoreWithAjax');
        Route::any('restoreMultWithAjax', 'EmployeeController@restoreMultWithAjax')->name('employees.restoreMultWithAjax');
        Route::any('storeAdd', 'EmployeeController@storeAdd')->name('employees.storeAdd');
        Route::any('pdf', 'EmployeeController@pdf')->name('employees.pdf');
    });
    Route::resource('employees', 'EmployeeController');

    /* GRUPO DE ROTAS PARA MÉDICOS */

    Route::group(['prefix' => 'doctors'], function () {
        Route::any('trash', 'DoctorController@trash')->name('doctors.trash');
        Route::any('trash/{id}/edit', 'DoctorController@editTrash')->name('doctors.edit.trash');
        Route::any('trash/{id}/update', 'DoctorController@updateTrash')->name('doctors.update.trash');
        Route::any('trash/pesquisar', 'DoctorController@searchTrash')->name('doctors.search.trash');
        Route::any('pesquisar', 'DoctorController@search')->name('doctors.search');
        Route::any('destroyWithAjaxFake', 'DoctorController@destroyWithAjaxFake')->name('doctors.destroyWithAjaxFake');
        Route::any('destroyMultWithAjaxFake', 'DoctorController@destroyMultWithAjaxFake')->name('doctors.destroyMultWithAjaxFake');
        Route::any('destroyWithAjax', 'DoctorController@destroyWithAjax')->name('doctors.destroyWithAjax');
        Route::any('destroyMultWithAjax', 'DoctorController@destroyMultWithAjax')->name('doctors.destroyMultWithAjax');
        Route::any('clearTable', 'DoctorController@clearTable')->name('doctors.clearTable');
        Route::any('clearTableForce', 'DoctorController@clearTableForce')->name('doctors.clearTableForce');
        Route::any('restoreWithAjax', 'DoctorController@restoreWithAjax')->name('doctors.restoreWithAjax');
        Route::any('restoreMultWithAjax', 'DoctorController@restoreMultWithAjax')->name('doctors.restoreMultWithAjax');
        Route::any('storeAdd', 'DoctorController@storeAdd')->name('doctors.storeAdd');
        Route::any('pdf', 'DoctorController@pdf')->name('doctors.pdf');
    });
    Route::resource('doctors', 'DoctorController');

    /* GRUPO DE ROTAS PARA ATESTADO DE SAÚDE OCUPACIONAL */
    Route::group(['prefix' => 'aso'], function () {
        Route::any('trash', 'AsoController@trash')->name('aso.trash');
        Route::any('trash/{id}/edit', 'AsoController@editTrash')->name('aso.edit.trash');
        Route::any('trash/{id}/update', 'AsoController@updateTrash')->name('aso.update.trash');
        Route::any('trash/pesquisar', 'AsoController@searchTrash')->name('aso.search.trash');
        Route::any('pesquisar', 'AsoController@search')->name('aso.search');
        Route::any('pesquisar-periodo', 'AsoController@searchPeriod')->name('aso.search-period');
        Route::any('destroyWithAjaxFake', 'AsoController@destroyWithAjaxFake')->name('aso.destroyWithAjaxFake');
        Route::any('destroyMultWithAjaxFake', 'AsoController@destroyMultWithAjaxFake')->name('aso.destroyMultWithAjaxFake');
        Route::any('destroyWithAjax', 'AsoController@destroyWithAjax')->name('aso.destroyWithAjax');
        Route::any('destroyMultWithAjax', 'AsoController@destroyMultWithAjax')->name('aso.destroyMultWithAjax');
        Route::any('clearTable', 'AsoController@clearTable')->name('aso.clearTable');
        Route::any('clearTableForce', 'AsoController@clearTableForce')->name('aso.clearTableForce');
        Route::any('restoreWithAjax', 'AsoController@restoreWithAjax')->name('aso.restoreWithAjax');
        Route::any('restoreMultWithAjax', 'AsoController@restoreMultWithAjax')->name('aso.restoreMultWithAjax');
        Route::any('storeAdd', 'AsoController@storeAdd')->name('aso.storeAdd');
        Route::any('employeesAjax', 'AsoController@employeesAjax')->name('aso.employeesAjax');
        Route::any('dataEmployeesAjax', 'AsoController@dataEmployeesAjax')->name('aso.dataEmployeesAjax');
        Route::any('pdf', 'AsoController@pdf')->name('aso.pdf');
    });
    Route::resource('aso', 'AsoController');

    /* GRUPO DE ROTAS PARA FINANCEIRO */
    Route::group(['prefix' => 'financial'], function () {
        Route::any('trash', 'FinancialController@trash')->name('financial.trash');
        Route::any('trash/{id}/edit', 'FinancialController@editTrash')->name('financial.edit.trash');
        Route::any('trash/{id}/update', 'FinancialController@updateTrash')->name('financial.update.trash');
        Route::any('trash/pesquisar', 'FinancialController@searchTrash')->name('financial.search.trash');
        Route::any('pesquisar', 'FinancialController@search')->name('financial.search');
        Route::any('pesquisar-periodo', 'FinancialController@searchPeriod')->name('financial.search-period');
        Route::any('destroyWithAjaxFake', 'FinancialController@destroyWithAjaxFake')->name('financial.destroyWithAjaxFake');
        Route::any('destroyMultWithAjaxFake', 'FinancialController@destroyMultWithAjaxFake')->name('financial.destroyMultWithAjaxFake');
        Route::any('destroyWithAjax', 'FinancialController@destroyWithAjax')->name('financial.destroyWithAjax');
        Route::any('destroyMultWithAjax', 'FinancialController@destroyMultWithAjax')->name('financial.destroyMultWithAjax');
        Route::any('clearTable', 'FinancialController@clearTable')->name('financial.clearTable');
        Route::any('clearTableForce', 'FinancialController@clearTableForce')->name('financial.clearTableForce');
        Route::any('restoreWithAjax', 'FinancialController@restoreWithAjax')->name('financial.restoreWithAjax');
        Route::any('restoreMultWithAjax', 'FinancialController@restoreMultWithAjax')->name('financial.restoreMultWithAjax');
        Route::any('storeAdd', 'FinancialController@storeAdd')->name('financial.storeAdd');
        Route::any('companiesAjax', 'FinancialController@companiesAjax')->name('financial.companiesAjax');
        Route::any('dataCompaniesAjax', 'FinancialController@dataCompaniesAjax')->name('financial.dataCompaniesAjax');
        Route::any('pdf', 'FinancialController@pdf')->name('financial.pdf');
        Route::any('pdf{id}', 'FinancialController@pdfCompany')->name('financial.pdf.company');
    });
    Route::resource('financial', 'FinancialController');

    /* GRUPO DE ROTAS PARA CONTADORES */
    Route::group(['prefix' => 'accountant'], function () {
        Route::any('trash', 'AccountantController@trash')->name('accountant.trash');
        Route::any('trash/{id}/edit', 'AccountantController@editTrash')->name('accountant.edit.trash');
        Route::any('trash/{id}/update', 'AccountantController@updateTrash')->name('accountant.update.trash');
        Route::any('trash/pesquisar', 'AccountantController@searchTrash')->name('accountant.search.trash');
        Route::any('pesquisar', 'AccountantController@search')->name('accountant.search');
        Route::any('pesquisar-periodo', 'AccountantController@searchPeriod')->name('accountant.search-period');
        Route::any('destroyWithAjaxFake', 'AccountantController@destroyWithAjaxFake')->name('accountant.destroyWithAjaxFake');
        Route::any('destroyMultWithAjaxFake', 'AccountantController@destroyMultWithAjaxFake')->name('accountant.destroyMultWithAjaxFake');
        Route::any('destroyWithAjax', 'AccountantController@destroyWithAjax')->name('accountant.destroyWithAjax');
        Route::any('destroyMultWithAjax', 'AccountantController@destroyMultWithAjax')->name('accountant.destroyMultWithAjax');
        Route::any('clearTable', 'AccountantController@clearTable')->name('accountant.clearTable');
        Route::any('clearTableForce', 'AccountantController@clearTableForce')->name('accountant.clearTableForce');
        Route::any('restoreWithAjax', 'AccountantController@restoreWithAjax')->name('accountant.restoreWithAjax');
        Route::any('restoreMultWithAjax', 'AccountantController@restoreMultWithAjax')->name('accountant.restoreMultWithAjax');
        Route::any('storeAdd', 'AccountantController@storeAdd')->name('accountant.storeAdd');
        Route::any('companiesAjax', 'AccountantController@companiesAjax')->name('accountant.companiesAjax');
        Route::any('dataCompaniesAjax', 'AccountantController@dataCompaniesAjax')->name('accountant.dataCompaniesAjax');
        Route::any('pdf', 'AccountantController@pdf')->name('accountant.pdf');
        Route::any('pdf{id}', 'AccountantController@pdfCompany')->name('accountant.pdf.company');
    });
    
    Route::resource('accountant', 'AccountantController');
    

    /* GRUPO DE ROTAS PARA TREINAMENTO */
    Route::group(['prefix' => 'training'], function () {
        Route::any('trash', 'TrainingController@trash')->name('training.trash');
        Route::any('trash/{id}/edit', 'TrainingController@editTrash')->name('training.edit.trash');
        Route::any('trash/{id}/update', 'TrainingController@updateTrash')->name('training.update.trash');
        Route::any('trash/pesquisar', 'TrainingController@searchTrash')->name('training.search.trash');
        Route::any('pesquisar', 'TrainingController@search')->name('training.search');
        Route::any('pesquisar-periodo', 'TrainingController@searchPeriod')->name('training.search-period');
        Route::any('destroyWithAjaxFake', 'TrainingController@destroyWithAjaxFake')->name('training.destroyWithAjaxFake');
        Route::any('destroyMultWithAjaxFake', 'TrainingController@destroyMultWithAjaxFake')->name('training.destroyMultWithAjaxFake');
        Route::any('destroyWithAjax', 'TrainingController@destroyWithAjax')->name('training.destroyWithAjax');
        Route::any('destroyMultWithAjax', 'TrainingController@destroyMultWithAjax')->name('training.destroyMultWithAjax');
        Route::any('clearTable', 'TrainingController@clearTable')->name('training.clearTable');
        Route::any('clearTableForce', 'TrainingController@clearTableForce')->name('training.clearTableForce');
        Route::any('restoreWithAjax', 'TrainingController@restoreWithAjax')->name('training.restoreWithAjax');
        Route::any('restoreMultWithAjax', 'TrainingController@restoreMultWithAjax')->name('training.restoreMultWithAjax');
        Route::any('storeAdd', 'TrainingController@storeAdd')->name('training.storeAdd');
        Route::any('companiesAjax', 'TrainingController@companiesAjax')->name('training.companiesAjax');
        Route::any('dataCompaniesAjax', 'TrainingController@dataCompaniesAjax')->name('training.dataCompaniesAjax');
        Route::any('pdf', 'TrainingController@pdf')->name('training.pdf');
        Route::any('pdf{id}', 'TrainingController@pdfCompany')->name('training.pdf.company');
    });
    Route::resource('training', 'TrainingController');

    /* GRUPO DE ROTAS PARA LAUDO */
    Route::group(['prefix' => 'appraisal'], function () {
        Route::any('trash', 'AppraisalController@trash')->name('appraisal.trash');
        Route::any('trash/{id}/edit', 'AppraisalController@editTrash')->name('appraisal.edit.trash');
        Route::any('trash/{id}/update', 'AppraisalController@updateTrash')->name('appraisal.update.trash');
        Route::any('trash/pesquisar', 'AppraisalController@searchTrash')->name('appraisal.search.trash');
        Route::any('pesquisar', 'AppraisalController@search')->name('appraisal.search');
        Route::any('pesquisar-periodo', 'AppraisalController@searchPeriod')->name('appraisal.search-period');
        Route::any('destroyWithAjaxFake', 'AppraisalController@destroyWithAjaxFake')->name('appraisal.destroyWithAjaxFake');
        Route::any('destroyMultWithAjaxFake', 'AppraisalController@destroyMultWithAjaxFake')->name('appraisal.destroyMultWithAjaxFake');
        Route::any('destroyWithAjax', 'AppraisalController@destroyWithAjax')->name('appraisal.destroyWithAjax');
        Route::any('destroyMultWithAjax', 'AppraisalController@destroyMultWithAjax')->name('appraisal.destroyMultWithAjax');
        Route::any('clearTable', 'AppraisalController@clearTable')->name('appraisal.clearTable');
        Route::any('clearTableForce', 'AppraisalController@clearTableForce')->name('appraisal.clearTableForce');
        Route::any('restoreWithAjax', 'AppraisalController@restoreWithAjax')->name('appraisal.restoreWithAjax');
        Route::any('restoreMultWithAjax', 'AppraisalController@restoreMultWithAjax')->name('appraisal.restoreMultWithAjax');
        Route::any('storeAdd', 'AppraisalController@storeAdd')->name('appraisal.storeAdd');
        Route::any('companiesAjax', 'AppraisalController@companiesAjax')->name('appraisal.companiesAjax');
        Route::any('dataCompaniesAjax', 'AppraisalController@dataCompaniesAjax')->name('appraisal.dataCompaniesAjax');
        Route::any('pdf', 'AppraisalController@pdf')->name('appraisal.pdf');
        Route::any('pdf{id}', 'AppraisalController@pdfCompany')->name('appraisal.pdf.company');
    });
    Route::resource('appraisal', 'AppraisalController');

    /* GRUPO DE ROTAS PARA ATESTADO DE SAÚDE ANAMNESE */
    Route::group(['prefix' => 'anamnese'], function () {
        Route::any('trash', 'AnamneseController@trash')->name('anamnese.trash');
        Route::any('trash/{id}/edit', 'AnamneseController@editTrash')->name('anamnese.edit.trash');
        Route::any('trash/{id}/update', 'AnamneseController@updateTrash')->name('anamnese.update.trash');
        Route::any('trash/pesquisar', 'AnamneseController@searchTrash')->name('anamnese.search.trash');
        Route::any('pesquisar', 'AnamneseController@search')->name('anamnese.search');
        Route::any('destroyWithAjaxFake', 'AnamneseController@destroyWithAjaxFake')->name('anamnese.destroyWithAjaxFake');
        Route::any('destroyMultWithAjaxFake', 'AnamneseController@destroyMultWithAjaxFake')->name('anamnese.destroyMultWithAjaxFake');
        Route::any('destroyWithAjax', 'AnamneseController@destroyWithAjax')->name('anamnese.destroyWithAjax');
        Route::any('destroyMultWithAjax', 'AnamneseController@destroyMultWithAjax')->name('anamnese.destroyMultWithAjax');
        Route::any('clearTable', 'AnamneseController@clearTable')->name('anamnese.clearTable');
        Route::any('clearTableForce', 'AnamneseController@clearTableForce')->name('anamnese.clearTableForce');
        Route::any('restoreWithAjax', 'AnamneseController@restoreWithAjax')->name('anamnese.restoreWithAjax');
        Route::any('restoreMultWithAjax', 'AnamneseController@restoreMultWithAjax')->name('anamnese.restoreMultWithAjax');
        Route::any('storeAdd', 'AnamneseController@storeAdd')->name('anamnese.storeAdd');
        Route::any('employeesAjax', 'AnamneseController@employeesAjax')->name('anamnese.employeesAjax');
        Route::any('dataEmployeesAjax', 'AnamneseController@dataEmployeesAjax')->name('anamnese.dataEmployeesAjax');
        Route::any('pdf', 'AnamneseController@pdf')->name('anamnese.pdf');
    });
    Route::resource('anamnese', 'AnamneseController');

    /* GRUPO DE ROTAS PARA ATESTADO DE SAÚDE TRIAGEM */
    Route::group(['prefix' => 'screening'], function () {
        Route::any('trash', 'ScreeningController@trash')->name('screening.trash');
        Route::any('trash/{id}/edit', 'ScreeningController@editTrash')->name('screening.edit.trash');
        Route::any('trash/{id}/update', 'ScreeningController@updateTrash')->name('screening.update.trash');
        Route::any('trash/pesquisar', 'ScreeningController@searchTrash')->name('screening.search.trash');
        Route::any('pesquisar', 'ScreeningController@search')->name('screening.search');
        Route::any('destroyWithAjaxFake', 'ScreeningController@destroyWithAjaxFake')->name('screening.destroyWithAjaxFake');
        Route::any('destroyMultWithAjaxFake', 'ScreeningController@destroyMultWithAjaxFake')->name('screening.destroyMultWithAjaxFake');
        Route::any('destroyWithAjax', 'ScreeningController@destroyWithAjax')->name('screening.destroyWithAjax');
        Route::any('destroyMultWithAjax', 'ScreeningController@destroyMultWithAjax')->name('screening.destroyMultWithAjax');
        Route::any('clearTable', 'ScreeningController@clearTable')->name('screening.clearTable');
        Route::any('clearTableForce', 'ScreeningController@clearTableForce')->name('screening.clearTableForce');
        Route::any('restoreWithAjax', 'ScreeningController@restoreWithAjax')->name('screening.restoreWithAjax');
        Route::any('restoreMultWithAjax', 'ScreeningController@restoreMultWithAjax')->name('screening.restoreMultWithAjax');
        Route::any('storeAdd', 'ScreeningController@storeAdd')->name('screening.storeAdd');
        Route::any('employeesAjax', 'ScreeningController@employeesAjax')->name('screening.employeesAjax');
        Route::any('dataEmployeesAjax', 'ScreeningController@dataEmployeesAjax')->name('screening.dataEmployeesAjax');
        Route::any('pdf', 'ScreeningController@pdf')->name('screening.pdf');
    });
    Route::resource('screening', 'ScreeningController');

    /* GRUPO DE ROTAS PARA EXAMES ADICIONAIS */
    Route::group(['prefix' => 'additionalexams'], function () {
        Route::any('trash', 'AdditionalExamsController@trash')->name('additionalexams.trash');
        Route::any('trash/{id}/edit', 'AdditionalExamsController@editTrash')->name('additionalexams.edit.trash');
        Route::any('trash/{id}/update', 'AdditionalExamsController@updateTrash')->name('additionalexams.update.trash');
        Route::any('trash/pesquisar', 'AdditionalExamsController@searchTrash')->name('additionalexams.search.trash');
        Route::any('pesquisar', 'AdditionalExamsController@search')->name('additionalexams.search');
        Route::any('pesquisar-periodo', 'AdditionalExamsController@searchPeriod')->name('additionalexams.search-period');
        Route::any('destroyWithAjaxFake', 'AdditionalExamsController@destroyWithAjaxFake')->name('additionalexams.destroyWithAjaxFake');
        Route::any('destroyMultWithAjaxFake', 'AdditionalExamsController@destroyMultWithAjaxFake')->name('additionalexams.destroyMultWithAjaxFake');
        Route::any('destroyWithAjax', 'AdditionalExamsController@destroyWithAjax')->name('additionalexams.destroyWithAjax');
        Route::any('destroyMultWithAjax', 'AdditionalExamsController@destroyMultWithAjax')->name('additionalexams.destroyMultWithAjax');
        Route::any('clearTable', 'AdditionalExamsController@clearTable')->name('additionalexams.clearTable');
        Route::any('clearTableForce', 'AdditionalExamsController@clearTableForce')->name('additionalexams.clearTableForce');
        Route::any('restoreWithAjax', 'AdditionalExamsController@restoreWithAjax')->name('additionalexams.restoreWithAjax');
        Route::any('restoreMultWithAjax', 'AdditionalExamsController@restoreMultWithAjax')->name('additionalexams.restoreMultWithAjax');
        Route::any('storeAdd', 'AdditionalExamsController@storeAdd')->name('additionalexams.storeAdd');
        Route::any('companiesAjax', 'AdditionalExamsController@companiesAjax')->name('additionalexams.companiesAjax');
        Route::any('dataCompaniesAjax', 'AdditionalExamsController@dataCompaniesAjax')->name('additionalexams.dataCompaniesAjax');
        Route::any('pdf', 'AdditionalExamsController@pdf')->name('additionalexams.pdf');
        Route::any('pdf{id}', 'AdditionalExamsController@pdfCompany')->name('additionalexams.pdf.company');
        Route::post('/additionalexams', 'AdditionalExamsController@store')->name('additionalexams.store');
        Route::get('/additionalexams/create', 'AdditionalExamsController@create')->name('additionalexams.create');
        Route::get('/additionalexams/index', 'AdditionalExamsController@index')->name('additionalexams.index');
    });
    Route::resource('additional-exams', AdditionalExamsController::class)->withoutMiddleware(['additionalexams']);


    /* GRUPO DE ROTAS PARA FORNECEDORES */
    Route::group(['prefix' => 'suppliers'], function () {
        Route::any('trash', 'SuppliersController@trash')->name('suppliers.trash');
        Route::any('trash/{id}/edit', 'SuppliersController@editTrash')->name('suppliers.edit.trash');
        Route::any('trash/{id}/update', 'SuppliersController@updateTrash')->name('suppliers.update.trash');
        Route::any('trash/pesquisar', 'SuppliersController@searchTrash')->name('suppliers.search.trash');
        Route::any('pesquisar', 'SuppliersController@search')->name('suppliers.search');
        Route::any('pesquisar-periodo', 'SuppliersController@searchPeriod')->name('suppliers.search-period');
        Route::any('destroyWithAjaxFake', 'SuppliersController@destroyWithAjaxFake')->name('suppliers.destroyWithAjaxFake');
        Route::any('destroyMultWithAjaxFake', 'SuppliersController@destroyMultWithAjaxFake')->name('suppliers.destroyMultWithAjaxFake');
        Route::any('destroyWithAjax', 'SuppliersController@destroyWithAjax')->name('suppliers.destroyWithAjax');
        Route::any('destroyMultWithAjax', 'SuppliersController@destroyMultWithAjax')->name('suppliers.destroyMultWithAjax');
        Route::any('clearTable', 'SuppliersController@clearTable')->name('suppliers.clearTable');
        Route::any('clearTableForce', 'SuppliersController@clearTableForce')->name('suppliers.clearTableForce');
        Route::any('restoreWithAjax', 'SuppliersController@restoreWithAjax')->name('suppliers.restoreWithAjax');
        Route::any('restoreMultWithAjax', 'SuppliersController@restoreMultWithAjax')->name('suppliers.restoreMultWithAjax');
        Route::any('storeAdd', 'SuppliersController@storeAdd')->name('suppliers.storeAdd');
        Route::any('companiesAjax', 'SuppliersController@companiesAjax')->name('suppliers.companiesAjax');
        Route::any('dataCompaniesAjax', 'SuppliersController@dataCompaniesAjax')->name('suppliers.dataCompaniesAjax');
        Route::any('pdf', 'SuppliersController@pdf')->name('suppliers.pdf');
        Route::any('pdf{id}', 'SuppliersController@pdfCompany')->name('suppliers.pdf.company');
        Route::post('/supplier', 'SuppliersController@store')->name('suppliers.store');
        Route::get('/supplier/create', 'SuppliersController@create')->name('suppliers.create');
        Route::get('/supplier/index', 'SuppliersController@index')->name('suppliers.index');
        Route::get('/get-suppliers-by-exam', 'SuppliersController@getSuppliersByExam')->name('get-suppliers-by-exam');
        Route::get('/get-exam-value-by-supplier', 'SuppliersController@getExamValueBySupplier');
    });
    Route::resource('suppliers', SuppliersController::class)->withoutMiddleware(['suppliers']);

        /* GRUPO DE ROTAS PARA LISTA DE EXAMES */
        Route::group(['prefix' => 'exam_list'], function () {
            Route::any('trash', 'ExamListController@trash')->name('exam_list.trash');
            Route::any('trash/{id}/edit', 'ExamListController@editTrash')->name('exam_list.edit.trash');
            Route::any('trash/{id}/update', 'ExamListController@updateTrash')->name('exam_list.update.trash');
            Route::any('trash/pesquisar', 'ExamListController@searchTrash')->name('exam_list.search.trash');
            Route::any('pesquisar', 'ExamListController@search')->name('exam_list.search');
            Route::any('pesquisar-periodo', 'ExamListController@searchPeriod')->name('exam_list.search-period');
            Route::any('destroyWithAjaxFake', 'ExamListController@destroyWithAjaxFake')->name('exam_list.destroyWithAjaxFake');
            Route::any('destroyMultWithAjaxFake', 'ExamListController@destroyMultWithAjaxFake')->name('exam_list.destroyMultWithAjaxFake');
            Route::any('destroyWithAjax', 'ExamListController@destroyWithAjax')->name('exam_list.destroyWithAjax');
            Route::any('destroyMultWithAjax', 'ExamListController@destroyMultWithAjax')->name('exam_list.destroyMultWithAjax');
            Route::any('clearTable', 'ExamListController@clearTable')->name('exam_list.clearTable');
            Route::any('clearTableForce', 'ExamListController@clearTableForce')->name('exam_list.clearTableForce');
            Route::any('restoreWithAjax', 'ExamListController@restoreWithAjax')->name('exam_list.restoreWithAjax');
            Route::any('restoreMultWithAjax', 'ExamListController@restoreMultWithAjax')->name('exam_list.restoreMultWithAjax');
            Route::any('storeAdd', 'ExamListController@storeAdd')->name('exam_list.storeAdd');
            Route::any('companiesAjax', 'ExamListController@companiesAjax')->name('exam_list.companiesAjax');
            Route::any('dataCompaniesAjax', 'ExamListController@dataCompaniesAjax')->name('exam_list.dataCompaniesAjax');
            Route::any('pdf', 'ExamListController@pdf')->name('exam_list.pdf');
            Route::any('pdf{id}', 'ExamListController@pdfCompany')->name('exam_list.pdf.company');
            Route::post('/exam_list', 'ExamListController@store')->name('exam_list.store');
            Route::get('/exam_list/create', 'ExamListController@create')->name('exam_list.create');
            Route::get('/exam_list/index', 'ExamListController@index')->name('exam_list.index');
            Route::delete('/exam-list/{id}', 'ExamListController@destroy')->name('exam_list.destroy');

        });
        Route::resource('exam_list', ExamListController::class)->withoutMiddleware(['exam_list']);

    
});