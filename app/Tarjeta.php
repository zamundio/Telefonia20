<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{
    use HasFactory;
    protected $table = "lineas_tarjetas";
    public $timestamps = false;
    protected $casts = [
        'id' => 'string',
    ];
    protected $guarded = ['ID_KEY'];
    public function Linea()
    {
        return $this->belongsTo(LineaUsuario::class);
    }

}
