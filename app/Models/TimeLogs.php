<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeLogs extends Model
{
    //

    protected $fillable = [
        'emp_id', 'date', 'time_in', 'time_out',
    ];

    protected $casts = [
        'time_in' => 'date:hh:mm',
        'time_out' => 'date:hh:mm',
    ];
    protected $table = "logs";
 
}
