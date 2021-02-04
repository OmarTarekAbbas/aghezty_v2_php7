@extends('frontv2.master')

@section('content')
<style>
  .main,
  .footer_footer {
    background: #fe9901;
  }

  .error_page {
    margin-top: 4%;
  }

  .error_page .error {
    margin-bottom: 1.5rem;
  }

  .error_page h1 .borderBottom {
    border-bottom: 3px solid #FFF;
    width: 50%;
    margin: 0 auto;
  }

  .back_home {
    margin-top: 2rem !important;
    margin-bottom: 1rem !important;
  }

  .back_home button {
    color: #fe9901;
    background: #fff;
    font-size: 1.5rem !important;
  }

  .back_home button:focus {
    box-shadow: 0 0 0 0.2rem rgb(52, 58, 64);
  }

  @media (min-width: 320px) and (max-width: 415px) {
    .error_page h1 .borderBottom {
      width: 100%;
    }

    .error_page .error2 {
      font-size:2rem !important;
    }

    .error_page h5 {
      font-size: 1.25rem !important;
    }
  }
</style>

<div class="main">

  <div class="error_page">
    <div class="mobile_views">
      <h1 class="error text-center text-white font-weight-bold" style="font-size: 4.5rem;">404
        <div class="borderBottom"></div>
      </h1>

      <h1 class="error error2 text-center text-white text-uppercase font-weight-bold" style="font-size:3.5rem;">@lang('front.page')</h1>
      <h5 class="text-center text-white text-uppercase" style="font-size:1.8rem;">@lang('front.was_not_found')</h5>

      <div class="back_home">
      <button onclick="location.href='{{url("/")}}'" class="btn text-capitalize m-auto d-block">@lang('front.back') @lang('front.home')</button>
      </div>


    </div>
  </div>
</div>
@endsection
