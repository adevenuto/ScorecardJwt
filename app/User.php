<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'type',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function hasRole($type)
    {
        return $this->type == $type;
    }
    // user belongs to many courses
    // determine which courses user created
    public function courses() 
    {
        return $this->belongsToMany('App\Course');
    }
    

    // Methods for JWT-Auth
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
