<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Course extends Model
{   
    protected $fillable = [
        'name',
        'address',
        'email',
        'phone_number',
        'website',
        'driving_range',
        'putting_green',
        'caddie',
        'pro_Shop',
        'lat',
        'lng',
        'street_number',
        'route',
        'city',
        'state',
        'postal_code',
        'country',
        'hole_count',
    ];
    // Course -> belongs to -> User
    public function user() {
    	return $this->belongsTo('App\User');
    }
    // Course -> has many -> HoleGroups
    public function holeGroups() {
    	return $this->hasMany('App\HoleGroup');
    }
}