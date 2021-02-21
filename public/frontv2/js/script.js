$(document).ready(function () {
  var header_header = $('.head_two').innerHeight();
  var header_display = $('.head_two').css('display');

  if (header_display !== 'none') {
    $('.head_three').css('top', header_header);
  }

  // if ($(window).width() < 1000) {
  //   $('.head_three').css('top', 0);
  // }
  // console.log(msg);
});

/* ===== Start Scroll to Top ==== */
$(window).scroll(function () {
  if ($(this).scrollTop() >= 50) { // If page is scrolled more than 50px
    $('#return-to-top').fadeIn(200); // Fade in the arrow
  } else {
    $('#return-to-top').fadeOut(200); // Else fade out the arrow
  }
});

$('#return-to-top').click(function () { // When arrow is clicked
  $('body,html').animate({
    scrollTop: 0 // Scroll to top of body
  }, 500);
});

$('.menu_click_up').click(function () { // When arrow is clicked
  $('body,html').animate({
    scrollTop: 0 // Scroll to top of body
  }, 100);
});
/* ===== End Scroll to Top ==== */

/* ===== Start List Product Accordion (Open & Close)  ==== */
$(document).on("click", '.accordion', function () {
  $(this).toggleClass("active");
  var panel = $(this).next();
  if ($(this).next().css('display') == 'none') {
    $(this).next().css('display', 'block')
  } else {
    $(this).next().css('display', 'none')
  }
})
/* ===== End List Product Accordion (Open & Close)  ==== */

/* ===== Start List Product Grid & List View  ==== */
$(document).ready(function () {
  function checkWidth() {
    var windowSize = $(window).width();
    if (windowSize <= 767) {
      $('#grid_list_two').on('click', function () {
        $('#grid_two .col-12').attr('class', 'col-6');
      });

      $('#grid_list_one').on('click', function () {
        $('#grid_two .col-6').attr('class', 'col-12');
      });

    } else {
      $('#grid_list_two').on('click', function () {
        $('#grid_two .col-md-6').attr('class', 'col-md-4');
        $('#grid_two img').attr('class', 'w-auto d-block m-auto');
        $('#grid_two h6').attr('class', 'full_desc text-dark text-center text-capitalize');
      });

      $('#grid_list_one').on('click', function () {
        $('#grid_two .col-md-4').attr('class', 'col-md-6');
        $('#grid_two img').attr('class', 'w-50 d-block m-auto');
        $('#grid_two h6').attr('class', 'full_desc text-dark text-left text-capitalize');
      });
    }
  }
  // Execute on load
  checkWidth();
  // Bind event listener
  $(window).resize(checkWidth);
});

// changes from plus to minus In PC View
$(document).ready(function () {
  $(document).on('click', '#toggle_plus_minus button', function () {
    $(this).children().toggleClass("fa-minus");
  });
});

// changes from plus to minus In Mobile View
$(document).ready(function () {
  $(document).on('click', '#toggle_plus_minus button', function () {
    $(this).children().toggleClass("fa-plus");
  });
});

// changes Animation From Right To Left In Mobile View
$("#button_jq").click(function () {
  var x = $("#exampleModal").css('display');
  if (x != 'none') {
    $("#exampleModal").addClass("slide-out-right");
  } else {
    $("#exampleModal").addClass("slide-right");
    $("#exampleModal").removeClass("slide-out-right");
  }
  // $("#exampleModal").removeClass("slide-out-right");
});

// Close Modal In Mobile View
$(".close_modal").click(function () {
  $("#exampleModal").removeClass("slide-right");
  $("#exampleModal").addClass("slide-out-right");
});
/* ===== End List Product Grid & List View  ==== */

/* ===== Start List Product Grid & List View Color Change  ==== */
$(document).ready(function () {
  $('.grid_list a i').click(function () {
    $('a i').removeClass("active_grid");
    $(this).addClass("active_grid");
  });
});
/* ===== End List Product Grid & List View Color Change  ==== */

/* ===== Start Active Tab In Login & Register Page ==== */
$(document).ready(function () {
  $('.register_tap').click(function () {
    $('#register-tab').addClass("active");
    $("#login-tab").removeClass("active");

    $('#register').addClass("active");
    $("#login").removeClass("active");
  });
});
/* ===== End Active Tab In Login & Register Page ==== */

/********************start inc and decr*********************/

$('.np-plus').click(function () {
  var x = parseInt($('.quantity-input').val()) + 1;
  $('.quantity-input').val(x);
})

$('.np-minus').click(function () {
  var x = parseInt($('.quantity-input').val()) - 1;
  if (x > 0)
    $('.quantity-input').val(x);
})

/********************end inc and decr*********************/

/********************start slider*********************/

// Instantiate EasyZoom instances
var $easyzoom = $('.easyzoom').easyZoom();

// Setup thumbnails example
var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

