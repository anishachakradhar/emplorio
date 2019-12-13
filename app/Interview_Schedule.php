<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interview_Schedule extends Model
{
    protected $table='interview_schedule';
    protected $fillable=[
        'applier_id',
        'interview_date',
        'interview_time'
    ];

    public function applier()
    {
        return $this->belongsTo('App\Applier'::class,'applier_id','id');
    }
}
