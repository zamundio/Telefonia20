<?php

namespace App;

use App\Tarjeta;
use App\TerminalMovil;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LineaUsuario extends Model
{
    use HasFactory;
    protected $table = "linea_usuario";

    public $timestamps = false;
    protected $casts = [
        'cod_emp' => 'string',
    ];
    protected $fillable = ['id', 'cod_emp','Abreviado', 'Observaciones', 'ListadoXLS','Principal'];

    public function Linea()
    {
        return $this->belongsTo(estructura::class);
    }
    public function tarjetas()
    {
        return $this->hasMany(Tarjeta::class)->orderBy('Principal', 'desc');
    }
   public function ampliaciones()
    {
        return $this->hasMany(AmpliacionesGB::class)->orderBy('FECHA', 'desc');
    }
    public function terminal_usuario()
    {
        return $this->belongsToMany(TerminalMovil::class, 'terminales_usuarios_actual')
            ->withPivot('f_cambio_alta', 'Observaciones', 'Actual')->orderby('f_cambio_alta', 'desc');
    }
    public function terminal_usuario_historico()
    {
        return $this->belongsToMany(TerminalMovil::class, 'lineas_historico_terminales')
            ->withPivot('f_cambio_alta', 'f_baja', 'Motivo', 'Observaciones')->orderby('f_baja', 'desc');
    }

}
