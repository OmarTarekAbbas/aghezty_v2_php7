@extends('frontv2.master')

@section('title')
{{$product->getTranslation('title',getCode())}}
@endsection

@section('description')
{{strip_tags($product->getTranslation('description',getCode()))}}
@endsection

@section('content')

<style>
  nav.container-fluid {
    padding-right: 0 !important;
    padding-left: 0 !important;
  }

  @media (min-width: 320px) and (max-width: 375px) {
    #inner-page .slide .carousel-inner .carousel-item .easyzoom img {
      width: 100% !important;
      height: 80% !important;
    }
  }

  @media (min-width: 376px) and (max-width: 415px) {
    #inner-page .slide .carousel-inner .carousel-item .easyzoom img {
      width: 100% !important;
      height: 100% !important;
    }
  }

  @media (min-width: 768px) and (max-width: 991px) {
    #inner-page .slide .carousel-inner .carousel-item .easyzoom img {
      width: 100% !important;
      height: 100% !important;
    }
  }

  @media (min-width: 992px) and (max-width: 1024px) {
    #inner-page .slide .carousel-inner .carousel-item .easyzoom img {
      width: 100% !important;
      height: 100% !important;
    }
  }
</style>

<div class="main">
  <div class="mobile_views ">
    <nav class="nav_breadcrumb" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <h1 class="breadcrumb-item">
          <a href="{{route('front.home.index')}}" title="Go To Home">@lang('front.home')</a>
        </h1>

        <?php
        $category = \App\Category::where('id',$product->category->id)->first();
        $category_parent_id = \App\Category::where('id',$category->parent_id)->first();
        ?>

        <span class="breadcrumb_slash"></span>

        <h1 class="breadcrumb-item">
          <a href="{{url('parent/'.$category_parent_id->id.'/'.setSlug($category_parent_id->title))}}" title="Go To {{$category_parent_id->title}}">{{$category_parent_id->getTranslation('title',getCode())}}</a>
        </h1>

        <span class="breadcrumb_slash"></span>

        <h1 class="breadcrumb-item">
          <a href="{{url('category/'.$product->category->id.'/'.setSlug($product->category->title))}}" title="Go To {{$product->category->getTranslation('title',getCode())}}">{{$product->category->getTranslation('title',getCode())}}</a>
        </h1>

        <span class="breadcrumb_slash"></span>

        <h1 class="breadcrumb-item font-weight-bold">
          {{\Illuminate\Support\Str::words($product->getTranslation('title',getCode()),3,'...')}}
        </h1>
      </ol>
    </nav>
  </div>

  <section id="inner-page" class="mobile_views">
    <div class="">
      <h1 class="product-title font-weight-bold">{{$product->getTranslation('title',getCode())}}</h1>

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

    <div class="row w-100 m-0">
      <div class="col-lg-6 col-12 p-0">
        <div class="row">
          <div class="col-md-3 d-none d-sm-block" style="overflow-y: scroll;height: 30rem;">
            @foreach ($product->images as $key=>$image)
            <div class="c-slide hvr-outline-in border btn bg-white my-1">
              <p data-target="#carouselExampleControls" data-slide-to="{{$key}}" class="active">
                <img class="w-100 d-block" src="{{url($image->image)}}" alt="{{$product->getTranslation('title',getCode())}}" />
              </p>
            </div>
            @endforeach
          </div>

          <div class="col-md-9 col-12">
            <div id="carouselExampleControls" class="carousel slide m-auto" data-ride="carousel" style="border: 1px solid #dcdcdc;">
              <div class="carousel-inner">
                @foreach ($product->images as $key=>$image)
                <div class="carousel-item {{$key == 0 ?'active' : ''}}">
                  <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
                    <a class="zoom_image" href="{{url($image->image)}}">
                      <img class="w-100 m-auto d-block text-center" src="{{url($image->image)}}" alt="{{$product->getTranslation('title',getCode())}}" />
                    </a>
                  </div>
                </div>
                @endforeach
              </div>

              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <i class="fas fa-chevron-left fa-2x left_slider"></i>
              </a>

              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <i class="fas fa-chevron-right fa-2x right_slider"></i>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="info col-lg-6 w-100 p-0">
        <div class="row m-0">
          <div class="features col-md-12">
            <h5 class="font-weight-bold py-2">@lang('front.inner.key_feature')</h5>

            <div class="more_descc">
              {!! $product->getTranslation('key_feature',getCode()) !!}
            </div>

            <div class="modal_feature">
              <h5 class="font-weight-bold d-inline-block">@lang('front.inner.model'):</h5>
              <p class="d-inline-block px-1">{{$product->getTranslation('short_description',getCode())}}</p>
            </div>

            @foreach ($product->pr_value as $item)
            <div class="modal_feature">
              <h5 class="font-weight-bold d-inline-block">{{$item->property->getTranslation('title',getCode())}}:</h5>
              <p class="d-inline-block px-1">{{$item->getTranslation('value',getCode())}}
              </p>
            </div>
            @endforeach

            {{-- <div class="desc_feature">
                            <h5 class="font-weight-bold d-inline-block">@lang('front.product'):</h6>
                                <p class="d-inline-block px-1">{{$product->getTranslation('title',getCode())}}</p>
          </div> --}}

          <div>
            <h6 class="font-weight-bold d-inline-block">@lang('front.inner.avialable'):</h6>
            <p class="d-inline-block px-1">
              {{$product->stock ? __('front.inner.in_stock') : __('front.inner.not_stock') }}
            </p>
          </div>

          {{-- @if ($product->sku)
                          <div>
                            <h6 class="font-weight-bold d-inline-block">SKU:</h6>
                            <p class="d-inline-block px-1">
                              {{$product->sku}}
          </p>
        </div>
        @endif --}}

        @php
        if($product){
        if($product->Installments != null){
        $Installments = json_decode($product->Installments, true);
        }else{
        $Installments = false;
        }
        }else{
        $Installments = false;
        }
        $counter = 0;
        @endphp

        @if ($Installments)
        <div class="installments">
          <h6>@lang('front.inner.Installments')</h6>
          <div class="row">
            @foreach ($Installments as $key => $value)
            @if ($value != null)
            <?php $counter++ ?>
            <div class="col-6 text-center" style="line-height: 16px;">
              <div class="m-1 p-2 alert-secondary"> {{$key}} @lang('messages.Months') / {{$value}} @lang('front.pound')</div>
            </div>
            @endif
            @endforeach
          </div>
        </div>
        @endif

        <div class="row price_disc_offer m-0">
          <div class="col-md-5 col-5 p-0">
            <h4 class="price text-primary font-weight-bold">
              {{number_format(($product->price_after_discount > 0 && $product->price  > $product->price_after_discount)?$product->price_after_discount:$product->price)}}
              @lang('front.egp')
            </h4>
          </div>

          <div class="col-md-5 col-5 p-0">
            @if($product->price_after_discount > 0 && $product->price  > $product->price_after_discount)
            <h4 class="discount text-muted font-weight-bold">{{number_format($product->price)}}
              @lang('front.egp')</h4>
            @if($product->discount > 0)
          </div>

          <style>
            .main #inner-page .price_disc_offer .product-label .sale-product-icon .testtt::before {
              content:"{{$product->discount}}"
            }
          </style>
          <div class="col-md-2 col-2 p-0">
            <div class="product-label text-center font-weight-bold">
              <span class="sale-product-icon">
                <span class="testtt"></span>
              </span>
            </div>
            @endif
            @endif
          </div>

        </div>

        <div class="contact_us w-100 text-left mb-3">
          <div class="contact_us_head d-inline-block">
            <h6 class="text-left text-capitalize font-weight-bold">@lang('front.contact'): </h6>
          </div>

          <div class="rounded-social-buttons d-inline-block">
            <a class="social-button phone_link" href="tel:{{setting('phone')}}" title="Phone Number">
              <i class="fas fa-phone phone_icon"></i>
            </a>

            <a class="social-button whatsapp_link" href="whatsapp://send?phone={{setting('phone')}}" title="Whatsapp">
              <i class="fab fa-whatsapp whatsapp_icon"></i>
            </a>


            <a class="social-button messenger_link" href="http://m.me/Aghezty.me" target="_blank" title="Messenger">
              <i class="fab fa-facebook-messenger messenger_icon"></i>
            </a>

            {{-- <a class="social-button sms_link" title="Messege" href="sms:{{setting('phone')}}">
            <i class="far fa-comment sms_icon"></i>
            </a> --}}
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
          @if($product->stock > 0 && checkbuyLimit($product->id)['status'])
          <button class="w-50 btn float-left font-weight-bold text-capitalize hvr-wobble-to-bottom-right" id="add_to">@lang('front.buy_now')</button>
          @elseif(!checkbuyLimit($product->id)['status'])
          <button class="w-50 btn float-left text-capitalize hvr-wobble-to-bottom-right limit_exceed">{{ trans('front.You have exceeded the limit to buy this item') }} </button>
          @else
          <button class="w-50 btn float-left text-capitalize hvr-wobble-to-bottom-right notify_me" data-toggle="modal" data-target="#notify_me_modal" type="button">@lang('front.notify_me')</button>
          @endif

          @if(\Auth::guard('client')->check() && setting("wish_list_flag") && setting("wish_list_flag") != '')
        <div class="fav_product">
          <span>
            <i class="fa fa-heart fa-2x grey {{ in_array($product->id, \Auth::guard('client')->user()->wishList()->pluck('product_id')->toArray()) ? 'red':''}}" data-id="{{ $product->id }}"></i>
          </span>
        </div>
          @endif
        </form>
      </div>

      <!-- <div class="col-md-12">
            <p class="text-danger m-2 font-weight-bold"><i class="fa fa-heart"></i> ADD TO WISHLIST</p>
					</div> -->

      <div class="rounded-social-buttons w-100">
        <strong class="text-capitalize">  @lang('front.share_with') : </strong>
        <a class="social-button facebook_link" href="https://www.facebook.com/sharer/sharer.php?u={{urldecode(route('front.home.inner',['id' => $product->id ,'slug' => setSlug($product->getTranslation('title',getCode()))]))}}" target="_blank" title="Facebook">
          <i class="fab fa-facebook-f facebook_icon"></i>
        </a>

        <a class="social-button whatsapp_link" href="https://api.whatsapp.com/send?text={{$product->getTranslation('title')}} url: {{route('front.home.inner',['id' => $product->id ,'slug' => setSlug($product->getTranslation('title',getCode()))])}}" title="Whatsapp">
          <i class="fab fa-whatsapp whatsapp_icon"></i>
        </a>

        <a class="social-button twitter_link" href="https://www.twitter.com/intent/tweet?text={{$product->getTranslation('title')}} url : {{route('front.home.inner',['id' => $product->id ,'slug' => setSlug($product->getTranslation('title',getCode()))])}}" target="_blank" title="Twitter">
          <i class="fab fa-twitter twitter_icon"></i>
        </a>

        <a class="social-button download_link" href="{{url($product->main_image)}}" download title="Download">
          <i class="fas fa-download download_icon"></i>
        </a>

        <!-- <a class="social-button instagram_link" href="https://www.instagram.com/" target="_blank" title="Instagram">
							<i class="fab fa-instagram instagram_icon"></i>
						</a> -->
      </div>
    </div>
