<?php

    namespace App\Http\Controllers\Site;

    use App\Http\Controllers\Site\StandardController;
    use App\Models\Painel\Blog;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;

    class BlogController extends StandardController
    {
        protected $model, $companies;

        public function __Construct(Blog $blog, CompanyController $company)
        {
            $this->companies = $company;
            $this->model = $blog;
        }

        public function index()
    {
        $companies = $this->companies->getAll();
        $blogs = $this->getAll();

        return view('Site.blogs.blog', compact('companies', 'blogs'));
    }

    /**
         * function getAll()
         *
         * @return void
         */
        public function getAll()
        {
            # PEGA DADOS DA TABELA
            $results = $this->model->where('deleted_at', null)
                ->where('status', '1')
                ->orderBy('id', 'desc')
                ->paginate(3);
            return $results;
        }
        
        public function getBlog($id)
        {

            $blog = $this->model->find($id);
            $bloglimit = $this->getWithLimit(4);

            return view('Site.blogs.blogpost', compact('blog', 'bloglimit'));

        }

    }