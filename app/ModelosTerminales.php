<?php

namespace App;

use App\TerminalMovil;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelosTerminales extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "terminales";
    public function terminales()
    {
        return $this->hasMany(TerminalMovil::class, 'IdTerminal', 'id');
    }
}
