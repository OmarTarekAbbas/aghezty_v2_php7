<!DOCTYPE html>
<html lang="en" style="height:100%;">
<style>
  button:focus {
    outline: 0 !important;

  }

  .accordion_two:hover,
  .accordion_two:focus {
    background-color: #FFF !important;
  }

  .panel {
    display: none;
  }

  .panel ul li {
    line-height: 2;
  }

  .panel ul li a:hover,
  .panel ul li a:focus {
    color: #FFF !important;
    text-decoration: underline !important;
  }

  .panel ul li:nth-child(odd) {
    background: #343a40;
  }

  .panel ul li:nth-child(even) {
    background: #3c434a;
  }

  .footer_footer {
    font-weight: bold;
  }
  .red{
    color: red !important;
  }
  .grey {
    color:grey;
  }
</style>
@yield('style')

<head>
  <!-- Global site tag (gtag.js) - Google Analytics  -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-187664661-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-187664661-1');
  </script>
  <title> @yield('title') Aghezty </title>
  <link rel="shortcut icon" href="{{url('public/frontv2/images/logo/fav_icon.png')}}">
  <meta charset="utf-8">
  <!--IE Compatibility Meta-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Mobile Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- SEO Engine -->
  <meta name="keywords"
    content="Buy Online, Buy in Egypt, Shop in Egypt, Online Shop, Online Store, Aghezty, Aghezty.com, Electronics, Mobiles, Tablets, Laptops, Computers, TVs, Home Appliance, Personal Care, Refrigerators, Cookers, Heaters, Accessories. Electronics Brands, Cash On Delivery, Installment, Premium Card, Ahly Visa Installment, Credit Card, Free Delivery, Agent Warranty, شراء عبر الإنترنت ، شراء في مصر ، متجر في مصر ، متجر على الإنترنت ، متجر على شبكة الإنترنت ، إلكترونيات ، هواتف محمولة ، أجهزة لوحية ، أجهزة الكمبيوتر المحمولة ، أجهزة الكمبيوتر ، تلفزيونات ، الأجهزة المنزلية ، العناية الشخصية ، ثلاجات ، طباخات ، سخانات ، اكسسوارات. العلامات التجارية الإلكترونية ، الدفع عند الاستلام ، القسط ، البطاقة المميزة ، تقسيط بطاقة التأشيرة من الأهلي ، بطاقة الائتمان ، التوصيل المجاني ، ضمان الوكيل">
    @if (Request::segment(2) == 'productv2')
    <meta name="description"
    content="@yield('description')">
    <meta name="title"
    content="@yield('title')" />
    @else
    <meta name="description"
    content="Aghezty is the is the first and largest e-commerce website in Egypt dedicated for all types of consumer electronics, أجهزتى هو أول وأكبر موقع للتجارة الإلكترونية في مصر مخصص لجميع أنواع الإلكترونيات الاستهلاكية">
    <meta name="title"
    content="Buy Online, Buy in Egypt, Shop in Egypt, Online Shop, Online Store, Aghezty, Aghezty.com, Electronics, Mobiles, Tablets, Laptops, Computers, TVs, Home Appliance, Personal Care, Refrigerators, Cookers, Heaters, Accessories. Electronics Brands, Cash On Delivery, Installment, Premium Card, Ahly Visa Installment, Credit Card, Free Delivery, Agent Warranty, شراء عبر الإنترنت ، شراء في مصر ، متجر في مصر ، متجر على الإنترنت ، متجر على شبكة الإنترنت ، إلكترونيات ، هواتف محمولة ، أجهزة لوحية ، أجهزة الكمبيوتر المحمولة ، أجهزة الكمبيوتر ، تلفزيونات ، الأجهزة المنزلية ، العناية الشخصية ، ثلاجات ، طباخات ، سخانات ، اكسسوارات. العلامات التجارية الإلكترونية ، الدفع عند الاستلام ، القسط ، البطاقة المميزة ، تقسيط بطاقة التأشيرة من الأهلي ، بطاقة الائتمان ، التوصيل المجاني ، ضمان الوكيل" />
    @endif

  <!-- canonical Current Link -->
  <link rel="canonical" href="{{ url()->full() }}" />
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" type="text/css" href="{{url('public/frontv2/css/bootstrap.min.css')}}">
  <!-- Fontawesome CSS-->
  <link rel="stylesheet" type="text/css" href="{{url('public/frontv2/css/all.min.css')}}">
  <!-- Easy Zoom-->
  <link rel="stylesheet" type="text/css" href="{{url('public/frontv2/css/easyzoom.css')}}">
  <!-- owl carousel -->
  <link rel="stylesheet" href="{{url('public/frontv2/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{url('public/frontv2/css/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{url('public/frontv2/css/jquery-spinner.min.css')}}">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@500;700&display=swap" rel="stylesheet">
  <!-- hover -->
  <!-- <link rel="stylesheet" href="{{url('public/frontv2/css/hover.css')}}"> -->
  <link rel="stylesheet" href="{{url('public/frontv2/css/animate.css')}}">
  <meta name="token" content="{{ csrf_token() }}">
  @if (\Session::get('applocale') == 'ar')
  <link rel="stylesheet" type="text/css" href="{{url('public/frontv2/css/style_AR.css')}}">
  @else
  <link rel="stylesheet" type="text/css" href="{{url('public/frontv2/css/style.css')}}">
  @endif
  <style>
    .order_one .cart-aside .summary .summary-subtotal .subtotal-value::after,
    .order_two .cart-aside .summary .summary-subtotal .subtotal-value::after {
      content: " @lang('front.egp')"
    }

    .my_profile .my_profile_bg .accordion_add .card .card-body .cart-aside .summary .summary-subtotal .subtotal-value::after {
      content: " @lang('front.egp')"
    }

    .head_three .navbar .navbar-nav .nav-link {
      font-size: 13px !important;
      font-family: 'Tajawal', sans-serif;

    }
  </style>
  <script src="//www.google.com/recaptcha/api.js" async></script>

  <!-- Facebook Pixel Code -->
  <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '458767491992041');
    fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=458767491992041&ev=PageView&noscript=1"
  /></noscript>
  <!-- End Facebook Pixel Code -->

