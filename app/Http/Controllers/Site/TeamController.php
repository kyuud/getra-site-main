<?php

    namespace App\Http\Controllers\Site;

    use App\Http\Controllers\Site\StandardController;
    use App\Models\Painel\Team;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;

    class TeamController extends StandardController
    {
        protected $model;

        public function __Construct(Team $team)
        {
            $this->model = $team;
        }
    }
