<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    // courses belongs to many users
    // determine which user created course
    public function users() {
    	return $this->belongsToMany('App\User');
    }
    // Course has many holes
    // Get all course holes
    public function holes() {
    	return $this->hasMany('App\Hole');
    }
}