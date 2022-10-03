<?php

namespace App\Http\Controllers;

use App\ModelosTerminales;
use Illuminate\Http\Request;

class ModelosTerminalesController extends Controller
{
    public function index(Request $request)
    {


        if ($request->ajax()) {

            return Datatables::of(ModelosTerminales::All())
                ->addIndexColumn()
                ->addColumn('foto', function ($row) {

                    if (isset($row->foto)) {
                        $col = "<img src=" . asset('storage/imagenes/fototerminales/' . $row->foto) . " width='70' height='90' class='img-responsive'>";
                    } else {
                        $col = "<img src=" . asset('storage/imagenes/fototerminales/sinmodelo.png') . " width='70' height='70' class='img-responsive'>";;
                    }
                    return $col;
                })


                ->addColumn('action', function ($row) {
                    $btn = " <a href='" . route('editar_terminal', ['id' => $row->id]) . "' class='show-modal btn btn-success' > <span class='glyphicon glyphicon-eye-open'></span> Editar</a> ";

                    return $btn;
                })
                ->rawColumns(['foto', 'action'])
                ->make(true);
        }

        return view('terminales.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        return view('terminales.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        if ($foto = ModelosTerminales::setFoto($request->foto_up))
            $request->request->add(['foto' => $foto]);
        ModelosTerminales::create($request->all());
        return redirect()->route('modelosterminales')->with('mensaje', 'El terminal se creó correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function resumen($id)
    {
        $data = ModelosTerminales::findOrFail($id);
        return view('terminales.editar', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        $data = ModelosTerminales::findOrFail($id);
        return view('terminales.editar', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request, $id)
    {
        $terminal = ModelosTerminales::findOrFail($id);
        if ($foto = ModelosTerminales::setFoto($request->foto_up, $terminal->foto)) { } else {
            $foto = null;
        }
        $request->request->add(['foto' => $foto]);
        $terminal->update($request->all());
        return redirect()->route('modelosterminales')->with('mensaje', 'El terminal se actualizó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
