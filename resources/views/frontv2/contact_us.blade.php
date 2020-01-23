@extends('frontv2.master')

@section('style')
<style>
.mapouter {
  position: relative;
  text-align: right;
  height: auto;
  width: 100%;
}

.gmap_canvas {
  overflow: hidden;
  background: none !important;
  height: auto;
  width: 100%;
}
</style>
@endsection

@section('content')

<!-- main content -->
<div class="main p-0">
  <div class="mobile_views">
    <h2 class="text-center mt-4">Contact Us</h2>
    <div class="call-center w-100 m-auto p-3 hvr-wobble-to-bottom-right">
      <a href="tel:{{ setting('phone') }}">
        <span class="font-weight-bold">{{ setting('phone') }}</span>
        <i class="fas fa-phone fa-2x"></i>
      </a>
    </div>

    <div class="call-center w-100 m-auto p-3 hvr-wobble-to-bottom-right">
      <a href="mailto:{{ setting('mail') }}">
        <span class="font-weight-bold">{{ setting('mail') }}</span>
        <i class="far fa-envelope fa-2x"></i>
      </a>
    </div>
    @if(Session::get('applocale') == 'en')
      <style>
        .font-weight-bold p{
          float:left
        }
      </style>
    @endif
    <div class="call-center w-100 m-auto p-3 hvr-wobble-to-bottom-right">
      <a>
          <span class="font-weight-bold">{!! setting_2('address') !!}</span>
          <i class="fas fa-map-marker-alt fa-2x"></i>
      </a>
    </div>
    <div class="border-bottom border-dark my-5"></div>

    <div class="mapouter">
      <h2 class="text-center">@lang('front.found')</h2>
      <div id="map" style="height: 500px;overflow:hidden"></div>
    </div>


    <div class="border-bottom border-dark my-5"></div>
    @if(Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>@lang('front.success')!</strong> {{Session::get('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @include('errors')
    <div class="your_comments w-100 p-3 rounded">
      <form action="{{url('clients/contact')}}" method="post">
        @csrf
        <h1 class="text-center">@lang('front.contact')</h1>

        <div class="row m-0">
          <div class="col-md-6 col-lg-6 col-xl-6 col-12">
            <input type="text" name="name" class="form-control my-2 hvr-float" placeholder="@lang('front.auth.name')">
          </div>

          <div class="col-md-6 col-lg-6 col-xl-6 col-12">
            <input type="email" name="email" class="form-control my-2 hvr-float"
              placeholder="@lang('front.auth.email')">
          </div>

          <div class="col-md-12 col-lg-12 col-xl-12 col-12">
            <input type="tel" name="phone" class="form-control my-2 hvr-float" placeholder="@lang('front.auth.phone')">
          </div>

          <div class="col-12">
            <textarea placeholder="@lang('front.auth.message')" class="form-control w-100 my-2 hvr-float" name="message"
              id="" cols="10" rows="5"></textarea>
          </div>

          <div class="col-12">
            <button class="btn btn-secondary w-100 my-2 hvr-wobble-to-bottom-right">@lang('front.send')</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('script')
<script type="text/javascript"
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVMkBopYgU1husR7s-iO2ngqirxVSZdw8"></script>
<script type="text/javascript" src="{{url('js/map.js')}}"></script>
<script>
  google.maps.event.addDomListener(window, 'load', initMap('{{explode(',',setting('location'))[0]}}' , '{{explode(',',setting('location'))[1]}}'));
</script>
@endsection
