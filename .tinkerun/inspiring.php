<?php

use App\Estructura;
use App\CentrosCoste;
use App\LineaUsuario;
use App\personalextra;
use App\TerminalMovil;
use App\ModelosTerminales;
use App\ListadoFacturacion;
use Illuminate\Http\Request;
use App\DatatableHistTerminalesUsers;
use Yajra\DataTables\Facades\DataTables;

     $terminalesuser =  DatatableHistTerminalesUsers::where ('id','=','609981796');





        return Datatables::of($terminalesuser);





