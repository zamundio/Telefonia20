<?php

namespace App\Http\Controllers;

use App\DatatableHistTerminalesUsers;
use App\LineaUsuario;
use App\TerminalMovil;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class HistoricoTerminalesUserController extends Controller
{
    public function ShowHistTerminalesUser(request $request)
    {

        $terminalesuser =  DatatableHistTerminalesUsers::where('id', '=', $request->id);
        $Modelo = '';



        return Datatables::of($terminalesuser)

            // ->addIndexColumn()

            // ->addColumn('Modelo', function ($row) {

            //     return TerminalMovil::find($row->id)->modelo->Terminal;
            // })

            // ->addColumn('NSerie',  function ($row) {

            //     return  $row->{"Nserie"};
            // })
            // ->addColumn('IMEI',  function ($row) {

            //     return  $row->{"IMEI"};
            // })
            // ->addColumn('Estado',  function ($row) {

            //     return  $row->ChkEstado->Estado;
            // })

            // ->rawColumns(['Modelo',  'NSerie', 'Estado'])

            ->make(true);
    }
}
