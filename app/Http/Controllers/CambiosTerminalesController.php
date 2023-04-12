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
        ->addcolumn('persona_cambios', function () {
            // return '  <select name="persona_cambios" id="persona_cambios" class="form-control select2-hidden-accessible" ></select>';
            return ' <select name="persona_estado_cambios" id="persona_estado_cambios" class="form-control select2-hidden-accessible" data-width="160%" data-parsley-required="true" data-parsley-trigger="change"></select>';
        })
            ->rawColumns(['persona_cambios'])
            ->make(true);
    }
}
