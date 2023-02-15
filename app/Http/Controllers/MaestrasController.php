<?php

namespace App\Http\Controllers;

use App\PlanGB;
use App\Plandatos;

use App\EstadoStock;
use App\NuevasAltas;
use App\CentrosCoste;
use App\TerminalMovil;
use App\CentroCosteExtra;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class MaestrasController extends Controller
{
    public function DT_CentrosdeCoste(request $request)
    {
        if ($request->ajax()) {

   $cc = CentrosCoste::select('EMP_COST_CENTER', 'COST_CENTER_DESC')->get();




            return Datatables::of($cc)
                -> addColumn('action', function ($row) {



                    $btn = "";






                    return  $btn;
                })

                ->rawColumns(['action'])

                ->make(true);
        }
    }

    public function  CheckCC(request $request){
if ($request->ajax()) {

            $cc= CentrosCoste::find($request->emp_cost_center);

    if($cc){
                abort(404);
        } else {

                return response()->json(['success' => 'CC disponible']);
        }
    }
}





    public function GuardarCC(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'emp_code' => 'unique:centros_de_coste_t'
        ], ['emp_code.unique' => 'El CC ya existe']);

        $requestData = $request->all();


        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors()->all()]);
        }


        $cc = new CentroCosteExtra($requestData);
        $cc->save();
    }
public function PlanGBindex(Request $request)
    {




        $data = [];



        $search = $request->q;
        $data = PlanGB::select("Id", "GB")->where('GB', 'LIKE', "%$search%")->get();



        return response()->json($data);







    }
    public function NuevasAltasIndex()
    {


        $data = [];




       // $data = NuevasAltas::all();

        $data = NuevasAltas::All();


       // return response()->json($data);

         return Datatables::of($data)->toJson();

    }

    public function PlanDatosindex(Request $request)
    {




        $data = [];



        $search = $request->q;
        $data = Plandatos::select("Id", "Plan")->where('Plan', 'LIKE', "%$search%")->get();



        return response()->json($data);
    }

    public function Estadoterminales(Request $request)
    {


        // if ($request->ajax()) {

        $data = [];



        $search = $request->q;
        $data = EstadoStock::select("Id", "Estado")->where('Estado', 'LIKE', "%$search%")->get();



        return response()->json($data);

    }

    public function CrearTerminal(request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [

                'Nserie' => 'nullable|unique:maestra_terminales',
                'IMEI' => 'nullable|unique:maestra_terminales'
            ], [

                ' Nserie.unique' => 'El Numero de Serie ya está en uso',
                ' IMEI.unique' => 'El IMEI ya está en uso'

            ]);

            $requestData = $request->all();


            if ($validator->fails()) {

                return response()->json(['error' => $validator->errors()->all()]);
            }


            $terminalmovil = new TerminalMovil($requestData);
            $terminalmovil->save();
            return response()->json(['success' => 'terminal Agregado', 'id' => $terminalmovil->id]);
        };
    }
}


