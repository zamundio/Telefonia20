<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class personalextra extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "personal_extra";
    protected $casts = [
        'EMP_CODE' => 'string',
    ];
    protected $primaryKey = 'EMP_CODE';
    protected $fillable = [
        'EMP_CODE',
        'FIRST_NAME',
        'LAST_NAME',
        'HIRE_DATE',
        'ACTUAL_LEAVE_DATE',
        'EMP_GLOBAL_CODE',
        'EMAIL',
        'PHONE',
        'EMP_COST_CENTER',
        'HOME_ADDRESS',
        'HOME_CITY',
        'HOME_POSTAL_CODE',
        'HOME_STATE_CODE',
        'POSITION_TITLE',
        'SUBAREA2',
        'SUBAREA3'

    ];
}
