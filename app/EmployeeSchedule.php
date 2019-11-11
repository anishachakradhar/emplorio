<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeSchedule extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'day','starting_time','ending_time','schedule_id','employee_id'
    ];

    public function employee(){
        return $this->belongsTo('App\Employee','employee_id','employee_id');
    }
}