</div>
</div>


@if($counter)
<section class="inner_table_desc" style="margin-top: -1rem">
  @else
  <section class="inner_table_desc" style="margin-top: 0">
    @endif
    <div class="table_desc pt-3">
      <h3 style="text-decoration:underline">@lang('front.product_info')</h3>
      <div style="max-width: 100%; overflow:hidden;">
        {!! $product->getTranslation('description',getCode()) !!}
      </div>
    </div>

    {{-- <table class="add_new_table table table-hover border">
      <h5>@lang('front.title')</h5>
      <tbody>
        <tr>
          <th class="th_1" scope="row">@lang('messages.warranty')</th>
          <td class="td_2" colspan="3"> {!! $product->getTranslation('warranty',getCode()) !!} </td>
        </tr>

        <tr>
          <th class="th_1" scope="row">@lang('messages.cash_on_delivery') (COD)</th>
          <td class="td_2" colspan="3"> {!! $product->getTranslation('cash_on_delivery',getCode()) !!} </td>
        </tr>

        <tr>
          <th class="th_1" scope="row">@lang('messages.delivery_time')</th>
          <td class="td_2" colspan="3"> {!! $product->getTranslation('delivery_time',getCode()) !!} </td>
        </tr>

        <tr>
          <th class="th_1" scope="row">@lang('messages.return_or_refund')</th>
          <td class="td_2" colspan="3"> {!! $product->getTranslation('return_or_refund',getCode()) !!} </td>
        </tr>
      </tbody>
    </table> --}}
  </section>

  <div class="mobile_view mt-2">
    <div class="border-bottom w-100 mt-3"></div>
  </div>
