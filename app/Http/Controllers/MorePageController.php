<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Image;
use App\User;
use App\ReviewLike;
use App\WantHave;

use Session;
use Auth;

class MorePageController extends Controller
{
    // 新着をもっとみる
    public function news()
    {
        $images = Image::orderBy('id', 'desc')->get();;
        $user  = User::all();

        return view('moreNews', ['images' => $images]);
    }

    // あなたへのおすすめをもっとみる
    public function reccomends()
    {
        $user      = User::find(auth()->id());
        $WantHaves = WantHave::where('user_id' , $user->id)->where(function($query){
                $query->where('wanthave_count', 0)->orWhere('wanthave_count', 1);
            })->get();

        $imageIds = [];
        foreach ($WantHaves as $key => $value) {
            array_push($imageIds, $value->image_id);
        }

        $images = Image::whereIn('id', $imageIds)->get();

        $brand_names = [];
        foreach ($images as $key => $value) {
            array_push($brand_names, $value->brand_name);
        }

        $brand_count = array_count_values($brand_names);
        arsort($brand_count);
        $max = key($brand_count);

        $reccomend_images = Image::where('brand_name', $max)->orderBy('id', 'desc')->get();

        return view('moreReccomends', [
            'user'             => $user,
            'images'           => $images,
            'reccomend_images' =>$reccomend_images,
        ]);
    }

    // マイリストをもっと見る
    public function moreMylist()
    {
        $user           = User::find(auth()->id());
        $want_image_ids = WantHave::where('user_id', $user->id)->where('wantHave_count', 0)->pluck('image_id');
        $have_image_ids = WantHave::where('user_id', $user->id)->where('wantHave_count', 1)->pluck('image_id');

        $want_images    = Image::whereIn('id', $want_image_ids)->orderBy('id', 'desc')->get();
        $have_images    = Image::whereIn('id', $have_image_ids)->orderBy('id', 'desc')->get();
        
        return view('moreMylist', [
            'user'        => $user,
            'want_images' => $want_images,
            'have_images' => $have_images,
        ]);
    }
}
