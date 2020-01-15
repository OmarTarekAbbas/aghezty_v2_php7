/* global $, window, document */
// ************************************************
// Shopping Cart API
// ************************************************

var shoppingCart = (function () {
  // =============================
  // Private methods and propeties
  // =============================
  cart = [];

  // Constructor
  function Item(name, price, count) {
    this.name = name;
    this.price = price;
    this.count = count;
  }

  // Save cart
  function saveCart() {
    sessionStorage.setItem('shoppingCart', JSON.stringify(cart));
  }

  // Load cart
  function loadCart() {
    cart = JSON.parse(sessionStorage.getItem('shoppingCart'));
  }
  if (sessionStorage.getItem("shoppingCart") != null) {
    loadCart();
  }


  // =============================
  // Public methods and propeties
  // =============================
  var obj = {};

  // Add to cart
  obj.addItemToCart = function (name, price, count) {
    for (var item in cart) {
      if (cart[item].name === name) {
        cart[item].count++;
        saveCart();
        return;
      }
    }
    var item = new Item(name, price, count);
    cart.push(item);
    saveCart();
  }
  // Set count from item
  obj.setCountForItem = function (name, count) {
    for (var i in cart) {
      if (cart[i].name === name) {
        cart[i].count = count;
        break;
      }
    }
  };
  // Remove item from cart
  obj.removeItemFromCart = function (name) {
    for (var item in cart) {
      if (cart[item].name === name) {
        cart[item].count--;
        if (cart[item].count === 0) {
          cart.splice(item, 1);
        }
        break;
      }
    }
    saveCart();
  }

  // Remove all items from cart
  obj.removeItemFromCartAll = function (name) {
    for (var item in cart) {
      if (cart[item].name === name) {
        cart.splice(item, 1);
        break;
      }
    }
    saveCart();
  }

  // Clear cart
  obj.clearCart = function () {
    cart = [];
    saveCart();
  }

  // Count cart 
  obj.totalCount = function () {
    var totalCount = 0;
    for (var item in cart) {
      totalCount += cart[item].count;
    }
    return totalCount;
  }

  // Total cart
  obj.totalCart = function () {
    var totalCart = 0;
    for (var item in cart) {
      totalCart += cart[item].price * cart[item].count;
    }
    return Number(totalCart.toFixed(2));
  }

  // List cart
  obj.listCart = function () {
    var cartCopy = [];
    for (i in cart) {
      item = cart[i];
      itemCopy = {};
      for (p in item) {
        itemCopy[p] = item[p];

      }
      itemCopy.total = Number(item.price * item.count).toFixed(2);
      cartCopy.push(itemCopy)
    }
    return cartCopy;
  }

  // cart : Array
  // Item : Object/Class
  // addItemToCart : Function
  // removeItemFromCart : Function
  // removeItemFromCartAll : Function
  // clearCart : Function
  // countCart : Function
  // totalCart : Function
  // listCart : Function
  // saveCart : Function
  // loadCart : Function
  return obj;
})();


// *****************************************
// Triggers / Events
// ***************************************** 
// Add item
$('.add-to-cart').click(function (event) {
  event.preventDefault();
  var name = $(this).data('name');
  var price = Number($(this).data('price'));
  shoppingCart.addItemToCart(name, price, 1);
  displayCart();
});

// Clear items
$('.clear-cart').click(function () {
  shoppingCart.clearCart();
  displayCart();
});


function displayCart() {
  var cartArray = shoppingCart.listCart();
  var output = "";
  for (var i in cartArray) {
    output += "<tr>" +
      "<td>" + cartArray[i].name + "</td>" +
      "<td>(" + cartArray[i].price + ")</td>" +
      "<td><div class='input-group'><button class='minus-item input-group-addon btn btn-primary' data-name=" + cartArray[i].name + ">-</button>" +
      "<input type='number' class='item-count form-control' data-name='" + cartArray[i].name + "' value='" + cartArray[i].count + "'>" +
      "<button class='plus-item btn btn-primary input-group-addon' data-name=" + cartArray[i].name + ">+</button></div></td>" +
      "<td><button class='delete-item btn btn-danger' data-name=" + cartArray[i].name + ">X</button></td>" +
      " = " +
      "<td>" + cartArray[i].total + "</td>" +
      "</tr>";
  }
  $('.show-cart').html(output);
  $('.total-cart').html(shoppingCart.totalCart());
  $('.total-count').html(shoppingCart.totalCount());
}

