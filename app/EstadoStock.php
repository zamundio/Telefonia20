<?php

namespace App;

use App\TerminalMovil;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EstadoStock extends Model
{
    use HasFactory;
    protected $table = "estadostock";

    protected $primaryKey = 'Id';
    public $timestamps = false;

    public function estado()
    {
        return $this->belongsTo(TerminalMovil::class);
    }

}
