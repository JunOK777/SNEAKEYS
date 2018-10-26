@extends('layouts.app', ['sidebar' => true])

@section('css')
  <link href="{{ asset('css/index.css') }}" rel="stylesheet">
@endsection

@section('content')

<!-------------- 新着画像一覧 ----------------->
  <div class="main-content">
    <div>
        <p class="images-type">＃新着</p>
    </div>
    <div class="row">

      @foreach($images as $image)
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
      @endforeach
    </div>
  </div>

@stop