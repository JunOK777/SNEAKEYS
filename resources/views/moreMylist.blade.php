@extends('layouts.app')
@section('css')
<link href="{{ asset('css/mypage.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container">
<section class="mypage">
  <div class="mypage_contents">
    <div class="row" >
      <div class="col-xs-6">
        <div>
          <img src="{{ asset('storage/avatar_image/'.$user->avatar) }}" style=" height:100px;">
          <p style="margin-left: 20px;"><a href="{{ action('UserController@avatar_upload') }}">編集</a></p>
        </div>
      </div>
      <div class="col-xs-6">
        <div class="user_name">
          <p>名前：<?php echo $user->name; ?>&nbsp;&nbsp;&nbsp;<a href="{{ action('UserController@name') }}"><span>編集</span></a></p>
        </div>
        <div class="sns_icons">
          <div class="sns_icon">
            <a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter-square fa-2x"></i></a>
          </div>
          <div class="sns_icon">
            <a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-2x"></i></a>
          </div>
        </div>
      </div>
    </div>
    <div>
      <a href="{{ action('UserController@change_adress') }}">メールアドレスを変更する</a>
    </div>
  </div>
</section>

<section class="mylist">
  <div class="mylist_contents">
    <div class="want_list">
      <div class="mylist_title">
        <p>＃wantしたアイテム</p>
      </div>
        <div class="row">
          @foreach($want_images as $want_image)
            <div class="col-md-4 col-xs-4 imgs">
              <div class="img">
                <a href="{{ route('image.show', $want_image['id']) }}">
                  <img class="item-image" src="{{ asset('storage/main_image/'.$want_image['image_file_name']) }}">
                </a>
                @if(auth()->id() === $want_image['user_id'])
                  <form action="{{ route('delete', $want_image['id']) }}" method="POST">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" class="del_button">削除</button>
                  </form>
                @endif
              </div>
              <div class="img_name">
                <p><a href="{{ route('image.show', $want_image['id']) }}">{{ $want_image['item_name'] }}</a></p>
              </div>
            </div>
          @endforeach
        </div>
      <div class="mylist_title">
        <p>＃haveしたアイテム</p>
      </div>  
        <div class="row">
          @foreach($have_images as $have_image)
            <div class="col-md-4 col-xs-4 imgs">
              <div class="img">
                <a href="{{ route('image.show', $have_image['id']) }}">
                  <img class="item-image" src="{{ asset('storage/main_image/'.$have_image['image_file_name']) }}" alt='' style=" max-height:200px; width:250px;">
                </a>
                @if(auth()->id() === $have_image['user_id'])
                  <form action="{{ route('delete', $have_image['id']) }}" method="POST">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" class="del_button">削除</button>
                  </form>
                @endif
              </div>
              <div class="img_name">
                <p><a href="{{ route('image.show', $have_image['id']) }}">{{ $have_image['item_name'] }}</a></p>
              </div>
            </div>
          @endforeach
        </div>
    </div>
  </div>
</section>
</div>

@stop