// Delete item button

$('.show-cart').on("click", ".delete-item", function (event) {
  var name = $(this).data('name')
  shoppingCart.removeItemFromCartAll(name);
  displayCart();
})


// -1
$('.show-cart').on("click", ".minus-item", function (event) {
  var name = $(this).data('name')
  shoppingCart.removeItemFromCart(name);
  displayCart();
})
// +1
$('.show-cart').on("click", ".plus-item", function (event) {
  var name = $(this).data('name')
  shoppingCart.addItemToCart(name);
  displayCart();
})

// Item count input
$('.show-cart').on("change", ".item-count", function (event) {
  var name = $(this).data('name');
  var count = Number($(this).val());
  shoppingCart.setCountForItem(name, count);
  displayCart();
});

displayCart();

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
/* ===== End Scroll to Top ==== */

/* ===== Start List Product Accordion (Open & Close)  ==== */
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function () {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "none") {
      panel.style.display = "block";
    } else {
      panel.style.display = "none";
    }
  });
}
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
        $('#grid_two .col-md-6').attr('class', 'col-md-3');
        $('#grid_two img').attr('class', 'w-100');
        $('#grid_two h6').attr('class', 'full_desc text-dark text-center text-capitalize');
      });

      $('#grid_list_one').on('click', function () {
        $('#grid_two .col-md-3').attr('class', 'col-md-6');
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
  $('#toggle_plus_minus button').click(function () {
    $(this).children().toggleClass("fa-minus");
  });
});

// changes from plus to minus In Mobile View
$(document).ready(function () {
  $('#toggle_plus_minus button').click(function () {
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
  var x = parseInt($('#np-qu').val()) + 1;
  $('#np-qu').val(x);
})

$('.np-minus').click(function () {
  var x = parseInt($('#np-qu').val()) - 1;
  if (x > 0)
    $('#np-qu').val(x);
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

});

$('.star-input-label').on('mouseover', function () {
  var prevStars = $(this).prevAll();
  prevStars.addClass('hovered');
});
$('.star-input-label').on('mouseout', function () {
  var prevStars = $(this).prevAll();
  prevStars.removeClass('hovered');
});



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
$('#radioThree').click(function () {
  $('.form-row').show()
  $('#checkout-form').addClass('stripe_form')
  $('.btn-block').prop('disabled', false)
  path_name = '';
  if (location.hostname === "localhost" || location.hostname === "127.0.0.1") {
    path_name = '/aghezty_php7'
  }
  $.get(window.location.origin + path_name + '/token', function (data) {
    $('meta[name="api_token"]').attr('content', data)
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
        $(document).bind('submit', '.stripe_form', function (event) {
          if (document.querySelector('#nonce').value || !$('#checkout-form').hasClass('stripe_form')) {
            $('.btn-block').trigger('click');
            return;
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
$('#radioOne,#radioTwo').click(function () {
  $('.form-row').hide()
  $('.stripe_form').unbind('submit')
  $('#checkout-form').removeClass('stripe_form')
  $('#checkout-form').unbind('submit')
  $('.btn-block').prop('disabled', false)
})
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
// var y = $('.item_quantity').val();

$('.summary').children().children('.item-total').html(x)
var z = 0;
$('.item-total').each(function () {
  z += parseFloat($(this).text());
});
// $('.cart-total').html(z);

// var pay = parseFloat($('.cart-total').html()) + parseFloat($('.shipping-total').html());

// $('.pay').html(pay);
/* End Cart Page */

/* Start Slider */
$(document).ready(function ($) {
  $('.fadeOut').owlCarousel({
    items: 1,
    center: true,
    loop: true,
    autoplay: true,
    // margin: 10,
    nav: true,
    // animateOut: 'slideOutDown',
    animateOut: 'lightSpeedOut',
    animateIn: 'lightSpeedIn',
    smartSpeed: 1000,
  });
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
  $(".slide_toggle").click(function () {
    var target = $(this).parent().children(".slideContent");
    $(target).parent().siblings().children(".slideContent").slideUp(500);
    $(target).not().parent().children(".slideContent").slideToggle();
  });
});

// $(document).ready(function () {
//   $(".slide_toggle").click(function () {
//     var target = $(this).parent().children(".slideContent");
//     $(target).parent().siblings().slideToggle();
//   });
// });
/* End jQuery slide toggle menu */