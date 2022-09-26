<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmpliacionesGB extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "ampliaciones_gb";
    protected $fillable = ['linea_usuario_id', 'FECHA', 'GB_AMPLIADOS', 'Observaciones'];
    public function ampliaciones()
    {
        return $this->belongsTo(LineaUsuario::class);
    }

    public function GetPlan()
    {
        return $this->hasone(PlanGB::class, 'Id', 'GB_AMPLIADOS');
    }
}
