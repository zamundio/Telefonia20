<?php

use Auth;
use App\User;
use App\Estructura;
use App\NuevasAltas;
use App\personalextra;
use App\TerminalMovil;
use Illuminate\Support\Facades\Redis;

Redis::set('mykey', 'myvalue');
