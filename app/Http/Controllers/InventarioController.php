<?php

namespace App\Http\Controllers;

use App\Inventario;
use App\NuevasAltas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class InventarioController extends Controller
{
    public function index()
    {

        return view('inventario.index');
    }
    public function DatatableInventario()
    {
        $data = [];
        $data = inventario::All();
        return Datatables::of($data)
            ->editColumn('HIRE_DATE', function ($data) {
                return date('d/m/Y', strtotime($data->HIRE_DATE));
            })
            ->editColumn('ACTUAL_LEAVE_DATE', function ($data) {
            if($data->ACTUAL_LEAVE_DATE!=null){
                return date('d/m/Y', strtotime($data->ACTUAL_LEAVE_DATE));}
            })
            ->addColumn('action', function ($row) {

                if (Gate::allows('admin-access')) {

                    $btn = '<form action=' . route('eliminar_nueva_alta', ['id' => $row->EMP_CODE]) . ' class="d-inline form-eliminar" method="post">'
                    . csrf_field() . method_field('delete') .  '<button class="btn btn-link btn-xs" data-container="body" data-placement="right" data-content="Eliminar Linea" type="submit" name="action" value="delete"> <i class="fa fa-handshake text-danger"></i></button>';
                } else {
                    $btn = "";
                }

                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);


    }
}