$('.thumbnails').on('click', 'a', function (e) {
  var $this = $(this);

  e.preventDefault();

  // Use EasyZoom's `swap` method
  api1.swap($this.data('standard'), $this.attr('href'));
});

// Setup toggles example
var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');

$('.toggle').on('click', function () {
  var $this = $(this);

  if ($this.data("active") === true) {
    $this.text("Switch on").data("active", false);
    api2.teardown();
  } else {
    $this.text("Switch off").data("active", true);
    api2._init();
  }
});

$('.c-slide').click(function () {
  var x = $(this).children().attr('src');
  // console.log(x);
  $(".zoom_image img").attr("src", x);
  $(".zoom_image img").attr("src", x);

});
/********************end slider*********************/

$('.star-input').click(function () {
  $(this).parent()[0].reset();
  var prevStars = $(this).prevAll();
  var nextStars = $(this).nextAll();
  prevStars.attr('checked', true);
  nextStars.attr('checked', false);
  $(this).attr('checked', true);
  $('#rate_fo').val(($(this).prevAll().length / 2) + 1)
});

$('.star-input-label').on('mouseover', function () {
  var prevStars = $(this).prevAll();
  prevStars.addClass('hovered');
});
$('.star-input-label').on('mouseout', function () {
  var prevStars = $(this).prevAll();
  prevStars.removeClass('hovered');
});

/* Start container & container-fluid */
$(document).ready(function () {
  function checkWidth() {
    var windowSize = $(window).width();
    if (windowSize <= 1024) {
      $('.mobile_views').addClass('container');
      $('.mobile_views').removeClass('container-fluid');
    } else {
      $('.mobile_views').addClass('container-fluid');
      $('.mobile_views').removeClass('container');
    }
  }
  // Execute on load
  checkWidth();
  // Bind event listener
  $(window).resize(checkWidth);
});
/* End container & container-fluid */

/* ===== Start Menu Mobile Accordion (Open & Close)  ==== */
var acc = document.getElementsByClassName("accordion_two");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function () {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}

$(document).ready(function () {
  $('#mobile_nav .accordion_two').click(function () {
    $(this).children().toggleClass("fa-minus");
  });
  $('#mobile_nav .accordion_two').click(function () {
    $(this).children().toggleClass("fa-plus");
  });
});
/* ===== End Menu Mobile Accordion (Open & Close)  ==== */

/* ===== Start Payment Method  ==== */
var submit = document.querySelector('button');
var $form;
// $('#radioThree').click(function () {
//   $('.form-row').show()
//   $('#checkout-form').addClass('stripe_form')
//   $('.btn-block').prop('disabled', false)
//   path_name = '';
//   if (location.hostname === "localhost" || location.hostname === "127.0.0.1") {
//     path_name = '/aghezty_php7'
//   }
//   $.get(window.location.origin + path_name + '/token', function (data) {
//     $('meta[name="api_token"]').attr('content', data)
//     braintree.client.create({
//       authorization: $('meta[name="api_token"]').attr('content')
//     }, function (clientErr, clientInstance) {
//       if (clientErr) {
//         console.error(clientErr);
//         return;
//       }

//       // This example shows Hosted Fields, but you can also use this
//       // client instance to create additional components here, such as
//       // PayPal or Data Collector.

//       braintree.hostedFields.create({
//         client: clientInstance,
//         styles: {
//           'input': {
//             'font-size': '14px'
//           },
//           'input.invalid': {
//             'color': 'red'
//           },
//           'input.valid': {
//             'color': 'green'
//           }
//         },
//         fields: {
//           number: {
//             selector: '#card-number',
//             placeholder: '4111 1111 1111 1111'
//           },
//           cvv: {
//             selector: '#cvv',
//             placeholder: '123'
//           },
//           expirationDate: {
//             selector: '#expiration-date',
//             placeholder: '10/2019'
//           }
//         }
//       }, function (hostedFieldsErr, hostedFieldsInstance) {
//         if (hostedFieldsErr) {
//           console.error(hostedFieldsErr);
//           return;
//         }

//         submit.removeAttribute('disabled');
//         $(document).bind('submit', '.stripe_form', function (event) {
//           if (document.querySelector('#nonce').value || !$('#checkout-form').hasClass('stripe_form')) {
//             $('.btn-block').trigger('click');
//             return;
//           }
//           event.preventDefault();

//           hostedFieldsInstance.tokenize(function (tokenizeErr, payload) {
//             if (tokenizeErr) {
//               console.error(tokenizeErr.message);
//               $('#charge-error').html(tokenizeErr.message).show()
//               return;
//             }

//             // If this was a real integration, this is where you would
//             // send the nonce to your server.
//             // console.log('Got a nonce: ' + payload.nonce);
//             document.querySelector('#nonce').value = payload.nonce;
//             $('#charge-error').hide()
//             $('.stripe_form').submit()

