<?php

namespace App\Http\Controllers;

use App\AmpliacionesGB;
use Illuminate\Http\Request;

class AmpliacionesGBController extends Controller
{
    public function crear(Request $request)
    {

        if ($request->ajax()) {


            $ampliacion = new AmpliacionesGB($request->all());
            $ampliacion->save();

            return response()->json(['success' => 'Ampliacion Agregada']);
        }
    }
    public function editar(request $request, $id)
    {
        if ($request->ajax()) {
            $ampliacion = AmpliacionesGB::with('GetPlan')->findOrFail($id);
            return response()->json($ampliacion);
        } else {
            abort(404);
        }
    }
    public function actualizar(Request $request, $id)
    {

        if ($request->ajax()) {

            $ampliacion = AmpliacionesGB::findOrFail($id);




            $ampliacion->update($request->all());


            return response()->json(['mensaje' => 'ok']);
        } else {
            abort(404);
        }
    }
    public function eliminar(request $request, $id)
    {
        if ($request->ajax()) {
            AmpliacionesGB::find($id)->delete();

            return response()->json(['mensaje' => 'ok']);
        } else {
            abort(404);
        }
    }

}
