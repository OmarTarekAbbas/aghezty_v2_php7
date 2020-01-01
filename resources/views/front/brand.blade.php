@extends('front.layout')
@section('page_title')
	@lang('front.brands')
@stop
@section('content')
<!-- main content -->
@php
$brands= brands();
@endphp
<div class="main">
    <div class="container">
        <!-- new brands 2 -->
        <div class="brands">
            <div class="brand_title">
                <h4 style="text-align:center;text-decoration:underline"> @lang('front.brands')</h4>
            </div>
            <br><br>
            <div class="row">
                @foreach ($brands as $item)
                <div class="col-6">
                    <div class="cat-item text-center">
                        <a href="{{url('clients/products?brand_id='.$item->id)}}">
                            <img src="{{($item->image)}}" alt="item" height="135px">
                            <span class="img-title">{{$item->getTranslation('title',getCode())}}</span>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
        <!-- end brands 2 -->
</div>
@stop
