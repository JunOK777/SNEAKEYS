@extends('layouts.app', ['sidebar' => true])

@section('css')
  <link href="{{ asset('css/index.css') }}" rel="stylesheet">
@endsection

@section('content')

<!-------------- 新着画像一覧 ----------------->
  <div class="main-content">
    <div>
        <p class="images-type">＃あなたへのおすすめ</p>
    </div>
    <div class="row">

      @foreach($reccomend_images as $reccomend_image)
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
      @endforeach
    </div>
  </div>

@stop