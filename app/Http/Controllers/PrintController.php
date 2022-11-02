<?php

namespace App\Http\Controllers;

use App\Estructura;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePermissionsRequest;
use App\Http\Requests\Admin\UpdatePermissionsRequest;


class PrintController extends Controller
{
    public function index($id)
    {
        if (!Gate::allows('imprimir_direccion')) {
            return abort(401);
        }
        $data = Estructura::findOrFail($id);
        return view('estructura.viewPrint', compact('data'));
    }
    public function printPreview($id)
    {
        if (!Gate::allows('imprimir_direccion')) {
            return abort(401);
        }

        $data =  Estructura::findOrFail($id);
        return view('estructura.printPreview', compact('data'));
    }
}
