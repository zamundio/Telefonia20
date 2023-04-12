<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CambiosTerminales extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "persona_cambios";

}
