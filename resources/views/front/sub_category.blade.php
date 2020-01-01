@extends('front.layout')
@section('page_title')
	الاقسام
@stop
@section('content')
<!-- main content -->
<div class="main">
    <div class="container">
        @foreach ($categorys as $item)
        <!-- new brands 2 -->
        <div class="brands">
            <div class="brand_title">
                <h4 style="text-align:center;text-decoration:underline">{{$item->getTranslation('title',getCode())}}</h4>
            </div>
            <br><br>
            <div class="row">
                @foreach ($item->sub_cats as $category)
                <div class="col-6">
                    <div class="cat-item text-center">
                        <a href="{{url('clients/products?sub_category_id='.$category->id)}}">
                            <img src="{{url($category->image)}}" alt="category" height="135px">
                            <span class="img-title">{{$category->getTranslation('title',getCode())}}</span>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
        <!-- end brands 2 -->
</div>
@stop
