@extends('front.layout')
@section('page_title')
@lang('front.cart')
@stop
@section('content')
<style>
    @media (max-width: 399px) and (min-width: 360px){
    .mainCart .cart-aside .summary .basket-module label {
        font-size: 11px;
        font-weight: bolder;
    }}
</style>
<!-- main content -->
<div class="main" style="padding-top: 12%;">
    <div class="container">
        <main class="mainCart">
            <div class="basket" id="ref">
                <div class="basket-labels">
                    <ul>
                        <li class="item-basket item-heading">Item</li>
                        <li class="price">Price</li>
                        <li class="quantity">Quantity</li>
                        <li class="subtotal">Subtotal</li>
                    </ul>
                </div>
                <div id="ref">
                    @foreach ($auth_carts as $cart)
                    <div class="basket-product" id="basket-product">
                        <div class="row">
                            <div class="col-6">
                                <div class="product-details">
                                    <h1 style="font-size: 18px; font-weight: lighter;">
                                        {{product($cart->pivot->product_id)->getTranslation('title',getCode())}}
                                    </h1>
                                </div>

                                <div class="subtotal">{{(int)$cart->pivot->total_price}}</div>
                                <div class="remove">
                                    <button data-type="auth" class="remove_icon" data-cart="{{$cart->pivot->id}}">X</button>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="item-basket">
                                    <div class="product-image">
                                        <img src="{{product($cart->pivot->product_id)->main_image}}"
                                            width="100%" height="100px" alt="{{product($cart->pivot->product_id)->getTranslation('title',getCode())}}" class="product-frame">
                                    </div>
                                    <div class="price">{{(int)$cart->pivot->price}}</div>
                                    <div class="select-quantity form-group">
                                        <label for="exampleFormControlSelect1">@lang('front.quantity')</label>
                                        <select class="form-control border-dark rounded quantity-field2"
                                            id="exampleFormControlSelect1" data-type="auth" data-cart="{{$cart->pivot->id}}">
                                            <option value="1" @if ($cart->pivot->quantity  == 1) selected @endif>1</option>
                                            <option value="2" @if ($cart->pivot->quantity  == 2) selected @endif>2</option>
                                            <option value="3" @if ($cart->pivot->quantity  == 3) selected @endif>3</option>
                                            <option value="4" @if ($cart->pivot->quantity  == 4) selected @endif>4</option>
                                            <option value="5" @if ($cart->pivot->quantity  == 5) selected @endif>5</option>
                                            <option value="6" @if ($cart->pivot->quantity  == 6) selected @endif>6</option>
                                            <option value="7" @if ($cart->pivot->quantity  == 7) selected @endif>7</option>
                                            <option value="8" @if ($cart->pivot->quantity  == 8) selected @endif>8</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @for ($i =0; $i < count($session_carts); $i++)
                    <div class="basket-product" id="basket-product">
                        <div class="row">
                            <div class="col-6">
                                <div class="product-details">
                                    <h1 style="font-size: 18px; font-weight: lighter;">
                                        {{product($session_carts[$i]['product_id'])->getTranslation('title',getCode())}}
                                    </h1>
                                </div>

                                <!-- <div class="quantity">
                                <span class="minus" data-type="cookie" data-cart="{{$i}}">-</span>
                                    <input type="number" data-type="cookie" data-cart="{{$i}}" value="{{$session_carts[$i]['quantity']}}" min="1" class="quantity-field">
                                    <span class="plus" data-type="cookie"  data-cart="{{$i}}">+</span>
                                </div> -->

                                <div class="subtotal">{{(int)$session_carts[$i]['total_price']}}</div>
                                <div class="remove">
                                    <button data-type="cookie" class="remove_icon" data-cart="{{$i}}">X</button>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="item-basket">
                                    <div class="product-image">
                                        <img src="{{product($session_carts[$i]['product_id'])->main_image}}"
                                            width="100%" height="100px" alt="Placholder Image 2" class="product-frame">
                                    </div>
                                    <div class="price">{{(int)$session_carts[$i]['price']}}</div>
                                    <div class="select-quantity form-group">
                                        <label for="exampleFormControlSelect1">الكمية</label>
                                        <select class="form-control border-dark rounded quantity-field2"
                                            id="exampleFormControlSelect1" data-type="cookie" data-cart="{{$i}}">
                                            <option value="1" @if ($session_carts[$i]['quantity'] == 1) selected @endif>1</option>
                                            <option value="2" @if ($session_carts[$i]['quantity'] == 2) selected @endif>2</option>
                                            <option value="3" @if ($session_carts[$i]['quantity'] == 3) selected @endif>3</option>
                                            <option value="4" @if ($session_carts[$i]['quantity'] == 4) selected @endif>4</option>
                                            <option value="5" @if ($session_carts[$i]['quantity'] == 5) selected @endif>5</option>
                                            <option value="6" @if ($session_carts[$i]['quantity'] == 6) selected @endif>6</option>
                                            <option value="7" @if ($session_carts[$i]['quantity'] == 7) selected @endif>7</option>
                                            <option value="8" @if ($session_carts[$i]['quantity'] == 8) selected @endif>8</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
            @if (count($auth_carts) > 0 || count($session_carts) > 0)
            <aside class="cart-aside" id="cart-aside">
                <div class="summary">
                    <div class="summary-total-items"><span class="total-items"></span> @lang('front.invoice')</div>
                    <div class="summary-subtotal">
                        <div class="subtotal-title">@lang('front.total_price')</div>
                        <div class="subtotal-value final-value" id="basket-subtotal">{{(int)$total_price}}</div>
                    </div>
                    @if(Auth::guard('client')->check() && isset($_REQUEST['address_id']))
                        <div class="summary-subtotal">
                            <div class="subtotal-title">@lang('front.shipping_amount')</div>
                            <div class="subtotal-value final-value" id="basket-subtotal">@if($city) {{(int)$city->shipping_amount}} @else 0 @endif</div>
                        </div>
                        <div class="summary-total">
                            <div class="subtotal-title">@lang('front.total_price_after_shipping')</div>
                            <div class="subtotal-value final-value" id="basket-total">{{$total_price+$city->shipping_amount}}</div>
                        </div>
                        @if(count(Auth::guard('client')->user()->coupons) > 0)
                        <div class="summary-total">
                            <div class="subtotal-title">@lang('front.coupon.discount')</div>
                            <div class="subtotal-value coupon_value">
                                {{Auth::guard('client')->user()->coupons->sum('value')}}</div>
                        </div>
                        <div class="summary-total coupon new">
                            <div class="subtotal-title">@lang('front.total_price_after_coupon')</div>
                            <div class="subtotal-value final-value" id="coupon-total">
                                {{last_price($total_price+$city->shipping_amount)}}</div>
                        </div>
                        @else
                        <div class="summary-total sum" style="display:none">
                            <div class="subtotal-title">@lang('front.coupon.discount')</div>
                            <div class="subtotal-value coupon_value">
                                {{Auth::guard('client')->user()->coupons->sum('value')}}</div>
                        </div>
                        <div class="summary-total coupon" style="display:none">
                            <div class="subtotal-title">@lang('front.total_price_after_coupon')</div>
                            <div class="subtotal-value final-value" id="coupon-total">0</div>
                        </div>
                        @endif
                    @endif
                    @if(isset($_REQUEST['address_id']) && setting('open_coupon'))
                        <div class="alert alert-success alert-dismissible fade show" style="display:none" role="alert">
                            <a class="close" onclick="$('.alert').hide()">×</a>
                            <span id="success_message"></span>.
                        </div>
                        <div class="alert alert-danger alert-dismissible fade show" style="display:none" role="alert">
                            <a class="close" onclick="$('.alert').hide()">×</a>
                            <span id="error_message" dir="ltr"></span>.
                        </div>
                        <div class="basket-module">
                            <form action="{{url('clients/check_coupon')}}" class="add_promo_code"  method="post">
                                {{ csrf_field() }}
                                <label for="promo-code" dir="{{ dir_ar_en() }}"> @lang('front.coupon.do_you_have_coupon') </label>
                                <input id="promo-code" type="text" name="coupon" class="promo-code-field">
                                <button type="submit" class="promo-code-cta">@lang('front.coupon.add')</button>
                            </form>
                            <button id="other-promoCode" dir="{{ dir_ar_en() }}" class="promo-code-cta-2"> @lang('front.coupon.do_you_have_another_coupon')
                                <i class="fas fa-plus-circle fa-lg"></i>
                            </button>
                        </div>
                    @endif
                    <div class="summary-checkout">
                        @if(isset($_REQUEST['address_id']))
                        <a href="{{url('clients/payment?address_id='.$_REQUEST['address_id'])}}">
                            <button class="checkout-cta">@lang('front.continue_buy')</button>
                        </a>
                        @else
                        <a href="{{url('clients/choose_address')}}">
                            <button class="checkout-cta">@lang('front.continue_buy')</button>
                        </a>
                        @endif
                    </div>
                </div>
            </aside>
            @endif
        </main>
    </div>