</head>

<body oncontextmenu="return {{ setting('enable_rclick') ? 'true' : 'false' }};">
  <header class="head_two d-none d-sm-block d-md-none d-none d-md-none d-lg-block">
    <div class="row mx-0">
      <div class="col-md-3 col-lg-2 col-xl-3">
        <div class="img_logo">
          <a href="{{route('front.home.index')}}">
            <img class="d-block m-auto" src="{{url('public/frontv2/images/logo/06.png')}}" alt="Logo">
          </a>
        </div>
      </div>

      <div class="col-md-6 col-lg-4 col-xl-5">
        <form class="search-container" id="form_search" action="{{url('clients/productsv2')}}" method="get">
          <input type="text" id="search-bar" autocomplete="off" value="{{ request()->get('search') }}" name="search" placeholder="@lang('messages.search')">
          <a onclick="document.getElementById('form_search').submit()" href="#">
            <div class="search_background">
              <i class="search-icon fas fa-search fa-2x"></i>
            </div>
          </a>
        </form>

        <div class="old_search_value">
          <?php $searchValue = session()->has("old_search_value") ? session()->get("old_search_value") : [] ?>
          <ul class="list-unstyled">
            @foreach(array_slice(array_reverse($searchValue), 0, 5) as $value)
              <li class="mb-1 search-data p-2">{{ $value }}</li>
            @endforeach
          </ul>
        </div>
      </div>
      @if(!Auth::guard('client')->user())

      <div class="col-md-6 col-lg-4 col-xl-3">
        <div class="new_head">
          <a class="text-uppercase" href="{{route('front.client.register')}}" id="navbarDropdownMenuLink9"
            aria-haspopup="true" aria-expanded="false">@lang('front.auth.register')</a>

          <a class="text-uppercase" href="{{route('front.client.login')}}" id="navbarDropdownMenuLink10"
            aria-haspopup="true" aria-expanded="false">@lang('front.auth.login')</a>

          <a class="text-uppercase" id="navbarDropdownMenuLink112"
            href="{{url('lang')}}/{{Session::get('applocale') == 'en'? "ar" : "en"}}">
            <img src="{{url('public/frontv2/images/lang/'.(Session::get('applocale') == 'ar'? 'en' : 'ar').'.webp')}}"
              alt="{{\Session::get('applocale') == 'ar'? "English" : "Arabic"}}">{{\Session::get('applocale') == 'ar'? " English" : " العربية"}}
          </a>
        </div>
      </div>

      @else
      <!-- Start My Account-->

      <div class="col-md-6 col-lg-4 col-xl-3">
        <div class="new_head">
          <span class="dropdown">
            <span class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              <a class="text-uppercase" href="" id="navbarDropdownMenuLink9" aria-haspopup="true"
                aria-expanded="false">{{\Auth::guard('client')->user()->name}}</a>
            </span>

            <span class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="{{route('front.home.profile')}}">@lang('front.profile')</a>
              <a class="dropdown-item" href="{{route('front.home.address')}}">@lang('front.address')</a>
              @if (!Auth::guard('client')->user()->facebook)
              <a class="dropdown-item" href="{{route('front.home.password')}}">@lang('front.auth.password')</a>
              @endif
              <a class="dropdown-item" href="{{route('front.home.order')}}">@lang('front.order')</a>
              @if(setting("wish_list_flag") && setting("wish_list_flag") != '')
              <a class="dropdown-item" href="{{route('front.home.wishlist')}}">@lang('front.wishlist.wishlist')</a>
              @endif
              <a class="dropdown-item" href="{{route('front.home.logout')}}">@lang('front.sign_out')</a>
            </span>
          </span>

          <a class="text-uppercase" id="navbarDropdownMenuLink112"
            href="{{url('lang')}}/{{Session::get('applocale') == 'en'? "ar" : "en"}}">
            <img src="{{url('public/frontv2/images/lang/'.(Session::get('applocale') == 'ar'? 'en' : 'ar').'.webp')}}"
              alt="{{\Session::get('applocale') == 'ar'? "English" : "Arabic"}}">{{\Session::get('applocale') == 'ar'? " English" : " العربية"}}
          </a>
        </div>
      </div>
      <!-- End My Account-->
      @endif


      <div class="col-md-3 col-lg-2 col-xl-1">
        <div class="shopping_cart">
          <button type="button" onclick="location.href = '{{route('front.home.cart')}}'">
            <!-- <i class="fas fa-shopping-cart fa-3x"></i> -->
            <span class="shopping_cart_num">{{((Auth::guard('client')->user()) ? count(Auth::guard('client')->user()->carts):0)+count_session_cart()}}</span>
            <svg class="shopping_cart_img" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 40 38" xml:space="preserve">
              <g>
                <path class="st0" d="M40,16.7c-0.9,2.7-1.8,5.4-2.7,8.1c-0.1,0.5-0.6,0.8-1.1,0.7c-6.7,0-13.3,0-20,0c0.3,1.1,0.6,2.1,0.9,3.2   c7,0,13.9,0,20.9,0c0.3,0,0.5,0.5,0.5,1c0,0.5-0.2,1-0.5,1c-7.2,0-14.5,0-21.7,0c-0.5,0-0.9-0.3-1-0.8c-2.4-8.7-4.7-17.5-7-26.2   c-2.3,0-4.7,0-7,0c-0.6,0-1.1-0.6-1-1.2c0.1-0.5,0.5-0.9,1-0.9c2.6,0,5.1,0,7.7,0c0.5,0,1,0.3,1.1,0.8c1.9,7,3.8,14,5.7,21.1   c6.6,0,13.2,0,19.8,0c0.8-2.4,1.7-4.9,2.5-7.3"/>
                <g>
                  <path class="st0" d="M17.7,31.1c1.7-0.5,3.6,0.6,4.1,2.2c0.4,1,0.3,2.3-0.4,3.2c-0.8,1.2-2.3,1.8-3.7,1.5    c-1.5-0.3-2.7-1.7-2.7-3.2C15,33.1,16.1,31.5,17.7,31.1z M18.1,32.9c-0.8,0.2-1.4,1.1-1.2,1.9c0.1,0.8,0.9,1.5,1.8,1.4    c1,0,1.8-1.2,1.5-2.1C20,33.2,19,32.6,18.1,32.9z"/>
                </g>
                <g>
                  <path class="st0" d="M33.6,31.1c1.6-0.5,3.5,0.5,4.1,2.1c0.4,1,0.3,2.3-0.3,3.2c-0.7,1.2-2.3,1.8-3.6,1.5    c-1.6-0.3-2.8-1.8-2.8-3.4C30.9,33,32,31.5,33.6,31.1z M33.9,32.9c-0.6,0.2-1.1,0.7-1.2,1.4c-0.2,1,0.7,1.9,1.6,1.9    c1,0.1,1.9-1,1.7-2C35.9,33.2,34.9,32.6,33.9,32.9z"/>
                </g>
              </g>
            </svg>
          </button>
          <!-- (<span class="total-count"></span>) -->
        </div>
      </div>
    </div>
  </header>

  <header class="head_three ">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark special-color-dark">
      <a class="mobile_logo d-sm-block d-md-block d-lg-none" href="{{route('front.home.index')}}">
        <img class="d-block m-auto" src="{{url('public/frontv2/images/logo/06.png')}}" alt="Logo">
      </a>

      <!-- Collapse button -->
      <button class="navbar-toggler menu_click_up" type="button" data-toggle="collapse" data-target="#navbarSupportedContent2"
        aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>

      <a class="shopping_cart_img d-sm-block d-md-block d-lg-none" href="{{url('clients/cartv2')}}">
        <span class="shopping_cart_num">{{((Auth::guard('client')->user()) ? count(Auth::guard('client')->user()->carts):0)+count_session_cart()}}</span>
        <!-- <img class="d-block m-auto w-100" src="{{url('public/frontv2/images/cart-dark.png')}}" alt="Cart"> -->
        <svg class="shopping_cart_img" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 40 38" xml:space="preserve">
          <g>
            <path class="st0" d="M40,16.7c-0.9,2.7-1.8,5.4-2.7,8.1c-0.1,0.5-0.6,0.8-1.1,0.7c-6.7,0-13.3,0-20,0c0.3,1.1,0.6,2.1,0.9,3.2   c7,0,13.9,0,20.9,0c0.3,0,0.5,0.5,0.5,1c0,0.5-0.2,1-0.5,1c-7.2,0-14.5,0-21.7,0c-0.5,0-0.9-0.3-1-0.8c-2.4-8.7-4.7-17.5-7-26.2   c-2.3,0-4.7,0-7,0c-0.6,0-1.1-0.6-1-1.2c0.1-0.5,0.5-0.9,1-0.9c2.6,0,5.1,0,7.7,0c0.5,0,1,0.3,1.1,0.8c1.9,7,3.8,14,5.7,21.1   c6.6,0,13.2,0,19.8,0c0.8-2.4,1.7-4.9,2.5-7.3"/>
            <g>
              <path class="st0" d="M17.7,31.1c1.7-0.5,3.6,0.6,4.1,2.2c0.4,1,0.3,2.3-0.4,3.2c-0.8,1.2-2.3,1.8-3.7,1.5    c-1.5-0.3-2.7-1.7-2.7-3.2C15,33.1,16.1,31.5,17.7,31.1z M18.1,32.9c-0.8,0.2-1.4,1.1-1.2,1.9c0.1,0.8,0.9,1.5,1.8,1.4    c1,0,1.8-1.2,1.5-2.1C20,33.2,19,32.6,18.1,32.9z"/>
            </g>
            <g>
              <path class="st0" d="M33.6,31.1c1.6-0.5,3.5,0.5,4.1,2.1c0.4,1,0.3,2.3-0.3,3.2c-0.7,1.2-2.3,1.8-3.6,1.5    c-1.6-0.3-2.8-1.8-2.8-3.4C30.9,33,32,31.5,33.6,31.1z M33.9,32.9c-0.6,0.2-1.1,0.7-1.2,1.4c-0.2,1,0.7,1.9,1.6,1.9    c1,0.1,1.9-1,1.7-2C35.9,33.2,34.9,32.6,33.9,32.9z"/>
            </g>
          </g>
        </svg>
      </a>
    </nav>

    <!-- Navbar -->
  </header>

  <div class="head_three_ul w-100">
  @php
      $categorys = categorys();
      @endphp
      <!-- Collapsible content -->
      <div class="collapse navbar-collapse navbar-expand-lg d-lg-block d-xl-block" id="navbarSupportedContent2">
        <ul id="sub-header" class="navbar-nav navbar-expand-lg w-100">
          <!-- Start Heavy Machines -->
          @foreach ($categorys as $category)
          @if($category->sub_cats->count() > 0)
          <li class="nav-item dropdown mega-dropdown active m-auto">
            <a class="nav-link dropdown-toggle text-uppercase slide_toggle" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$category->getTranslation('title',getCode())}}
              {{-- <span class="sr-only">(current)</span> --}}
            </a>

            <div id="heavy_machines" class="dropdown-menu mega-menu v-2 z-depth-1 special-color py-5 px-3 slideContent" aria-labelledby="navbarDropdownMenuLink2">

              <div class="row">
                <div class="col-md-4 col-xl-4 col-6 sub-menu mb-xl-0 mb-4 ">
                  <h6 class="sub-title text-uppercase font-weight-bold d-inline-block">{{$category->getTranslation('title',getCode())}}</h6>
                  <ul class="list-unstyled">
                    @php
                    $count = $category->sub_cats->count();
                    $limit = $count/2;
                    @endphp
                    @foreach ($category->sub_cats->slice(0, $limit) as $sub_category)

                    <li>
                    <a class="menu-item font-weight-bold text-capitalize border-0 pl-0 hvr-icon-forward" href="{{url('category/'.$sub_category->id.'/'.setSlug($sub_category->title))}}">
                    <i class="fas fa-caret-right pl-1 pr-2"></i>
                        {{$sub_category->getTranslation('title',getCode())}}</a>
                    </li>

                    @endforeach
                  </ul>
                </div>

                <div class="col-md-4 col-xl-4 col-6 sub-menu mb-xl-0 mt-4">
                  <!-- <h6 class="sub-title text-uppercase font-weight-bold white-text ">Heavy Machines</h6> -->
                  <ul class="list-unstyled">
                    @foreach ($category->sub_cats->slice($limit, $count) as $sub_category)
                    <li>
                    <a class="menu-item font-weight-bold text-capitalize border-0 pl-0 hvr-icon-forward" href="{{url('category/'.$sub_category->id.'/'.setSlug($sub_category->title))}}">
                        <i class="fas fa-caret-right pl-1 pr-2"></i>
                        {{$sub_category->getTranslation('title',getCode())}}
                    </a>
                    </li>
                    @endforeach
                  </ul>
                </div>

                <div class="col-md-4 col-xl-4 col-12 sub-menu mb-0">
                  <h6 class="sub-title text-uppercase font-weight-bold d-inline-block" >@lang("front.shop_by_price")</h6>

                  <ul class="list-unstyled">

                    <li>
                      <a class="menu-item font-weight-bold text-capitalize border-0 pl-0 hvr-icon-forward" href="{{url('parent/'.$category->id.'/'.setSlug($category->title).'?to=1000')}}"><i class="fas fa-caret-right pl-1 pr-2"></i> @lang('front.less') @lang('front.from') 1000
                        @lang('front.egp') </a>
                    </li>

                    <li>
                      <a class="menu-item font-weight-bold text-capitalize border-0 pl-0 hvr-icon-forward" href="{{url('parent/'.$category->id.'/'.setSlug($category->title).'?from_to=1000,3000')}}"><i class="fas fa-caret-right pl-1 pr-2"></i> @lang('front.from') 1000 @lang('front.egp')
                        @lang('front.to') 3000 @lang('front.egp') </a>
                    </li>

                    <li>
                      <a class="menu-item font-weight-bold text-capitalize border-0 pl-0 hvr-icon-forward" href="{{url('parent/'.$category->id.'/'.setSlug($category->title).'?from_to=6000,10000')}}"><i class="fas fa-caret-right pl-1 pr-2"></i> @lang('front.from') 6000 @lang('front.egp')
                        @lang('front.to') 10000 @lang('front.egp') </a>
                    </li>

                    <li>
                      <a class="menu-item font-weight-bold text-capitalize border-0 pl-0 hvr-icon-forward" href="{{url('parent/'.$category->id.'/'.setSlug($category->title).'?from=10000')}}"><i class="fas fa-caret-right pl-1 pr-2"></i> @lang('front.more') @lang('front.from') 10000
                        @lang('front.egp') </a>
                    </li>

                  </ul>
                </div>
              </div>
            </div>
          </li>
          @endif
          @endforeach
          <!-- End Heavy Machines -->

          @php
          $brands = brands();
          @endphp
          <!-- Start Brands-->
          <li class="nav-item dropdown mega-dropdown">
            <a class="nav-link dropdown-toggle text-uppercase slide_toggle" id="navbarDropdownMenuLink4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> @lang('front.brands')</a>

            <div id="brands" class="dropdown-menu mega-menu v-2 z-depth-1 special-color py-5 px-3 slideContent" aria-labelledby="navbarDropdownMenuLink4">
              <div class="row">
                <div class="col-md-4 col-xl-4 col-6 sub-menu mb-xl-0 mb-4">
                  <h6 class="sub-title text-uppercase font-weight-bold d-inline-block">@lang('front.brands')</h6>
                  <ul class="list-unstyled">
                    @php
                    $count = $brands->count();
                    $limit = $count/2;
                    @endphp
                    @foreach ($brands->slice(0, $limit) as $item)
                    <li>
                    <a class="menu-item font-weight-bold text-capitalize border-0 pl-0 hvr-icon-forward" href="{{url('brand/'.$item->id.'/'.setSlug($item->title))}}">
                    <i class="fas fa-caret-right pl-1 pr-2"></i> {{$item->getTranslation('title',getCode())}}</a>
                    </li>
                    @endforeach
                  </ul>
                </div>

                <div class="col-md-4 col-xl-4 col-6 sub-menu mb-xl-0 mt-4">
                  <!-- <h6 class="sub-title text-uppercase font-weight-bold">Brands</h6> -->
                  <ul class="list-unstyled">
                    @foreach ($brands->slice($limit, $count) as $item)
                    <li>
                    <a class="menu-item font-weight-bold text-capitalize border-0 pl-0 hvr-icon-forward" href="{{url('brand/'.$item->id.'/'.setSlug($item->title))}}"></i> {{$item->getTranslation('title',getCode())}}</a>
                    </li>
                    @endforeach
                  </ul>
                </div>

                <div class="col-md-4 col-xl-4 col-12 sub-menu mb-0">
                  <h6 class="sub-title text-uppercase font-weight-bold d-inline-block">@lang("front.shop_by_price")</h6>

                  <ul class="list-unstyled">
                    <li>
                      <a class="menu-item font-weight-bold text-capitalize border-0 pl-0 hvr-icon-forward" href="{{url('clients/productsv2?to=1000')}}"><i class="fas fa-caret-right pl-1 pr-2"></i>
                        @lang('front.less') @lang('front.from') 1000 @lang('front.egp') </a>
                    </li>

                    <li>
                      <a class="menu-item font-weight-bold text-capitalize border-0 pl-0 hvr-icon-forward" href="{{url('clients/productsv2?from_to=1000,3000')}}"><i class="fas fa-caret-right pl-1 pr-2"></i> @lang('front.from') 1000 @lang('front.egp')
                        @lang('front.to') 3000 @lang('front.egp') </a>
                    </li>

                    <li>
                      <a class="menu-item font-weight-bold text-capitalize border-0 pl-0 hvr-icon-forward" href="{{url('clients/productsv2?from_to=6000,10000')}}"><i class="fas fa-caret-right pl-1 pr-2"></i> @lang('front.from') 6000 @lang('front.egp')
                        @lang('front.to') 10000 @lang('front.egp') </a>
                    </li>

                    <li>
                      <a class="menu-item font-weight-bold text-capitalize border-0 pl-0 hvr-icon-forward" href="{{url('clients/productsv2?from=10000')}}"><i class="fas fa-caret-right pl-1 pr-2"></i>
                        @lang('front.more') @lang('front.from') 10000 @lang('front.egp') </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </li>
          <!-- End Brands-->

          <!-- Start Offers -->
          <li class="nav-item dropdown mega-dropdown">
            <a class="nav-link dropdown-toggle text-uppercase slide_toggle" href="" data-toggle="dropdown" id="navbarDropdownMenuLink5" aria-haspopup="true" aria-expanded="false">@lang('front.offer')</a>

            <div id="offer" class="dropdown-menu mega-menu v-2 z-depth-1 special-color py-5 px-3 slideContent" aria-labelledby="navbarDropdownMenuLink5">
              <div class="row">
                <div class="col-md-6 col-xl-6 col-6 sub-menu mb-xl-0 mb-4">
                  <h6 class="sub-title text-uppercase font-weight-bold d-inline-block">@lang('front.offer')</h6>
                  <ul class="list-unstyled">

                    <li>
                    <a class="menu-item font-weight-bold text-capitalize border-0 pl-0 hvr-icon-forward" href="{{url('clients/productsv2?offer=offer')}}">
                    <i class="fas fa-caret-right pl-1 pr-2"></i>@lang('front.offer')</a>
                    </li>
                  </ul>
                </div>

                <div class="col-md-6 col-xl-6 col-6 sub-menu mb-xl-0 mb-4">
                  <h6 class="sub-title text-uppercase font-weight-bold d-inline-block">@lang('front.most_solid')</h6>
                  <ul class="list-unstyled">

                    <li>
                    <a class="menu-item font-weight-bold text-capitalize border-0 pl-0 hvr-icon-forward" href="{{url('clients/productsv2?most_solid=most_solid')}}">
                    <i class="fas fa-caret-right pl-1 pr-2"></i>@lang('front.most_solid')</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </li>
          <!-- End Offers -->

          <!-- Start Maintenance -->
          <li class="nav-item">
            <a class="nav-link nav_link2 text-uppercase" href="{{url('clients/service_centerv2')}}" id="navbarDropdownMenuLink6" aria-haspopup="true" aria-expanded="false">@lang('front.service_center')</a>
          </li>
          <!-- End Maintenance -->

          <!-- Start Contact Us -->
          <li class="nav-item">
            <a class="nav-link nav_link2 text-uppercase" href="{{url('clients/contactv2')}}" id="navbarDropdownMenuLink7" aria-haspopup="true" aria-expanded="false">@lang('front.contact')</a>
          </li>
          <!-- End Contact Us -->
          @if(!Auth::guard('client')->user())
          <!-- Start Register-->
          <li class="nav-item d-block d-sm-none d-md-block d-lg-none d-xl-none">
            <a class="nav-link nav_link2 text-uppercase" href="{{route('front.client.register')}}" id="navbarDropdownMenuLink9" aria-haspopup="true" aria-expanded="false">@lang('front.auth.register')</a>
          </li>
          <!-- End Register -->

          <!-- Start Log In-->
          <li class="nav-item d-block d-sm-none d-md-block d-lg-none d-xl-none">
            <a class="nav-link nav_link2 text-uppercase" href="{{route('front.client.login')}}" id="navbarDropdownMenuLink10" aria-haspopup="true" aria-expanded="false">@lang('front.auth.login')</a>
          </li>
          <!-- End Log In -->
          @else
          <!-- Start My Account-->
          <li class="nav-item dropdown mega-dropdown d-block d-sm-none d-md-block d-lg-none d-xl-none">
            <a class="nav-link dropdown-toggle text-uppercase slide_toggle" id="navbarDropdownMenuLink11" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::guard('client')->user()->name}}</a>

            <div id="my_account" class="dropdown-menu dropdown-menu-mob mega-menu v-2 z-depth-1 special-color pt-3 px-3 slideContent" aria-labelledby="navbarDropdownMenuLink11" style="">
              <div class="row">
                <div class="col-md-6 col-xl-6 col-6 sub-menu mb-4">
                  <ul class="list-unstyled">
                    <li>
                      <a class="menu-item font-weight-bold text-capitalize border-0 pl-0 hvr-icon-forward" href="{{route('front.home.profile')}}"><i class="fas fa-caret-right pl-1 pr-2"></i>
                        @lang('front.profile')</a>
                    </li>

                    <li>
                      <a class="menu-item font-weight-bold text-capitalize border-0 pl-0 hvr-icon-forward" href="{{route('front.home.address')}}"><i class="fas fa-caret-right pl-1 pr-2"></i>
                        @lang('front.address')</a>
                    </li>
                  </ul>
                </div>

                <div class="col-md-6 col-xl-6 col-6 sub-menu mb-0">
                  <ul class="list-unstyled">
                    <li>
                      <a class="menu-item font-weight-bold text-capitalize border-0 pl-0 hvr-icon-forward" href="{{route('front.home.password')}}"><i class="fas fa-caret-right pl-1 pr-2"></i>
                        @lang('front.auth.password')</a>
                    </li>

                    <li>
                      <a class="menu-item font-weight-bold text-capitalize border-0 pl-0 hvr-icon-forward" href="{{route('front.home.order')}}"><i class="fas fa-caret-right pl-1 pr-2"></i>
                        @lang('front.order')</a>
                    </li>

                    @if(setting("wish_list_flag") && setting("wish_list_flag") != '')
                      <li>
                        <a class="menu-item font-weight-bold text-capitalize border-0 pl-0 hvr-icon-forward" href="{{route('front.home.wishlist')}}"><i class="fas fa-caret-right pl-1 pr-2"></i>
                        @lang('front.wishlist.wishlist')</a>
                      </li>
                    @endif

                  </ul>
                </div>

                <div class="col-md-6 col-xl-6 col-6 sub-menu mb-0">
                  <ul class="list-unstyled">
                    <li>
                      <a class="menu-item font-weight-bold text-capitalize border-0 pl-0 hvr-icon-forward" href="{{route('front.home.logout')}}">
                        <i class="fas fa-caret-right pl-1 pr-2"></i> @lang('front.sign_out')
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </li>
          <!-- End My Account-->
          @endif
          <!-- Start Languages-->
          <li class="nav-item d-block d-sm-none d-md-block d-lg-none d-xl-none">
            <a class="nav-link text-uppercase slide_toggle" id="navbarDropdownMenuLink112" href="{{url('lang')}}/{{Session::get('applocale') == 'en'? "ar" : "en"}}">
              <img src="{{url('public/frontv2/images/lang/'.(Session::get('applocale') == 'ar'? 'en' : 'ar').'.webp')}}" alt="{{\Session::get('applocale') == 'ar'? "English" : "Arabic"}}">{{\Session::get('applocale') == 'ar'? " English" : " العربية"}}
            </a>
      </li>
      <!-- End Languages-->
      </ul>
      </div>
  </div>

  <section class="search_mobile d-block d-sm-none d-md-none d-lg-none d-xl-none">
    <div class="col-12">
      <form class="search-container" id="form_search_m" action="{{url('clients/productsv2')}}" method="get">
        <input type="text" id="search-bar-m" name="search" autocomplete="off" value="{{ request()->get('search') }}" placeholder="@lang('messages.search')">
        <a onclick="document.getElementById('form_search_m').submit()" href="#">
          <div class="search_background">
            <i class="search-icon fas fa-search fa-2x"></i>
          </div>
        </a>
      </form>

      <div class="old_search_value">
          <?php $searchValue = session()->has("old_search_value") ? session()->get("old_search_value") : [] ?>
          <ul class="list-unstyled">
            @foreach(array_slice(array_reverse($searchValue), 0, 5) as $value)
              <li class="mb-1 search-data p-2">{{ $value }}</li>
            @endforeach
          </ul>
        </div>
    </div>
  </section>

  <!-- Modal -->
  <div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cart</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="show-cart table">

          </table>
          <div>Total price: $<span class="total-cart"></span></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Order now</button>
        </div>
      </div>
    </div>
  </div>

  @yield('content')

  <footer class="new_footer">
    <div class="mobile_views">
      <div class="row m-0">
        <div class="col-md-4 col-lg-6 col-xl-4 col-12">
          <h6 class="subscribe_title text-uppercase font-weight-bold">@lang('front.be_first')</h6>
          <p class="subscribe_desc">@lang('front.subscribe_info').</p>
        </div>

        <div class="col-md-8 col-lg-6 col-xl-4 col-12">
          <div id="flash-msg"></div>
          <form class="newsletter">
            @csrf
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <a class="btn_subscribe btn text-capitalize">@lang('front.subscribe')</a>
              </div>
              <input id="mail" type="email" class="input_subscribe form-control" name="mail" placeholder="@lang('front.Email_Address')" >
            </div>
          </form>
        </div>

        <div class="col-md-12 col-lg-12 col-xl-4 col-12">
          <ul class="social_media list-unstyled">
            <li>
              <a class="social-button facebook_link" title="Facebook" href="{{setting('facebook')}}" target="_blank">
                <i class="fab fa-facebook-f facebook_icon"></i>
              </a>
            </li>

            <li>
              <a class="social-button whatsapp_link" title="Whatsapp" href="whatsapp://send?phone={{setting('phone')}}">
                <i class="fab fa-whatsapp whatsapp_icon"></i>
              </a>
            </li>

            <li>
              <a class="social-button instagram_link" title="Instagram" href="{{setting('instagram')}}">
                <i class="fab fa-instagram instagram_icon"></i>
              </a>
            </li>

            <li>
              <a class="social-button phone_link" title="Phone Number" href="tel:{{setting('phone')}}">
                <i class="fas fa-phone phone_icon"></i>
              </a>
            </li>

            <li>
              <a class="social-button sms_link" title="Messege" href="sms:{{setting('sms')}}">
                <i class="far fa-comment sms_icon"></i>
              </a>
            </li>

            <li>
              <a class="social-button mail_link" title="Email" href="{{setting('mail')}}">
                <i class="fas fa-envelope mail_icon"></i>
              </a>
            </li>
          </ul>
        </div>

        <div class="col-md-4 col-lg-4 col-xl-4 col-12">
          <div class="logo_foot">
            <img class="aghezty_logo" src="{{url('public/frontv2/images/new_footer/logo2.png')}}" alt="Aghezty">

            @if (\Session::get('applocale') == 'ar')
            <p class="mb-0 text-right">
            {{setting('company_info_ar')}}
            </p>
            @else
            <p class="mb-0 text-left">
            {{setting('company_info_en')}}
            </p>
            @endif

          </div>

          <div class="hotline mt-2 text-center">
            <strong class="text-capitalize">@lang('front.contact')</strong>
            <a class="d-block" href="tel:+{{setting('phone')}}" title="Phone number">
              <strong>{{setting('phone')}}</strong>
            </a>
          </div>
        </div>

        <div class="col-md-4 col-lg-4 col-xl-4 col-12">
          <h6 class="text_foot text-capitalize font-weight-bold">@lang('front.important_links')</h6>

          <ul class="important_link list-unstyled">
            <li>
              <a class="text-capitalize" href="{{url('clients/contactv2')}}">@lang('front.contact')</a>
            </li>

            <li>
              <a class="text-capitalize" href="{{url('clients/service_centerv2')}}">@lang('front.service_center')</a>
            </li>

            <li>
              <a class="text-capitalize" href="{{url('clients/about_mev2')}}">@lang('front.about_mev2')</a>
            </li>

            <li>
              <a class="text-capitalize" href="{{url('clients/terms_conv2')}}">@lang('front.terms_conv2')</a>
            </li>

            <li>
              <a class="text-capitalize" href="{{url('clients/visa_terms')}}">@lang('front.visa_terms')</a>
            </li>
          </ul>
        </div>

        <div class="col-md-4 col-lg-4 col-xl-4 col-12">
          <h6 class="text_foot text-capitalize font-weight-bold">@lang('front.shop_by_category')</h6>

          <div class="row mb-0">
            <div class="col-md-6 col-lg-6 col-xl-6 col-12">
              <ul class="categories_link list-unstyled">
                @foreach ($categorys->slice(0,6) as $category)
                  @if($category->sub_cats->count())
                    <li>
                      <a class="text-capitalize" href="{{url('parent/'.$category->id.'/'.setSlug($category->title))}}">{{ $category->getTranslation("title",getCode()) }} </a>
                    </li>
                  @endif
                @endforeach
              </ul>
            </div>

            <div class="col-md-6 col-lg-6 col-xl-6 col-12">
              <ul class="categories_link list-unstyled">
              @foreach ($categorys->slice(6) as $category)
                  @if($category->sub_cats->count())
                    <li>
                    <a class="text-capitalize" href="{{url('parent/'.$category->id.'/'.setSlug($category->title))}}">{{ $category->getTranslation("title",getCode()) }} </a>
                    </li>
                  @endif
                @endforeach
                <li>
                  <a class="text-capitalize" href="{{url('clients/productsv2?most_solid=most_solid')}}">@lang('front.most_solid')</a>
                </li>

                <li>
                  <a class="text-capitalize" href="{{url('clients/productsv2?offer=offer')}}">@lang('front.offer')</a>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="grid-container">
          <div class="payment_method_img">
            <img class="d-block m-auto" src="{{url('public/frontv2/images/new_footer/fast-delivery.png')}}" alt="fast delivery">
          </div>

          <div class="payment_method_img">
            <img class="d-block m-auto" src="{{url('public/frontv2/images/new_footer/visa-logo.png')}}" alt="visa">
          </div>

          <div class="payment_method_img">
            <img class="d-block m-auto" src="{{url('public/frontv2/images/new_footer/mastercard.png')}}" alt="mastercard">
          </div>

          <div class="payment_method_img">
            <img class="d-block m-auto" src="{{url('public/frontv2/images/new_footer/cib.png')}}" alt="cib">
          </div>

          <div class="payment_method_img">
            <img class="d-block m-auto" src="{{url('public/frontv2/images/new_footer/alahly-bank.png')}}" alt="alahly-bank">
          </div>
        </div>

        <div class="col-md-12 col-lg-12 col-xl-12 col-12">
          <div class="copyRight text-center">
            <p class="mb-0">Aghezty {{ date("Y") }}©. All Rights Reserved.</p>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scroll Up -->
  <a class="rounded" href="javascript:" id="return-to-top">
      <i class="fas fa-chevron-up"></i>
    </a>

  <!-- script -->
  <!-- jQuery JS -->
  <script src="{{url('public/frontv2/js/jquery-3.3.1.min.js')}}"></script>
  <!-- Bootstrap Popper JS -->
  <script src="{{url('public/frontv2/js/popper.min.js')}}"></script>
  <!-- Bootstrap JS -->
  <!-- <script src="js/bootstrap.min.js"></script> -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
  </script>
  <!-- Easy Zoom JS -->
  <script src="{{url('public/frontv2/js/easyzoom.js')}}"></script>
  <!-- owl carousel JS -->
  <script src="{{url('public/frontv2/js/owl.carousel.min.js')}}"></script>
  <!-- typed JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.10/jquery.lazy.js"></script>
  <!-- Script JS -->
  <script src="{{url('public/frontv2/js/jquery-spinner.min.js')}}"></script>
  <script src="{{url('public/frontv2/js/script.min.js')}}"></script>
  <script src="{{url('js/vue.min.js')}}"></script>
  <script>
    $(document).on('click','.fa-heart',function(){
      $(this).toggleClass("red")
      var product_id = $(this).data('id')
      $.get("{{ route('front.toggle.product.wishlist')}}?product_id="+product_id, function(){
        product_id = ''
      })
    })

  </script>
  <script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
      }
    });
  </script>
  <script src="{{url('js/pusher.min.js')}}"></script>
  <script src="{{url('js/pusher_config.js')}}"></script>

  <script>
    channel = pusher.subscribe('product');
    channel.bind('product-event', function(data) {
      // Let's check whether notification permissions have already been granted
      if (Notification.permission === "granted") {
        // If it's okay let's create a notification
        var notification = new window.Notification("{{__('front.title')}}!", {
          body: data.message,
          icon: "{{url('public/frontv2/images/logo/01.png')}}",
        });
        notification.onclick = function(event) {
          event.preventDefault(); //prevent the browser from focusing the Notification's tab, while it stays also open
          var new_window = window.open('', '_blank'); //open empty window(tab)
          new_window.location = data.url; //set url of newly created window(tab) and focus
          this.close()
        };
      }

      // Otherwise, we need to ask the user for permission
      else if (Notification.permission !== "denied") {
        Notification.requestPermission().then(function(permission) {
          // If the user accepts, let's create a notification
          if (permission === "granted") {
            var notification = new window.Notification("{{__('front.title')}}!", {
              body: data.message,
              icon: "{{url('public/frontv2/images/logo/01.png')}}",
            });
            notification.onclick = function(event) {
              event.preventDefault(); //prevent the browser from focusing the Notification's tab, while it stays also open
              var new_window = window.open('', '_blank'); //open empty window(tab)
              new_window.location = data.url; //set url of newly created window(tab) and focus
              this.close()
            };
          }
        });
      }
    })
  </script>

