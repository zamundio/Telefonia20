<?php

use Auth;
use App\User;
use App\Estructura;
use App\Inventario;
use App\TerminalesUsers;


$data = Estructura::findOrFail(1939)->lineas()->select('id', \DB::raw('id as text'))->get();