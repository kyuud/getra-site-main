<?php

    namespace App\Http\Controllers\Site;

    use App\Http\Controllers\Controller;
    use App\Models\Painel\Company;
    use Illuminate\Http\Request;

    class CompanyController extends StandardController
    {
        protected $model;

        public function __construct(Company $company)
        {
            $this->model = $company;
        }
    }
