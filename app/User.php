<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'avatar', 'email', 'email_verified_at', 'password', 'remember_token', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function images() 
    {
        return $this->hasMany('App\Image');
    }
    public function likes(){
        return $this->hasMany('App\ReviewLike');
    }
    public function posts(){
        return $this->hasMany('App\Review');
    }
    public function size(){
        return $this->hasMany('App\Size');
  }
}
