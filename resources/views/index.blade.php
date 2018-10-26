@extends('layouts.app', ['sidebar' => true])

@section('css')
  <link href="{{ asset('css/index.css') }}" rel="stylesheet">
@endsection

@section('content')
  <!-- メインコンテンツ -->
  <div class="main-content">
    <div>
        <p class="images-type">＃新着</p>
    </div>
    <div class="row">

      @foreach($images as $image)
        @if($i > 6)
         @break
        @else
          <div class="col-md-4 col-xs-4 imgs">
            <div class="img">
              <a href="{{ route('image.show', $image['id']) }}">
                <img class="item-image" src="{{ asset('storage/main_image/'.$image['image_file_name']) }}">
              </a>
              @if(auth()->id() == $image['user_id'])
                <form action="{{ route('delete', $image['id']) }}" method="POST">
                  {{ method_field('DELETE') }}
                  {{ csrf_field() }}
                  <button type="submit" class="del_button">削除</button>
                </form>
              @endif
            </div>
            <div class="img_name">
              <p><a href="{{ route('image.show', $image['id']) }}">{{ $image['item_name'] }}</a></p>
            </div>
          </div>
          <div class="none">{{ $i++ }}</div>
          @endif
        @endforeach
      </div>
      <div>
        <p class="more"><a  class="more-button" href="{{ route('news') }}">もっとみる</a></p>
      </div>  
      <!-- おすすめ画像一覧 -->
      @if(isset($user))
        <div>
          <p class="images-type">＃あなたへのおすすめ</p>
        </div>
        <div class="col-xs-4">
          <div class="row">

            @foreach($reccomend_images as $reccomend_image)
              @if($ii > 6)
               @break
              @else
                <div class="col-md-4 col-xs-4 imgs">
                  <div class="img">
                    <a href="{{ route('image.show', $reccomend_image['id']) }}">
                      <img class="item-image" src="{{ asset('storage/main_image/'.$reccomend_image['image_file_name']) }}">
                    </a>
                    @if(auth()->id() == $reccomend_image['user_id'])
                      <form action="{{ route('delete', $reccomend_image['id']) }}" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="del_button">削除</button>
                      </form>
                    @endif
                  </div>
                  <div class="img_name">
                    <p><a href="{{ route('image.show', $reccomend_image['id']) }}">{{ $reccomend_image['item_name'] }}</a></p>
                  </div>
                </div>
                <div class="none">{{ $ii++ }}</div>
              @endif
            @endforeach
          </div>
        </div>
        <div>
          <p class="more"><a class="more-button" href="{{ route('reccomends') }}">もっとみる</a></p>
        </div>
        
      @else
        <div>
          <p class="images-type">＃あなたへのおすすめ</p>
        </div>
        <div>
          <p style="font-size: 20px;"><a href="{{ route('login') }}">ログインしてください。</a></p>
        </div>
      @endif
  </div>
@stop