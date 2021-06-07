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
    <!-- Start Image Cover -->
      <div style="margin-top: 10%;">
            {{--  <div class="list_cover">
              @if(setting('contact_offer'))
              <img class="w-100 rounded" src="{{url(setting('contact_offer'))}}" alt="Cover" title="Apple" style="height: auto !important">
              @else
              <img class="w-100 rounded" src="{{url(setting('list_banner'))}}" alt="Cover" title="Apple" style="height: auto !important">
              @endif
            </div>  --}}
      </div>
    <!-- End Image Cover -->
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
              id="message" cols="10" rows="5"></textarea>
          </div>

          <div class="col-12">
            <p id="max_characters" style="color: green;"><strong>Max Characters: </strong><span> 55 </span></p>
            {!! app('captcha')->display() !!}
          </div>

          <div class="col-12">
            <button id="contact_submit" class="btn btn-secondary w-100 my-2 hvr-wobble-to-bottom-right">@lang('front.send')</button>
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

<script>
  // var check_submit = true;
  // var max_characters_number = 55;
  // $("#message").keyup(function(e) {
  //   if (e.keyCode !== 32) {
  //     var characters_count = document.getElementById("message").value.replace(/\s+/g, '').length;
  //     console.log(characters_count);

  //     if(characters_count > 55){
  //       check_submit = false;
  //       if(check_submit == false){
  //         $('#contact_submit').prop('disabled', true);
  //         document.getElementById("message").style.borderColor="#FF0000";
  //         document.getElementById("message").style.boxShadow = "#dc354561 0px 0px 0px 0.2rem";
  //         document.getElementById("max_characters").style.color="#FF0000";
  //       }
  //     }else{
  //       check_submit = true;
  //       if(check_submit == true){
  //         $('#contact_submit').prop('disabled', false);
  //         document.getElementById("message").style.borderColor="#ced4da";
  //         document.getElementById("message").style.boxShadow = "0 0 0 0.2rem rgb(107 111 115 / 25%)";
  //         document.getElementById("max_characters").style.color="green";

  //         if(e.keyCode == 8){
  //           max_characters_number = max_characters_number + 1;
  //         }else{
  //           max_characters_number = max_characters_number - 1;
  //         }

  //         $('#max_characters span').text(max_characters_number);
  //       }
  //     }
  //   }
  // });

  (function($) {
    $.fn.characterCounter = function(limit) {
      return this.filter("textarea").each(function() {
        var $this = $(this),
          checkCharacters = function(event) {

            if ($this.val().length > limit) {
              // Trim the string as paste would allow you to make it
              // more than the limit.
              $this.val($this.val().substring(0, limit))
              // Cancel the original event
              event.preventDefault();
              event.stopPropagation();
            }
          };

        $this.keyup(function(event) {
          // Keys "enumeration"
          var keys = {BACKSPACE: 8, TAB: 9, LEFT: 37, UP: 38, RIGHT: 39, DOWN: 40};

          // which normalizes keycode and charcode.
          switch (event.which) {
            case keys.UP:
            case keys.DOWN:
            case keys.LEFT:
            case keys.RIGHT:
            case keys.TAB:
              break;
            default:
              checkCharacters(event);
              break;
          }
        });

        // Handle cut/paste.
        $this.bind("paste cut", function(event) {
          // Delay so that paste value is captured.
          setTimeout(function() {
            checkCharacters(event);
            event = null;
          }, 150);
        });
      });
    };
  }(jQuery));

  $(document).ready(function () {
    $("textarea").characterCounter(55);
  });

  //if (filter_var($string, FILTER_VALIDATE_URL)) {}
</script>
@endsection
