@extends('layouts.app')
@section('content')
<div class="col-md-12">
  	<p style="font-size: 20px;">名前を変更する</p>
  	<form action="{{ route('change_name') }}" method="POST">
  		{!! csrf_field() !!}
  		<input style="width: 15em;" type="name" name="name">
  		<button type="submit">送信</button>
  	</form>
</div>
@stop