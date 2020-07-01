@extends('frontv2.master')
@section('content')

<!-- Start Owl Carsoul -->

<!-- End Owl Carsoul -->

<div class="main" id="visa_fade">
  <div class="mobile_views">
    <div class="status_title my-3">
      <h4 class="text-center border-bottom border-secondary w-25 m-auto">@lang('front.choose_payment')</h4>
    </div>
    @include('errors')
    <div class="alert alert-danger alert-dismissible payment_error" style="display:none">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      Error In Payemnt Please Try Again
    </div>
    <section class="choose-address">
      <div class="accordionn" id="accordionExample">
        <div class="card">
          <div class="card-header" id="headingThree">
            <button class="btn btn-link collapsed" id="collapsed_pay" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              Select Payment Method</button>
          </div>

          <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
              <div class="choose-visa input-group w-75 m-auto d-block rounded px-2 py-1 hvr-wobble-to-bottom-right">
                <div class="visa-cash input-group-prepend cash" for="radioOne">
                  <span class="span_input_radio">
                    <input type="radio" name="payment" value="1" form="checkout-form" id="radioOne">
                  </span>

                  <span class="span_font_icon">
                    <span class="far fa-handshake fa-lg"></span>
                  </span>

                  <span class="span_label_cash">
                    <label for="radioOne">@lang('front.cash')</label>
                  </span>
                </div>
              </div>

              <div class="choose-visa input-group w-75 m-auto d-block rounded px-2 py-1 hvr-wobble-to-bottom-right">
                <div class="visa-cash input-group-prepend cash" for="radioTwo">
                  <span class="span_input_radio">
                    <input type="radio" name="payment" value="3" form="checkout-form" id="radioTwo">
                  </span>

                  <span class="span_font_icon">
                    <i class="fab fa-cc-visa"></i>
                  </span>

                  <span class="span_label_cash">
                    <label for="radioTwo">@lang('front.visa_after_deliver')</label>
                  </span>
                </div>
              </div>

              <div class="choose-visa input-group w-75 m-auto d-block rounded px-2 py-1 hvr-wobble-to-bottom-right">
                <div class="visa-cash input-group-prepend visa" for="radioThree">
                  <span class="span_input_radio ">
                    <input type="radio" name="payment" value="" form="checkout-form" id="radioThree">
                  </span>

                  <span class="span_font_icon">
                    <i class="fab fa-cc-visa"></i>
                  </span>

                  <span class="span_label_cash">
                    <label for="radioThree">@lang('front.visa')</label>
                  </span>
                </div>
              </div>

              <form action="{{route('front.home.checkout.submit')}}" id="checkout-form" method="POST">
                {{ csrf_field() }}
                @if(isset($_REQUEST['address_id']))
                <input type="hidden" name="address_id" class="add_id" value="{{$_REQUEST['address_id']}}">
                @else
                <input type="hidden" name="address_id" class="add_id" value="{{Auth::guard('client')->user()->cities[0]->id}}">
                @endif
                <div id="charge-error" class="alert alert-danger" style="display:none">
                </div>

                <div id="nbeclc" class="form-row" onclick="nbe_script();" style="direction: {{dir_ar_en()}};display:none;text-align: center;">
                  <div class="">
                    <input type="hidden" id="ahly" value="Pay with Payment Page" onclick="Checkout.showLightbox();">
                    <img src="{{ url('public/frontv2/images/ahly.png') }}" width="170px" height="50px" alt="">
                  </div>
                </div>

                <p class="nbe_loading text-center text-uppercase font-weight-bold" style="display:none">loading</p>
                <br>
                <div id="cibclc" class="form-row" onclick="cib_script();" style="direction: {{dir_ar_en()}};display:none;text-align: center;">
                  <div class="">
                    <input type="hidden" id="cib" value="Pay with Payment Page" onclick="Checkout.showLightbox();">
                    <img src="{{ url('public/frontv2/images/cib.png') }}" width="170px" height="50px" alt="">
                  </div>
                </div>
                <p class="cib_loading text-center text-uppercase font-weight-bold" style="display:none">loading</p>

                <button type="submit" class="btn btn-primary btn-lg btn-block w-75 m-auto d-block hvr-wobble-to-bottom-right btn-pay" style="display:none!important">@lang('front.paid_now')</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>

@endsection
@section('script')
{{-- <script id="switch" src="https://test-nbe.gateway.mastercard.com/checkout/version/56/checkout.js"
		data-error="errorCallback"
		data-cancel="cancelCallback"
		data-complete = "completeCallback">
  </script> --}}
{{-- <script src="{{asset('js/paymentv2.js')}}"></script> --}}
<script>
  function nbe_script() {
    $('.nbe_loading').show()
    var script1 = document.createElement("script");
    script1.type = "text/javascript";
    script1.src = "https://test-nbe.gateway.mastercard.com/checkout/version/56/checkout.js";
    script1.setAttribute('data-error', "errorCallback");
    script1.setAttribute('data-cancle', "cancelCallback");
    script1.setAttribute('data-complete', "completeCallback");
    document.getElementsByTagName("body")[0].appendChild(script1);

    var script = document.createElement("script");
    script.type = "text/javascript";
    script.src = "{{asset('js/paymentv2.js')}}";
    document.getElementsByTagName("body")[0].appendChild(script);

    return false;
  }
</script>
{{-- <script src="https://cibpaynow.gateway.mastercard.com/checkout/version/56/checkout.js"
			data-error="errorCallbackcib"
			data-cancel="cancelCallbackcib"
			data-complete = "completeCallbackcib">
  </script> --}}
{{-- <script src="{{asset('js/paymentcibv2.js')}}"></script> --}}
<script>
  function cib_script() {
    $('.cib_loading').show()
    var script1 = document.createElement("script");
    script1.type = "text/javascript";
    script1.src = "https://cibpaynow.gateway.mastercard.com/checkout/version/56/checkout.js";
    script1.setAttribute('data-error', "errorCallbackcib");
    script1.setAttribute('data-cancle', "cancelCallbackcib");
    script1.setAttribute('data-complete', "completeCallbackcib");
    document.getElementsByTagName("body")[0].appendChild(script1);

    var script = document.createElement("script");
    script.type = "text/javascript";
    script.src = "{{asset('js/paymentcibv2.js')}}";
    document.getElementsByTagName("body")[0].appendChild(script);
    return false;
  }
</script>

<script>
  $('#radioThree,.visa').click(function() {
    $('.form-row').css('display', 'block')
    $('.btn-pay').hide()
  })
  $('#radioOne,#radioTwo,.cash').click(function() {
    $('.form-row').hide()
    $('.btn-pay').show()
  })
</script>
@endsection
