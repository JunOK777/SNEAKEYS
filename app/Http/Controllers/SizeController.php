<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Image;
use App\User;
use App\Size;


use Session;
use Auth;

class SizeController extends Controller
{
  // small
    public function smallNull(Image $image, Request $request)
    {
      $user = User::find(auth()->id());
      $size = Size::where('user_id', $user->id)->where('image_id', $image->id)->first();

      $count_small = Size::where('image_id', $image->id)->where('size_choice', "small")->count();
      $count_just  = Size::where('image_id', $image->id)->where('size_choice', "just")->count();
      $count_large = Size::where('image_id', $image->id)->where('size_choice', "large")->count();

      $size = new Size;
      $size->user_id     = auth()->id();
      $size->image_id    = $image->id;
      $size->size_choice = "small";
      $size->save();

      return response()->json([
                               'success'     => true,
                               'count_small' => $count_small,
                               'count_just'  => $count_just,
                               'count_large' => $count_large,
                             ]);
    }

    public function smallSmall(Image $image, Request $request)
    {
      $user = User::find(auth()->id());
      $size = Size::where('user_id', $user->id)->where('image_id', $image->id)->first();
      
      $count_small = Size::where('image_id', $image->id)->where('size_choice', "small")->count();
      $count_just  = Size::where('image_id', $image->id)->where('size_choice', "just")->count();
      $count_large = Size::where('image_id', $image->id)->where('size_choice', "large")->count();

      $size->delete();

      return response()->json([
                               'success'     => true,
                               'count_small' => $count_small,
                               'count_just'  => $count_just,
                               'count_large' => $count_large,
                             ]);
    }

    public function smallOther(Image $image, Request $request)
    {
      $user = User::find(auth()->id());
      $size = Size::where('user_id', $user->id)->where('image_id', $image->id)->first();
      
      $count_small = Size::where('image_id', $image->id)->where('size_choice', "small")->count();
      $count_just  = Size::where('image_id', $image->id)->where('size_choice', "just")->count();
      $count_large = Size::where('image_id', $image->id)->where('size_choice', "large")->count();

      $size->user_id     = auth()->id();
      $size->image_id    = $image->id;
      $size->size_choice = "small";
      $size->save();

      return response()->json([
                               'success'     => true,
                               'count_small' => $count_small,
                               'count_just'  => $count_just,
                               'count_large' => $count_large,
                             ]);
    }

    // just
    public function justNull(Image $image, Request $request)
    {
      $user = User::find(auth()->id());
      $size = Size::where('user_id', $user->id)->where('image_id', $image->id)->first();
      
      $count_small = Size::where('image_id', $image->id)->where('size_choice', "small")->count();
      $count_just  = Size::where('image_id', $image->id)->where('size_choice', "just")->count();
      $count_large = Size::where('image_id', $image->id)->where('size_choice', "large")->count();

      $size = new Size;
      $size->user_id     = auth()->id();
      $size->image_id    = $image->id;
      $size->size_choice = "just";
      $size->save();

      return response()->json([
                               'success'     => true,
                               'count_small' => $count_small,
                               'count_just'  => $count_just,
                               'count_large' => $count_large,
                             ]);
    }

    public function justJust(Image $image, Request $request)
    {
      $user = User::find(auth()->id());
      $size = Size::where('user_id', $user->id)->where('image_id', $image->id)->first();
      
      $count_small = Size::where('image_id', $image->id)->where('size_choice', "small")->count();
      $count_just  = Size::where('image_id', $image->id)->where('size_choice', "just")->count();
      $count_large = Size::where('image_id', $image->id)->where('size_choice', "large")->count();

      $size->delete();

      return response()->json([
                               'success'     => true,
                               'count_small' => $count_small,
                               'count_just'  => $count_just,
                               'count_large' => $count_large,
                             ]);
    }

    public function justOther(Image $image, Request $request)
    {
      $user = User::find(auth()->id());
      $size = Size::where('user_id', $user->id)->where('image_id', $image->id)->first();

      $count_small = Size::where('image_id', $image->id)->where('size_choice', "small")->count();
      $count_just  = Size::where('image_id', $image->id)->where('size_choice', "just")->count();
      $count_large = Size::where('image_id', $image->id)->where('size_choice', "large")->count();

      $size->user_id     = auth()->id();
      $size->image_id    = $image->id;
      $size->size_choice = "just";
      $size->save();

      return response()->json([
                               'success'     => true,
                               'count_small' => $count_small,
                               'count_just'  => $count_just,
                               'count_large' => $count_large,
                             ]);
    }

    // large
    public function largeNull(Image $image, Request $request)
    {
      $user = User::find(auth()->id());
      $size = Size::where('user_id', $user->id)->where('image_id', $image->id)->first();
      
      $count_small = Size::where('image_id', $image->id)->where('size_choice', "small")->count();
      $count_just  = Size::where('image_id', $image->id)->where('size_choice', "just")->count();
      $count_large = Size::where('image_id', $image->id)->where('size_choice', "large")->count();

      $size = new Size;
      $size->user_id     = auth()->id();
      $size->image_id    = $image->id;
      $size->size_choice = "large";
      $size->save();

      return response()->json([
                               'success'     => true,
                               'count_small' => $count_small,
                               'count_just'  => $count_just,
                               'count_large' => $count_large,
                             ]);
    }

    public function largeLarge(Image $image, Request $request)
    {
      $user = User::find(auth()->id());
      $size = Size::where('user_id', $user->id)->where('image_id', $image->id)->first();
      
      $count_small = Size::where('image_id', $image->id)->where('size_choice', "small")->count();
      $count_just  = Size::where('image_id', $image->id)->where('size_choice', "just")->count();
      $count_large = Size::where('image_id', $image->id)->where('size_choice', "large")->count();

      $size->delete();

      return response()->json([
                               'success'     => true,
                               'count_small' => $count_small,
                               'count_just'  => $count_just,
                               'count_large' => $count_large,
                             ]);
    }

    public function largeOther(Image $image, Request $request)
    {
      $user = User::find(auth()->id());
      $size = Size::where('user_id', $user->id)->where('image_id', $image->id)->first();
      
      $count_small = Size::where('image_id', $image->id)->where('size_choice', "small")->count();
      $count_just  = Size::where('image_id', $image->id)->where('size_choice', "just")->count();
      $count_large = Size::where('image_id', $image->id)->where('size_choice', "large")->count();

      $size->user_id     = auth()->id();
      $size->image_id    = $image->id;
      $size->size_choice = "large";
      $size->save();

      return response()->json([
                               'success'     => true,
                               'count_small' => $count_small,
                               'count_just'  => $count_just,
                               'count_large' => $count_large,
                             ]);
    }
}