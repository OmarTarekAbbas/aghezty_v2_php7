@extends('frontv2.master')
@section('content')

<!-- Start Owl Carsoul -->

<!-- End Owl Carsoul -->

<style>
.head_two,
/* .head_three {z-index: unset;} */
</style>

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
            <button class="btn btn-link collapsed" id="collapsed_pay" type="button" data-toggle="collapse"
              data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
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
                <input type="hidden" name="address_id" class="add_id"
                  value="{{Auth::guard('client')->user()->cities[0]->id}}">
                @endif
                <div id="charge-error" class="alert alert-danger" style="display:none">
                </div>

                <div id="nbeclc" class="form-row" onclick="nbe_script();"
                  style="direction: {{dir_ar_en()}};display:none;text-align: center;">
                  <div class="">
                    <input type="hidden" id="ahly" value="Pay with Payment Page" onclick="Checkout.showLightbox();">
                    <img src="{{ url('public/frontv2/images/ahly.png') }}" width="170px" height="50px" alt="">
                  </div>
                </div>

                <p class="nbe_loading text-center text-uppercase font-weight-bold" style="display:none">@lang('front.loading')</p>
                <br>
                <div id="cibclc" class="form-row" onclick="cib_script();"
                  style="direction: {{dir_ar_en()}};display:none;text-align: center;">
                  <div class="">
                    <input type="hidden" id="cib" value="Pay with Payment Page" onclick="Checkout.showLightbox();">
                    <img src="{{ url('public/frontv2/images/cib.png') }}" width="170px" height="50px" alt="">
                  </div>
                </div>
                <p class="cib_loading text-center text-uppercase font-weight-bold" style="display:none">@lang('front.loading')</p>

                <button type="submit"
                  class="btn btn-primary btn-lg btn-block w-75 m-auto d-block hvr-wobble-to-bottom-right btn-pay"
                  style="display:none!important">@lang('front.paid_now')</button>
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



<script>
  var spinner = new jQuerySpinner({
    parentId: 'visa_fade'
  });
  document.getElementById("nbeclc").addEventListener("click", function(evt) {
    spinner.show();
    setTimeout(function() {
      spinner.hide();
    }, 6000);
  });
  document.getElementById("cibclc").addEventListener("click", function(evt) {
    spinner.show();
    setTimeout(function() {
      spinner.hide();
    }, 12000);
  });

</script>




<script>
  var order_id = '';
  var tran_id = '';
  var path_name = '';

  if (location.hostname === "localhost" || location.hostname === "127.0.0.1") {
    path_name = '/aghezty_v2_php7'
  }

  function loadScript(url, payment = '', callback) {
    var script = document.createElement("script")
    script.type = "text/javascript";
    script.setAttribute('data-error', "errorCallback" + payment);
    script.setAttribute('data-cancel', "cancelCallback" + payment);
    script.setAttribute('data-complete', "completeCallback" + payment);
    if (script.readyState) { // only required for IE <9
      script.onreadystatechange = function () {
        if (script.readyState === "loaded" || script.readyState === "complete") {
          script.onreadystatechange = null;
          callback();
        }
      };
    } else { //Others
      script.onload = function () {
        callback();
      };
    }

    script.src = url;
    document.getElementsByTagName("head")[0].appendChild(script);
  }
</script>

<script>
  function nbe_script() {
    $('.nbe_loading').show()

    loadScript("https://nbe.gateway.mastercard.com/checkout/version/56/checkout.js", "", function () {
      $.get(window.location.origin + path_name + '/clients/ready_nbe', {
        address_id: $('.add_id').val()
      }, function (data) {

        order_id = data.order_id
        tran_id = data.tran_id

        Checkout.configure({
          merchant: 'AGHEZTY',
          order: {
            amount: function () {
              //Dynamic calculation of amount
              return data.total_price
            },
            currency: 'EGP',
            description: 'Ordered goods',
            id: data.tran_id

          },
          session: {
            id: data.session_id
          },
          interaction: {
            operation: 'PURCHASE', // set this field to 'PURCHASE' for Hosted Checkout to perform a Pay Operation.
            merchant: {
              name: 'Aghezty',
              address: {
                line1: '200 Sample St',
                line2: '1234 Example Town'
              }
            }
          }
        });

        document.getElementById('ahly').onclick();

        $('.nbe_loading').hide()

      });
    });

    return false;
  }

  function errorCallback(error) {
    console.log(JSON.stringify(error));
    $.post(window.location.origin + path_name + '/clients/failPayment', {
      order_id: order_id,
      tran_id: tran_id
    }, function (data) {
      console.log(data);
    })
  }

  function cancelCallback() {
    console.log('Payment cancelled');
    $.post(window.location.origin + path_name + '/clients/canclePayment', {
      order_id: order_id,
      tran_id: tran_id
    }, function (data) {
      console.log(data);
    })
  }

  function completeCallback(resultIndicator) {

    $.post(window.location.origin + path_name + '/clients/createPayment', {
      order_id: order_id,
      tran_id: tran_id,
      'resultIndicator': resultIndicator
    }, function (data) {
      if (data.status == 'success') {
        location.href = data.returnUrl
      } else {
        $('.payment_error').css('display', 'block')
        $.post(window.location.origin + path_name + '/clients/failPayment', {
          order_id: order_id
        }, function (data) {
          console.log(data);
        })
      }
    });
  }
</script>

<script>
  function cib_script() {
    $('.cib_loading').show()

    loadScript("https://cibpaynow.gateway.mastercard.com/checkout/version/56/checkout.js", "cib", function () {
      $.get(window.location.origin + path_name + '/clients/ready_cib', {
        address_id: $('.add_id').val()
      }, function (data) {

        order_id = data.order_id
        tran_id = data.tran_id
        Checkout.configure({
          merchant: 'CIB700926',
          order: {
            amount: function () {
              //Dynamic calculation of amount
              return data.total_price
            },
            currency: 'EGP',
            description: 'Ordered goods',
            id: data.tran_id

          },
          session: {
            id: data.session_id
          },
          interaction: {
            operation: 'PURCHASE', // set this field to 'PURCHASE' for Hosted Checkout to perform a Pay Operation.
            merchant: {
              name: 'Aghezty',
              address: {
                line1: '200 Sample St',
                line2: '1234 Example Town'
              }
            }
          }
        });

        document.getElementById('cib').onclick();

        $('.cib_loading').hide()

      });
    });

    return false;
  }

  function errorCallbackcib(error) {
    console.log(JSON.stringify(error));
    $.post(window.location.origin + path_name + '/clients/failPayment', {
      order_id: order_id,
      tran_id: tran_id
    }, function (data) {
      console.log(data);
    })
  }

  function cancelCallbackcib() {
    console.log('Payment cancelled');
    $.post(window.location.origin + path_name + '/clients/canclePayment', {
      order_id: order_id,
      tran_id: tran_id
    }, function (data) {
      console.log(data);
    })
  }

  function completeCallbackcib(resultIndicator) {

    $.post(window.location.origin + path_name + '/clients/createPaymentCIB', {
      order_id: order_id,
      tran_id: tran_id,
      'resultIndicator': resultIndicator
    }, function (data) {
      if (data.status == 'success') {
        location.href = data.returnUrl
      } else {
        $('.payment_error').css('display', 'block')
      }
    });
  }

</script>

<script>
  $('#radioThree,.visa').click(function () {
    $('.form-row').css('display', 'block')
    $('.btn-pay').hide()
  })
  $('#radioOne,#radioTwo,.cash').click(function () {
    $('.form-row').hide()
    $('.btn-pay').show()
  })

</script>
@endsection
