@extends('layouts.app')
@section('css')
<link href="{{ asset('css/upload.css') }}" rel="stylesheet">
@section('content')
<div class="col-md-12">
  <div>
    <form action="{{ route('store') }}" method="post" enctype="multipart/form-data" files="true">
	    {!! csrf_field() !!}
	    <input type="file" name="image">
        <p class="content-name">アイテムの名前を入力</p>
        <input class="item-box" type="text" name="item_name">
      <p class="content-name">ブランドを選択</p>
        <select name="brand_name">
          @foreach($brand_names as $brand_name)
            <option value="{{ $brand_name }}">{{ $brand_name }}</option>
          @endforeach
        </select>
	    <button class="upload-button" type="submit" class="content-name">アップロード</button>
	  </form>
  </div>  
</div>


@stop