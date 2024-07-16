<?php

    namespace App\Http\Controllers\Site;

    use App\Http\Controllers\Site\StandardController;
    use App\Models\Painel\Service;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;

    class ServiceController extends StandardController
    {
        protected $model;

        public function __Construct(Service $service)
        {
            $this->model = $service;
        }
    }
