<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatatableHistTerminalesUsers extends Model
{
    use HasFactory;
    protected $table = "historico_terminales_view";
    protected $hidden = ['id', 'id_terminal'];
}
