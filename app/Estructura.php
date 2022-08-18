<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estructura extends Model
{
    use HasFactory;
    protected $table = "personal";
    protected $casts = [
        'EMP_CODE' => 'string',
    ];
    protected $primaryKey = 'EMP_CODE';

    public function lineas()
    {
        return $this->hasMany(LineaUsuario::class, 'cod_emp', 'EMP_CODE');
    }


    public function parent()
    {
        return $this->belongsTo(Estructura::class, 'REPORTS_TO_POS_CODE');
    }

    public function getFullNameAttribute()
    {
        return $this->LAST_NAME . ', ' . $this->FIRST_NAME;
    }
}
