<?php

namespace App\Http\Controllers;

use App\TerminalMovil;
use App\TerminalesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TerminalesUserController extends Controller
{
    public function crear(Request $request)
    {



        $request->request->add(['f_cambio_alta' => Carbon::now()]);
        $requestData = $request->all();

        $linea = new TerminalesUsers($requestData);
        $linea->save();
        $terminal = TerminalMovil::findorFail($request->terminal_movil_id);
        if ($terminal) {

            $terminal->Estado = "1";
            $terminal->save();
        }

        return response()->json(['success' => 'terminal Agregado']);
    }

    public function actestado(request $request, $id)
    {

        if ($request->ajax()) {
            TerminalesUsers::where('terminal_movil_id', $id)->delete();
            $historicoterminal = new HistoricoTerminales();
            $historicoterminal->fill($request->except('Estado'));
            $historicoterminal->save();

            $terminal = TerminalMovil::findorfail($id);
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
    public function editar(Request $request, $id)
    {

        if ($request->ajax()) {
            $terminal = TerminalesUsers::with('term')->findOrFail($id);


            return response()->json($terminal);
        } else {
            abort(404);
        }
    }
    public function actualizarEstado(request $request, $estado)
    {



        if ($request->ajax()) {


            $terminaluser = TerminalesUsers::findOrFail($request->terminal_movil_id);

            //Eliminamos el registro antiguo
            $terminaluser->delete();

            //Eliminamos el registro antiguo


            //Creamos el registro nuevo

            $request->request->add(['f_cambio_alta' => Carbon::now()]);
            $requestData = $request->all();

            $linea = new TerminalesUsers($requestData);
            $linea->save();
            $terminal = TerminalMovil::findorFail($request->terminal_movil_id);
            if ($terminal) {

                $terminal->Estado = $estado;
                $terminal->save();
            }


            return response()->json(['mensaje' => 'ok']);
        } else {
            abort(404);
        }
    }
    public function actualizar(request $request)
    {



        if ($request->ajax()) {


            $terminal = TerminalesUsers::findOrFail($request->terminal_movil_id);




            $terminal->update($request->all());


            return response()->json(['mensaje' => 'ok']);
        } else {
            abort(404);
        }
    }

}
