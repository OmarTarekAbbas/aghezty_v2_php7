@extends('front.layout')
@section('page_title')
@if($product) {{$product->getTranslation('title',getCode())}} @endif
@endsection
@section('content')
<!-- main content -->
@if(App::getLocale() == 'en')
<style>
.inner_desc {
    position: relative;
    bottom: 0;
    width: 100%;
}

.listing .reviews .card-desktop .by {
    width: 30%;
    float: left;
}

.listing .reviews .card-desktop .content {
    width: 70%;
    margin-left: 0;
}



@media screen and (max-width: 640px) {
    .inner_desc .quantity-inner {
        width: 100%;
        position: initial;
    }

    .inner_desc .quantity-inner .plus-inner {
        float: left;
        right: 0;
    }
}
</style>
@endif
<div class="main">
    @include('errors')
    @include('partial.flash')
    @if($product)
    <div class="container">
        <div class="owl-three owl-carousel owl-theme">
            @if(count($product->images) > 0)
                <div class="item">
                    <a href="{{$product->main_image}}"  data-fancybox="images">
                        <img src="{{$product->main_image}}" alt="{{$product->getTranslation('title',getCode())}}">
                    </a>
                </div>
                @foreach ($product->images as $image)
                <div class="item">
                    <a href="{{$image->image}}" data-fancybox="images">
                        <img src="{{$image->image}}" alt="{{$product->getTranslation('title',getCode())}}">
                    </a>
                </div>
                @endforeach
            @else
                <div class="item">
                    <a href="{{$product->main_image}}"  data-fancybox="images">
                        <img src="{{$product->main_image}}" alt="{{$product->getTranslation('title',getCode())}}">
                    </a>
                </div>
            @endif
        </div>
        @if(is_buy($product->id) && is_not_rate($product->id))
        <!-- Start Modal For Rating & Comment -->
        <button
            style="border-bottom-right-radius: 35%;z-index: 4; border-top-right-radius: 35%; position: fixed; left: 0px; top: 50%;"
            type="button" class="btn btn-primary close_rate" data-toggle="modal" data-target="#exampleModalLong">
            <i style="display: block;" class="far fa-star fa-2x"></i>
            <i class="far fa-comment fa-2x"></i>
        </button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="padding-top: 4%;">
                    <div class="modal-body">
                        <div id="charge-error" class="alert alert-danger {{ar_en()}}" style="display:none;direction:{{dir_ar_en()}}">
                        </div>
                        <div style="color:#ffe358" class="text-center">
                            <h5 style="color:#FFF">@lang('front.rate_product')</h5>
                            <i onclick="document.getElementById('rate').value=1" class="forStart far fa-star"></i>
                            <i onclick="document.getElementById('rate').value=2" class="forStart far fa-star"></i>
                            <i onclick="document.getElementById('rate').value=3" class="forStart far fa-star"></i>
                            <i onclick="document.getElementById('rate').value=4" class="forStart far fa-star"></i>
                            <i onclick="document.getElementById('rate').value=5" class="forStart far fa-star"></i>
                        </div>

                        <div style="border-bottom: 1px solid #FFF; margin: 20px auto; width: 80%;"></div>

                        <h5 class="text-center">@lang('front.add_comment')</h5>
                        <div class="form">
                            <div class="mail"></div>
                            <h5 class="text-center">@lang('front.your_comment')</h5>
                            <form method="POST" class="rate_form">
                                {{ csrf_field() }}
                                <input type="hidden" id="rate" name="rate" value="">
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <textarea class="comment-desc" name="comment" cols="30" rows="10"
                                    placeholder="@lang('front.your_comment')"></textarea>

                                <button type="submit" style="margin-left:23%;"
                                    class="submit">@lang('front.send')</button>

                            </form>
                        </div>
                    </div>
                    <div class="modal-footer text-center">
                        <button style="width:85%" type="button" class="btn btn-secondary"
                            data-dismiss="modal">@lang('front.close')</button>
                        <!-- <button type="button" class="btn btn-primary">حفظ</button> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal For Rating & Comment -->
        @endif

        {{-- @if($product->stock > 0)
        <!-- Start Modal Two To Add Order To Cart Shop -->
        <a href="#" data-toggle="modal" data-target="#cart2"  data-product_id="{{$product->id}}" data-name="ثلاجة"
        data-price="1000"
        class="add-to-cart btn btn-primary fas fa-shopping-cart fa-lg"></a>
        @else
        <a href="#" data-toggle="modal" data-target="#request_product" data-product_id="{{$product->id}}"
            data-name="ثلاجة" data-price="1000" class="add-to-cart btn btn-primary fas fa-shopping-cart fa-lg"></a>
        @endif --}}
        <!-- Modal Two -->
        <div class="modal fade" id="cart2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">@lang('front.add_to_cart')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-2 text-center">
                            <div class="modal-desc">
                                <h5>{{$product->getTranslation('title',getCode())}}
                                    <span> @lang('front.add_message')</span>
                                </h5>
                            </div>

                            <div class="modal-btns-info">
                                <a href="{{url('/clients/home')}}" class="btn">@lang('front.back')
                                    @lang('front.home')</a>
                                <a href="{{url('/clients/cart')}}" class="btn">@lang('front.go_to_cart')</a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                        <!-- <button type="button" class="btn btn-primary">اطلب الان</button> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Two To Add Order To Cart Shop -->

        <!-- Modal Two -->
        <div class="modal fade" id="request_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalLabel">@lang('front.notify_me_when_available')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-group mx-auto" style="width:90%" action="{{url('clients/is_available')}}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <div class="form-row text-right">
                                <div class="col-6 mb-4">
                                    <label for="exampleFormControlInput1">@lang('front.auth.name') *</label>
                                    <input type="text" id="exampleFormControlInput1"  name="name" value="{{Auth::guard('client')->check()?Auth::guard('client')->user()->name:''}}" class="form-control"
                                        placeholder="@lang('front.auth.name') ">
                                </div>

                                <div class="col-6">
                                    <label for="exampleFormControlInput3">@lang('front.auth.email')  *</label>
                                    <input type="emil" id="exampleFormControlInput3" class="form-control" name="email" value="{{Auth::guard('client')->check()?Auth::guard('client')->user()->email:''}}" placeholder="@lang('front.auth.email') ">
                                </div>

                                <div class="col-4">
                                    <label for="exampleFormControlInput2">@lang('front.auth.phone')  *</label>
                                    <input type="tel" id="exampleFormControlInput2" class="form-control" name="phone" value="{{Auth::guard('client')->check()?Auth::guard('client')->user()->phone:''}}" placeholder="@lang('front.auth.phone') ">
                                </div>

                                <div class="col-4">
                                    <label for="exampleFormControlSelect1">@lang('front.governorate')</label>
                                    {!! Form::select("governorate_id", \App\Governorate::pluck('title_'.getCode(),'id'),null, ['required' ,'class' => 'form-control' ,'id' => 'gover_add']) !!}
                                </div>

                                <div class="col-4">
                                    <label for="exampleFormControlSelect1">@lang('front.city')</label>
                                    {!! Form::select("city_id", \App\City::pluck('city_'.getCode(),'id'),null, ['required' ,'id' => 'add_city' ,'class' => 'form-control']) !!}
                                </div>
                                <button type="submit" class="btn btn-light btn-outline-light mx-auto w-75 mt-3">@lang('front.send')</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('front.close')</button>
                        <!-- <button type="button" class="btn btn-primary">اطلب الان</button> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Two To Add Order To Cart Shop -->

        <div class="inner_desc {{ar_en()}}">
            <h5 style="font-weight:bold">{{$product->getTranslation('title',getCode())}}</h5>
            <p>{{$product->getTranslation('short_description',getCode())}}</p>
            <div class="text-center">
                @if ($product->discount)
                <div style="color: #00daff; font-weight: 700;">{{$product->price_after_discount}}<span class="money-sign"
                        style="position: relative; left: 1%;">LE</span>
                </div>
                <del style="color: #000; font-weight: 700;">{{$product->price}}<span class="money-sign"
                        style="position: relative; left: 1%;">LE</span>
                </del>
                @else
                <div style="color: #00daff; font-weight: 700;">{{$product->price}}<span class="money-sign"
                        style="position: relative; left: 1%;">LE</span>
                </div>
                @endif
            </div>
            <div class="text-center">
                @if($product->stock > 0)
                <button class="add-to-cart btn btn-primary w-20"
                    data-product_id="{{$product->id}}" data-name="ثلاجة" data-price="1000"> @lang('front.buy_now')
                    <i class="fas fa-shopping-cart fa-lg"></i>
                </button>
              @else
                <button class="add-to-cart btn btn-primary w-20" data-toggle="modal" data-target="#request_product"  data-product_id="{{$product->id}}" data-name="ثلاجة" data-price="1000"> @lang('front.notify_me_when_available')

                </button>
                @endif
            </div>
        </div>

        <div class="table-responsive {{ar_en()}}" style="margin: 10px auto;">
            <h5 style="font-weight:bold">@lang('front.product_info')</h5>
            {!! $product->getTranslation('description',getCode()) !!}
            <div class="text-center">
                @if($product->stock > 0)
                <button class="add-to-cart btn btn-primary w-20"
                    data-product_id="{{$product->id}}" data-name="ثلاجة" data-price="1000"> @lang('front.buy_now')
                    <i class="fas fa-shopping-cart fa-lg"></i>
                </button>
              @else
                <button class="add-to-cart btn btn-primary w-20" data-toggle="modal" data-target="#request_product"  data-product_id="{{$product->id}}" data-name="ثلاجة" data-price="1000"> @lang('front.notify_me_when_available')

                </button>
                @endif
            </div>
        </div>
        <!--end of .table-responsive-->

        <!-- Start Comment For All User -->
        <section class="listing {{ar_en()}}">
            <div class="header">
                <div class="title-comment">@lang('front.all_comment')</div>
            </div>
            <div class="reviews">
                @foreach ($product->client_rates as $item)
                <article class="card-desktop -ratingReview">
                    <div class="by">
                        <address class="author word-wrap">{{$item->name}}</address>
                        <time datetime="3 سبتمبر، 2019" class="date">{{$item->pivot->created_at->format('d M Y')}}</time>
                    </div>
                    <div class="content">
                        <div class="rating-stars">
                            @for ($i=0 ; $i < $item->pivot->rate ;$i++)
                                <i class="stars fas fa-star"></i>
                                @endfor
                                @for ($i=0 ; $i < 5-$item->pivot->rate ;$i++)
                                    <i class="stars far fa-star"></i>
                                    @endfor
                        </div>
                        <div class="detail truncate-txt" style="font-size: 13px;">{{$item->pivot->comment}}</div>
                    </div>
                </article>
                @endforeach

            </div>
        </section>
        <!-- End Comment For All User -->
    </div>
    @else
    <div class="alert alert-danger text-center">
        @lang('front.no_product')
    </div>
    @endif
