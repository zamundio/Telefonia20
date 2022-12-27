<?php

use Auth;
use App\User;
use App\Estructura;

$estructuras = Estructura::with('lineas', 'parent')->find('0015', ['EMP_CODE']);
$estructuras->first();