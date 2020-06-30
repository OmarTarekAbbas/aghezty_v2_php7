
var submit = document.querySelector('button');
var $form ;
var order_id = '';
var tran_id = '';

function errorCallbackcib(error) {
  console.log(JSON.stringify(error));
  $.post(window.location.origin+path_name+'/clients/failPayment',{order_id : order_id ,tran_id : tran_id},function(data){
    console.log(data);
  })
}

function cancelCallbackcib() {
  console.log('Payment cancelled');
  $.post(window.location.origin+path_name+'/clients/canclePayment',{order_id : order_id ,tran_id : tran_id},function(data){
    console.log(data);
  })
}

function completeCallbackcib(resultIndicator) {

  $.post(window.location.origin+path_name+'/clients/createPaymentCIB',{order_id : order_id ,tran_id : tran_id , 'resultIndicator' : resultIndicator},function(data){
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

    $.get(window.location.origin+path_name+'/clients/ready_cib',{address_id : $('.add_id').val()},function(data){

      order_id = data.order_id
      tran_id  = data.tran_id 
      Checkout.configure({
        merchant: 'TESTCIB700926',
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

    });
});
$('#radioOne,#radioTwo,.cash').click(function(){
    $('.form-row').hide()
    $('.btn-pay').show()
})

// window.onload = function(){
//   setTimeout(loadAfterTime, 2000)
// };


// function loadAfterTime() {
// // code you need to execute goes here.
// Checkout.showLightbox();
// }
