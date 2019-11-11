<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeType extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'employee_type_name','employee_type_id',
    ];

    public function employee(){
        return $this->hasMany('App\Employee','employee_type_id','employee_type_id');
    }
}
