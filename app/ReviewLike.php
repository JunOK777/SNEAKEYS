<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReviewLike extends Model
{
  protected $fillable = [
    'user_id',
    'review_id'
  ];

  public function user(){
    return $this->belongsTo('App\User');
  }
  
  public function review(){
    return $this->belongsTo('App\Review');
  }
}
