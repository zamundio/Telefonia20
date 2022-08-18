<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreeEstructura extends Model
{
    use HasFactory;
	   protected $table="tree_lmsa";
    //  protected $table='test';

    protected $casts = [
    'id' => 'string'];

}
