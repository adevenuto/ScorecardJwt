<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    // has many users
    public function users() {
    	return $this->belongsToMany('App\User');
    }
}