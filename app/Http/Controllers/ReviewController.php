<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Image;
use App\User;
use App\Like;

use Session;
use Auth;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class ReviewController extends Controller
{
    // 投稿した記事をDBへ保存する
    public function reviewPost(Request $request, Image $image)
    {
        $rules = [
            'size' => 'required',
            'comfort'=>'required',
        ];

        $messages = array(
            'size.required' => '選択してください。',
            'comfort.required' => '本文を正しく入力してください。',
        );

        $validator = Validator::make(Input::all(), $rules, $messages);

        if ($validator->passes()) {
            $review = new Review;
            $review->image_id = $image->id;
            $review->size     = $request->size;
            $review->stars    = $request->evalution;
            $review->comfort  = $request->comfort;
            $review->user_id  = auth()->id();
            
            $review->save();

            return Redirect::back()
                ->with('message', '投稿が完了しました。');
        }else{
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }
    }
}