<script>
    $("#search-bar, #search-bar-m").focus(function(){
      $(".old_search_value").toggle()
    })
    $(document).on("click", ".search-data", function(){
      $("#search-bar").val($(this).text())
      $("#search-bar-m").val($(this).text())
    })
    $(document).on("click", '.item-delete', function() {
      $.get($(this).data('href'), function() {
        $("#href_load").load(location.href + " #href_load>*", "");
      })
    })
</script>


  <script>
    $('.btn_subscribe').click(function (e) {
      e.preventDefault();
      var mail = $('#mail').val();
      var lang = "{{session()->get('applocale')}}";

      if(mail){
        $.ajax({
          type: "POST",
          url: "{{url('newsletter/store')}}",
          data: {'mail' : mail},
          success: function (response) {
            if(response == 'success'){
              if(lang == 'ar')
              $('#flash-msg').html(`<div class='alert alert-success text-right'>!شكرا للاشتراك <span class='closebtn' style='margin-left: 15px;color: black;font-weight: bold;float: right;font-size: 22px;cursor: pointer;transition: 0.3s;line-height: 20px;' onclick="this.parentElement.style.display='none';">&times;</span></div>`);
              else{
              $('#flash-msg').html(`<div class='alert alert-success'>Thank you for subscribe! <span class='closebtn' style='margin-left: 15px;color: black;font-weight: bold;float: right;font-size: 22px;cursor: pointer;transition: 0.3s;line-height: 20px;' onclick="this.parentElement.style.display='none';">&times;</span></div>`);
              }
            }
            if(response == 'fail'){
              if(lang == 'ar'){
              $('#flash-msg').html(`<div class='alert alert-danger text-right'>!انت مشترك بالفعل <span class='closebtn' style='margin-left: 15px;color: black;font-weight: bold;float: right;font-size: 22px;cursor: pointer;transition: 0.3s;line-height: 20px;' onclick="this.parentElement.style.display='none';">&times;</span></div>`);
              }else{
              $('#flash-msg').html(`<div class='alert alert-danger'>Already subscribed! <span class='closebtn' style='margin-left: 15px;color: black;font-weight: bold;float: right;font-size: 22px;cursor: pointer;transition: 0.3s;line-height: 20px;' onclick="this.parentElement.style.display='none';">&times;</span></div>`);
              }
            }
          }
        });
      }else{
        if(lang == 'ar'){
        $('#flash-msg').html(`<div class='alert alert-danger text-right'>!برجاء ادخال بريد الكتروني <span class='closebtn' style='margin-left: 15px;color: black;font-weight: bold;float: right;font-size: 22px;cursor: pointer;transition: 0.3s;line-height: 20px;' onclick="this.parentElement.style.display='none';">&times;</span></div>`);
        }else{
        $('#flash-msg').html(`<div class='alert alert-danger'>Please enter valid mail! <span class='closebtn' style='margin-left: 15px;color: black;font-weight: bold;float: right;font-size: 22px;cursor: pointer;transition: 0.3s;line-height: 20px;' onclick="this.parentElement.style.display='none';">&times;</span></div>`);
        }
      }
    });
  </script>

<!--Start of Tawk.to Script-->
{{--  <script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5fda22bddf060f156a8db0cd/1epm1fdat';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>  --}}
  <!--End of Tawk.to Script-->
  @yield('script')
</body>

</html>
