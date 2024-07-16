<?php

    namespace App\Http\Controllers\Site;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;

    class StandardController extends Controller
    {

        public function getAll()
        {
            $results = $this->model->where('deleted_at', null)
                                    ->where('status', '1')
                                    ->get();
                                    
            return $results;
        }

        public function getWithLimit($limit)
        {
            $results = $this->model->where('deleted_at', null)
                                    ->where('status', '1')
                                    ->orderBy('id', 'desc')
                                    ->limit($limit)
                                    ->get();
                                    
            return $results;
        }

        public function getWithPaginate($limit, $filter = null)
        {
            $results = $this->model->where('deleted_at', null)
                                    ->where('status', '1')                                                           
                                    ->paginate($limit);
                                    
            return $results;
        }
    }
