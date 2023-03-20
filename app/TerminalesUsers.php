<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TerminalesUsers extends Model
{
    use HasFactory;
    protected $table = "terminales_usuarios_actual";
    protected $guarded = [];
    protected $primaryKey = 'terminal_movil_id';
    public $timestamps = false;

    public function term()
    {
        return $this->belongsTo(TerminalMovil::class, 'terminal_movil_id', 'id')->with('modelo');
    }

}
