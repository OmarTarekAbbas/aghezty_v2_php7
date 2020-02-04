@extends('frontv2.master')
@section('content')

<style>
nav.container-fluid {
    padding-right: 0 !important;
    padding-left: 0 !important;
}
</style>

<div class="main">
    <nav class="mobile_views nav_breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('front.home.index')}}" title="Go To Home">@lang('front.home')</a>
            </li>

            <li class="breadcrumb-item">
                <a href="{{route('front.home.list',['sub_category_id' => $product->category->id])}}"
                    title="Go To {{$product->category->getTranslation('title',getCode())}}">{{$product->category->getTranslation('title',getCode())}}</a>
            </li>

            <li class="breadcrumb-item active" aria-current="page">{{$product->getTranslation('title',getCode())}}</li>
        </ol>
    </nav>

    <section id="inner-page" class="mobile_views">
        <div class="">
            <h3 class="product-title font-weight-bold">{{$product->getTranslation('title',getCode())}}</h3>

            <span class="rating rating_star">
                @for ($i = 1; $i <= 5; $i++) @if(round($product->rate() - .25) >= $i)
                    <i class="fas fa-star colorstar"></i>
                    @elseif(round($product->rate() + .25) >= $i)
                    <i class="fas fa-star-half-alt colorstar"></i>
                    @else
                    <i class="far fa-star"></i>
                    @endif
                    @endfor
            </span>

            <span class="rating rating_review">{{count($product->client_rates)}} @lang('front.inner.reviews') </span>

            <span class="rating_space" style="color: #c3c5c9;"> | </span>

            <a id="go_to_nickname" href="#review">
                <span class="rating rating_addReview"> @lang('front.inner.add_your_review')</span>
            </a>
        </div>

        <div class="row w-100">
            <div class="col-lg-6 col-12">
                <div class="row">
                    <div class="col-md-3 d-none d-sm-block">
                        @foreach ($product->images as $key=>$image)
                        <div class="c-slide hvr-outline-in border btn bg-white my-1">
                            <p data-target="#carouselExampleControls" data-slide-to="{{$key}}" class="active">
                                <img class="w-100 d-block" src="{{url($image->image)}}"
                                    alt="{{$product->getTranslation('title',getCode())}}" />
                            </p>
                        </div>
                        @endforeach
                    </div>

                    <div class="col-md-9 col-12">
                        <div id="carouselExampleControls" class="carousel slide w-75" data-ride="carousel"
                            style="border: 1px solid #dcdcdc;">
                            <div class="carousel-inner">
                                @foreach ($product->images as $key=>$image)
                                <div class="carousel-item {{$key == 0 ?'active' : ''}}">
                                    <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
                                        <a class="zoom_image" href="{{url($image->image)}}">
                                            <img class="w-100" src="{{url($image->image)}}"
                                                alt="{{$product->getTranslation('title',getCode())}}" />
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                data-slide="prev">
                                <i class="fas fa-chevron-left fa-3x left_slider"></i>
                            </a>

                            <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                data-slide="next">
                                <i class="fas fa-chevron-right fa-3x right_slider"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="info col-lg-6 w-100">
                <div class="row">

                    <div class="features col-md-12">
                        <h5 class="font-weight-bold py-2">@lang('front.inner.key_feature')</h5>

                        <div class="modal_feature">
                            <h5 class="font-weight-bold d-inline-block">@lang('front.inner.model'):</h5>
                            <p class="d-inline-block px-1">{{$product->getTranslation('short_description',getCode())}}
                            </p>
                        </div>

                        <div class="desc_feature">
                            <h5 class="font-weight-bold d-inline-block">@lang('front.product'):</h6>
                                <p class="d-inline-block px-1">{{$product->getTranslation('title',getCode())}}</p>
                        </div>

                        <div>
                            <h6 class="font-weight-bold d-inline-block">@lang('front.inner.avialable'):</h6>
                            <p class="d-inline-block px-1">
                                {{$product->stock ? __('front.inner.in_stock') : ('front.inner.not_stock') }}</p>
                        </div>

                        <div class="row price_disc_offer">
                            <h4 class="col-md-6 price text-primary font-weight-bold">
                                {{($product->discount > 0)?$product->price_after_discount:$product->price}}
                                @lang('front.egp')</h4>
                            @if($product->discount)
                            <h4 class="col-md-6 discount text-muted font-weight-bold">{{$product->price}}
                                @lang('front.egp')</h4>
                            <style>
                            .main #inner-page .price_disc_offer .product-label .sale-product-icon .testtt::before {
                                content:"-{{$product->discount}}%"
                            }
                            </style>
                            <div class="product-label text-center font-weight-bold">
                                <span class="sale-product-icon">
                                    <span class="testtt"></span>
                                </span>
                            </div>
                            @endif
                        </div>

                        <div class="contact_us w-100 text-left mb-3">
                            <div class="contact_us_head d-inline-block">
                                <h6 class="text-left text-capitalize font-weight-bold">@lang('front.contact'): </h6>
                            </div>

                            <div class="rounded-social-buttons d-inline-block">
                                <a class="social-button phone_link" href="tel:{{setting('phone')}}"
                                    title="Phone Number">
                                    <i class="fas fa-phone phone_icon"></i>
                                </a>

                                <a class="social-button whatsapp_link" href="whatsapp://send?phone={{setting('phone')}}"
                                    title="Whatsapp">
                                    <i class="fab fa-whatsapp whatsapp_icon"></i>
                                </a>


                                <a class="social-button messenger_link" href="http://m.me/Aghezty.me" target="_blank"
                                    title="Messenger">
                                    <i class="fab fa-facebook-messenger messenger_icon"></i>
                                </a>

                                <a class="social-button sms_link" title="Messege" href="sms:{{setting('phone')}}">
                                    <i class="far fa-comment sms_icon"></i>
                                </a>
                            </div>
                        </div>

                        <p class="quantity">@lang('front.inner.only')
                            <span class="text-primary font-weight-bold">{{$product->stock}}</span>
                            @lang('front.inner.reset')
                        </p>
                    </div>

                    <div class="col-md-12 padding_right_mob">
                        <form class="quantity-form">
                            <input class="form-control quantity-input" type="text" value="1">

                            <span class="btn btn-light btn-sm border np-plus p-0 px-1">
                                <i class="fa fa-plus fa-xs" aria-hidden="true"></i>
                            </span>

                            <span class="btn btn-light btn-sm border np-minus p-0 px-1">
                                <i class="fa fa-minus fa-xs" aria-hidden="true"></i>
                            </span>
                            @if($product->stock > 0)
                            <button
                                class="w-75 btn float-left font-weight-bold text-capitalize hvr-wobble-to-bottom-right"
                                id="add_to">@lang('front.buy_now')</button>
                            @else
                                <button
                                class="w-75 btn float-left font-weight-bold text-capitalize hvr-wobble-to-bottom-right"
                                id="add_to" id="notify_me" data-toggle="modal"
                                data-target="#notify_me_modal">@lang('front.notify_me')</button>
                            @endif
                        </form>
                    </div>

                    <!-- <div class="col-md-12">
            <p class="text-danger m-2 font-weight-bold"><i class="fa fa-heart"></i> ADD TO WISHLIST</p>
					</div> -->

                    <div class="rounded-social-buttons w-100 text-center">
                        <a class="social-button facebook_link"
                            href="https://www.facebook.com/sharer/sharer.php?u={{urldecode(route('front.home.inner',['id' => $product->id]))}}"
                            target="_blank" title="Facebook">
                            <i class="fab fa-facebook-f facebook_icon"></i>
                        </a>

                        <a class="social-button whatsapp_link"
                            href="https://api.whatsapp.com/send?text={{$product->getTranslation('title')}} url: {{route('front.home.inner',['id' => $product->id])}}!"
                            title="Whatsapp">
                            <i class="fab fa-whatsapp whatsapp_icon"></i>
                        </a>

                        <a class="social-button twitter_link"
                            href="https://www.twitter.com/intent/tweet?text={{$product->getTranslation('title')}} url : {{route('front.home.inner',['id' => $product->id])}}!"
                            target="_blank" title="Twitter">
                            <i class="fab fa-twitter twitter_icon"></i>
                        </a>

                        <!-- <a class="social-button instagram_link" href="https://www.instagram.com/" target="_blank" title="Instagram">
							<i class="fab fa-instagram instagram_icon"></i>
						</a> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="mobile_view mt-2">
            <div class="border-bottom w-100 mt-3"></div>
        </div>
    </section>




    <section class="model_notify_me">
        <div class="mobile_views">
            <div class="modal fade" id="notify_me_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-dark text-capitalize text-center w-100" id="exampleModalLabel">
                                @lang('front.notify_me')</h5>

                            <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <form class="form-group mx-auto" style="width:90%"
                                action="{{url('clients/is_available')}}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <div class="form-row">
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 col-12 text-dark">
                                        <label for="exampleFormControlInput3">@lang('front.auth.email') *</label>
                                        <input type="emil" id="exampleFormControlInput3" class="form-control hvr-float"
                                            name="email"
                                            value="{{Auth::guard('client')->check()?Auth::guard('client')->user()->email:''}}"
                                            placeholder="@lang('front.auth.email') ">
                                    </div>

                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 col-6 text-dark">
                                        <label for="exampleFormControlInput1">@lang('front.auth.name') *</label>
                                        <input type="text" id="exampleFormControlInput1" name="name"
                                            value="{{Auth::guard('client')->check()?Auth::guard('client')->user()->name:''}}"
                                            class="form-control hvr-float" placeholder="@lang('front.auth.name') ">
                                    </div>



                                    <div class="form-group col-md-4 col-lg-4 col-xl-4 col-6 text-dark">
                                        <label for="exampleFormControlInput2">@lang('front.auth.phone') *</label>
                                        <input type="tel" id="exampleFormControlInput2" class="form-control hvr-float"
                                            name="phone"
                                            value="{{Auth::guard('client')->check()?Auth::guard('client')->user()->phone:''}}"
                                            placeholder="@lang('front.auth.phone') ">
                                    </div>


                                    <div class="form-group col-md-4 col-lg-4 col-xl-4 col-6 text-dark">
                                        <label for="exampleFormControlSelect1">@lang('front.governorate')</label>
                                        {!! Form::select("governorate_id",
                                        \App\Governorate::pluck('title_'.getCode(),'id'),null, ['required' ,'class' =>
                                        'form-control hvr-float' ,'id' => 'gover_add']) !!}
                                    </div>


                                    <div class="form-group col-md-4 col-lg-4 col-xl-4 col-6 text-dark">
                                        <label for="exampleFormControlSelect1">@lang('front.city')</label>
                                        {!! Form::select("city_id", \App\City::pluck('city_'.getCode(),'id'),null,
                                        ['required'
                                        ,'id' => 'add_city' ,'class' => 'form-control hvr-float']) !!}
                                    </div>

                                    <div class="form-group col-md-12 col-lg-12 col-xl-12 col-12">
                                        <div class="model_send my-3 hvr-float">
                                            <button type="submit" class="btn w-100" style="background-color: #fe9901;color: #FFF;">@lang('front.send')</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn modal_foot_close"
                                data-dismiss="modal">@lang('front.close')</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="inner_table_desc">
        <div class="mobile_views">
            <div class="table_desc pt-3">
                <h3 style="text-decoration:underline">@lang('front.product_info')</h3>
                <div style="max-width: 100%; overflow:hidden;">
                    {!! $product->getTranslation('description',getCode()) !!}
                </div>

            </div>
        </div>
    </section>

    <section class="based_selection">
        <div class="mobile_views mt-5">
            <div class="table_desc_title">
                <h6 class="font-weight-bold d-inline-block text-uppercase" id="based_selection_typed"></h6>
            </div>

            <div class="border-bottom w-100"></div>

            <div class="row mt-3">
                @foreach ($items as $item)
                <div class="col-md-2 col-6 mb-3">
                    <div class="content_view hvr-bob px-2 h-100 bg-white rounded">
                        <a href="{{route('front.home.inner',['id' => $item->id])}}">
                            <img src="{{url($item->main_image)}}" alt="Product" class="w-100 based_selection_img">

                            @if($item->discount > 0)
                            <div class="product-label text-center font-weight-bold">
                                <span class="sale-product-icon">-{{$item->discount}}%</span>
                            </div>
                            @endif

                            <h6 class="text-dark text-left text-capitalize my-3">
                                {{$item->getTranslation('title',getCode())}}
                            </h6>
                        </a>

                        <div class="rating_list_product">
                            @for ($i = 1; $i <= 5; $i++) @if(round($item->rate() - .25) >= $i)
                                <i class="fas fa-star colorstar"></i>
                                @elseif(round($item->rate() + .25) >= $i)
                                <i class="fas fa-star-half-alt colorstar"></i>
                                @else
                                <i class="far fa-star"></i>
                                @endif
                                @endfor
                        </div>

                        <div class="price-description text-uppercase">Cash Price</div>

                        <div class="price-box">
                            <span class="regular-price">
                                <span
                                    class="price font-weight-bold">{{($item->discount > 0)?$item->price_after_discount:$item->price}}
                                    @lang('front.egp') </span>
                            </span>
                            @if($item->discount > 0)
                            <p class="old-price">
                                <span class="price font-weight-bold">{{$item->price}} @lang('front.egp') </span>
                            </p>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="review_comment">
        <div class="mobile_views">
            <div class="row mt-5">
                @if(count($product->client_rates) > 0)
                <div class="col-md-6">
                    <div class="review_title">
                        <h4 class="text-capitalize d-inline-block" id="review_comment_title_typed">
                            @lang('front.inner.reviews')</h4>
                    </div>
                    @foreach ($product->client_rates as $review)
                    <div class="review-area my-3">
                        <span class="review-by"> @lang('front.inner.review_by') <strong>{{$review->name}} </strong>
                            <span
                                style="{{Session::get('applocale') =='en' ?'float:right;direction: ltr;':'float:left;direction: ltr;'}}">
                                {{ $review->pivot->created_at->format('d-m-Y h:m A') }} </span> </span>
                        @for ($i = 1; $i <= 5; $i++) @if(round($review->pivot->rate - .25) >= $i)
                            <i class="fas fa-star colorstar"></i>
                            @elseif(round($review->pivot->rate + .25) >= $i)
                            <i class="fas fa-star-half-alt colorstar"></i>
                            @else
                            <i class="far fa-star"></i>
                            @endif
                            @endfor
                            <p>
                                <strong class="review-area-title">{{$review->pivot->comment}} </strong><br>
                            </p>
                    </div>
                    @endforeach
                </div>
                @else
                <h4>@lang('front.inner.no_rate')</h4>
                @endif
                @if(is_buy($product->id) && is_not_rate($product->id))
                <div class="col-md-6" id="review">
                    <div class="review_title">
                        <h4 class="text-capitalize d-inline-block" id="review_title3_title_typed"></h4>
                    </div>

                    <p style="color: #777;">@lang('front.rate_product'){{Session::get('applocale') =='en' ? '?' : '؟'}}
                        *</p>
                    @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>@lang('front.success')!</strong> {{Session::get('success')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @include('errors')
                    <form action="{{route('front.home.rate')}}" method="post" id="rate_form"
                        class="mt-3 mb-3 add_comment rating-widget">
                        <input type="checkbox" class="star-input" id="1" />
                        <label class="star-input-label" for="1">1
                            <i class="far fa-star"></i>
                            <i class="fa fa-star orange"></i>
                        </label>

                        <input type="checkbox" class="star-input" id="2" />
                        <label class="star-input-label" for="2">2
                            <i class="far fa-star"></i>
                            <i class="fa fa-star orange"></i>
                        </label>

                        <input type="checkbox" class="star-input" id="3" />
                        <label class="star-input-label" for="3">3
                            <i class="far fa-star"></i>
                            <i class="fa fa-star orange"></i>
                        </label>

                        <input type="checkbox" class="star-input" id="4" />
                        <label class="star-input-label" for="4">4
                            <i class="far fa-star"></i>
                            <i class="fa fa-star orange"></i>
                        </label>

                        <input type="checkbox" class="star-input" id="5" />
                        <label class="star-input-label" for="5">5
                            <i class="far fa-star"></i>
                            <i class="fa fa-star orange"></i>
                        </label>
                        {{-- <label for="nickname_field" class="required w-100">@lang('front.auth.name')
                <em>*</em>
                <input id="focus_to_review" name="name" type="text" placeholder="Nickname" class="form-control">
              </label> --}}
                        @csrf
                        <label for="nickname_field" class="required w-100">@lang('front.your_comment')
                            <em>*</em>
                            <textarea type="text" placeholder="@lang('front.your_comment')" name="comment" cols="5"
                                rows="3" class="form-control"></textarea>
                        </label>
                        <input type="hidden" id="rate_fo" name="rate" value="">
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <button class="btn btn-primary hvr-wobble-to-bottom-right" type="submit"
                            style="float: right;margin-top: 11px;">@lang('front.send')</button>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </section>
</div>

@endsection

@section('script')
<script>
sessionStorage.setItem("current_url", document.referrer)
$('#add_to').click(function(e) {
    e.preventDefault()
    $.ajax({
        url: "{{route('front.home.cart.add')}}",
        type: "POST",
        data: {
            'success_pr': 'success_pr',
            'product_id': '{{$product->id}}',
            'counter': $('.quantity-input').val(),
            'price': '{{($product->discount)?$product->price_after_discount:$product->price}}'
        },
        success: function(data) {
            if (data.status == 'success') {
                $('.shopping_cart_num').html(parseInt($('.shopping_cart_num').html()) + 1)
                location.href = "{{route('front.home.cart',['product_id' => $product->id])}}"
            } else {
                console.log(data.status);
                alert("@lang('front.you_already_take_this_product_in_your_cart')")
            }

        },
    });
})
</script>
<script>
var based_selection_typed = new Typed('#based_selection_typed', {
    strings: ['@lang("front.inner.based_on_your_select")'],
    typeSpeed: 150,
    backSpeed: 0,
    fadeOut: true,
    smartBackspace: true, // this is a default
    loop: true
});

var review_comment_title_typed = new Typed('#review_comment_title_typed', {
    strings: ['@lang("front.inner.reviews")'],
    typeSpeed: 150,
    backSpeed: 0,
    fadeOut: true,
    smartBackspace: true, // this is a default
    loop: true
});
@if(is_buy($product->id) && is_not_rate($product->id))
var review_title3_title_typed = new Typed('#review_title3_title_typed', {
    strings: ['@lang("front.rate_product")'],
    typeSpeed: 150,
    backSpeed: 0,
    fadeOut: true,
    smartBackspace: true, // this is a default
    loop: true
});
@endif
</script>
@endsection
