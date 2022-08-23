<?php

namespace App\Http\Controllers;

use App\LineaUsuario;
use Illuminate\Http\Request;

class LineaUsuarioController extends Controller
{
    public function eliminar(request $request, $id)
    {

        if ($request->ajax()) {
            $linea = LineaUsuario::find($id);

            // if (
            //     $linea->tarjetas()->exists()
            //     || $linea->ampliaciones()->exists() || $linea->terminal_usuario()->exists()
            // ) {
            //     return response()->json(['mensaje' => 'Resource cannot be deleted due to existence of related resources.']);
            // } else {

            //     LineaUsuario::find($id)->delete();
            // }



            return response()->json(['mensaje' => 'ok']);
        } else {
            abort(404);
        }
    }
}
