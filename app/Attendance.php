<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $appends = ['day'];

    protected $fillable = [
        'date','check_in','check_out','employee_id'
    ];

    public function employee(){
        return $this->belongsTo('App\Employee','employee_id','employee_id');
    }

    public function getDayAttribute(){
        return Carbon::parse($this->date)->isoFormat('dddd');
    }
}
