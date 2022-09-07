<?php

namespace App\Http\Controllers;

use App\Estructura;
use App\personalextra;
use Illuminate\Http\Request;
use MPijierro\Identity\Identity;
use Illuminate\Support\Facades\Log;


class PersonalExtraController extends Controller
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
        if ($request->ajax()) {




            $pe = new personalextra($request->toArray());
            $pe->save();

            return response()->json(['success' => 'CC disponible']);




        };
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

    public function  CheckPE(request $request)
    {
        if ($request->ajax()) {

            $pe = personalextra::find($request->emp_code);
            $odi= Estructura::find($request->emp_code);
            if ($pe|| $odi) {
                abort(404);
            } else {

                return response()->json(['success' => 'No existe']);
            }
        }
    }

}
