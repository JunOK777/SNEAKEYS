@extends('layouts.app')
@section('content')
<div class="col-md-12">
    <div>
        <form action="{{ route('store_avatar') }}" method="post" enctype="multipart/form-data" files="true">
		    {!! csrf_field() !!}
		    <input type="file" name="avatar">
		    <button type="submit">アップロード</button>
		</form>
    </div>  
  <div class="row">

 
  </div>
</div>


@stop