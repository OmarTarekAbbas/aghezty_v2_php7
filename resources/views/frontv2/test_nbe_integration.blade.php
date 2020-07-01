<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <!--IE Compatibility Meta-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Mobile Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Mobile Meta -->
  <meta name="token" content="{{ csrf_token() }}">

  <title>Bank Al Ahely</title>

  <!-- jQuery JS -->
  <script src="{{url('public/frontv2/js/jquery-3.3.1.min.js')}}"></script>
  <!-- Bootstrap Popper JS -->
  <script src="{{url('public/frontv2/js/popper.min.js')}}"></script>

  {{-- <script type="text/javascript" src="https://test-nbe.gateway.mastercard.com/checkout/version/56/checkout.js"
  data-error="errorCallbackNBE"
  data-cancle="cancelCallbackNBE"
  data-complete="completeCallbackNBE">
  </script>

  <script type="text/javascript" src="https://cibpaynow.gateway.mastercard.com/checkout/version/56/checkout.js"
  data-error="errorCallbackCIB"
  data-cancle="cancelCallbackCIB"
  data-complete="completeCallbackCIB">
  </script> --}}



  @php
  /**************************** Order Data ********************************/
  $tran_id = time();
  $order = \App\Order::where('id',request()->get('order_id'))->first();
  $order->transaction_id = $tran_id;
  $order->save();
  /**************************** cib integration create session and successindecitor ********************************/
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, 'https://cibpaynow.gateway.mastercard.com/api/nvp/version/56');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS,
  "apiOperation=CREATE_CHECKOUT_SESSION&apiPassword=c9f7bfa67d53ad74fd59b5e18a1c4ce0&apiUsername=merchant.TESTCIB700926&interaction.operation=PURCHASE&merchant=TESTCIB700926&order.id=$tran_id&order.amount=$order->total_price&order.currency=EGP");

  $headers = array();
  $headers[] = 'Content-Type: application/x-www-form-urlencoded';
  $headers[] = 'Accept: application/json';

  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

  $response = curl_exec($ch);

  $result = explode('&', $response);
  $cib_sub_id = explode('=', array_reverse($result)[0])[1];
  $cib_session_id = explode('=', $result[2])[1];

  curl_close($ch);

  /**************************** nbe integration create session and successindecitor ********************************/
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, 'https://test-nbe.gateway.mastercard.com/api/nvp/version/56');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS,
  "apiOperation=CREATE_CHECKOUT_SESSION&apiPassword=61422445f6c0f954e24c7bd8216ceedf&apiUsername=merchant.EGPTEST1&interaction.operation=PURCHASE&merchant=EGPTEST1&order.id=$tran_id&order.amount=$order->total_price&order.currency=EGP");

  $headers = array();
  $headers[] = 'Content-Type: application/x-www-form-urlencoded';
  $headers[] = 'Accept: application/json';

  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

  $response = curl_exec($ch);

  $result = explode('&', $response);
  $nbe_sub_id = explode('=', array_reverse($result)[0])[1];
  $nbe_session_id = explode('=', $result[2])[1];

  curl_close($ch);

  @endphp

</head>

<body>
  <br><br><br><br><br><br><br><br>
  <div id="nbeclc" class="form-row" onclick="nbe_script();" style="text-align: center;">
    <div class="">
      <input type="hidden" id="ahly" value="Pay with Payment Page" onclick="Checkout.showLightbox();">
      <img src="{{ url('public/frontv2/images/ahly.png') }}" width="170px" height="50px" alt="">
    </div>
  </div>
  <p class="nbe_loading text-center" style="display:none">..... loading here</p>
  <br>
  <div id="cibclc" class="form-row" onclick="cib_script();" style="text-align: center;">
    <div class="">
      <input type="hidden" id="cib" value="Pay with Payment Page" onclick="Checkout.showLightbox();">
      <img src="{{ url('public/frontv2/images/cib.png') }}" width="170px" height="50px" alt="">
    </div>
  </div>
  <p class="cib_loading text-center" style="display:none">..... loading here</p>
  <script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
      }
    });
    var path_name = ''
    if (location.hostname === "localhost" || location.hostname === "127.0.0.1"){
        path_name = '/aghezty_v2_php7'
    }
    function loadScript(url,payment, callback) {
      var script = document.createElement("script")
      script.type = "text/javascript";
      script.setAttribute('data-error', "errorCallback"+payment);
      script.setAttribute('data-cancel', "cancelCallback"+payment);
      script.setAttribute('data-complete', "completeCallback"+payment);
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
      loadScript("https://test-nbe.gateway.mastercard.com/checkout/version/56/checkout.js","NBE", function() {
          Checkout.configure({
          merchant: 'EGPTEST1',
          order: {
            amount: function () {
              //Dynamic calculation of amount
              return {{$order->total_price}}
            },
            currency: 'EGP',
            description: 'Ordered goods',
            id: "{{$tran_id}}"

          },
          session: {
            id: '{{$nbe_session_id}}'
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
        })

       document.getElementById('ahly').onclick()

       $('.nbe_loading').hide()

      });

      return false;
    }

    function errorCallbackNBE(error) {
      console.log(JSON.stringify(error));
      $.post(window.location.origin + path_name + '/api/failPayment', {
        order_id: "{{$order->id}}" , tran_id : "{{$tran_id}}"
      }, function (data) {
        console.log(data);
      })
    }

    function cancelCallbackNBE() {
      console.log('Payment cancelled');
      $.post(window.location.origin + path_name + '/api/canclePayment', {
        order_id: "{{$order->id}}" , tran_id : "{{$tran_id}}"
      }, function (data) {
        console.log(data);
      })
    }

    function completeCallbackNBE(resultIndicator) {
      if(resultIndicator == "{{$nbe_sub_id}}"){
        console.log('ok');
      }
      $.post(window.location.origin + path_name + '/api/createPayment', {
        order_id: "{{$order->id}}" , tran_id : "{{$tran_id}}", type : 5
      }, function (data) {
          location.href = location.href + "/success"
      });
    }


  </script>

  <script>
    function cib_script() {
      $('.cib_loading').show()
      loadScript("https://cibpaynow.gateway.mastercard.com/checkout/version/56/checkout.js","CIB", function() {
        Checkout.configure({
          merchant: 'TESTCIB700926',
          order: {
            amount: function () {
              //Dynamic calculation of amount
              return {{$order->total_price}}
            },
            currency: 'EGP',
            description: 'Ordered goods',
            id: "{{$tran_id}}"

          },
          session: {
            id: "{{$cib_session_id}}"
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
        })
        document.getElementById('cib').onclick()
        $('.cib_loading').hide()
      })

      return false;
    }

    function errorCallbackCIB(error) {
      console.log(JSON.stringify(error));
      $.post(window.location.origin + path_name + '/api/failPayment', {
        order_id: "{{$order->id}}" , tran_id : "{{$tran_id}}"
      }, function (data) {
        console.log(data);
      })
    }

    function cancelCallbackCIB() {
      console.log('Payment cancelled');
      $.post(window.location.origin + path_name + '/api/canclePayment', {
        order_id: "{{$order->id}}" , tran_id : "{{$tran_id}}"
      }, function (data) {
        console.log(data);
      })
    }

    function completeCallbackCIB(resultIndicator) {
      if(resultIndicator == "{{$cib_sub_id}}"){
        console.log('ok');
      }
      $.post(window.location.origin + path_name + '/api/createPayment', {
        order_id: "{{$order->id}}" , tran_id : "{{$tran_id}}", type  : 4
      }, function (data) {
        location.href = location.href + "/success"
      });
    }


  </script>

</body>

</html>