</section>

<section class="model_notify_me">
  <div class="mobile_views">
    <div class="modal fade" id="notify_me_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <form class="form-group mx-auto" style="width:90%" action="{{route('front.home.available')}}" method="post">
              {{ csrf_field() }}
              <input type="hidden" name="product_id" value="{{$product->id}}">
              <div class="form-row">
                <div class="form-group col-md-6 col-lg-6 col-xl-6 col-12 text-dark">
                  <label for="exampleFormControlInput3">@lang('front.auth.email') *</label>
                  <input type="emil" id="exampleFormControlInput3" class="form-control hvr-float" name="email" value="{{Auth::guard('client')->check()?Auth::guard('client')->user()->email:''}}" placeholder="@lang('front.auth.email') ">
                </div>

                <div class="form-group col-md-6 col-lg-6 col-xl-6 col-6 text-dark">
                  <label for="exampleFormControlInput1">@lang('front.auth.name') *</label>
                  <input type="text" id="exampleFormControlInput1" name="name" value="{{Auth::guard('client')->check()?Auth::guard('client')->user()->name:''}}" class="form-control hvr-float" placeholder="@lang('front.auth.name') ">
                </div>



                <div class="form-group col-md-4 col-lg-4 col-xl-4 col-6 text-dark">
                  <label for="exampleFormControlInput2">@lang('front.auth.phone') *</label>
                  <input type="tel" id="exampleFormControlInput2" class="form-control hvr-float" name="phone" value="{{Auth::guard('client')->check()?Auth::guard('client')->user()->phone:''}}" placeholder="@lang('front.auth.phone') ">
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
                    <button type="submit" class="btn w-100" style="background-color: #085C9B;color: #FFF;">@lang('front.send')</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn modal_foot_close" data-dismiss="modal">@lang('front.close')</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="based_selection">
  <div class="mobile_views mt-5">
    <div class="table_desc_title">
      <h6 class="font-weight-bold d-inline-block text-uppercase">@lang("front.inner.based_on_your_select")</h6>
    </div>

    <div class="border-bottom w-100"></div>

    <div class="row mt-3">
      @foreach ($items as $item)
      <div class="col-md-4 col-lg-3 col-xl-3 col-12 mb-3">
        <div class="content_view hvr-bob px-2 bg-white rounded">
          <a href="{{route('front.home.inner',['id' => $item->id ,'slug' => setSlug($item->getTranslation('title','en'))])}}">
            <img src="{{checkImageResize($item->main_image, $item->main_image_resize)}}" alt="Product" class="text-center d-block based_selection_img">
          </a>

          <h6 class="full_desc text-dark text-left text-capitalize mb-0">
            {{$item->getTranslation('title',getCode())}}
          </h6>

          @if(\Auth::guard('client')->check() && setting("wish_list_flag") && setting("wish_list_flag") != '')
          <div class="fav_product">
            <span>
              <i class="fa fa-heart fa-2x grey {{ in_array($item->id, \Auth::guard('client')->user()->wishList()->pluck('product_id')->toArray()) ? 'red':''}}" data-id="{{ $item->id }}"></i>
            </span>
          </div>
          @endif

          @if($item->discount > 0)
          <div class="product-label text-center font-weight-bold">
            <span class="sale-product-icon">{{$item->discount}} %</span>
          </div>
          @endif


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
              <span class="price font-weight-bold">{{number_format(($item->price_after_discount > 0 && $item->price  > $item->price_after_discount)?$item->price_after_discount:$item->price)}}
                @lang('front.egp') </span>
            </span>
            @if($item->price_after_discount > 0 && $item->price  > $item->price_after_discount)
            <p class="old-price">
              <span class="price font-weight-bold">{{number_format($item->price)}} @lang('front.egp') </span>
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
          <h4 class="text-capitalize d-inline-block">@lang('front.inner.reviews')</h4>
        </div>
        @foreach ($product->client_rates as $review)
        <div class="review-area my-3">
          <span class="review-by"> @lang('front.inner.review_by') <strong>{{$review->name}} </strong>
            <span style="{{Session::get('applocale') =='en' ?'float:right;direction: ltr;':'float:left;direction: ltr;'}}">
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
          <h4 class="text-capitalize d-inline-block">@lang("front.rate_product")</h4>
        </div>

        <p style="color: #777;">@lang('front.rate_product'){{Session::get('applocale') =='en' ? '?' : '??'}}
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
        <form action="{{route('front.home.rate')}}" method="post" id="rate_form" class="mt-3 mb-3 add_comment rating-widget">
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
            <textarea type="text" placeholder="@lang('front.your_comment')" name="comment" cols="5" rows="3" class="form-control"></textarea>
          </label>
          <input type="hidden" id="rate_fo" name="rate" value="">
          <input type="hidden" name="product_id" value="{{$product->id}}">
          <button class="btn btn-primary hvr-wobble-to-bottom-right" type="submit" style="float: right;margin-top: 11px;">@lang('front.send')</button>
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
    var product_stock = {{ $product->stock }};
    e.preventDefault()
    if($('.quantity-input').val() > product_stock){
      alert("{{ trans('front.Only_one_product_is_available') }}")
    }else{
      $.ajax({
        url: "{{route('front.home.cart.add')}}",
        type: "POST",
        data: {
          'success_pr': 'success_pr',
          'product_id': '{{$product->id}}',
          'counter': $('.quantity-input').val(),
          'price': '{{($product->price_after_discount && $product->price_after_discount != 0)?$product->price_after_discount:$product->price}}'
        },
        success: function(data) {
          if (data.status == 'success') {
            $('.shopping_cart_num').html(parseInt($('.shopping_cart_num').html()) + 1)
            location.href = "{{route('front.home.cart',['product_id' => $product->id])}}"
          } else if(data.status == 'stop_buy') {
            alert("{{ trans('front.You have exceeded the limit to buy this item') }} ")
            $('.quantity-input').val(1);
          } else {
            alert("@lang('front.you_already_take_this_product_in_your_cart')")
            $('.quantity-input').val(1);
          }

        },
      });
    }

  });

  $('#gover_add').change(function() {
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
  });

  $(document).ready(function() {
    $.ajax({
      url: "{{url('clients/city')}}/" + $('#gover_add').val(),
      type: "get",
      success: function(data) {
        $('#add_city').empty();
        for (let i = 0; i < data.length; i++) {
          const element = '<option value="' + data[i].id + '">' + data[i].city + '</option>'
          $('#add_city').append(element)
        }
      },
    });
  });
</script>
@endsection
