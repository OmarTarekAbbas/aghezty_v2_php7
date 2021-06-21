@extends('front.layout')
@section('page_title')
@lang('front.home')
@stop
@section('content')
@php
$brands= brands();
$categorys = categorys();
@endphp
<!-- main content -->
<div class="main">
    <div class="container">
        <div class="owl-one owl-carousel owl-theme">
            @foreach ($products as $product)
            <div class="item">
                <a href="{{url('clients/product/'.$product->id)}}">
                    <img src="{{url($product->main_image)}}" height="259px" alt="offer">
                </a>
            </div>
            @endforeach
        </div>
        <!-------------------------------------------------------------->

        <!-- new brands 1 -->
        <div class="brands">
            <div class="brand_title">
                <h4>@lang('front.brands')</h4>
            </div>

            <div class="btn-more">
                <a href="{{url('clients/all_brand')}}">@lang('front.more')
                    <i class="fas fa-chevron-left"></i>
                </a>
            </div>

            <div class="contant">
                <div class="owl-two owl-carousel owl-theme">
                    @foreach ($brands as $brand)
                    <div class="item">
                        <a href="{{url('clients/products?brand_id='.$brand->id)}}">
                            <img src="{{($brand->image)}}" alt="brand" height="95px">
                            <span class="img-title">{{$brand->getTranslation('title',getCode())}}</span>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- end brands 1 -->
        @if(setting('ads'))
        <section class="ads text-center">
            <div class="ads_title text-right">
                <h4>@lang('front.ads')</h4>
            </div>
            <div class="row">
                @foreach(ads() as $ad)
                <div class="col-6">
                    <div class="ads-img">
                        <a href="{{$ad->ads_url}}">
                            <img src="{{$ad->image}}" alt="ads">
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        @endif
        <!-- new brands 2 -->
        <div class="brands">
            <div class="brand_title">
                <h4>@lang('front.categorys')</h4>
            </div>

            <div class="btn-more">
                <a href="{{url('clients/sub_categorys')}}">@lang('front.more')
                    <i class="fas fa-chevron-left"></i>
                </a>
            </div>
            <div class="row">
                @foreach ($categorys as $category)
                <div class="col-6">
                    <div class="cat-item text-center">
                        <a href="{{url('clients/sub_categorys?parent_id='.$category->id)}}">
                            <img src="{{url($category->image)}}" alt="category" height="135px">
                            <span class="img-title">{{$category->getTranslation('title',getCode())}}</span>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>


        <div class="brands">
            <div class="row">
                @if(setting('android_link') != '')
                <div class="col-12">
                    <div class="mob-app text-center">
                        <a href="{{setting('android_link')}}">
                            <img src="{{url('front/img/app-1.png')}}" alt="T">
                        </a>
                    </div>
                </div>
                @endif
                @if(setting('ios_link') != '')
                <div class="col-12">
                    <div class="mob-app text-center">
                        <a href="{{setting('ios_link')}}">
                            <img src="{{url('front/img/app.png')}}" alt="T">
                        </a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- end brands 2 -->
</div>
</div>
@stop
