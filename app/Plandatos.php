<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plandatos extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "tarifas_datos";
}
