<?php

namespace App\Http\Controllers;

use App\CentrosCoste;
use App\personalextra;
use Illuminate\Http\Request;

class TreeEstructuraController extends Controller
{
    public function index()
    {
        $comboCC = CentrosCoste::orderby('EMP_COST_CENTER', 'asc')->select('EMP_COST_CENTER', 'COST_CENTER_DESC')->get();
        $lastExtra = personalextra::latest('EMP_CODE')->first();
        return view('estructura.index', compact( 'comboCC','lastExtra'));
    }
}
