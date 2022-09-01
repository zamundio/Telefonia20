<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class personalextra extends Model
{
    use HasFactory;
    protected $table = "personal_extra";
    protected $casts = [
        'EMP_CODE' => 'string',
    ];
    protected $primaryKey = 'EMP_CODE';
}
