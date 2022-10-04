<?php

namespace App;

use App\EstadoStock;
use App\LineaUsuario;
use App\ModelosTerminales;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TerminalMovil extends Model
{
    use HasFactory;
    protected $table = "maestra_terminales";
    protected $fillable = ['id', 'IdTerminal', 'Nserie', 'IMEI', 'Estado'];

    public $timestamps = false;
    public function linea_usuario()
    {
        return $this->belongsToMany(LineaUsuario::class, 'terminales_usuarios_actual')
            ->withPivot('f_cambio_alta', 'Observaciones', 'Actual');
    }

    public function modelo()
    {

        return $this->belongsTo(ModelosTerminales::class, 'IdTerminal', 'id');
    }
    public function ChkEstado()
    {

        return $this->hasOne(EstadoStock::class, 'Id', 'Estado');
    }
    public function linea_usuario_historico()
    {
        return $this->belongsToMany(LineaUsuario::class, 'lineas_historico_terminales')
            ->withPivot('f_cambio_alta', 'f_baja', 'Observaciones');
    }
}
