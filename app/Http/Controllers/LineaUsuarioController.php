<?php

namespace App\Http\Controllers;

use App\PlanGB;
use App\Estructura;
use App\LineaUsuario;
use App\TerminalMovil;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class LineaUsuarioController extends Controller
{
    public function eliminar(request $request, $id)
    {

        if ($request->ajax()) {
            $linea = LineaUsuario::find($id);


            LineaUsuario::find($id)->delete();

            /*   if (
                $linea->tarjetas()->exists()
                || $linea->ampliaciones()->exists() || $linea->terminal_usuario()->exists()
            ) {
                return response()->json(['mensaje' => 'Resource cannot be deleted due to existence of related resources.']);
            } else {

                LineaUsuario::find($id)->delete();
            }
 */


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

    public function ShowAmpliaciones(request $request)
    {

        $linea = LineaUsuario::with('ampliaciones')->where('id', $request->linea_usuario_id);
        $ampliaciones = $linea->first()->ampliaciones;
        if ($linea->first()->ampliaciones->count() == 0) {
            $precio = "0";

            $plan = "";
        } else {
            // $precio = $linea->first()->ampliaciones->first()->GetPlan->Precio;
            $plan = $linea->first()->ampliaciones->first()->GetPlan->GB;
        }

        // $plan = $linea->first()->ampliaciones->first()->GetPlan->Precio;

        return Datatables::of($linea->first()->ampliaciones)

            ->addIndexColumn()

            ->Addcolumn('plan', function ($row) {

                return  PlanGB::find($row->GB_AMPLIADOS)->GB;
            })
            // ->Addcolumn('precio', function ($row) {

            //     return  PlanGB::find($row->GB_AMPLIADOS)->Precio;
            // })

            ->addColumn('action', function ($row) {
                $btn = '<form action=' . route('eliminar_ampliacion', ['id' => $row->id]) . ' class="d-inline form-eliminar" method="POST">'
                    . csrf_field() . '
         ' . method_field("DELETE") .
                    //             '<button type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Eliminar esta ampliacion"><i class="fa fa-trash text-danger"></i></button>
                    //  </form>'
                    '<button class="btn btn-link btn-xs" data-container="body" data-placement="right" data-content="Eliminar Linea" type="submit" name="action" value="delete">
    <i class="fa fa-trash text-danger"></i>
</button>
         </form>';

                return $btn;
            })

            ->rawColumns(['plan', 'action'])
            ->with('total', function () use ($ampliaciones) {
                return '4';
            })
            ->make(true);
    }


    public function ShowTerminalesUser(request $request)
    {

        $terminalesuser =  LineaUsuario::with('terminal_usuario')->where('id', $request->linea_usuario_id);
        $Modelo = '';



        return Datatables::of($terminalesuser->first()->terminal_usuario)

            ->addIndexColumn()

            ->addColumn('Modelo', function ($row) {

                return TerminalMovil::find($row->id)->modelo->Terminal;
            })


            ->addColumn('Actual', function ($row) {

                if ($row->pivot->Actual == '1') {
                    return '<span class="badge badge-primary">SI</span>';
                } else {
                    return '<span class="badge badge-danger">NO</span>';
                }
            })

            //     ->addColumn('action', function ($row) {
            //         $btn = '<form action=' . route('eliminar_terminalusuario', ['id' => $row->id]) . ' class="d-inline form-eliminar" method="POST">'
            //             . csrf_field() . '
            //  ' . method_field("DELETE") .
            //             '<button type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Eliminar este terminal"><i class="fa fa-trash text-danger"></i></button>
            //  </form>';

            //         return $btn;
            //     })

            ->addColumn('NSerie',  function ($row) {

                return  $row->{"Nserie"};
            })
            ->addColumn('IMEI',  function ($row) {

                return  $row->{"IMEI"};
            })
            ->addColumn('Estado',  function ($row) {

                return  $row->ChkEstado->Estado;
            })

            ->rawColumns(['Modelo', 'Actual', 'NSerie', 'Estado'])

            ->make(true);
    }


    public function guardar(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => 'unique:linea_usuario',
            'Abreviado' => 'nullable|unique:linea_usuario',
        ], [
            'id.unique' => 'El numero de telefono ya está en uso',
            'Abreviado.unique' => 'El numero Abreviado ya está en uso',
        ]);

        $requestData = $request->all();


        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors()->all()]);
        }
        $parent = Estructura::findorfail($request->cod_emp);

        $linea = new LineaUsuario($requestData);
        $parent->lineas()->save($linea);
    }
    public function editar(Request $request, $id)
    {
        if ($request->ajax()) {
            $linea = LineaUsuario::findOrFail($id);
            return response()->json($linea);
        } else {
            abort(404);
        }
    }
    public function actualizar(request $request, $abrevant)
    {

        if ($request->ajax()) {

            if ($request->Abreviado !=  $abrevant) {
                $validator = Validator::make($request->all(), [

                    'Abreviado' => 'nullable|unique:linea_usuario',
                ], [

                    'Abreviado.unique' => 'El numero Abreviado ya está en uso',
                ]);

                $requestData = $request->all();


                if ($validator->fails()) {
                    return response()->json(['error' => $validator->errors()->all()]);
                }
            }


            $linea = LineaUsuario::findOrFail($request->id);
            $linea->update($request->all());


            return response()->json(['mensaje' => 'ok']);
        } else {
            abort(404);
        }
    }
}
