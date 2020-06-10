
var submit = document.querySelector('button');
var $form ;

function errorCallback(error) {
  console.log(JSON.stringify(error));
}

function cancelCallback() {
  console.log('Payment cancelled');
}

function completeCallback(resultIndicator) {
  
  $.post(window.location.origin+path_name+'/clients/createPayment',{address_id : $('.add_id').val() , 'resultIndicator' : resultIndicator},function(data){
    if(data.status == 'success')
    {
      location.href = data.returnUrl
    }
    else
    {
      $('.payment_error').css('display','block')
    }
  });
}
console.log(window.location.href)

// completeCallback = window.location.href

$(document).ready(function () {
    $('.form-row').css('display','block')
    $('.btn-pay').hide()
    if (location.hostname === "localhost" || location.hostname === "127.0.0.1"){
        path_name = '/aghezty_v2_php7'
    }

    $.get(window.location.origin+path_name+'/clients/ready_nbe',{address_id : $('.add_id').val()},function(data){

      Checkout.configure({
        merchant: 'EGPTEST1',
        order: {
          amount: function () {
            //Dynamic calculation of amount
            return data.total_price
          },
          currency: 'EGP',
          description: 'Ordered goods',
          id: data.order_id

        },
        session: {
              id: data.session_id
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

    });

})
$('#radioOne,#radioTwo,.cash').click(function(){
    $('.form-row').hide()
    $('.btn-pay').show()
})



window.onload = function(){
  setTimeout(loadAfterTime, 2000)
};


function loadAfterTime() { 
// code you need to execute goes here. 
Checkout.showLightbox();
}