</div>
@stop

@section('script')
<script>
$(document).on('change', '.quantity-field2', function(e) {
    e.preventDefault();
    $.ajax({
        url: "{{url('clients/update_cart')}}",
        type: "get",
        data: {
            cart_id: $(this).data('cart'),
            type: $(this).data('type'),
            value: $(this).val()
        },
        success: function(data) {
            console.log(data.status);
            if (data.status == 'success') {
                $("#ref").load(location.href + " #ref>*", "");
                $("#cart-aside").load(location.href + " #cart-aside>*", "");
            }
        },
    });
})
$(document).on('click', '.remove_icon', function(e) {
    e.preventDefault();
    $.ajax({
        url: "{{url('clients/delete_cart')}}",
        type: "get",
        data: {
            cart_id: $(this).data('cart'),
            type: $(this).data('type'),
        },
        success: function(data) {
            if (data.status == 'success') {
                $("#ref").load(location.href + " #ref>*", "");
                $("#cart-aside").load(location.href + " #cart-aside>*", "");
                $('.total-count').html(parseInt($('.total-count').html()) - 1)
            }
        },
    });
})
/* Start Shopping cart */
$('#other-promoCode').click(function() {
    // var x = '<div class="basket-module">\
    //                 <form action="{{url("clients/check_coupon")}}" class="add_promo_code"  method="post">\
    //                     <label for="promo-code">هل لديك كوبون؟</label>\
    //                     <input id="promo-code" type="text" name="coupon" class="promo-code-field">\
    //                     <button type="submit" class="promo-code-cta">اضف</button>\
    //                 </form>\
    //         </div>';
    // $(this).parent('.basket-module').append(x);
    $('.add_promo_code').show()
    $('.promo-code-field').val('')
});
$(document).on('submit', '.add_promo_code', function(e) {
    e.preventDefault();
    $.ajax({
        url: $(this).attr('action'),
        type: "post",
        data: $(this).serialize(),
        success: function(data) {
            if (data.status == 'success') {
                $('.alert-success').show()
                $('.alert-danger').hide()
                $('#success_message').html(data.success)
                if ($('.coupon').hasClass('new')) {
                    $('#coupon-total').html(parseInt($('#coupon-total').html()) - data.value)
                    $('.add_promo_code').hide()
                    $('.coupon_value').html(parseInt($('.coupon_value').html())+data.value)
                } else {
                    $('#coupon-total').html(parseInt($('#basket-total').html()) - data.value)
                    $('.sum').show(300)
                    $('.coupon_value').html(parseInt($('.coupon_value').html())+data.value)
                    $('.coupon').show(300).addClass('new')
                    $('.add_promo_code').hide()
                }

            } else {
                $('.alert-danger').show()
                $('.alert-success').hide()
                var lis = []
                for (const [key, value] of Object.entries(data.error)) {
                    var li = '<li>' + value + '</li>';
                    lis.push(li)
                }
                $('#error_message').html(lis)
            }
        },
    });
})
</script>
@stop
