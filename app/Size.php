<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
  protected $fillable = [
    'user_id',
    'image_id',
    'size_choice'
  ];

  public function user(){
    return $this->belongsTo('App\User');
  }

  public function image(){
    return $this->belongsTo('App\Image');
  }
}
