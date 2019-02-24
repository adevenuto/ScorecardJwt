<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoleGroup extends Model
{
    protected $fillable = [
        'teebox',
        'course_id',
    ];

    // HoleGroup -> belongs to -> Course
    public function course() {
    	return $this->belongsTo('App\Course');
    }
    // HoleGroup -> hasMany -> Holes
    public function holes() {
    	return $this->hasMany('App\Hole');
    }
}

