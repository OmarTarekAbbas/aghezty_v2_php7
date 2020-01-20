@extends('frontv2.master')

@section('content')

<div class="main">
  <!-- Start Slider Carsoul -->
  @include('frontv2.video_slider')
  <section class="carsoul_ads d-none d-sm-block">
    <div class="mobile_views ">
      <div class="row">
        <div class="col-md-12 col-xl-12">
          <a href="{{$ads[2]->ads_url}}">
            <div class="full_banner">
              <img class="rounded w-100" src="{{$ads[2]->image}}" alt="{{$ads[2]->ads_url}}">
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- End Slider Carsoul -->

  <section class="choose_category mt-3">
    <div class="mobile_views">
      <div class="choose_category_background">
        <div class="row mr-0 ml-0">
          <div class="col-md-2 col-xl-2 col-4 margin_bottom_mob">
            <div class="choose_category_form text-center">
              <a href="{{route('front.home.list',['search' => 'mobile' , 'offer' => 'offer'])}}">
                <!-- <img class="rounded-circle w-75" src="images/mobiles_offers/mobiles.jpg" alt="mobiles"> -->
                <div class="diamond_sample diamond_bg_1">
                  <h5 class="diamond_sample_title text-capitalize text-center text-white w-100">
                    <strong class="d-block">Mobile</strong>
                    <strong class="d-block"> @lang('front.offer')</strong>
                  </h5>
                </div>
              </a>
            </div>
          </div>

          <div class="col-md-2 col-xl-2 col-4 margin_bottom_mob">
            <div class="choose_category_form text-center">
              <a href="{{route('front.home.list',['to' => '1000'])}}">
                <!-- <img class="rounded-circle w-75" src="images/mobiles_offers/less-1000.jpg" alt="less-1000"> -->
                <div class="diamond_sample diamond_bg_2">
                  <h5 class="diamond_sample_title text-capitalize text-center text-white w-100">
                    <strong class="d-block"> @lang('front.less') @lang('front.from')</strong>
                    <strong class="d-block"> 1000 EGP</strong>
                  </h5>
                </div>
              </a>
            </div>
          </div>

          <div class="col-md-2 col-xl-2 col-4 margin_bottom_mob">
            <div class="choose_category_form text-center">
              <a href="{{route('front.home.list',['from_to' => '1000,3000'])}}">
                <!-- <img class="rounded-circle w-75" src="images/mobiles_offers/mobiles-1000-3000.jpg" alt="mobiles-1000-3000"> -->
                <div class="diamond_sample diamond_bg_3">
                  <h5 class="diamond_sample_title text-capitalize text-center text-white w-100">
                    <strong class="d-block">@lang('front.from') 1000 EGP</strong>
                    <strong class="d-block">@lang('front.to') 3000 EGP</strong>
                  </h5>
                </div>
              </a>
            </div>
          </div>

          <div class="col-md-2 col-xl-2 col-4 margin_bottom_mob">
            <div class="choose_category_form text-center">
              <a href="{{route('front.home.list',['from_to' => '3000,6000'])}}">
                <!-- <img class="rounded-circle w-75" src="images/mobiles_offers/mobiles-3000-6000.jpg" alt="mobiles-3000-6000"> -->
                <div class="diamond_sample diamond_bg_4">
                  <h5 class="diamond_sample_title text-capitalize text-center text-white w-100">
                    <strong class="d-block">@lang('front.from') 3000 EGP</strong>
                    <strong class="d-block">@lang('front.to') 6000 EGP</strong>
                  </h5>
                </div>
              </a>
            </div>
          </div>

          <div class="col-md-2 col-xl-2 col-4 margin_bottom_mob">
            <div class="choose_category_form text-center">
              <a href="{{route('front.home.list',['from_to' => '6000,10000'])}}">
                <!-- <img class="rounded-circle w-75" src="images/mobiles_offers/mobiles-6000-10000.jpg" alt="mobiles-6000-10000"> -->
                <div class="diamond_sample diamond_bg_5">
                  <h5 class="diamond_sample_title text-capitalize text-center text-white w-100">
                    <strong class="d-block">@lang('front.from') 6000 EGP</strong>
                    <strong class="d-block">@lang('front.to') 10000 EGP</strong>
                  </h5>
                </div>
              </a>
            </div>
          </div>

          <div class="col-md-2 col-xl-2 col-4 margin_bottom_mob">
            <div class="choose_category_form text-center">
              <a href="{{route('front.home.list',['from' => '10000'])}}">
                <!-- <img class="rounded-circle w-75" src="images/mobiles_offers/more-10000.jpg" alt="more-10000"> -->
                <div class="diamond_sample diamond_bg_6">
                  <h5 class="diamond_sample_title text-capitalize text-center text-white w-100">
                    <strong class="d-block">@lang('front.more') @lang('front.from')</strong>
                    <strong class="d-block"> 10000 EGP</strong>
                  </h5>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>

      @if(count($ads) > 3)

      <div class="row d-none d-sm-block">
        <div class="col-md-12 col-xl-12 col-12">
          <a href="{{$ads[3]->ads_url}}">
            <div class="full_banner mt-3">
              <img class="rounded w-100" src="{{$ads[3]->image}}" alt="{{$ads[3]->ads_url}}">
            </div>
          </a>
        </div>
      </div>

    </div>
  </section>

  <section class="choose_category mt-3">
    <div class="mobile_views">
      <div class="choose_category_background">
        <div class="row mr-0 ml-0">
          <div class="col-md-2 col-xl-2 col-4 margin_bottom_mob">
            <div class="choose_category_form text-center">
              <a href="{{route('front.home.list',['search' => 'television' ,  'offer' => 'offer'])}}">
                <!-- <img class="rounded-circle w-75" src="images/tv_offers/tv-offers.webp" alt="mobiles"> -->

                <div class="diamond_sample diamond_bg_1">
                  <h5 class="diamond_sample_title text-capitalize text-center text-white w-100">
                    <strong class="d-block">Television</strong>
                    <strong class="d-block"> @lang('front.offer')</strong>
                  </h5>
                </div>
              </a>
            </div>
          </div>

          <div class="col-md-2 col-xl-2 col-4 margin_bottom_mob">
            <div class="choose_category_form text-center">
              <a href="{{route('front.home.list',['ito' => '32'])}}">
                <!-- <img class="rounded-circle w-75" src="images/tv_offers/less-32-inch.jpg" alt="mobiles-6000-10000"> -->

                <div class="diamond_sample diamond_bg_2">
                  <h5 class="diamond_sample_title text-capitalize text-center text-white w-100">
                    <strong class="d-block"> @lang('front.less') @lang('front.from')</strong>
                    <strong class="d-block"> 32 @lang('front.inch')</strong>
                  </h5>
                </div>
              </a>
            </div>
          </div>

          <div class="col-md-2 col-xl-2 col-4 margin_bottom_mob">
            <div class="choose_category_form text-center">
              <a href="{{route('front.home.list',['ifrom_ito' => '32,43'])}}">
                <!-- <img class="rounded-circle w-75" src="images/tv_offers/32-43-inch.jpg" alt="less-1000"> -->

                <div class="diamond_sample diamond_bg_3">
                  <h5 class="diamond_sample_title text-capitalize text-center text-white w-100">
                    <strong class="d-block">32 @lang('front.to')</strong>
                    <strong class="d-block"> 43 @lang('front.inch')</strong>
                  </h5>
                </div>
              </a>
            </div>
          </div>

          <div class="col-md-2 col-xl-2 col-4 margin_bottom_mob">
            <div class="choose_category_form text-center">
              <a href="{{route('front.home.list',['ifrom_ito' => '49,55'])}}">
                <!-- <img class="rounded-circle w-75" src="images/tv_offers/49-55-inch.jpg" alt="mobiles-1000-3000"> -->

                <div class="diamond_sample diamond_bg_4">
                  <h5 class="diamond_sample_title text-capitalize text-center text-white w-100">
                    <strong class="d-block">49 @lang('front.to')</strong>
                    <strong class="d-block"> 55 @lang('front.inch')</strong>
                  </h5>
                </div>
              </a>
            </div>
          </div>

          <div class="col-md-2 col-xl-2 col-4 margin_bottom_mob">
            <div class="choose_category_form text-center">
              <a href="{{route('front.home.list',['ifrom_ito' => '60,75'])}}">
                <!-- <img class="rounded-circle w-75" src="images/tv_offers/60-75-inch.jpg" alt="mobiles-3000-6000"> -->

                <div class="diamond_sample diamond_bg_5">
                  <h5 class="diamond_sample_title text-capitalize text-center text-white w-100">
                    <strong class="d-block">60 @lang('front.to')</strong>
                    <strong class="d-block"> 75 @lang('front.inch')</strong>
                  </h5>
                </div>
              </a>
            </div>
          </div>

          <div class="col-md-2 col-xl-2 col-4 margin_bottom_mob">
            <div class="choose_category_form text-center">
              <a href="{{route('front.home.list',['ifrom' => '75'])}}">
                <!-- <img class="rounded-circle w-75" src="images/tv_offers/more-75-inch.jpg" alt="more-10000"> -->

                <div class="diamond_sample diamond_bg_6">
                  <h5 class="diamond_sample_title text-capitalize text-center text-white w-100">
                    <strong class="d-block">@lang('front.more') @lang('front.from')</strong>
                    <strong class="d-block"> 75 @lang('front.inch')</strong>
                  </h5>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>


      <div class="row ml-0">

        @if (count($ads) == 5)

        <div class="col-md-12 col-xl-12 pl-0 ">
          <div class="left-img mt-3">
            <a href="{{$ads[4]->ads_url}}">
              <img class="w-100 rounded" src="{{$ads[4]->image}}" alt="{{$ads[4]->ads_url}}">
            </a>
          </div>
        </div>

        @elseif (count($ads) > 5)

        <div class="col-md-6 col-xl-6 pl-0 ">
          <div class="left-img mt-3">
            <a href="{{$ads[4]->ads_url}}">
              <img class="w-100 rounded" src="{{$ads[4]->image}}" alt="{{$ads[4]->ads_url}}">
            </a>
          </div>
        </div>

        <div class="col-md-6 col-xl-6 pl-0">
          <div class="left-img mt-3">
            <a href="{{$ads[5]->ads_url}}">
              <img class="w-100 rounded" src="{{$ads[5]->image}}" alt="{{$ads[5]->ads_url}}">
            </a>
          </div>
        </div>

        @endif

      </div>

      @endif
    </div>
  </section>

  <section class="product_view mt-3">
    <div class="mobile_views">
      <div class="product_view_type">
        <div class="product_title mb-3">
          <div class="title_left text-left font-weight-bold">
            <strong class="recently_added_funnyTexty">@lang('messages.recently_added')</strong>
          </div>

          <div class="title_right text-right">
            <a href="{{route('front.home.list',['last' => 'last'])}}" class="btn btn-dark">@lang('messages.view_more')</a>
          </div>
        </div>

        <div class="row">

          {{-- --}}
          @foreach ($recently_added as $item)
          <div class="col-md-4 col-xl-2 col-6 margin_bottom_mob">
            <div class="px-2 product_desc hvr-bob rounded">
              <a class="m-1" href="{{url('clients/product/'.$item->id)}}">
                <img src="{{$item->main_image}}" alt="{{$item->getTranslation('title',getCode())}}" class="w-100 rounded d-block m-auto">

                @if($item->discount > 0)
                <div class="product-label text-center font-weight-bold">
                  <span class="sale-product-icon">-{{$item->discount}}%</span>
                </div>
                @endif

                <div class="mt-1">
                  <p class="full_desc my-3">{{$item->getTranslation('title',getCode())}}</p>
                </div>
              </a>
              @if ($item->price_after_discount >0)

              <div class="price-box">
                <span class="regular-price">
                  <span class="price">{{$item->price_after_discount}} EGP</span>
                </span>

                <p class="old-price">
                  <span class="price">
                    {{$item->price}} EGP</span>
                </p>
              </div>
              @else
              <div class="price-box">
                <span class="regular-price">
                  <span class="price">{{$item->price}} EGP</span>
                </span>
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
            <a class="hoverabley" href="{{url('clients/products?sub_category_id='.$item->id)}}">
              <div class="hovertitle rounded">
                <p>{{$item->getTranslation('title',getCode())}}</p>
              </div>
              <img class="rounded w-100" src="{{$item->image}}" alt="{{$item->getTranslation('title',getCode())}}">
            </a>
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
          <div class="title_left text-left font-weight-bold">
            <strong class="selected_fYou_funnyTexty">@lang('messages.selected_for_you')</strong>
          </div>

          <div class="title_right text-right">
            <button class="btn btn-dark">@lang('messages.view_more')</button>
          </div>
        </div>

        <div class="row">
          {{-- --}}
          @foreach ($selected_for_you as $item)

          <div class="col-md-4 col-xl-2 col-6 margin_bottom_mob">
            <div class="px-2 product_desc hvr-bob rounded">
              <a class="m-1" href="{{url('clients/product/'.$item->id)}}">
                <img src="{{$item->main_image}}" alt="{{$item->getTranslation('title',getCode())}}" class="img_size w-75 d-block m-auto">

                @if($item->discount > 0)
                <div class="product-label text-center font-weight-bold">
                  <span class="sale-product-icon">-{{$item->discount}}%</span>
                </div>
                @endif

                <div>
                  <p class="full_desc my-3">{{$item->getTranslation('title',getCode())}}</p>
                </div>
              </a>

              @if ($item->price_after_discount >0)

              <div class="price-box">
                <span class="regular-price">
                  <span class="price">{{$item->price_after_discount}} EGP</span>
                </span>

                <p class="old-price">
                  <span class="price">
                    {{$item->price}} EGP</span>
                </p>
              </div>
              @else
              <div class="price-box">
                <span class="regular-price">
                  <span class="price">{{$item->price}} EGP</span>
                </span>
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

@section('script')

<script>
  $(document).ready(function() {
    var recently_added_funnyTexty = new Typed(".recently_added_funnyTexty", {
      strings: [$('.recently_added_funnyTexty').html()],
      typeSpeed: 150,
      backSpeed: 0,
      fadeOut: true,
      smartBackspace: true, // this is a default
      loop: true
    });

    var selected_fYou_funnyTexty = new Typed(".selected_fYou_funnyTexty", {
      strings: [$('.selected_fYou_funnyTexty').html()],
      typeSpeed: 150,
      backSpeed: 0,
      fadeOut: true,
      smartBackspace: true, // this is a default
      loop: true
    });
  });
</script>
@endsection