//           });
//         }, false);
//       });
//     });
//   });
// })
// $('#radioOne,#radioTwo').click(function () {
//   $('.form-row').hide()
//   $('.stripe_form').unbind('submit')
//   $('#checkout-form').removeClass('stripe_form')
//   $('#checkout-form').unbind('submit')
//   $('.btn-block').prop('disabled', false)
// })
/* ===== End Payment Method  ==== */

/* Start Active Menu */
$(function () {
  // this will get the full URL at the address bar
  var url = window.location.href;

  // passes on every "a" tag
  $("#sub-header .nav_link2").each(function () {
    // checks if its the same on the address bar
    if (url == (this.href)) {
      $(this).closest("li").addClass("active_menu");
    }
  });
});

$(function () {
  // this will get the full URL at the address bar
  var url = window.location.href;

  // passes on every "a" tag
  $(".new_head a").each(function () {
    // checks if its the same on the address bar
    if (url == (this.href)) {
      $(this).closest("a").addClass("active_menu");
    }
  });
});
/* End Active Menu */

/* Start Upload Img */
var openFile = function (event) {
  var input = event.target;
  console.log('good');
  var reader = new FileReader();
  reader.onload = function () {
    var dataURL = reader.result;
    var output = document.getElementById('output');
    output.src = dataURL;
  };
  reader.readAsDataURL(input.files[0]);
};

function _upload() {
  document.getElementById('file_upload_id').click();
}
/* End Upload Img */

/* Start Cart Page */
$('.item-delete').click(function () {
  $(this).parent().parent().html('');
})

$(".item-quantity").on("change paste keyup", function () {

  var x = $(this).parent().siblings('.item-price').html();
  var y = $(this).val();

  $(this).parent().siblings('.item-total').html(x * y)
  var z = 0;
  $('.item-total').each(function () {
    z += parseFloat($(this).text());
  });
  $('.cart-total').html(z);

  var pay = parseFloat($('.cart-total').html()) + parseFloat($('.shipping-total').html());

  $('.pay').html(pay);
});

var x = $('.summary').children().children('.item-price').html();

$('.summary').children().children('.item-total').html(x)
var z = 0;
$('.item-total').each(function () {
  z += parseFloat($(this).text());
});
/* End Cart Page */

/* Start Slider */
// owl.owlCarousel({
//   items: 1,
//   center: true,
//   loop: true,
//   autoplay: true,
//   autoplayTimeout: 5000,
//   autoplayHoverPause: true,
//   // margin: 10,
//   nav: true,
//   animateOut: 'lightSpeedOut',
//   animateIn: 'lightSpeedIn',
//   // smartSpeed: 1000,
// });

// var owl = $('.fadeOut');
$(document).ready(function ($) {
  $('.fadeOut').owlCarousel({
    items: 1,
    center: true,
    loop: true,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    // margin: 10,
    nav: true,
    animateOut: 'lightSpeedOut',
    animateIn: 'lightSpeedIn',
    //     smartSpeed: 1000,
  });
});

$('.play').on('click', function () {
  owl.trigger('play.fadeOut.autoplay', [5000])
});

$('.stop').on('click', function () {
  owl.trigger('stop.fadeOut.autoplay')
});
/* End Slider */

/* Start Add Your Review Focus To Input Nickname */
$('#go_to_nickname').click(function (evt) {
  $('input#focus_to_review').removeAttr('placeholder');
  $("input#focus_to_review").focus();
  evt.preventDefault();
});
/* End Add Your Review Focus To Input Nickname */

/* Start jQuery slide toggle menu */
$(document).ready(function () {
  /* $(".slide_toggle").click(function () {
      var target = $(this).parent().children(".slideContent");
      $(target).parent().siblings().children(".slideContent").slideUp(500);
      $(target).not().parent().children(".slideContent").slideToggle();
  }); */

  $("img.lazy").Lazy();
  $(document).ajaxStop(function () {
    $("img.lazy").Lazy({
      effect: "fadeIn"
    }).removeClass("lazy");
  });
});

$('.owl_brands').owlCarousel({
  rtl: true,
  loop: true,
  autoplay: true,
  autoplayTimeout: 3000,
  margin: 5,
  nav: true,
  dots: false,
  center: false,
  responsive: {
    0: {
      items: 3,
      center: true,
      margin: 0,
    },
    600: {
      items: 4,
      margin: 0,
    },
    1200: {
      items: 4,
      margin: 0,
    },
    1201: {
      items: 8,
      // margin: 0,
    }
  }
})

// $(document).ready(function () {
//   $(".slide_toggle").click(function () {
//     var target = $(this).parent().children(".slideContent");
//     $(target).parent().siblings().slideToggle();
//   });
// });
/* End jQuery slide toggle menu */


/* Start Close Menu when Open Filter */
$(document).on("click", '#button_jq', function () {
  if ($('.collapse').is(":visible")) {
    $('.menu_click_up').click();
  }
});
/* End Close Menu when Open Filter */
