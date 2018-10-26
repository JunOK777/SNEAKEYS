<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\User;
use App\ReviewLike;

use Session;
use Auth;

class ReviewLikeController extends Controller
{
    public function postLike(Request $request, Review $review){
        $review_id = $request['reviewId'];
         //post_idが存在しない場合は終わり
         // $review = review::find($review_id);
         if (!$review) {
             return null;
         }
         //ログインしているユーザーの情報を取得
         $user = Auth::user();
         //ユーザーがライクを押しているか
         $liked = ReviewLike::where('review_id', $review_id)->where('user_id', $user->id)->first();
         //既に押してるときは何もしない
         if ($liked) {
             return null;
         }
         //初めての押下時は新規にLikeテーブルにレコードを入れます
         else {
            $like = ReviewLike::create(['user_id' => $user->id, 'review_id' => $review->id]);
            // like_countを更新
            $likeCount = ReviewLike::where('review_id', $review->id)->get();
            $likeCount = count($likeCount);

            return response()->json(['likeid' => $like->id, 'likeCount' => $likeCount, 'liked' => true]);
         }
    }

    public function unlike(Review $review)
    {
        $user = \Auth::user();
        $liked = ReviewLike::where('review_id', $review->id)->where('user_id', $user->id)->first();

        $liked->delete();

        $likeCount = ReviewLike::where('review_id', $review->id)->get();
        $likeCount = count($likeCount);

        return response()->json(['liked' => false, 'likeCount' => $likeCount]);
    }

    public function getLikeCount(Review $review)
    {
        $like = ReviewLike::where('review_id', $review->id)->get();

        if($like->isEmpty()) {
            return response()->json(['likeCount' => 0, 'liked' => false]);
        } else {
            $likeCount = count($like);

            return response()->json(['likeCount' => $likeCount, 'liked' => true]);
        }
        
    }
}
