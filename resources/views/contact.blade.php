@extends('layouts.app')
@section('css')
<link href="{{ asset('css/index.css') }}" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

@endsection
@section('content')

<section id="request" class="section">
  <span id="request-link"></span>
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-md-9">
      <div class="section-header">
        <h2 class="section-title">お問い合わせ</h2>
        <hr class="lines wow zoomIn" data-wow-delay="0.3s">

            <!-- form -->
            <form id="contactForm-1" accept-charset="utf-8" >
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control" id="name" name="entry.746374166" placeholder="お名前" data-error="必須項目です">
                    <div class="help-block with-errors"></div>
                  </div>                                 
                </div>
                 <div class="col-md-12">
                  <div class="form-group">
                    <input type="email" placeholder="Email" id="email" class="form-control" name="entry.1558582620" data-error="必須項目です">
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group"> 
                    <textarea class="form-control" placeholder="内容" id="message" rows="11" data-error="必須項目です" name="entry.1679652808"></textarea>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="submit-button text-center">
                    <button class="btn btn-common" id="submit_form" type="submit">入力内容を送信</button>
                    <div id="msgSubmit" class="h3 text-center hidden"></div> 
                    <div class="clearfix"></div> 
                  </div>
                </div>
              </div>            
            </form>
            <!-- /form -->

          </div>
      </div>
    </div>
  </div>
</section>
@stop

@section('js')
<script src="{{ asset('js/contact.js') }}"></script>
@endsection