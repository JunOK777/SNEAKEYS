<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function image() 
    {
        return $this->belongsToMany('App\Image');
    }
}
