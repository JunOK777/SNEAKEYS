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

class UserController extends Controller
{
    // マイページへ移動
    public function mypage(User $user)
    {
        $user           = User::find(auth()->id());
        $want_image_ids = WantHave::where('user_id', $user->id)->where('wantHave_count', 0)->pluck('image_id');
        $have_image_ids = WantHave::where('user_id', $user->id)->where('wantHave_count', 1)->pluck('image_id');

        $want_images    = Image::whereIn('id', $want_image_ids)->orderBy('id', 'desc')->get();
        $have_images    = Image::whereIn('id', $have_image_ids)->orderBy('id', 'desc')->get();

        $i  = 1;
        $ii = 1;
        
        return view('mypage', [
            'user'        => $user,
            'want_images' => $want_images,
            'have_images' => $have_images,
            'i'           => $i,
            'ii'          => $ii
        ]);
    }

    // アバター画像アップロードページへ飛ぶ
    public function avatar_upload()
    {
        return view('avatar_upload');
    }

    // アバター画像アップロード
    public function store_avatar(Request $request)
    {
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

        if ($request->file('avatar')->isValid()) {
            $filename = $request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->storeAs('public/avatar_image', $filename);
            // // User tableのインスタンスを生成
            $user = User::find(auth()->id());
            // 生成されたUser tableのインスタンスのidとavatarを代入　
            
            $user->avatar = $filename;
            $user->save();
            return redirect('/mypage')->with('success', '画像を保存しました。');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['file' => '画像がアップロードされていないか不正なデータです。']);
        }
    }

    // アドレス変更ページへ飛ぶ
    public function change_adress()
    {
        return view('change_adress');
    }

    // アドレスを変更する機能
    public function change_email(Request $request)
    {
        $user = User::find(auth()->id());
        $user->email = $request->email;
        $user->save();
        return redirect('/mypage')->with('success_email', 'メールアドレスを変更しました。');
    }

    // 名前変更ページへ飛ぶ
    public function name()
    {
        return view('name');
    }

    // 名前を変更する機能
    public function change_name(Request $request)
    {
        $user = User::find(auth()->id());
        $user->name = $request->name;
        $user->save();
        return redirect('/mypage')->with('success_name', '名前を変更しました。');
    }
}
