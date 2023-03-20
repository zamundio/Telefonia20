<?php

namespace App\Http\Controllers;

use App\Inventario;
use App\NuevasAltas;
use App\CentrosCoste;
use App\ModelosTerminales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class InventarioController extends Controller
{
    public function index()
    {
        $comboCC = CentrosCoste::orderby('EMP_COST_CENTER', 'asc')->select('EMP_COST_CENTER', 'COST_CENTER_DESC')->get();
        $comboModelos=ModelosTerminales::orderby('Terminal', 'asc')->select('id', 'Terminal')->where('Activo','=',1)->get();
        return view('inventario.index',compact('comboCC','comboModelos'));
    }
    public function DatatableInventario()
    {
        $data = [];
        $data = Inventario::All();
        return Datatables::of($data)
            ->addIndexColumn()
            ->editColumn('HIRE_DATE', function ($data) {
            if ($data->HIRE_DATE != null) {
                return date('d/m/Y', strtotime($data->HIRE_DATE));
            }
            })
            ->editColumn('ACTUAL_LEAVE_DATE', function ($data) {
            if($data->ACTUAL_LEAVE_DATE!=null){
                return date('d/m/Y', strtotime($data->ACTUAL_LEAVE_DATE));}
            })
             ->addColumn('checkbox','')
            ->addColumn('Activo',function ($data) {

            if ($data->ACTUAL_LEAVE_DATE != null) {
                return '<i class="fa fa-thumbs-down" style="color: red;"></i>';
            } else {
                return '';
            }

            })
            ->addColumn('action', function ($row) {

                if (Gate::allows('admin-access')) {

                $btn = '<a href="javascript:void(0)" data-toggle="tooltip" onClick=editFunc('. $row->terminal_movil_id .') data-original-title="Edit" class="btn btn-primary fa fa-edit btn-sm">';
                } else {
                    $btn = "";
                }

                return $btn;
            })
            ->rawColumns(['action','checkbox','Activo'])
            ->make(true);


    }
}
