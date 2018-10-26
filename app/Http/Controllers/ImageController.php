<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Image;
use App\User;
use App\ReviewLike;
use App\WantHave;
use App\Size;
use App\Tag;
use App\Star;

use Session;
use Auth;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class ImageController extends Controller
{
    // アイテム詳細ページへ飛ぶ
    public function show(Image $image, Review $review)
    {
        // $image = Image::find($id);  <-省略可
        // $images  = Image::where('image_id', $image->id)->get();
        $user        = User::find(auth()->id());
        $reviews     = Review::where('image_id', $image->id)->get();
        $wantHave    = WantHave::where('image_id', $image->id)->where('user_id', $user->id)->first();
        $size        = Size::where('image_id', $image->id)->where('user_id', $user->id)->first();
        $count_small = Size::where('image_id', $image->id)->where('size_choice', "small")->count();
        $count_just  = Size::where('image_id', $image->id)->where('size_choice', "just")->count();
        $count_large = Size::where('image_id', $image->id)->where('size_choice', "large")->count();
        
        return view('image', [
            'user'        => $user,
            'image'       => $image,
            'reviews'     => $reviews,
            'wantHave'    => $wantHave,
            'size'        => $size,
            'count_small' => $count_small,
            'count_just'  => $count_just,
            'count_large' => $count_large,
        ]);
    }
}
