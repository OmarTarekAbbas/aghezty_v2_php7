@extends('frontv2.master')
@section('content')

<div class="main">
  <!-- Start Slider Carsoul -->
  @include('frontv2.video_slider')
  <section class="carsoul_ads d-none d-sm-block">
    <div class="mobile_views ">
      <div class="row">
        @if(advertisements(3))
        <div class="col-md-12 col-xl-12">
          <a href="{{advertisements(3)->ads_url}}">
            <div class="full_banner">
              <img class="rounded w-100" src="{{advertisements(3)->image}}" alt="{{advertisements(3)->ads_url}}">
            </div>
          </a>
        </div>
        @endif
      </div>
    </div>
  </section>
  <!-- End Slider Carsoul -->

  <section class="choose_category mt-3">
    <div class="mobile_views">
      <div class="choose_category_background">
        <div class="row mr-0 ml-0">
          <div class="col-md-4 col-lg-4 col-xl-2 col-4 margin_bottom_mob">
            <div class="choose_category_form text-center">
              <a href="{{route('front.home.search.category',['sub_category_id' => 49, 'category_name' => 'Mobile'])}}">
                <!-- <img class="rounded-circle w-75" src="images/mobiles_offers/mobiles.jpg" alt="mobiles"> -->
                <div class="diamond_sample diamond_bg_1 hvr-sweep-to-bottom hvr-pulse">
                  <h5 class="diamond_sample_title text-capitalize text-center text-white w-100">
                    <strong class="d-block">{{\Session::get('applocale') == 'en'? __('front.mobile'):__('front.offer')  }}</strong>
                    <strong class="d-block">{{\Session::get('applocale') == 'en'? __('front.offer'):__('front.mobile') }}</strong>
                  </h5>
                </div>
              </a>
            </div>
          </div>

          <div class="col-md-4 col-lg-4 col-xl-2 col-4 margin_bottom_mob">
            <div class="choose_category_form text-center">
              <a href="{{route('front.home.search.category',['sub_category_id' => 49, 'category_name' => 'Mobile']).'?to=1000'}}">
                <!-- <img class="rounded-circle w-75" src="images/mobiles_offers/less-1000.jpg" alt="less-1000"> -->
                <div class="diamond_sample diamond_bg_2 hvr-sweep-to-bottom hvr-pulse">
                  <h5 class="diamond_sample_title text-capitalize text-center text-white w-100">
                    <strong class="d-block"> @lang('front.less') @lang('front.from')</strong>
                    <strong class="d-block"> 1000 @lang('front.egp') </strong>
                  </h5>
                </div>
              </a>
            </div>
          </div>

          <div class="col-md-4 col-lg-4 col-xl-2 col-4 margin_bottom_mob">
            <div class="choose_category_form text-center">
              <a href="{{route('front.home.search.category',['sub_category_id' => 49, 'category_name' => 'Mobile']).'?from_to=1000,3000'}}">
                <!-- <img class="rounded-circle w-75" src="images/mobiles_offers/mobiles-1000-3000.jpg" alt="mobiles-1000-3000"> -->
                <div class="diamond_sample diamond_bg_3 hvr-sweep-to-bottom hvr-pulse">
                  <h5 class="diamond_sample_title text-capitalize text-center text-white w-100">
                    <strong class="d-block">@lang('front.from') 1000 @lang('front.egp') </strong>
                    <strong class="d-block">@lang('front.to') 3000 @lang('front.egp') </strong>
                  </h5>
                </div>
              </a>
            </div>
          </div>

          <div class="col-md-4 col-lg-4 col-xl-2 col-4 margin_bottom_mob">
            <div class="choose_category_form text-center">
              <a href="{{route('front.home.search.category',['sub_category_id' => 49, 'category_name' => 'Mobile']).'?from_to=3000,6000'}}">
                <!-- <img class="rounded-circle w-75" src="images/mobiles_offers/mobiles-3000-6000.jpg" alt="mobiles-3000-6000"> -->
                <div class="diamond_sample diamond_bg_4 hvr-sweep-to-bottom hvr-pulse">
                  <h5 class="diamond_sample_title text-capitalize text-center text-white w-100">
                    <strong class="d-block">@lang('front.from') 3000 @lang('front.egp') </strong>
                    <strong class="d-block">@lang('front.to') 6000 @lang('front.egp') </strong>
                  </h5>
                </div>
              </a>
            </div>
          </div>

          <div class="col-md-4 col-lg-4 col-xl-2 col-4 margin_bottom_mob">
            <div class="choose_category_form text-center">
              <a href="{{route('front.home.search.category',['sub_category_id' => 49, 'category_name' => 'Mobile']).'?from_to=6000,10000'}}">
                <!-- <img class="rounded-circle w-75" src="images/mobiles_offers/mobiles-6000-10000.jpg" alt="mobiles-6000-10000"> -->
                <div class="diamond_sample diamond_bg_5 hvr-sweep-to-bottom hvr-pulse">
                  <h5 class="diamond_sample_title text-capitalize text-center text-white w-100">
                    <strong class="d-block">@lang('front.from') 6000 @lang('front.egp') </strong>
                    <strong class="d-block">@lang('front.to') 10000 @lang('front.egp') </strong>
                  </h5>
                </div>
              </a>
            </div>
          </div>

          <div class="col-md-4 col-lg-4 col-xl-2 col-4 margin_bottom_mob">
            <div class="choose_category_form text-center">
              <a href="{{route('front.home.search.category',['sub_category_id' => 49, 'category_name' => 'Mobile']).'?from=10000'}}">
                <!-- <img class="rounded-circle w-75" src="images/mobiles_offers/more-10000.jpg" alt="more-10000"> -->
                <div class="diamond_sample diamond_bg_6 hvr-sweep-to-bottom hvr-pulse">
                  <h5 class="diamond_sample_title text-capitalize text-center text-white w-100">
                    <strong class="d-block">@lang('front.more') @lang('front.from')</strong>
                    <strong class="d-block"> 10000 @lang('front.egp') </strong>
                  </h5>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="logo_brands">
        <div class="owl_brands owl-carousel owl-theme">
          @foreach($home_brands as $homeBrand)
          <div class="item">
            <div class="brands_img">
              <a href="{{ route('front.home.list', ['brand_id' => $homeBrand->id]) }}">
                <img src="{{ $homeBrand->image }}" alt="{{ $homeBrand->title }}">
              </a>
            </div>
          </div>
          @endforeach
        </div>
      </div>

      <!-- <div class="logo_brands">
        <div class="owl_brands owl-carousel owl-theme">
          <div class="item">
            <div class="brands_img">
            <a href="#0">
              <img src="{{url('public/frontv2/images/logo_brands/Apple.png')}}" alt="">
              </a>
            </div>
          </div>

          <div class="item">
            <div class="brands_img">
              <img src="{{url('public/frontv2/images/logo_brands/Ariston.png')}}" alt="">
            </div>
          </div>

          <div class="item">
            <div class="brands_img">
              <img src="{{url('public/frontv2/images/logo_brands/Black_Decker.png')}}" alt="">
            </div>
          </div>

          <div class="item">
            <div class="brands_img">
              <img src="{{url('public/frontv2/images/logo_brands/Bosch.png')}}" alt="">
            </div>
          </div>

          <div class="item">
            <div class="brands_img">
              <img src="{{url('public/frontv2/images/logo_brands/Braun.png')}}" alt="">
            </div>
          </div>

          <div class="item">
            <div class="brands_img">
              <img src="{{url('public/frontv2/images/logo_brands/carrier.png')}}" alt="">
            </div>
          </div>

          <div class="item">
            <div class="brands_img">
              <img src="{{url('public/frontv2/images/logo_brands/elba.png')}}" alt="">
            </div>
          </div>

          <div class="item">
            <div class="brands_img">
              <img src="{{url('public/frontv2/images/logo_brands/Franke.png')}}" alt="">
            </div>
          </div>

          <div class="item">
            <div class="brands_img">
              <img src="{{url('public/frontv2/images/logo_brands/Glem-Gas.png')}}" alt="">
            </div>
          </div>

          <div class="item">
            <div class="brands_img">
              <img src="{{url('public/frontv2/images/logo_brands/infinix.png')}}" alt="">
            </div>
          </div>

          <div class="item">
            <div class="brands_img">
              <img src="{{url('public/frontv2/images/logo_brands/Kenwood.png')}}" alt="">
            </div>
          </div>

          <div class="item">
            <div class="brands_img">
              <img src="{{url('public/frontv2/images/logo_brands/koldair.png')}}" alt="">
            </div>
          </div>

          <div class="item">
            <div class="brands_img">
              <img src="{{url('public/frontv2/images/logo_brands/LG.png')}}" alt="">
            </div>
          </div>

          <div class="item">
            <div class="brands_img">
              <img src="{{url('public/frontv2/images/logo_brands/mi-mobile.png')}}" alt="">
            </div>
          </div>

          <div class="item">
            <div class="brands_img">
              <img src="{{url('public/frontv2/images/logo_brands/Panasonic.png')}}" alt="">
            </div>
          </div>

          <div class="item">
            <div class="brands_img">
              <img src="{{url('public/frontv2/images/logo_brands/Samsung.png')}}" alt="">
            </div>
          </div>

          <div class="item">
            <div class="brands_img">
              <img src="{{url('public/frontv2/images/logo_brands/Sharp.png')}}" alt="">
            </div>
          </div>

          <div class="item">
            <div class="brands_img">
              <img src="{{url('public/frontv2/images/logo_brands/Sony.png')}}" alt="">
            </div>
          </div>

          <div class="item">
            <div class="brands_img">
              <img src="{{url('public/frontv2/images/logo_brands/tornado.png')}}" alt="">
            </div>
          </div>

          <div class="item">
            <div class="brands_img">
              <img src="{{url('public/frontv2/images/logo_brands/TOSHIBA.png')}}" alt="">
            </div>
          </div>

          <div class="item">
            <div class="brands_img">
              <img src="{{url('public/frontv2/images/logo_brands/white-point.png')}}" alt="">
            </div>
          </div>

          <div class="item">
            <div class="brands_img">
              <img src="{{url('public/frontv2/images/logo_brands/white-whale.png')}}" alt="">
            </div>
          </div>
        </div>
      </div> -->

      @if(advertisements(4))
      {{-- <div class="row d-sm-block">
        <div class="col-md-12 col-xl-12 col-12">
          <a href="{{advertisements(4)->ads_url}}">
            <div class="full_banner mt-3">
              <img class="rounded w-100" src="{{advertisements(4)->image}}" alt="{{advertisements(4)->ads_url}}">
            </div>
          </a>
        </div>
      </div> --}}
      @endif
    </div>
  </section>

  <section class="choose_category mt-3">
    <div class="mobile_views">
      <div class="choose_category_background">
        <div class="row mr-0 ml-0">
          <div class="col-md-4 col-lg-4 col-xl-2 col-4 margin_bottom_mob">
            <div class="choose_category_form text-center">
              <a href="{{route('front.home.search.category',['sub_category_id' => 34, 'category_name' => 'TV']).'?sub_category_id=34'}}">
                <!-- <img class="rounded-circle w-75" src="images/tv_offers/tv-offers.webp" alt="mobiles"> -->

                <div class="diamond_sample diamond_bg_1 hvr-sweep-to-bottom hvr-pulse">
                  <h5 class="diamond_sample_title text-capitalize text-center text-white w-100">
                    <strong class="d-block">{{\Session::get('applocale') == 'en'? __('front.tv'):__('front.offer')  }}</strong>
                    <strong class="d-block">{{\Session::get('applocale') == 'en'? __('front.offer'):__('front.tv') }}</strong>
                  </h5>
                </div>
              </a>
            </div>
          </div>

          <div class="col-md-4 col-lg-4 col-xl-2 col-4 margin_bottom_mob">
            <div class="choose_category_form text-center">
              <a href="{{route('front.home.search.category',['sub_category_id' => 34, 'category_name' => 'TV' , 'property' => 'inch-22-32']).'?property_value_id[]=1&sorted=price,asc'}}">
                <!-- <img class="rounded-circle w-75" src="images/tv_offers/less-32-inch.jpg" alt="mobiles-6000-10000"> -->

                <div class="diamond_sample diamond_bg_2 hvr-sweep-to-bottom hvr-pulse">
                  <h5 class="diamond_sample_title text-capitalize text-center text-white w-100">
                    <strong class="d-block">22 @lang('front.to')</strong>
                    <strong class="d-block"> 32 @lang('front.inch')</strong>
                  </h5>
                </div>
              </a>
            </div>
          </div>

          <div class="col-md-4 col-lg-4 col-xl-2 col-4 margin_bottom_mob">
            <div class="choose_category_form text-center">
              <a href="{{route('front.home.search.category',['sub_category_id' => 34, 'category_name' => 'TV' , 'property' => 'inch-33-42']).'?property_value_id[]=2&sorted=price,asc'}}">
                <!-- <img class="rounded-circle w-75" src="images/tv_offers/32-43-inch.jpg" alt="less-1000"> -->

                <div class="diamond_sample diamond_bg_3 hvr-sweep-to-bottom hvr-pulse">
                  <h5 class="diamond_sample_title text-capitalize text-center text-white w-100">
                    <strong class="d-block">33 @lang('front.to')</strong>
                    <strong class="d-block"> 42 @lang('front.inch')</strong>
                  </h5>
                </div>
              </a>
            </div>
          </div>

          <div class="col-md-4 col-lg-4 col-xl-2 col-4 margin_bottom_mob">
            <div class="choose_category_form text-center">
              <a href="{{route('front.home.search.category',['sub_category_id' => 34, 'category_name' => 'TV' , 'property' => 'inch-43-54']).'?property_value_id[]=3&sorted=price,asc'}}">
                <!-- <img class="rounded-circle w-75" src="images/tv_offers/49-55-inch.jpg" alt="mobiles-1000-3000"> -->

                <div class="diamond_sample diamond_bg_4 hvr-sweep-to-bottom hvr-pulse">
                  <h5 class="diamond_sample_title text-capitalize text-center text-white w-100">
                    <strong class="d-block">43 @lang('front.to')</strong>
                    <strong class="d-block"> 54 @lang('front.inch')</strong>
                  </h5>
                </div>
              </a>
            </div>
          </div>

          <div class="col-md-4 col-lg-4 col-xl-2 col-4 margin_bottom_mob">
            <div class="choose_category_form text-center">
              <a href="{{route('front.home.search.category',['sub_category_id' => 34, 'category_name' => 'TV' , 'property' => 'inch-55-65']).'?property_value_id[]=6&sorted=price,asc'}}">
                <!-- <img class="rounded-circle w-75" src="images/tv_offers/60-75-inch.jpg" alt="mobiles-3000-6000"> -->

                <div class="diamond_sample diamond_bg_5 hvr-sweep-to-bottom hvr-pulse">
                  <h5 class="diamond_sample_title text-capitalize text-center text-white w-100">
                    <strong class="d-block">55 @lang('front.to')</strong>
                    <strong class="d-block"> 65 @lang('front.inch')</strong>
                  </h5>
                </div>
              </a>
            </div>
          </div>

          <div class="col-md-4 col-lg-4 col-xl-2 col-4 margin_bottom_mob">
            <div class="choose_category_form text-center">
              <a href="{{route('front.home.search.category',['sub_category_id' => 34, 'category_name' => 'TV' , 'property' => 'inch-66']).'?property_value_id[]=5&sorted=price,asc'}}">
                <!-- <img class="rounded-circle w-75" src="images/tv_offers/more-75-inch.jpg" alt="more-10000"> -->

                <div class="diamond_sample diamond_bg_6 hvr-sweep-to-bottom hvr-pulse">
                  <h5 class="diamond_sample_title text-capitalize text-center text-white w-100">
                    <strong class="d-block">@lang('front.more') @lang('front.from')</strong>
                    <strong class="d-block"> 66 @lang('front.inch')</strong>
                  </h5>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="row ml-0">
        @if(advertisements(5) && advertisements(6))
        <div class="col-md-6 col-xl-6 pl-0 ">
          <div class="left-img mt-3">
            <a href="{{advertisements(5)->ads_url}}">
              <img class="w-100 rounded" src="{{advertisements(5)->image}}" alt="{{advertisements(5)->ads_url}}">
            </a>
          </div>
        </div>

        <div class="col-md-6 col-xl-6 pl-0">
          <div class="left-img mt-3">
            <a href="{{advertisements(6)->ads_url}}">
              <img class="w-100 rounded" src="{{advertisements(6)->image}}" alt="{{advertisements(6)->ads_url}}">
            </a>
          </div>
        </div>
        @elseif(advertisements(5))
        <div class="col-md-12 col-xl-12 pl-0 ">
          <div class="left-img mt-3">
            <a href="{{advertisements(5)->ads_url}}">
              <img class="w-100 rounded" src="{{advertisements(5)->image}}" alt="{{advertisements(5)->ads_url}}">
            </a>
          </div>
        </div>

        @elseif(advertisements(6))
        <div class="col-md-12 col-xl-12 pl-0 ">
          <div class="left-img mt-3">
            <a href="{{advertisements(6)->ads_url}}">
              <img class="w-100 rounded" src="{{advertisements(6)->image}}" alt="{{advertisements(6)->ads_url}}">
            </a>
          </div>
        </div>
        @endif
      </div>
    </div>
  </section>

  <section class="product_view mt-3">
    <div class="mobile_views">
      <div class="product_view_type">
        <div class="product_title mb-3">
          <div class="row">
            <div class="col-6">
              <div class="title_left text-left font-weight-bold">
                <strong>@lang('messages.recently_added')</strong>
              </div>
            </div>

            <div class="col-6">
              <div class="title_right text-right">
                <a href="{{route('front.home.list',['last' => 'last'])}}" class="btn btn-dark">@lang('messages.view_more')</a>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          @foreach ($recently_added as $item)
          <div class="col-md-4 col-xl-2 col-6 margin_bottom_mob">
            <div class="px-2 product_desc hvr-bob rounded">
            <a class="m-1" href="{{route('front.home.inner',['id' => $item->id ,'category_name' => setcategory_name($item->getTranslation('title',getCode()))])}}">
                <img src="{{$item->main_image}}" alt="{{$item->getTranslation('title',getCode())}}"
                  class="text-center d-block">

                <div class="mt-1">
                  <p class="full_desc my-3">{{$item->getTranslation('title',getCode())}}</p>
                </div>
              </a>

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

              @if ($item->price_after_discount > 0 && $item->price  > $item->price_after_discount)

              <div class="price-box">
                <div class="row m-0">
                  <div class="col-md-6 col-lg-6 col-xl-6 col-12 p-0">
                    <span class="regular-price">
                      <span class="price">{{number_format($item->price_after_discount)}} @lang('front.egp') </span>
                    </span>
                  </div>

                  <div class="col-md-6 col-lg-6 col-xl-6 col-12 p-0">
                    <p class="old-price">
                      <span class="price">
                        {{number_format($item->price)}} @lang('front.egp') </span>
                    </p>
                  </div>
                </div>
              </div>
              @else
              <div class="row m-0">
                <div class="col-md-12 col-lg-12 col-xl-12 col-12 p-0">
                  <div class="price-box">
                    <span class="regular-price">
                      <span class="price">{{number_format($item->price)}} @lang('front.egp') </span>
                    </span>
                  </div>
                </div>
              </div>
              @endif
            </div>
          </div>
          @endforeach
          {{-- --}}

        </div>
      </div>
    </div>
  </section>

  <section class="choose_category mt-3">
    <div class="mobile_views">
      <div class="row no_margin">

        {{-- --}}
        @foreach ($homepage_cat as $item)

        <div class="col-md-2 col-xl-2 col-6 margin_bottom_mob">
          <div class="choose_category_form text-center">
            <a class="hoverabley" href="{{route('front.home.list',['sub_category_id' => $item->id])}}">
              <div class="hovertitle rounded">
                <p>{{$item->getTranslation('title',getCode())}}</p>
              </div>
              <img class="rounded w-100" src="{{$item->image}}" alt="{{$item->getTranslation('title',getCode())}}">
            </a>
            <h4 class="d-block d-sm-block d-md-none d-lg-none d-xl-none text-capitalize text-center h5">
              {{$item->getTranslation('title',getCode())}}
            </h4>
          </div>
        </div>

        @endforeach
        {{-- --}}

      </div>
    </div>
  </section>

  <section class="product_view mt-3">
    <div class="mobile_views">
      <div class="product_view_type">
        <div class="product_title mb-3">
          <div class="row">
            <div class="col-6">
              <div class="title_left text-left font-weight-bold">
                <strong>@lang('messages.selected_for_you')</strong>
              </div>
            </div>

            <div class="col-6">
              <div class="title_right text-right">
                <a href="{{route('front.home.list',['random' => 'random'])}}" class="btn btn-dark">@lang('messages.view_more')</a>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          {{-- --}}
          @foreach ($selected_for_you as $item)

          <div class="col-md-4 col-xl-2 col-6 margin_bottom_mob">
            <div class="px-2 product_desc hvr-bob rounded">
            <a class="m-1" href="{{route('front.home.inner',['id' => $item->id ,'category_name' => setcategory_name($item->getTranslation('title',getCode()))])}}">
                <img src="{{$item->main_image}}" alt="{{$item->getTranslation('title',getCode())}}"
                  class="img_size d-block">

                <div>
                  <p class="full_desc my-3">{{$item->getTranslation('title',getCode())}}</p>
                </div>
              </a>

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

              @if ($item->price_after_discount > 0 && $item->price  > $item->price_after_discount)

              <div class="price-box">
                <div class="row m-0">
                  <div class="col-md-6 col-lg-6 col-xl-6 col-12 p-0">
                    <span class="regular-price">
                      <span class="price">{{number_format($item->price_after_discount)}} @lang('front.egp') </span>
                    </span>
                  </div>

                  <div class="col-md-6 col-lg-6 col-xl-6 col-12 p-0">
                    <p class="old-price">
                      <span class="price">
                        {{number_format($item->price)}} @lang('front.egp') </span>
                    </p>
                  </div>
                </div>
              </div>
              @else
              <div class="row m-0">
                <div class="col-md-12 col-lg-12 col-xl-12 col-12 p-0">
                  <div class="price-box">
                    <span class="regular-price">
                      <span class="price">{{number_format($item->price)}} @lang('front.egp') </span>
                    </span>
                  </div>
                </div>
              </div>
              @endif
            </div>
          </div>

          @endforeach
          {{-- --}}

        </div>
      </div>
    </div>
  </section>
</div>
@endsection
