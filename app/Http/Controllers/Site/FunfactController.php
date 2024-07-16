<?php

    namespace App\Http\Controllers\Site;

    use App\Http\Controllers\Site\StandardController;
    use App\Models\Painel\Funfact;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;

    class FunfactController extends StandardController
    {
        protected $model;

        public function __Construct(Funfact $funfact)
        {
            $this->model = $funfact;
        }
    }