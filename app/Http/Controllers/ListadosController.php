<?php

namespace App\Http\Controllers;

use App\ListadoFacturacion;
use Illuminate\Http\Request;
use App\Exports\FacturacionExport;
use App\Exports\ListadoRedExport;
use App\Exports\ListadoSedeExport;
use Maatwebsite\Excel\Facades\Excel;

class ListadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    public function exportfacturacion(Request $request)
    {

        return Excel::download(new FacturacionExport, 'ListadoFacturación.xlsx');
    }
    public function exportListadoSede(Request $request)
    {

        return Excel::download(new ListadoSedeExport, 'ListadoSede.xlsx');
    }
    public function exportListadoRed(Request $request)
    {

        return Excel::download(new ListadoRedExport, 'ListadoRed.xlsx');
    }
}