</div>
@endsection
@section('script')
@if($product)

<script>
$('[data-fancybox="images"]').fancybox({
    buttons: [
        'slideShow',
        'share',
        'zoom',
        'fullScreen',
        'close'
    ],
    thumbs: {
        autoStart: true
    }
});
</script>
<script>
sessionStorage.setItem("current_url", document.referrer)
$('.add-to-cart').click(function(e) {
    $.ajax({
        url: "{{url('clients/cart')}}",
        type: "POST",
        data: {
            'product_id': '{{$product->id}}',
            'counter': $('.quantity-input').val(),
            'price': '{{($product->discount)?$product->price_after_discount:$product->price}}'
        },
        success: function(data) {
            if(data.status == 'success'){
                $('.total-count').html(parseInt($('.total-count').html()) + 1)
                $('#cart2').modal('show')
            }
            else{
                console.log(data.status);
                $('#cart2').modal('hide')
                alert("@lang('front.you_already_take_this_product_in_your_cart')")
            }

        },
    });
})
$(".submit").on('click', function(e) {
    e.preventDefault();
    $.ajax({
        url: "{{url('clients/add_rate')}}",
        type: "POST",
        data: $(".rate_form").serialize(),
        success: function(data) {
            if(data.status == 'success'){
                $('#exampleModalLong').modal('toggle');
                $('.close_rate').hide()
                alert('Your Rate Added Suucessfuly')
            }
            else{
                var lis= []
                for (const [key, value] of Object.entries(data.error )) {
                    var li = '<li>'+value+'</li>';
                    lis.push(li)
                }
                $('#charge-error').html(lis).show()
            }

        },
    });
});
$(document).on('change', '#gover_add', function() {
    $.ajax({
        url: "{{url('clients/city')}}/" + $(this).val(),
        type: "get",
        success: function(data) {
            $('#add_city').empty();
            for (let i = 0; i < data.length; i++) {
                const element = '<option value="' + data[i].id + '">' + data[i].city + '</option>'
                $('#add_city').append(element)
            }
        },
    });
})
</script>
@endif
@endsection
