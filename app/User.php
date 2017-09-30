<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    
    public function hasRole($type)
    {
        return $this->type == $type;
    }
    // has many courses
    public function courses() {
        return $this->belongsToMany('App\Course');
    }
   
    protected $fillable = [
        'name', 'email', 'password', 'type',
    ];

    
    protected $hidden = [
        'password', 'remember_token',
    ];
}
