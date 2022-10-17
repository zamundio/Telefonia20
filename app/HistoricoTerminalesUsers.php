<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class HistoricoTerminalesUsers extends Model
{
    use HasFactory;
 protected $table = "historico_terminales";

    protected $guarded = [];
    protected $primaryKey = 'idhistorico_terminales';
    public $timestamps = false;
}
