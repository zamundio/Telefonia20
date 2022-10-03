<?php

namespace App\Http\Controllers;

use App\TerminalMovil;
use App\ModelosTerminales;
use Illuminate\Http\Request;

class TerminalesMovilController extends Controller
{
    public function GetPoolterminales(request $request)
    {

        if ($request->ajax()) {
            $term = $request->term ?: '';
            $tags = TerminalMovil::with('modelo')->where([['IMEI', 'like', $term . '%'], ['Estado', '=', 1],])->get()->pluck('modelo.Terminal', 'id');
            $valid_tags = [];

            foreach ($tags as $id => $NSerie) {
                $valid_tags[] = ['id' => $id, 'text' => $NSerie];
            }
            return response()->json($valid_tags);
        }
    }
    public function GetPoolFilteredSel(request $request)
    {

        //   if ($request->ajax()) {

        $term = $request->id ?: '';

        $terminal = TerminalMovil::with('modelo', 'chkestado')->where('IdTerminal', '=', $term)->where('Estado', '=', 2)->get()->pluck('IMEI', 'id');
        $valid_tags = [];

        foreach ($terminal as $id => $Terminal) {
            $valid_tags[] = ['id' => $id, 'text' => $Terminal];
        }
        return response()->json($valid_tags);

        // }
    }
    public function GetPoolModelos(request $request)
    {

        // if ($request->ajax()) {
        //     $term = $request->term ?: '';
        //     $tags = modelosterminales::get()->pluck('Terminal','id');
        //     $valid_tags = [];
        //     foreach ($tags as $id => $Terminal) {
        //         $valid_tags[] = ['id' => $id, 'text' => $Terminal];
        //     }
        //     return response()->json($valid_tags);
        // }
        $data = [];
        $search = $request->q;
        $data = ModelosTerminales::select("id", "Terminal")->where('Terminal', 'LIKE', "%$search%")->get();



        return response()->json($data);
    }

    public function GuardarEstado(request $request, $id)
    {

        if ($request->ajax()) {

            $terminal = TerminalMovil::findorFail($id);
            //    Vuelve a poner el terminal como pool (2)
            if ($terminal) {

                $terminal->Estado = $request->Estado;
                $terminal->save();
            }
            return response()->json(['mensaje' => 'ok']);
        } else {
            abort(404);
        }
    }
}
