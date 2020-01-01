/* global $, window, document */

/* Start to back */
// $(document).on('click', '.back', function () {
//     'use strict';
//     parent.history.back();
// });
/* End to back */

/* Start Focus Out Menu Bar */
$(document).ready(function() {
    $(".main").click(function() {
        $('#menu-toggle').prop('checked', false);
    });
});
/* End Focus Out Menu Bar */

/* Start Star Rate */
$('.forStart').click(function() {
    $(this).toggleClass('active-rate');
    if ($(this).hasClass('active-rate')) {
        $(this).prevAll('i').addClass('active-rate');
    } else {
        $(this).prevAll('i').removeClass('active-rate');
    }
});
/* End Star Rate */

/* Start loading screen */
$(window).on('load', function() {
    'use strict';
    $('.loading-overlay .spinner').fadeOut(800, function() {
        $(this).parent().fadeOut(500, function() {
            $('body').css('overflow', 'auto');
            $(this).remove();
        });
    });
});
/* End loading screen */

/* Start Filter Arrows up & Down */
// filter accordion
function accordion(section, heading, list) {
    $(section).each(function() {
        var that = this,
            listHeight = $(this).find(list).height();

        $(this).find(heading).click(function() {
            $(this).toggleClass('plus-filter minus-filter');
            $(that).find(list).slideToggle(250);
        });
    });
};
accordion('.filter-item', '.filter-item-inner-heading', '.filter-attribute-list');
/* End Filter Arrows up & Down */

/* Set values + misc */
// var promoCode;
// var promoPrice;
// var fadeTime = 300;

// /* Assign actions */
// $('.quantity input').change(function () {
//     updateQuantity(this);
// });

// $('.remove button').click(function () {
//     removeItem(this);
// });

// $(document).ready(function () {
//     updateSumItems();
// });

// $('.promo-code-cta').click(function () {

//     promoCode = $('#promo-code').val();

//     if (promoCode == '10off' || promoCode == '10OFF') {
//         //If promoPrice has no value, set it as 10 for the 10OFF promocode
//         if (!promoPrice) {
//             promoPrice = 10;
//         } else if (promoCode) {
//             promoPrice = promoPrice * 1;
//         }
//     } else if (promoCode != '') {
//         alert("Invalid Promo Code");
//         promoPrice = 0;
//     }
//     //If there is a promoPrice that has been set (it means there is a valid promoCode input) show promo
//     if (promoPrice) {
//         $('.summary-promo').removeClass('hide');
//         $('.promo-value').text(promoPrice.toFixed(2));
//         recalculateCart(true);
//     }
// });


// /* Recalculate cart */
// function recalculateCart(onlyTotal) {
//     var subtotal = 0;

//     /* Sum up row totals */
//     $('.basket-product').each(function () {
//         subtotal += parseFloat($(this).children('.subtotal').text());
//     });

//     /* Calculate totals */
//     var total = subtotal;

//     //If there is a valid promoCode, and subtotal < 10 subtract from total
//     var promoPrice = parseFloat($('.promo-value').text());
//     if (promoPrice) {
//         if (subtotal >= 10) {
//             total -= promoPrice;
//         } else {
//             alert('Order must be more than £10 for Promo code to apply.');
//             $('.summary-promo').addClass('hide');
//         }
//     }

//     /*If switch for update only total, update only total display*/
//     if (onlyTotal) {
//         /* Update total display */
//         $('.total-value').fadeOut(fadeTime, function () {
//             $('#basket-total').html(total.toFixed(2));
//             $('.total-value').fadeIn(fadeTime);
//         });
//     } else {
//         /* Update summary display. */
//         $('.final-value').fadeOut(fadeTime, function () {
//             $('#basket-subtotal').html(subtotal.toFixed(2));
//             $('#basket-total').html(total.toFixed(2));
//             if (total == 0) {
//                 $('.checkout-cta').fadeOut(fadeTime);
//             } else {
//                 $('.checkout-cta').fadeIn(fadeTime);
//             }
//             $('.final-value').fadeIn(fadeTime);
//         });
//     }
// }

// /* Update quantity */
// function updateQuantity(quantityInput) {
//     /* Calculate line price */
//     var productRow = $(quantityInput).parent().parent();
//     var price = parseFloat(productRow.children('.price').text());
//     var quantity = $(quantityInput).val();
//     var linePrice = price * quantity;

//     /* Update line price display and recalc cart totals */
//     productRow.children('.subtotal').each(function () {
//         $(this).fadeOut(fadeTime, function () {
//             $(this).text(linePrice.toFixed(2));
//             recalculateCart();
//             $(this).fadeIn(fadeTime);
//         });
//     });

