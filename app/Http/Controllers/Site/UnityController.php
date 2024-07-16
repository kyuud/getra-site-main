<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Painel\Unit;
use Illuminate\Http\Request;

class UnityController extends StandardController
{
    public function __construct(Unit $units)
    {
        $this->model = $units;
    }

    public function index() {

        $units = $this->getAll();

        return view('Site.units.index', compact('units'));
    }
}
