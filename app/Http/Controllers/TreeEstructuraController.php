<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TreeEstructuraController extends Controller
{
    public function index()
    {
        return view('estructura.index');
    }
}
