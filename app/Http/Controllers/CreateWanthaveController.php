<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\User;
use App\Image;
use App\ReviewLike;
use App\WantHave;

use Session;
use Auth;

class CreateWanthaveController extends Controller
{
  public function wantNull(Image $image, Request $request)
  {
    $user = User::find(auth()->id());
    $wantHave = WantHave::where('user_id', $user->id)->where('image_id', $image->id)->first();
    

      $wantHave = new WantHave;
      $wantHave->user_id        = auth()->id();
      $wantHave->image_id       = $image->id;
      $wantHave->wanthave_count = 0;
      $wantHave->save();

      return response()->json(['success' => true]);
  }

  public function want0(Image $image, Request $request)
  {
    $user = User::find(auth()->id());
    $wantHave = WantHave::where('user_id', $user->id)->where('image_id', $image->id)->first();

    $wantHave->delete();

    return response()->json(['success' => true]);
  }

    public function want1(Image $image, Request $request)
  {
    $user = User::find(auth()->id());
    $wantHave = WantHave::where('user_id', $user->id)->where('image_id', $image->id)->first();

    $wantHave->wanthave_count = 0;
    $wantHave->save();

    return response()->json(['success' => true]);
  }

  public function haveNull(Image $image, Request $request)
  {
    $user = User::find(auth()->id());
    $wantHave = WantHave::where('user_id', $user->id)->where('image_id', $image->id)->first();
    

      $wantHave = new WantHave;
      $wantHave->user_id        = auth()->id();
      $wantHave->image_id       = $image->id;
      $wantHave->wanthave_count = 1;
      $wantHave->save();

      return response()->json(['success' => true]);
  }

  public function have0(Image $image, Request $request)
  {
    $user = User::find(auth()->id());
    $wantHave = WantHave::where('user_id', $user->id)->where('image_id', $image->id)->first();

    $wantHave->wanthave_count = 1;
    $wantHave->save();

    return response()->json(['success' => true]);
  }

  public function have1(Image $image, Request $request)
  {
    $user = User::find(auth()->id());
    $wantHave = WantHave::where('user_id', $user->id)->where('image_id', $image->id)->first();

    $wantHave->delete();

    return response()->json(['success' => true]);
  }
}
