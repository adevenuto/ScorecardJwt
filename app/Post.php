<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function Categories() {
    	return $this->belongsTo('App\Category');
    }
}
