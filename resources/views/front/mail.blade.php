<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>
</head>

<body>
    <!-- main content -->
    @php
        App::setLocale($order->lang);
        if($order->lang=='ar'){
            $lang1 = 'right';
            $lang2 = 'left';
            $dir = 'rtl';
        }
        else {
            $lang1 = 'left';
            $lang2 = 'right';
            $dir = 'ltr';
        }
    @endphp
    <div class="main" style="direction:{{$dir}}">
        <div class="container">
            <main class="mainCart"
                style="clear:both; font-size:0.75rem; left:50%; margin:0 auto; overflow:hidden; padding:1rem 0; position:relative; top:50%; transform:translate(-50%, 0); width:100%"
                width="100%">
                @if(isset($subject))
                <div class="note-box success"  @if($order->status == 'Finished') style="background:#1fa67a; color:#fff; margin:1.5em 0" @else style="background:#39cccc; color:#fff; margin:1.5em 0" @endif>
                    <!--<div class="note-icon"
                        style="background:rgba(0, 0, 0, 0.1); display:table-cell; height:100%; min-width:60px; padding:0 1em; text-align:center; vertical-align:middle"
                        height="100%" align="center" valign="middle">
                        <span style="color:#fff; font-size:60px; max-width:60px">
                            <img style="margin: auto;cursor: zoom-in;" src="https://images.vexels.com/media/users/3/155436/isolated/lists/e93670eb242ed5f2afa27aeec23b72e7-tongue-out-kawaii-emoticon.png" width="150px" height="150px">
                        </span>
                    </div>-->
                    <div class="note-text" style="display:table-cell; padding:0.3em 2em">
                        <h5>@if($order->status == 'Finished')  @lang('front.mail.thanks') @lang('front.title') @else @lang('front.mail.info') @endif :)</h5>
                        <h4>{{$subject}} @if($order->status == 'Finished') @lang('front.mail.contact')  <a href="{{url('/clients/contactv2?lang='.$order->lang)}}">@lang('front.mail.link')</a> @endif. </h4>
                    </div>
                </div>
                @endif
                <aside class="cart-aside"
                    style="-moz-box-sizing:border-box; -webkit-box-sizing:border-box; box-sizing:border-box; float:right; padding:0 1rem; position:relative; width:100%"
                    width="100%">
                    <div class="summary"
                        style="-moz-box-sizing:border-box; -webkit-box-sizing:border-box; background-color:#eee; border:1px solid #aaa; box-sizing:border-box; margin-top:1.25rem; padding:1rem; position:relative; width:100%"
                        bgcolor="#eeeeee" width="100%">
                        <div class="customer-info" style="text-align:center" align="center">@lang('front.auth.info')
                        </div>
                        <div class="customers"
                            style="border-bottom:1px solid #ccc; clear:both; margin:1rem 0; overflow:hidden; padding:0.5rem 0; text-align:{{$lang2}}"
                            align="left">
                            <div class="customer-data" style="color:#111; float:{{$lang1}}; text-align:{{$lang1}}; width:30%"
                                align="right" width="30%"> @lang('front.auth.name')</div>
                            <div class="">{{$client->name}}</div>
                        </div>

                        <div class="customers"
                            style="border-bottom:1px solid #ccc; clear:both; margin:1rem 0; overflow:hidden; padding:0.5rem 0; text-align:{{$lang2}}"
                            align="left">
                            <div class="customer-data" style="color:#111; float:{{$lang1}}; text-align:{{$lang1}}; width:30%"
                                align="right" width="30%"> @lang('front.auth.phone')</div>
                            <div class="">{{$client->phone}}</div>
                        </div>

                        <div class="customers"
                            style="border-bottom:1px solid #ccc; clear:both; margin:1rem 0; overflow:hidden; padding:0.5rem 0; text-align:{{$lang2}}"
                            align="left">
                            <div class="customer-data" style="color:#111; float:{{$lang1}}; text-align:{{$lang1}}; width:30%"
                                align="right" width="30%">@lang('front.auth.email')</div>
                            <div class="">{{$client->email}}</div>
                        </div>

                        <div class="customers"
                            style="border-bottom:1px solid #ccc; clear:both; margin:1rem 0; overflow:hidden; padding:0.5rem 0; text-align:{{$lang2}}"
                            align="left">
                            <div class="customer-data" style="color:#111; float:{{$lang1}}; text-align:{{$lang1}}; width:30%"
                                align="right" width="30%">@lang('front.auth.address')</div>
                            <div class="">
                                {{{ $order->address->address or '----'}}},<br>{{{ $order->address->city['city_'.getcode()] or '----'}}},<br>{{{ $order->address->city->governorate['title_'.getcode()]  or '----' }}}
                            </div>
                        </div>
                    </div>
                </aside>
                <div class="basket"
                    style="-moz-box-sizing:border-box; -webkit-box-sizing:border-box; box-sizing:border-box; padding:0 1rem; width:100%"
                    width="100%;">
                    <table
                        style="border:solid 1px #000; padding:10px; border-collapse:collapse; caption-side:bottom;margin-top:10px;width:100%;direction:{{$dir}}">
                        <thead>
                            <tr>
                                <th style="border:solid 1px #000; padding:10px">@lang('front.product_image')</th>
                                <th style="border:solid 1px #000; padding:10px">@lang('front.product')</th>
                                <th style="border:solid 1px #000; padding:10px">@lang('front.price')</th>
                                <th style="border:solid 1px #000; padding:10px">@lang('front.quantity')</th>
                                <th style="border:solid 1px #000; padding:10px">@lang('front.total_price')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->products as $product)
                            <tr>
                                <td style="border:solid 1px #000; padding:10px">
                                    <img src="{{$message->embed(product($product->product_id)->main_image)}}"
                                        style="max-width:200px;max-height:200px; width:100%" width="100%"> </td>
                                <td style="border:solid 1px #000; padding:10px">
                                    {{product($product->product_id)->getTranslation('title',getCode())}} </td>
                                <td style="border:solid 1px #000; padding:10px">
                                    {{$product->price}} </td>
                                <td style="border:solid 1px #000; padding:10px">
                                    {{$product->quantity}} </td>
                                <td style="border:solid 1px #000; padding:10px">
                                    {{$product->total_price}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <aside class="cart-aside"
                    style="-moz-box-sizing:border-box; -webkit-box-sizing:border-box; box-sizing:border-box; float:right; padding:0 1rem; position:relative; width:100%"
                    width="100%">
                    <div class="summary"
                        style="-moz-box-sizing:border-box; -webkit-box-sizing:border-box; background-color:#eee; border:1px solid #aaa; box-sizing:border-box; margin-top:1.25rem; padding:1rem; position:relative; width:100%"
                        bgcolor="#eeeeee" width="100%">
                        <div class="summary-total-items" style="color:#666; font-size:0.875rem; text-align:center"
                            align="center">
                            <span class="total-items"></span> @lang('front.invoice')</div>
                        <div class="summary-subtotal"
                            style="border-bottom:1px solid #ccc; border-top:1px solid #ccc; clear:both; margin:1rem 0; overflow:hidden; padding:0.5rem 0">
                            <div class="subtotal-title" style="color:#111; float:{{$lang1}}; text-align:{{$lang1}}; width:50%"
                                align="right" width="50%">@lang('front.total_price')</div>
                            <div class="subtotal-value final-value" id="basket-subtotal"
                                style="color:#111; float:{{$lang1}}; text-align:{{$lang2}}; width:50%" align="left" width="50%">
                                {{$order->sum()}} @lang('front.pound')</div>
                        </div>

                        <div class="summary-subtotal"
                            style="border-bottom:1px solid #ccc; border-top:1px solid #ccc; clear:both; margin:1rem 0; overflow:hidden; padding:0.5rem 0">
                            <div class="subtotal-title" style="color:#111; float:{{$lang1}}; text-align:{{$lang1}}; width:50%"
                                align="right" width="50%"> @lang('front.shipping_amount')</div>
                            <div class="subtotal-value final-value" id="basket-subtotal"
                                style="color:#111; float:{{$lang1}}; text-align:{{$lang2}}; width:50%" align="left" width="50%">
                                @if(number_format((int)$order->shipping_amount)!=0)
                                  {{ number_format((int)$order->shipping_amount)}} @lang('front.pound')
                                @else
                                  @lang('front.shipping_amount_message')
                                @endif
                               </div>
                        </div>

                        <div class="summary-subtotal"
                            style="border-bottom:1px solid #ccc; border-top:1px solid #ccc; clear:both; margin:1rem 0; overflow:hidden; padding:0.5rem 0">
                            <div class="subtotal-title" style="color:#111;font-weight:bold;float:{{$lang1}}; text-align:{{$lang1}}; width:50%"
                                align="right" width="50%"> @lang('front.total_price_after_shipping')</div>
                            <div class="subtotal-value final-value" id="basket-subtotal"
                                style="color:#111; float:{{$lang1}}; text-align:{{$lang2}}; width:50%" align="left" width="50%">
                                {{$order->sum() + $order->shipping_amount}} @lang('front.pound')</div>
                        </div>
                        @if((($order->sum() + $order->shipping_amount)-$order->total_price) > 0)
                        <div class="summary-subtotal"
                        style="border-bottom:1px solid #ccc; border-top:1px solid #ccc; clear:both; margin:1rem 0; overflow:hidden; padding:0.5rem 0">
                            <div class="subtotal-title" style="color:#111; float:{{$lang1}}; text-align:{{$lang1}}; width:50%"
                                align="right" width="50%"> @lang('front.coupon.discount')</div>
                            <div class="subtotal-value final-value" id="basket-subtotal"
                                style="color:#111; float:{{$lang1}}; text-align:{{$lang2}}; width:50%" align="left" width="50%">
                                {{($order->sum() + $order->shipping_amount) - $order->total_price}} @lang('front.pound')</div>
                        </div>
                        <div class="summary-total"
                            style="border-bottom:1px solid #ccc; border-top:1px solid #ccc; clear:both; margin:1rem 0; overflow:hidden; padding:0.5rem 0">
                            <div class="total-title"
                                style="color:#111; float:{{$lang1}}; font-weight:bold; text-align:{{$lang1}}; text-transform:uppercase; width:50%"
                                align="right" width="50%">@lang('front.coupon.total_price_after_discount')</div>
                            <div class="total-value final-value" id="basket-total"
                                style="color:#111; float:{{$lang1}}; text-align:{{$lang2}}; width:50%" align="left" width="50%">
                                {{$order->total_price}} @lang('front.pound')</div>
                        </div>
                        @endif
                        <div class="summary-subtotal"
                            style="border-bottom:1px solid #ccc; border-top:1px solid #ccc; clear:both; margin:1rem 0; overflow:hidden; padding:0.5rem 0">
                            <div class="subtotal-title" style="color:#111;font-weight:bold;float:{{$lang1}}; text-align:{{$lang1}}; width:50%"
                                align="right" width="50%"> @lang('front.payment')</div>
                            <div class="subtotal-value final-value" id="basket-subtotal"
                                style="color:#111; float:{{$lang1}}; text-align:{{$lang2}}; width:50%" align="left" width="50%">
                                {{$order->payment}}</div>
                        </div>
                    </div>
                </aside>
            </main>
            @include('front.partials.mail_socials')
        </div>
    </div>
</body>

</html>
