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
  /* Start Thank_You Page */
@media (min-width: 992px) and (max-width: 1199.98px), (min-width: 1200px) {
  .thank-you {
    margin-top: 0 !important;
  }
  .thank-you .thank-you-title,
.thank-you .thank-you-successfully {
    margin-top: 5% !important;
  }
  .thank-you .thank-you-button .btn {
    margin-top: 3% !important;
  }
}
.thank-you {
  margin-top: 25%;
}
.thank-you .circle {
  width: 100px;
  height: 100px;
  margin: auto;
  position: relative;
}
.thank-you .circle i {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
.thank-you .thank-you-title,
.thank-you .thank-you-successfully {
  color: #f3e5b8;
  margin-top: 10%;
}
.thank-you .thank-you-button .btn {
  border-radius: 25px;
  margin-top: 18%;
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
