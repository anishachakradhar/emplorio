<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name','employee_id','email','phone','address','dob','employee_type_id','department_id'
    ];

    public function employeeType(){
        return $this->belongsTo('App\EmployeeType','employee_type_id','employee_type_id');
    }

    public function department(){
        return $this->belongsTo('App\EmployeeDepartment','department_id','department_id');
    }

    public function employeeSchedule(){
        return $this->hasMany('App\EmployeeSchedule','employee_id','employee_id');
    }
}
