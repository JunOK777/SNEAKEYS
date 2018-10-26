<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

  protected $fillable = [
    'image_id',
    'user_id',
    'like_count',
    'size',
    'comfort'
  ];

  public function comments(){
    // 投稿はたくさんのコメントを持つ
    return $this->hasMany('App\Comment');
  }

  public function image(){
    return $this->belongsTo('App\Image');
  }

  public function reviewLikes(){
      return $this->belongsTo('App\ReviewLike');
    }

  public function user(){
    return $this->belongsTo('App\User');
  }
}
