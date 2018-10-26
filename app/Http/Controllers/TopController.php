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

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class TopController extends Controller
{
    // トップページへアクセス
    public function index()
    {
        // 新着一覧
        $user   = User::find(auth()->id());
        $images = Image::orderBy('id', 'desc')->get();
        $i      = 1;
        $ii     = 1;

        // あなたへのおすすめ
        if(isset($user)){

            $WantHaves = WantHave::where('user_id' , $user->id)->where(function($query){
                $query->where('wanthave_count', 0)->orWhere('wanthave_count', 1);
            })->get();

            $imageIds = [];
            foreach ($WantHaves as $key => $value) {
                array_push($imageIds, $value->image_id);
            }

            $userImages = Image::whereIn('id', $imageIds)->get();

            $brand_names = [];
            foreach ($userImages as $key => $value) {
                array_push($brand_names, $value->brand_name);
            }
            $brand_count = array_count_values($brand_names);
            arsort($brand_count);
            $max = key($brand_count);

            $reccomend_images = Image::where('brand_name', $max)->orderBy('id', 'desc')->get();

            return view('index', [
                'user'             => $user,
                'images'           => $images,
                'i'                => $i,
                'ii'               => $ii,
                'reccomend_images' =>$reccomend_images,
            ]);

        } else {
            $images = Image::orderBy('id', 'desc')->get();
            $i      = 1;

            return view('index', [
                'images' => $images,
                'i'      => $i,
            ]);
        }
    }

    // 削除機能
    public function destroy($id)
    {
        $image = Image::find($id);
        $image->delete();

        return redirect('/'); 
    }
}
