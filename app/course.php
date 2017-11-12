<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    // courses has belongs to many users
    // determine which user created course
    public function users() {
    	return $this->belongsToMany('App\User');
    }
}