<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeDepartment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'department_name','department_id',
    ];

    public function employee(){
        return $this->hasMany('App\Employee','department_id','department_id');
    }
}