//     productRow.find('.item-quantity').text(quantity);
//     updateSumItems();
// }

// function updateSumItems() {
//     var sumItems = 0;
//     $('.quantity input').each(function () {
//         sumItems += parseInt($(this).val());
//     });
//     $('.total-items').text(sumItems);
// }
// /* End Shopping cart */

/* Start Contact Us Feedback */
$(".form").on('click', function() {
    $(this).addClass('active');
});
// /* End Contact Us Feedback */

// /* Start Remove item from cart */
// function removeItem(removeButton) {
//     /* Remove row from DOM and recalc cart total */
//     var productRow = $(removeButton).parent().parent();
//     productRow.slideUp(fadeTime, function () {
//         productRow.remove();
//         recalculateCart();
//         updateSumItems();
//     });
// }
// /* End Remove item from cart */

// /* Start Count Add cart & to shop  */
// var shoppingCart = (function () {
//     // =============================
//     // Private methods and propeties
//     // =============================
//     cart = [];

//     // Constructor
//     // function Item(name, price, count) {
//     //     this.name = name;
//     //     this.price = price;
//     //     this.count = count;
//     // }

//     // Save cart
//     function saveCart() {
//         sessionStorage.setItem('shoppingCart', JSON.stringify(cart));
//     }

//     // Load cart
//     function loadCart() {
//         cart = JSON.parse(sessionStorage.getItem('shoppingCart'));
//     }
//     if (sessionStorage.getItem("shoppingCart") != null) {
//         loadCart();
//     }


//     // =============================
//     // Public methods and propeties
//     // =============================
//     var obj = {};

//     // Add to cart
//     obj.addItemToCart = function (name, price, count) {
//         for (var item in cart) {
//             if (cart[item].name === name) {
//                 cart[item].count++;
//                 saveCart();
//                 return;
//             }
//         }
//         var item = new Item(name, price, count);
//         cart.push(item);
//         saveCart();
//     }
//     // Set count from item
//     obj.setCountForItem = function (name, count) {
//         for (var i in cart) {
//             if (cart[i].name === name) {
//                 cart[i].count = count;
//                 break;
//             }
//         }
//     };


//     // Count cart
//     obj.totalCount = function () {
//         var totalCount = 0;
//         for (var item in cart) {
//             totalCount += cart[item].count;
//         }
//         return totalCount;
//     }

//     // Total cart
//     obj.totalCart = function () {
//         var totalCart = 0;
//         for (var item in cart) {
//             totalCart += cart[item].price * cart[item].count;
//         }
//         return Number(totalCart.toFixed(2));
//     }

//     // List cart
//     obj.listCart = function () {
//         var cartCopy = [];
//         for (i in cart) {
//             item = cart[i];
//             itemCopy = {};
//             for (p in item) {
//                 itemCopy[p] = item[p];

//             }
//             itemCopy.total = Number(item.price * item.count).toFixed(2);
//             cartCopy.push(itemCopy)
//         }
//         return cartCopy;
//     }

//     // cart : Array
//     // Item : Object/Class
//     // addItemToCart : Function
//     // removeItemFromCart : Function
//     // removeItemFromCartAll : Function
//     // clearCart : Function
//     // countCart : Function
//     // totalCart : Function
//     // listCart : Function
//     // saveCart : Function
//     // loadCart : Function
//     return obj;
// })();


// // *****************************************
// // Triggers / Events
// // *****************************************
// // Add item
// $('.add-to-cart').click(function (event) {
//     event.preventDefault();
//     var name = $(this).data('name');
//     var price = Number($(this).data('price'));
//     shoppingCart.addItemToCart(name, price, 1);
//     displayCart();
// });



// function displayCart() {
//     var cartArray = shoppingCart.listCart();
//     var output = "";
//     for (var i in cartArray) {
//         output += "<tr>"
//             + "<td>" + cartArray[i].name + "</td>"
//             + "<td>(" + cartArray[i].price + ")</td>"
//             + "<td><div class='input-group'><button class='minus-item input-group-addon btn btn-primary' data-name=" + cartArray[i].name + ">-</button>"
//             + "<input type='number' class='item-count form-control' data-name='" + cartArray[i].name + "' value='" + cartArray[i].count + "'>"
//             + "<button class='plus-item btn btn-primary input-group-addon' data-name=" + cartArray[i].name + ">+</button></div></td>"
//             + "<td><button class='delete-item btn btn-danger' data-name=" + cartArray[i].name + ">X</button></td>"
//             + " = "
//             + "<td>" + cartArray[i].total + "</td>"
//             + "</tr>";
//     }
//     $('.show-cart').html(output);
//     $('.total-cart').html(shoppingCart.totalCart());
//     $('.total-count').html(shoppingCart.totalCount());
// }
// displayCart();
// /* End Count Add cart & to shop  */


