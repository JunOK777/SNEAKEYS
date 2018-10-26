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

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class CreateImageController extends Controller
{
    // Imageの新規uploadページへアクセス
    public function create()
    {   
        $brand_names = Tag::all()->pluck('tag_name');

        return view('create', ['brand_names' => $brand_names]);
    }

    // 画像アップロード機能
    public function store(Request $request)
    {   
        // fileを取得してvalidate
        $files = $request->file();
        $this->validate($request, [
            'file' => [
                // アップロードされたファイルであること
                'file',
                // 画像ファイルであること
                'image',
                // MIMEタイプを指定
                'mimes:jpeg,png',
            ]
        ]);

        if ($request->file('image')->isValid()) {

            $filename = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/main_image', $filename);

            $image                  = new Image;
            $image->user_id         = auth()->id();
            $image->image_file_name = $filename;
            $image->item_name       = $request->item_name;
            $image->brand_name      = $request->brand_name;
            $image->save();
            return redirect('/')->with('success', '画像を保存しました。');

        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['file' => '画像がアップロードされていないか不正なデータです。']);
        }
    }
}
