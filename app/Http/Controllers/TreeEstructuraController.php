<?php

namespace App\Http\Controllers;

use App\CentrosCoste;
use Illuminate\Http\Request;

class TreeEstructuraController extends Controller
{
    public function index()
    {
        $comboCC = CentrosCoste::orderby('EMP_COST_CENTER', 'asc')->select('EMP_COST_CENTER', 'COST_CENTER_DESC')->get();
        return view('estructura.index', compact( 'comboCC'));
    }
}
