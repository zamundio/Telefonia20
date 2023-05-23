<?php

namespace App\Http\Controllers;

use App\User;
use App\CambiosTerminales;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class CambiosTerminalesController extends Controller
{
    public function index(request $request)
    {

        return view('cambios.index');
    }
    public function DatatableCambioTerminales()
    {

        $data = [];

        $data = CambiosTerminales::All();
        return Datatables::of($data)

            ->make(true);
    }
}
