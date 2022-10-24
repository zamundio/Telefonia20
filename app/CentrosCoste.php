<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CentrosCoste extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "centros_de_coste_all";
    protected $primaryKey = 'EMP_COST_CENTER';
    protected $fillable = ['COST_CENTER_DESC', 'EMP_COST_CENTER'];

}
