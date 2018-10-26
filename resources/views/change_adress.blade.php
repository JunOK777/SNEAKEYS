@extends('layouts.app')
@section('content')
<div class="col-md-12">
  	<p style="font-size: 20px;">メールアドレス変更</p>
  	<form action="{{ route('change_email') }}" method="POST">
  		{!! csrf_field() !!}
  		<input style="width: 30em;" type="email" name="email">
  		<button type="submit">送信</button>
  	</form>
</div>
@stop