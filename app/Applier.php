<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applier extends Model
{
    protected $table='appliers';
    protected $fillable=[
        'id',
        'full_name',
        'email',
        'contact_no',
        'area_applied',
        'cover_letter',
        'expectation',
        'required_by_college',
        'apply_by',
        'CV',
        'earliest_date',
        'status'
    ];
    public $incrementing = false;

}
