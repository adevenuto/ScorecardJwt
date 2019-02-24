<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hole extends Model
{
    public function holeGroups() {
    	return $this->belongsTo('App\HoleGroup');
    }
}
