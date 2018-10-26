<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function user() 
    {
        return $this->belongsTo('App\User');
    }
    public function likes(){
        return $this->belongsTo('App\Like');
    }
    public function review(){
        return $this->hasMany('App\Review');
    }
    public function size(){
        return $this->hasMany('App\Size');
    }
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

}
