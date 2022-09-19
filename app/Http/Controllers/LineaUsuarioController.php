<?php

namespace App\Http\Controllers;

use App\Estructura;
use App\LineaUsuario;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

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

    public function ShowTarjetas(request $request)
    {

        $linea = LineaUsuario::with('tarjetas')->find($request->linea_usuario_id);

        return Datatables::of($linea->tarjetas)

            ->addIndexColumn()
            ->addColumn('Principal', function ($row) {

                if ($row->Principal == 1) {
                    return '<span class="badge badge-primary">SI</span>';
                } else {
                    return '<span class="badge badge-danger">NO</span>';
                }
            })
            ->addColumn('Datos', function ($row) {

                if ($row->Datos == 1) {
                    return '<span class="badge badge-primary">SI</span>';
                } else {
                    return '<span class="badge badge-danger">NO</span>';
                }
            })
            ->addColumn('action', function ($row) {
                $btn = '<form action=' . route('eliminar_tarjeta', ['id' => $row->id]) . ' class="d-inline form-eliminar" method="POST">'
                    . csrf_field() . '
         ' . method_field("DELETE") .
                '<button class="btn btn-link btn-xs" data-container="body" data-placement="right" data-content="Eliminar Linea" type="submit" name="action" value="delete">
    <i class="fa fa-trash text-danger"></i>
</button>
         </form>';

                return $btn;
            })

            ->rawColumns(['Principal', 'Datos', 'action'])
            ->make(true);
    }
    public function guardar(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => 'unique:linea_usuario'
        ], ['id.unique' => 'El numero de telefono ya está en uso']);

        $requestData = $request->all();


        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors()->all()]);
        }
        $parent = Estructura::findorfail($request->cod_emp);

        $linea = new LineaUsuario($requestData);
        $parent->lineas()->save($linea);
    }
}
