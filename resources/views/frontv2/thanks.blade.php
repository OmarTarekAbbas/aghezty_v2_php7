@extends('frontv2.master')
@section('content')
<style>
  body {
      background-image: url('{{asset("front/img/BG.png")}}');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed;
  }
  </style>
<!-- main content -->
<div class="main">
	<div class="mobile_views">
    <div class="thank-you">
      <div class="circle rounded-circle bg-success text-white">
          <i class="fas fa-check fa-4x"></i>
      </div>

      <div class="thank-you-title text-center">
          <h3>@lang('front.thanks_for_your_request')</h3>
      </div>

      <div class="thank-you-successfully text-center">
          <h3>@lang('front.ready_order')</h3>
      </div>

      <div class="thank-you-button text-center">
          <a href="{{route('front.home.index')}}" class="btn btn-secondary btn-lg btn-block"> @lang('front.back') @lang('front.home')</a>
      </div>
  </div>
	</div>
</div>
@endsection
