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

use Session;
use Auth;

class SearchController extends Controller
{
    public function tagSearch(Image $image, Tag $tag, Request $request)
    {   
      $q = \Request::query();
      $images = Image::where('brand_name', $q)->orderBy('id', 'desc')->get();

      return view('brand_search', ['images' => $images],['q' => $q]);
    }

    public function search(Request $request)
    {
      #キーワード受け取り
       $q = \Request::query();
       $q = $q['keyword'];
 
        if (!empty($q)) {
            $images = Image::where('item_name', 'LIKE', "%$q%")->orWhere('brand_name','LIKE','%$q%')->orderBy('id', 'desc')->get();
        }else{
            $images = Image::orderBy('id', 'desc')->get();
        }
 
        return view('search', [
            'images'  => $images,
            'q'       => $q,
        ]);
    }
}
