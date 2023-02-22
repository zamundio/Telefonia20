<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Odi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'odi';
    protected $guarded = [];

}
