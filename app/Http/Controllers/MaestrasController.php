<?php

namespace App\Http\Controllers;

use App\Odi;
use App\PlanGB;

use App\Plandatos;
use App\ListadoRed;
use App\EstadoStock;
use App\NuevasAltas;
use App\CentrosCoste;
use App\TerminalMovil;
use App\CentroCosteExtra;
use App\Estructura;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redis;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class MaestrasController extends Controller
{
    public function DT_CentrosdeCoste(request $request)
    {
        if ($request->ajax()) {

            $cc = CentrosCoste::select('EMP_COST_CENTER', 'COST_CENTER_DESC')->get();

            return Datatables::of($cc)
                ->addColumn('action', function ($row) {
                    $btn = "";
                    return  $btn;
                })

                ->rawColumns(['action'])

                ->make(true);
        }
    }

    public function  CheckCC(request $request)
    {
        if ($request->ajax()) {

            $cc = CentrosCoste::find($request->emp_cost_center);

            if ($cc) {
                abort(404);
            } else {

                return response()->json(['success' => 'CC disponible']);
            }
        }
    }
    public function Eliminar_Nueva_alta(Request $request, $id)
    {

        if ($request->ajax()) {





            $del = NuevasAltas::where('EMP_CODE', $id)->first();

            $input = Arr::except($del->toArray(), ['LINEA', 'TERMINAL','NUMERO']);
            $odi = new Odi($input);
            $odi->save();
            $cuenta = NuevasAltas::count();
            return response()->json(['mensaje' => 'ok', 'cuenta' => $cuenta]);
        } else {
            abort(404);
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
        $data = NuevasAltas::All();
        return Datatables::of($data)
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
        // $data = EstadoStock::select("Id", "Estado")->where('Estado', 'LIKE', "%$search%")->get();
        $data = EstadoStock::select("Id", "Estado")->where('Estado', 'LIKE', "%$search%")->get();
        return response()->json($data);
    }


    public function Selectpersonal(Request $request)
    {

        if ($request->ajax()) {
            $data = [];

            $search = $request->q;


            $data = Estructura::selectRaw("EMP_CODE as id, CONCAT(LAST_NAME, ', ', FIRST_NAME) as text")
                ->where("LAST_NAME", 'LIKE', "%$search%")
                ->orWhereRaw("CONCAT(LAST_NAME, ', ', FIRST_NAME) LIKE ?", ["%$search%"])
                ->get();

            return response()->json($data);
        }
    }

    public function Selectlineas(request $request,$id  ){
        if ($request->ajax()) {

            $data = Estructura::findOrFail($id)->lineas()->select('id', \DB::raw('id as text'))->get();
            return response()->json($data);
        }


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
