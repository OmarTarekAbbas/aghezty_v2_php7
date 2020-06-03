<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
	<!--IE Compatibility Meta-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Mobile Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Bank Al Ahely</title>
  <script src="https://test-nbe.gateway.mastercard.com/checkout/version/56/checkout.js"
    data-error="errorCallback"
    data-cancel="cancelCallback"
    data-complete = "completeCallback">
  </script>

  @php
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://test-nbe.gateway.mastercard.com/api/rest/version/56/merchant/EGPTEST1/session",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_HTTPHEADER => array(
            "Accept: application/json",
            "Content-Type: application/json",
            "Authorization: Basic bWVyY2hhbnQuRUdQVEVTVDE6NjE0MjI0NDVmNmMwZjk1NGUyNGM3YmQ4MjE2Y2VlZGY=",
            "Cookie: TS0183aa3c=01772feb4bbad78180282345abfd6a199727ca0c704ae9899c3331f65d08dc9ede999e96d5d7249211f43665574cb69ab835af2287"
          ),
        ));

        $response = curl_exec($curl);

        $result   = json_decode($response) ;

        curl_close($curl);

        $session_id = $result->session->id;
  @endphp

  <script type="text/javascript">
    function errorCallback(error) {
      console.log(JSON.stringify(error));
    }

    function cancelCallback() {
      console.log('Payment cancelled');
    }

    completeCallback = "{{ url()->current() }}"

    Checkout.configure({
      merchant: 'EGPTEST1',
      order: {
        amount: function () {
          //Dynamic calculation of amount
          return 80 + 20;
        },
        currency: 'EGP',
        description: 'Ordered goods',
        id: '{{ rand(1111,9999) }}'
      },
      session: {
            id: "{{ $session_id }}"
       },
      interaction: {
        operation: 'PURCHASE', // set this field to 'PURCHASE' for Hosted Checkout to perform a Pay Operation.
        merchant: {
          name: 'NBE Test',
          address: {
            line1: '200 Sample St',
            line2: '1234 Example Town'
          }
        }
      }
    });

  </script>
</head>

<body>
  ...
  <input type="button" value="Pay with Lightbox" onclick="Checkout.showLightbox();" />
  <input type="button" value="Pay with Payment Page" onclick="Checkout.showPaymentPage();" />
  ...
</body>

</html>
