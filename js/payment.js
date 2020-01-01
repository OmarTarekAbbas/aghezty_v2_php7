
var submit = document.querySelector('button');
var $form ;
$('#radioThree').click(function(){
    $('.form-row').show()
    $('#checkout-form').addClass('stripe_form')
    $('.btn-block').prop('disabled',false)
    path_name = '';
    if (location.hostname === "localhost" || location.hostname === "127.0.0.1"){
        path_name = '/aghezty_php7'
    }
    $.get(window.location.origin+path_name+'/token',function(data){
        $('meta[name="api_token"]').attr('content',data)
        braintree.client.create({
            authorization: $('meta[name="api_token"]').attr('content')
          }, function (clientErr, clientInstance) {
            if (clientErr) {
              console.error(clientErr);
              return;
            }

            // This example shows Hosted Fields, but you can also use this
            // client instance to create additional components here, such as
            // PayPal or Data Collector.

            braintree.hostedFields.create({
              client: clientInstance,
              styles: {
                'input': {
                  'font-size': '14px'
                },
                'input.invalid': {
                  'color': 'red'
                },
                'input.valid': {
                  'color': 'green'
                }
              },
              fields: {
                number: {
                  selector: '#card-number',
                  placeholder: '4111 1111 1111 1111'
                },
                cvv: {
                  selector: '#cvv',
                  placeholder: '123'
                },
                expirationDate: {
                  selector: '#expiration-date',
                  placeholder: '10/2019'
                }
              }
            }, function (hostedFieldsErr, hostedFieldsInstance) {
              if (hostedFieldsErr) {
                console.error(hostedFieldsErr);
                return;
              }

              submit.removeAttribute('disabled');
              $(document).bind('submit','.stripe_form',function(event) {
                  if(document.querySelector('#nonce').value || !$('#checkout-form').hasClass('stripe_form')){
                      $('.btn-block').trigger('click');
                      return ;
                  }
                event.preventDefault();

                hostedFieldsInstance.tokenize(function (tokenizeErr, payload) {
                  if (tokenizeErr) {
                    console.error(tokenizeErr.message);
                    $('#charge-error').html(tokenizeErr.message).show()
                    return;
                  }

                  // If this was a real integration, this is where you would
                  // send the nonce to your server.
                  // console.log('Got a nonce: ' + payload.nonce);
                  document.querySelector('#nonce').value = payload.nonce;
                  $('#charge-error').hide()
                 $('.stripe_form').submit()

                });
              }, false);
            });
          });
    });
})
$('#radioOne,#radioTwo').click(function(){
    $('.form-row').hide()
    $('.stripe_form').unbind('submit')
    $('#checkout-form').removeClass('stripe_form')
    $('#checkout-form').unbind('submit')
    $('.btn-block').prop('disabled',false)
})


$(document).ready(function(){

})
