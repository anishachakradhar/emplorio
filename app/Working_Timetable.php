<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Working_Timetable extends Model
{
    protected $table='working_time';
    protected $fillable=[
        'days',
        'opening_time',
        'closing_time'
    ];
}
