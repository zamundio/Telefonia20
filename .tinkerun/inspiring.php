<?php

use Auth;
use App\User;
use App\Estructura;
use App\Inventario;
use App\NuevasAltas;
use App\TerminalesUsers;
use App\CambiosTerminales;
use Yajra\DataTables\Facades\DataTables;

$data = [];

$data = NuevasAltas::All();
