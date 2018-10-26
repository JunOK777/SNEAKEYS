<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WantHave extends Model
{
  protected $fillable = [
    'user_id',
    'image_id',
    'wanthave_count'
  ];

  public function user(){
    return $this->belongsTo('App\User');
  }
  public function image(){
    return $this->belongsTo('App\Image');
  }
}
