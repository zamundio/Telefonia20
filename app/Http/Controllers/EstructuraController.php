<?php

namespace App\Http\Controllers;

use App\Estructura;
use App\CentrosCoste;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class EstructuraController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|regex:/^[a-zA-Z0-9\s-\.]+$/|max:255'
        ]);
    }
    public function index()
    {
        // can('estructura-lmsa');
        $estructuras = Estructura::first();

        $comboCC=CentrosCoste::orderby('EMP_COST_CENTER', 'asc')->select('EMP_COST_CENTER', 'COST_CENTER_DESC')->get();
        return view("estructura.index", compact('estructuras','comboCC'));
    }
    public function ShowLinea(request $request)
    {

        $estructuras = Estructura::with('lineas', 'parent')->find($request->user_id, ['EMP_CODE']);

        return DataTables::of($estructuras->lineas)
            ->addIndexColumn()
            ->addColumn('XLS', function ($row) {

                if ($row->ListadoXLS == "SI") {
                    return '<div class="text-center"><span class="badge badge-primary">SI</span></div>';
                } else {
                    return '<div class="text-center"><span class="badge badge-danger">NO</span></div>';
                }
            })

            ->addColumn('action', function ($row) {
                $btn = '<form action=' . route('eliminar_linea', ['id' => $row->id]) . ' class="d-inline form-eliminar" method="post">'
                . csrf_field() . '
         ' . method_field('delete') .

                '<button class="btn btn-link btn-xs" data-container="body" data-placement="right" data-content="Eliminar Linea" type="submit" name="action" value="delete">
    <i class="fa fa-trash text-danger"></i>
</button>'
         ;


                return $btn;
            })

            ->rawColumns(['XLS', 'action'])
            ->make(true);
    }
}
