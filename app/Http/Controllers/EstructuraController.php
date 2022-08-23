<?php

namespace App\Http\Controllers;

use App\Estructura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

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
        // return view("estructura.index", );

        return view("estructura.index", compact('estructuras'));
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

                '<button class="btn btn-link btn-xs tooltipsC"  title="Eliminar esta  linea" type="submit" name="action" value="delete">
    <i class="fa fa-trash text-danger"></i>
</button>'
         ;


                return $btn;
            })

            ->rawColumns(['XLS', 'action'])
            ->make(true);
    }
}
