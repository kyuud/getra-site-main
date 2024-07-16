<?php

    namespace App\Http\Controllers\Site;

    use App\Http\Controllers\Site\StandardController;
    use App\Models\Painel\Banner;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;

    class BannerController extends StandardController
    {
        protected $model;

        public function __Construct(Banner $banner)
        {
            $this->model = $banner;
        }
    }
