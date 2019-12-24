<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apply_Process extends Model
{
    protected $table='apply__processes';
    protected $fillable =[
        'apply_by'
    ];
}
