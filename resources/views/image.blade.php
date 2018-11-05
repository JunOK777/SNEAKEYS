@extends('layouts.app')

@section('css')
<link href="{{ asset('css/image.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
<section class="image_detail">
  <input id="image_id" type="hidden" value="{{ $image->id }}">
<!-- image -->
  <div class="contain_image">
    <div class="img_name">
      <p>{{ $image['item_name'] }}</p>
    </div>
  	<div class="img">
  		<img src="{{ asset('storage/main_image/'.$image->image_file_name) }}" height="300px">	
  	</div>

<!-- tag -->
    <div>
      <div class="tags">
        <p>ブランド：<a href="{{ route('tag.search', ['q' => $image->brand_name]) }}">{{ $image->brand_name }}</a></p>
      </div>
    </div>

<!-- want&have-button -->
  @if($wantHave['wanthave_count'] === 0 )
    <div class="want_have_btn">
      <div class="row">
        <div class="col-xs-6">
          <button type="submit" id="want" class="wanting">want</button>
        </div>
        <div class="col-xs-6">
          <button type="submit" id="have" class="normal">have</button>
        </div>
      </div>
    </div>

  @elseif($wantHave['wanthave_count'] === 1 )
  <div class="want_have_btn">
      <div class="row">
        <div class="col-xs-6">
          <button type="submit" id="want" class="normal">want</button>
        </div>
        <div class="col-xs-6">
          <button type="submit" id="have" class="having">have</button>
        </div>
      </div>
    </div>

  @elseif($wantHave['wanthave_count'] === null )
  <div class="want_have_btn">
      <div class="row">
        <div class="col-xs-6">
          <button type="submit" id="want" class="normal">want</button>
        </div>
        <div class="col-xs-6">
          <button type="submit" id="have" class="normal">have</button>
        </div>
      </div>
    </div>

  @endif

<!-- size-button -->
    <div class="size_btn">
      <div class="row">
        @if($size['size_choice'] === null)
            <!-- `small -->
            <div class="col-xs-4">
              <button id="count01" class="circle">小さめ</button>
              <p id="count_small">{{ $count_small }}</p>
            </div>
            <!-- just -->
            <div class="col-xs-4">
              <button id="count02" class="circle">ジャスト</button>
              <p id="count_just">{{ $count_just }}</p>
            </div>
            <!-- large -->
            <div class="col-xs-4">
              <button id="count03" class="circle">大きめ</button>
              <p id="count_large">{{ $count_large }}</p>
            </div>

        @elseif($size['size_choice'] === "small")
          
          <!-- `small -->
          <div class="col-xs-4">
            <button id="count01" class="done">小さめ</button>
            <p id="count_small">{{ $count_small }}</p>
          </div>
          <!-- just -->
          <div class="col-xs-4">
            <button id="count02" class="circle">ジャスト</button>
            <p id="count_just">{{ $count_just }}</p>
          </div>
          <!-- large -->
          <div class="col-xs-4">
            <button id="count03" class="circle">大きめ</button>
            <p id="count_large">{{ $count_large }}</p>
          </div>

        @elseif($size['size_choice'] === "just")
          <!-- `small -->
          <div class="col-xs-4">
            <button id="count01" class="circle">小さめ</button>
            <p id="count_small">{{ $count_small }}</p>
          </div>
          <!-- just -->
          <div class="col-xs-4">
            <button id="count02" class="done">ジャスト</button>
            <p id="count_just">{{ $count_just }}</p>
          </div>
          <!-- large -->
          <div class="col-xs-4">
            <button id="count03" class="circle">大きめ</button>
            <p id="count_large">{{ $count_large }}</p>
          </div>

        @elseif($size['size_choice'] === "large")
          <!-- `small -->
          <div class="col-xs-4">
            <button id="count01" class="circle">小さめ</button>
            <p id="count_small">{{ $count_small }}</p>
          </div>
          <!-- just -->
          <div class="col-xs-4">
            <button id="count02" class="circle">ジャスト</button>
            <p id="count_just">{{ $count_just }}</p>
          </div>
          <!-- large -->
          <div class="col-xs-4">
            <button id="count03" class="done">大きめ</button>
            <p id="count_large">{{ $count_large }}</p>
          </div>
        @endif
      </div>
    </div>
</section>

<!-- review -->
<section class="review">
  <div class="title">
    <p>Review</p>
  </div>
  <div id="reviews">
  @foreach($reviews as $review)
    @if($review['image_id'] == $image->id)

      <p>名前：{{ \App\Helper\ReviewHelper::getUserName($review->user_id) }}
        <small>投稿日：{{ date("Y年 m月 d日",strtotime($review['created_at'])) }}</small>
      </p>
      <p>サイズ感：{{ $review['size'] }}</p>
      <p>評価：<span  class="star">{{ $review['stars'] }}</span></p>
      <p>履き心地：{{ $review['comfort'] }}</p>
      <button id="like" class="btn like_btn" type="submit">
        <input type="hidden" value="{{ $review->id }}" class="reviewID">
        <like-review
          :review-id="{{ json_encode($review->id) }}"
        >
        </like-review>
      </button>
      <hr />
    @endif
  @endforeach
  </div>

  <div class="col-xs-8 col-xs-offset-2">
    <p class="posting">投稿する</p>

    {{-- 投稿完了時にフラッシュメッセージを表示 --}}
    @if(Session::has('message'))
      <div class="bg-info">
        <p>{{ Session::get('message') }}</p>
      </div>
    @endif

    {{-- エラーメッセージの表示 --}}
    @foreach($errors->all() as $message)
      <p class="bg-danger">{{ $message }}</p>
    @endforeach
   
    <form action="{{ route('image.review.post', $image->id) }}" method="post" enctype="multipart/form-data" files="true">
          {!! csrf_field() !!}
      <div class="form-group">
        <label for="title" class="">サイズ感</label>
        <div class="">
          <input type="radio" name="size" value="小さめ">小さめ
          <input type="radio" name="size" value="ジャスト" checked="checked">ジャスト
          <input type="radio" name="size" value="大きめ">大きめ
        </div>
      </div>
      <div>
        <label for="value" class="">評価：</label>
        <select class="star" name="evalution">
          <option value="★★★★★">★★★★★</option>
          <option value="★★★★☆">★★★★☆</option>
          <option value="★★★☆☆">★★★☆☆</option>
          <option value="★★☆☆☆">★★☆☆☆</option>
          <option value="★☆☆☆☆">★☆☆☆☆</option>
          <option value="☆☆☆☆☆">☆☆☆☆☆</option>
        </select>
      </div>
      <div class="form-group">
        <label for="content" class="">履き心地</label>
        <div class="">
          <textarea type="text" name="comfort" rows="6" cols="60"></textarea>
        </div>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">投稿する</button>
      </div>
    </form>
  </div>
</section>
</div>

@stop


@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{ asset('js/want.js') }}"></script>
<script src="{{ asset('js/have.js') }}"></script>
<script src="{{ asset('js/countSmall.js') }}"></script>
<script src="{{ asset('js/countJust.js') }}"></script>
<script src="{{ asset('js/countLarge.js') }}"></script>
@endsection