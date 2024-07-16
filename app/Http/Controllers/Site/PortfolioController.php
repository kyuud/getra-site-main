<?php

    namespace App\Http\Controllers\Site;

    use App\Http\Controllers\Site\StandardController;
    use App\Models\Painel\Portfolio;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;


    class PortfolioController extends StandardController
    {
        protected $model;

        public function __Construct(Portfolio $portfolio)
        {
            $this->model = $portfolio;
        }
    }
