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
                    return '<span class="badge badge-primary">SI</span>';
                } else {
                    return '<span class="badge badge-danger">NO</span>';
                }
            })

            ->addColumn('action', function ($row) {
                $btn = '<form action=' . route('eliminar_linea', ['id' => $row->id]) . ' class="d-inline form-eliminar" method="POST">'
                . csrf_field() . '
         ' . method_field("DELETE") .
                '<button type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Eliminar esta  linea"><i class="fa fa-trash text-danger"></i></button>
         </form>';
                return $btn;
            })

            ->rawColumns(['XLS', 'action'])
            ->make(true);
    }
}
