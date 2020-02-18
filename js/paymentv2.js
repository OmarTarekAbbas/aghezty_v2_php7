
var submit = document.querySelector('button');
var $form ;
$('#radioThree,.visa').click(function(){
    $('.form-row').show()
    $('.btn-pay').attr('style','display:none !important');
  if($('.has').hasClass('paypal-button')){
    if (location.hostname === "localhost" || location.hostname === "127.0.0.1"){
        path_name = '/aghezty_v2_php7'
    }
    paypal.Button.render({
        env: 'sandbox', // Or 'production'
        style: {
          size: 'small',
          color: 'gold',
          shape: 'pill',
        },
        // Set up the payment:
        // 1. Add a payment callback
        payment: function(data, actions) {
          // 2. Make a request to your server
          return actions.request.post(window.location.origin+path_name+'/create_paymentv2?address_id='+$('.add_id').val())
            .then(function(res) {
              // 3. Return res.id from the response
              // console.log(res);
              return res.id;
            });
        },
        // Execute the payment:
        // 1. Add an onAuthorize callback
        onAuthorize: function(data, actions) {
          // 2. Make a request to your server
          return actions.request.post(window.location.origin+path_name+'/execute_paymentv2', {
            paymentID: data.paymentID,
            payerID:   data.payerID
          })
            .then(function(res) {
              console.log(res);
              $('#checkout-form').submit()
            });
        }
    }, '#paypal-button');
    $('#paypal-button').removeClass('paypal-button')
    $('#paypal-button').removeAttr('id')
  }
})
$('#radioOne,#radioTwo,.cash').click(function(){
    $('.form-row').hide()
    $('.btn-pay').show()
})


