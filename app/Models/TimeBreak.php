<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeBreak extends Model
{
    //
    protected $fillable = [
        'emp_id', 'date', 'start_time', 'end_time',
    ];

    protected $casts = [
        'start_time' => 'date:hh:mm',
        'end_time' => 'date:hh:mm',
    ];
    protected $table = "breaks";



}
