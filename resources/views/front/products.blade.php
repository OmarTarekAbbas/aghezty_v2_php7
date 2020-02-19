@extends('front.layout')
@section('page_title')
@lang('front.products')
@stop
@section('content')
<!-- main content -->
<div class="main">
    <div class="container" style="min-height:700px">
        <div id="products" class="row list-group">
            @if(count($products) > 0)
            @foreach ($products as $product)
            <div class="item col-xs-4 col-sm-12 col-lg-12 list-group-item">
                <div class="row">
                    <div class="col-6">
                        <a href="{{url('clients/product/'.$product->id)}}" class="thumbnail">
                            <img class="group list-group-image" src="{{url($product->main_image)}}" height="150px"
                                alt="" />
                            <div class="ribbon">
                                @if ($product->discount)
                                <span>{{$product->discount}}</span>
                                @endif
                            </div>
                        </a>
                    </div>
                    <div class="col-6">
                        <div class="caption text-right">
                            <h5 class="group inner list-group-item-heading">
                                {{$product->getTranslation('title',getCode())}}</h5>
                            <!-- <div>3/9/2019</div> -->
                            @if ($product->discount)
                            <span style="color: #00daff; font-weight: 700;">{{$product->price_after_discount}}<span
                                class="money-sign" style="position: relative; left: 1%;">LE</span></span>
                            <del style="color: #CCC; margin-left: 7px;">{{$product->price}}<span class="money-sign"
                                    style="position: relative; left: 1%;">LE</span></del>
                            @else
                            <span style="color: #00daff; font-weight: 700;">{{$product->price}}<span
                                class="money-sign" style="position: relative; left: 1%;">LE</span></span>
                            @endif
                            <div class="star">
                                @for ($i = 0; $i < $product->rate(); $i++)
                                    <i class="far fa-star active-rate"></i>
                                @endfor
                                @for ($i = 0; $i < 5-$product->rate(); $i++)
                                    <i class="far fa-star"></i>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="alert alert-info text-center" role="alert">
                   @lang('front.no_product')
            </div>
            @endif
        </div>
    </div>
</div>
<div class="load" style="position: fixed;top: 40%;left:40%;display:none"><img src="{{url('front/img/loading.gif')}}"
        width="10%" /></div>
@stop

@section('script')
<script type="text/javascript">
sessionStorage.setItem("current_url", document.referrer)
var start = 0;
var action = 'inactive';
$('.load').hide();
$(window).on("scroll", function() {
    if ($(window).scrollTop() + $(window).height() > $("#products").height() && action == 'inactive') {
        $('.load').show();
        action = 'active';
        start = start + {{get_limit_paginate()}};
        setTimeout(function() {
            load_content_data(start);
        }, 500);

    }
});

function load_content_data(start) {
    $.ajax({
        url: '{{url("clients/loadproduct")}}?' + window.location.search.substring(1) + '&start=' + start,
        type: "get",
        success: function(data) {
            if (data.html == '') {
                action = 'active';
            } else {
                $('#products').append(data.html);
                action = 'inactive';
            }
            $('.load').hide();
        },
    });

}
</script>
@endsection
