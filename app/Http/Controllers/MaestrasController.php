<?php

namespace App\Http\Controllers;

use App\PlanGB;
use App\CentrosCoste;

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


}


