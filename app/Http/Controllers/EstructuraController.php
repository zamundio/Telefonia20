<?php

namespace App\Http\Controllers;

use App\Estructura;
use App\CentrosCoste;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Gate;
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

        $comboCC = CentrosCoste::orderby('EMP_COST_CENTER', 'asc')->select('EMP_COST_CENTER', 'COST_CENTER_DESC')->get();
        return view("estructura.index", compact('estructuras', 'comboCC'));
    }
    public function ShowLinea(request $request)
    {

        $estructuras = Estructura::with('lineas', 'parent')->find($request->user_id, ['EMP_CODE']);

        return DataTables::of($estructuras->lineas)
            ->addIndexColumn()


            ->addColumn('Plan', function ($row) {

                switch ($row->getplandatos->Id) {
                    case (1):
                        return '<span class="badge badge-info" data-toggle="tooltip" data-placement="right" title="'. $row->getplandatos->plan.'" >' . $row->getplandatos->plan . ' </span>';
                        break;
                    case (2):
                        return '<span class="badge badge-primary"  data-toggle="tooltip" data-placement="right" title="' . $row->getplandatos->plan . '" >' . $row->getplandatos->plan . ' </span>';
                        break;
                    case (3):
                        return '<span class="badge badge-success  data-toggle="tooltip" data-placement="right" title="' . $row->getplandatos->plan . '" >' . $row->getplandatos->plan . ' </span>';
                        break;
                    case (4):
                        return '<span class="badge badge-warning"  data-toggle="tooltip" data-placement="right" title="' . $row->getplandatos->plan . '" >' . $row->getplandatos->plan . ' </span>';
                        break;
                case (5):
                    return '<span class="badge badge-danger"  data-toggle="tooltip" data-placement="right" title="' . $row->getplandatos->plan . '" >' . $row->getplandatos->plan . ' </span>';
                    break;
                    default:
                        $msg = 'Something went wrong.';
                        return '<span class="badge badge-primary">?? </span>';
                }




/*
                if ($row->getplandatos->plan <>  null) {
                    return '<span class="badge badge-primary">' . $row->getplandatos->plan . ' </span>';
                } else {
                    return '<span class="badge badge-primary">?? </span>';
                } */
            })

            ->addColumn('XLS', function ($row) {

                if ($row->ListadoXLS == 1) {
                    return '<div class="text-center"><span class="badge badge-primary">SI</span></div>';
                } else {
                    return '<div class="text-center"><span class="badge badge-danger">NO</span></div>';
                }
            })

            ->addColumn('Principal', function ($row) {

                if ($row->Principal == 1) {
                    return '<span class="badge badge-primary">SI</span>';
                } else {
                    return '<span class="badge badge-danger">NO</span>';
                }
            })

            ->addColumn('action', function ($row) {

                if (Gate::allows('admin-access')) {

                    $btn = '<form action=' . route('eliminar_linea', ['id' => $row->id]) . ' class="d-inline form-eliminar" method="post">'
                        . csrf_field() . '
         ' . method_field('delete') .

                        '<button class="btn btn-link btn-xs" data-container="body" data-placement="right" data-content="Eliminar Linea" type="submit" name="action" value="delete">
    <i class="fa fa-trash text-danger"></i>
</button>';
                } else {
                    $btn = "";
                }

                return $btn;
            })

            ->rawColumns(['XLS', 'Principal', 'Plan', 'action'])
            ->make(true);
    }
}
