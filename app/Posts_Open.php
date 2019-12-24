<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts_Open extends Model
{
    protected $table ="posts__opens";
    protected $fillable =[
        'posts'
    ];
}
