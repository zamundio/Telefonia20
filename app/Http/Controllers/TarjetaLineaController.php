<?php

namespace App\Http\Controllers;

use App\Tarjeta;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class TarjetaLineaController extends Controller
{
    public function guardar(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'id' => 'unique:lineas_tarjetas',
                'Abrev' => 'nullable|unique:lineas_tarjetas',
                'PIN' => 'nullable|unique:lineas_tarjetas',
                'PUK' => 'nullable|unique:lineas_tarjetas'
            ], [
                'id.unique' => 'El numero de tarjeta SIM ya está en uso',
                'Abrev.unique' => 'El numero Abreviado ya está en uso',
                'PIN.unique' => 'El numero PIN ya está en uso',
                'PUK.unique' => 'El numero dePUK ya está en uso'

            ]);

            $requestData = $request->all();


            if ($validator->fails()) {

                return response()->json(['error' => $validator->errors()->all()]);
            }


            $lineatarjeta = new Tarjeta($requestData);
            $lineatarjeta->save();
            return response()->json(['mensaje' => 'ok']);
        };
    }
}
