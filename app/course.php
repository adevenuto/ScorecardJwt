<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Course extends Model
{   
    protected $fillable = [
        'user_id',
        'name',
        'address',
        'email',
        'phone_number',
        'website',
        'driving_range',
        'putting_green',
        'caddie',
        'pro_shop',
        'lat',
        'lng',
        'street_number',
        'route',
        'city',
        'state',
        'postal_code',
        'country',
    ];
    // Course -> belongs to -> User
    public function user() {
    	return $this->belongsTo('App\User');
    }
    // Course -> has many -> HoleGroups
    public function holeGroups() {
    	return $this->hasMany('App\HoleGroup');
    }
    // Find HoleGroupByTeebox
    public function HoleGroupByTeebox($teebox) {
        return $this->holeGroups->where('teebox','=',$teebox)->first();
    }
}