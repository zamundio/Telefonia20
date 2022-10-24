<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CentroCosteExtra extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "centros_coste_extra";
    protected $primaryKey = 'EMP_COST_CENTER';
    protected $fillable = [ 'COST_CENTER_DESC', 'EMP_COST_CENTER'];
}