/* Start DropDown */
// var dropdown = $('.dropdown');
// var item = $('.item');

// item.on('click', function () {
//     item.toggleClass('collapse');

//     if (dropdown.hasClass('dropped')) {
//         dropdown.toggleClass('dropped');
//     } else {
//         setTimeout(function () {
//             dropdown.toggleClass('dropped');
//         }, 150);
//     }
// });
/* End DropDown */

/* Start Filter Page */
var $d4 = $("#demo_4");
$d4.ionRangeSlider({
    skin: "big",
    type: "double",
    step: 1000,
    min: 1000,
    max: 50000,
    from: 1000,
    to: 50000
});

$d4.on("change", function() {
    var $inp = $(this);
    var v = $inp.prop("value"); // input value in format FROM;TO
    var from = $inp.data("from"); // input data-from attribute
    var to = $inp.data("to"); // input data-to attribute
    $('#from_price').val(from);
    $('#to_price').val(to)
});
/* End Filter Page */

/* Start Increase Or Decrease input number */
$(document).ready(function() {
    $(document).on('click', '.minus, .minus-inner, .minus-offer', function() {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
    });
    $(document).on('click', '.plus, .plus-inner, .plus-offer', function() {
        var $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
    });
});
/* Start Increase Or Decrease input number */
new WOW().init();


// accordion-one
$(function() {
    var Accordion = function(el, multiple) {
        this.el = el || {};
        this.multiple = multiple || false;

        // Variables privadas
        var links = this.el.find('.link');
        // Evento
        links.on('click', {
            el: this.el,
            multiple: this.multiple
        }, this.dropdown)
    }

    Accordion.prototype.dropdown = function(e) {
        var $el = e.data.el;
        $this = $(this),
            $next = $this.next();

        $next.slideToggle();
        $this.parent().toggleClass('open');

        if (!e.data.multiple) {
            $el.find('.submenu').not($next).slideUp().parent().removeClass('open');
        };
    };

    var accordion = new Accordion($('#accordion'), false);
});

// accordion-two
$(function() {
    var Accordion = function(el, multiple) {
        this.el = el || {};
        this.multiple = multiple || false;

        // Variables privadas
        var links = this.el.find('.link-link');
        // Evento
        links.on('click', {
            el: this.el,
            multiple: this.multiple
        }, this.dropdown)
    }

    Accordion.prototype.dropdown = function(e) {
        var $el = e.data.el;
        $this = $(this),
            $next = $this.next();

        $next.slideToggle();
        $this.parent().toggleClass('open');

        if (!e.data.multiple) {
            $el.find('.submenu-submenu').not($next).slideUp().parent().removeClass('open');
        };
    };

    var accordion = new Accordion($('#accordion'), false);
});


/*
 * owl carousel
 * owl-one
 */
$('.owl-one').owlCarousel({
    center: true,
    rtl: true,
    loop: true,
    autoplay: true,
    autoplayTimeout: 2000,
    margin: 10,
    nav: true,
    dots: false,
    animateIn: 'fadeIn',
    animateOut: 'fadeOut',
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
    }

});
$(".owl-one .owl-prev").html('<i class="fas fa-chevron-circle-left fa-2x"></i>');
$(".owl-one .owl-next").html('<i class="fas fa-chevron-circle-right fa-2x"></i>');

// owl-two
$('.owl-two').owlCarousel({
    center: true,
    rtl: true,
    loop: true,
    autoplay: true,
    autoplayTimeout: 2000,
    margin: 10,
    nav: true,
    dots: false,
    animateIn: 'fadeIn',
    animateOut: 'fadeOut',
    responsive: {
        0: {
            items: 3
        },
        600: {
            items: 3
        },
        1000: {
            items: 3
        }
    }
});
$(".owl-two .owl-prev").html('<i class="fas fa-chevron-left"></i>');
$(".owl-two .owl-next").html('<i class="fas fa-chevron-right"></i>');


$('.owl-three').owlCarousel({
    center: false,
    rtl: true,
    loop: false,
    //margin: 10,
    nav: true,
    dots: false,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
    }
});
$(".owl-three .owl-prev").html('<i class="fas fa-chevron-circle-left fa-2x"></i>');
$(".owl-three .owl-next").html('<i class="fas fa-chevron-circle-right fa-2x"></i>');

/* Start Contact US */

// function addClass() {
//     document.body.classList.add("sent");
// }
// sendLetter.addEventListener("click", addClass);
/* End Contact US*/