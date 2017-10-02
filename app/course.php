<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    // courses has belongs to many users
    public function users() {
    	return $this->belongsToMany('App\User');
    }
}