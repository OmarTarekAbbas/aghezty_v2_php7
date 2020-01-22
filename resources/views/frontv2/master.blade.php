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
</style>
@yield('style')
<head>
	<title>Aghezty V2</title>
	<meta charset="utf-8">
	<!--IE Compatibility Meta-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Mobile Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- SEO Engine -->
	<meta name="keywords" content="Buy Online, Buy in Egypt, Shop in Egypt, Online Shop, Online Store, Aghezty, Aghezty.com, Electronics, Mobiles, Tablets, Laptops, Computers, TVs, Home Appliance, Personal Care, Refrigerators, Cookers, Heaters, Accessories. Electronics Brands, Cash On Delivery, Installment, Premium Card, Ahly Visa Installment, Credit Card, Free Delivery, Agent Warranty, شراء عبر الإنترنت ، شراء في مصر ، متجر في مصر ، متجر على الإنترنت ، متجر على شبكة الإنترنت ، إلكترونيات ، هواتف محمولة ، أجهزة لوحية ، أجهزة الكمبيوتر المحمولة ، أجهزة الكمبيوتر ، تلفزيونات ، الأجهزة المنزلية ، العناية الشخصية ، ثلاجات ، طباخات ، سخانات ، اكسسوارات. العلامات التجارية الإلكترونية ، الدفع عند الاستلام ، القسط ، البطاقة المميزة ، تقسيط بطاقة التأشيرة من الأهلي ، بطاقة الائتمان ، التوصيل المجاني ، ضمان الوكيل">
	<meta name="description" content="Aghezty is the is the first and largest e-commerce website in Egypt dedicated for all types of consumer electronics, أجهزتى هو أول وأكبر موقع للتجارة الإلكترونية في مصر مخصص لجميع أنواع الإلكترونيات الاستهلاكية">
	<meta name="title" content="Buy Online, Buy in Egypt, Shop in Egypt, Online Shop, Online Store, Aghezty, Aghezty.com, Electronics, Mobiles, Tablets, Laptops, Computers, TVs, Home Appliance, Personal Care, Refrigerators, Cookers, Heaters, Accessories. Electronics Brands, Cash On Delivery, Installment, Premium Card, Ahly Visa Installment, Credit Card, Free Delivery, Agent Warranty, شراء عبر الإنترنت ، شراء في مصر ، متجر في مصر ، متجر على الإنترنت ، متجر على شبكة الإنترنت ، إلكترونيات ، هواتف محمولة ، أجهزة لوحية ، أجهزة الكمبيوتر المحمولة ، أجهزة الكمبيوتر ، تلفزيونات ، الأجهزة المنزلية ، العناية الشخصية ، ثلاجات ، طباخات ، سخانات ، اكسسوارات. العلامات التجارية الإلكترونية ، الدفع عند الاستلام ، القسط ، البطاقة المميزة ، تقسيط بطاقة التأشيرة من الأهلي ، بطاقة الائتمان ، التوصيل المجاني ، ضمان الوكيل" />
	<!-- Bootstrap CSS-->
	<link rel="stylesheet" type="text/css" href="{{url('public/frontv2/css/bootstrap.min.css')}}">
	<!-- Fontawesome CSS-->
	<link rel="stylesheet" type="text/css" href="{{url('public/frontv2/css/all.min.css')}}">
	<!-- Easy Zoom-->
	<link rel="stylesheet" type="text/css" href="{{url('public/frontv2/css/easyzoom.css')}}">
	<!-- owl carousel -->
	<link rel="stylesheet" href="{{url('public/frontv2/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{url('public/frontv2/css/owl.theme.default.min.css')}}">
	<!-- hover -->
	<!-- <link rel="stylesheet" href="{{url('public/frontv2/css/hover.css')}}"> -->
	<link rel="stylesheet" href="{{url('public/frontv2/css/animate.css')}}">
	<meta name="token" content="{{ csrf_token() }}">
@if (\Session::has('applocale'))
@if (\Session::get('applocale') == 'ar')
	<link rel="stylesheet" type="text/css" href="{{url('public/frontv2/css/style_AR.css')}}">
@else
	<link rel="stylesheet" type="text/css" href="{{url('public/frontv2/css/style.css')}}">
@endif
@else
<link rel="stylesheet" type="text/css" href="{{url('public/frontv2/css/style.css')}}">
@endif

</head>

<body>
	<header class="head_two d-none d-sm-block d-md-none d-none d-md-none d-lg-block">
		<div class="row mx-0">
			<div class="col-md-3 col-lg-3 col-xl-1">
				<div class="img_logo">
					<a href="{{url('clients/homev2')}}">
						<img class="d-block m-auto" src="{{url('public/frontv2/images/logo/01.png')}}" alt="Logo">
					</a>
				</div>
			</div>

			<div class="col-md-6 col-lg-6 col-xl-10">
				<form class="search-container" id="form_search" action="{{url('clients/productsv2')}}" method="get">
					<input type="text" id="search-bar" name="search" placeholder="@lang('messages.search')">
					<a onclick="document.getElementById('form_search').submit()" href="#">
						<div class="search_background">
							<i class="search-icon fas fa-search fa-2x"></i>
						</div>
					</a>
				</form>
			</div>

			<div class="col-md-3 col-lg-3 col-xl-1">
				<div class="shopping_cart">
					<button type="button" onclick="location.href = '{{route('front.home.cart')}}'">
						<!-- <i class="fas fa-shopping-cart fa-3x"></i> -->
						<span class="shopping_cart_num">{{((Auth::guard('client')->user()) ? count(Auth::guard('client')->user()->carts):0)+count_session_cart()}}</span>
						<img src="{{url('public/frontv2/images/cart-dark.png')}}" class="shopping_cart_img" alt="Cart Shop">
					</button>
					<!-- (<span class="total-count"></span>) -->
				</div>
			</div>
		</div>
	</header>

	<header class="head_three ">
		<!-- Navbar -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark special-color-dark">
			<a class="mobile_logo d-sm-block d-md-block d-lg-none" href="{{url('clients/homev2')}}">
				<img class="d-block m-auto w-25" src="{{url('public/frontv2/images/logo/01.png')}}" alt="Logo">
			</a>

			<!-- Collapse button -->
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			@php
			$categorys = categorys();
			@endphp
			<!-- Collapsible content -->
			<div class="collapse navbar-collapse" id="navbarSupportedContent2">
				<ul id="sub-header" class="navbar-nav w-100">
					<!-- Start Heavy Machines -->
					@foreach ($categorys as $category)
					@if($category->sub_cats->count() > 0)
					<li class="nav-item dropdown mega-dropdown active m-auto">
						<a class="nav-link dropdown-toggle text-uppercase slide_toggle" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$category->getTranslation('title',getCode())}}
							{{-- <span class="sr-only">(current)</span> --}}
						</a>

						<div id="heavy_machines" class="dropdown-menu mega-menu v-2 z-depth-1 special-color py-5 px-3 slideContent" aria-labelledby="navbarDropdownMenuLink2">

							<div class="row">
								<div class="col-md-4 col-xl-4 col-6 sub-menu mb-xl-0 mb-4">
									<h6 class="sub-title text-uppercase font-weight-bold d-inline-block type_anime{{$category->id}}" id="heavy_machines_title_typed"></h6>
									<ul class="list-unstyled">
										@php
										    $count = $category->sub_cats->count();
										    $limit = $count/2;
										@endphp
										@foreach ($category->sub_cats->slice(0, $limit) as $sub_category)

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0 hvr-icon-forward" href="{{url('clients/productsv2?sub_category_id='.$sub_category->id)}}"><i class="fas fa-caret-right pl-1 pr-2"></i> {{$sub_category->getTranslation('title',getCode())}}</a>
										</li>

										@endforeach
									</ul>
								</div>

								<div class="col-md-4 col-xl-4 col-6 sub-menu mb-xl-0 mt-4">
									<!-- <h6 class="sub-title text-uppercase font-weight-bold white-text ">Heavy Machines</h6> -->
									<ul class="list-unstyled">
										@foreach ($category->sub_cats->slice($limit, $count) as $sub_category)
										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0 hvr-icon-forward" href="{{url('clients/productsv2?sub_category_id='.$sub_category->id)}}"><i class="fas fa-caret-right pl-1 pr-2"></i> {{$sub_category->getTranslation('title',getCode())}}</a>
										</li>
										@endforeach
									</ul>
								</div>

								<div class="col-md-4 col-xl-4 col-12 sub-menu mb-0">
									<h6 class="sub-title text-uppercase font-weight-bold d-inline-block" id="shop_title{{$category->id}}_typed"></h6>

									<ul class="list-unstyled">

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0 hvr-icon-forward" href="{{url('clients/productsv2?to=1000')}}"><i class="fas fa-caret-right pl-1 pr-2"></i> @lang('front.less') @lang('front.from')  1000 @lang('front.egp') </a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0 hvr-icon-forward" href="{{url('clients/productsv2?from_to=1000,3000')}}"><i class="fas fa-caret-right pl-1 pr-2"></i> @lang('front.from') 1000 @lang('front.egp')  @lang('front.to') 3000 @lang('front.egp') </a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0 hvr-icon-forward" href="{{url('clients/productsv2?from_to=6000,10000')}}"><i class="fas fa-caret-right pl-1 pr-2"></i> @lang('front.from') 6000 @lang('front.egp')  @lang('front.to') 10000 @lang('front.egp') </a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0 hvr-icon-forward" href="{{url('clients/productsv2?from=10000')}}"><i class="fas fa-caret-right pl-1 pr-2"></i> @lang('front.more') @lang('front.from')  10000 @lang('front.egp') </a>
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
									<h6 class="sub-title text-uppercase font-weight-bold d-inline-block" id="brands_title_typed"></h6>
									<ul class="list-unstyled">
										@php
										    $count = $brands->count();
										    $limit = $count/2;
										@endphp
										@foreach ($brands->slice(0, $limit) as $item)
										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0 hvr-icon-forward" href="{{url('clients/productsv2?brand_id='.$item->id)}}"><i class="fas fa-caret-right pl-1 pr-2"></i> {{$item->getTranslation('title',getCode())}}</a>
										</li>
										@endforeach
									</ul>
								</div>

								<div class="col-md-4 col-xl-4 col-6 sub-menu mb-xl-0 mt-4">
									<!-- <h6 class="sub-title text-uppercase font-weight-bold">Brands</h6> -->
									<ul class="list-unstyled">
										@foreach ($brands->slice($limit, $count) as $item)
										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0 hvr-icon-forward" href="{{url('clients/productsv2?brand_id='.$item->id)}}"><i class="fas fa-caret-right pl-1 pr-2"></i> {{$item->getTranslation('title',getCode())}}</a>
										</li>
										@endforeach
									</ul>
								</div>

								<div class="col-md-4 col-xl-4 col-12 sub-menu mb-0">
									<h6 class="sub-title text-uppercase font-weight-bold d-inline-block" id="shop_titleb_typed"></h6>

									<ul class="list-unstyled">
                      <li>
                        <a class="menu-item font-weight-bold text-capitalize border-0 pl-0 hvr-icon-forward" href="{{url('clients/productsv2?to=1000')}}"><i class="fas fa-caret-right pl-1 pr-2"></i> @lang('front.less') @lang('front.from')  1000 @lang('front.egp') </a>
                      </li>

                      <li>
                        <a class="menu-item font-weight-bold text-capitalize border-0 pl-0 hvr-icon-forward" href="{{url('clients/productsv2?from_to=1000,3000')}}"><i class="fas fa-caret-right pl-1 pr-2"></i> @lang('front.from') 1000 @lang('front.egp')  @lang('front.to') 3000 @lang('front.egp') </a>
                      </li>

                      <li>
                        <a class="menu-item font-weight-bold text-capitalize border-0 pl-0 hvr-icon-forward" href="{{url('clients/productsv2?from_to=6000,10000')}}"><i class="fas fa-caret-right pl-1 pr-2"></i> @lang('front.from') 6000 @lang('front.egp')  @lang('front.to') 10000 @lang('front.egp') </a>
                      </li>

                      <li>
                        <a class="menu-item font-weight-bold text-capitalize border-0 pl-0 hvr-icon-forward" href="{{url('clients/productsv2?from=10000')}}"><i class="fas fa-caret-right pl-1 pr-2"></i> @lang('front.more') @lang('front.from')  10000 @lang('front.egp') </a>
                      </li>
									</ul>
								</div>
							</div>
						</div>
					</li>
					<!-- End Brands-->

					<!-- Start Offers -->
					<li class="nav-item">
						<a class="nav-link nav_link2 text-uppercase" href="{{url('clients/productsv2?offer=offer')}}" id="navbarDropdownMenuLink5" aria-haspopup="true" aria-expanded="false">@lang('front.offer')</a>
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
            <li class="nav-item">
              <a class="nav-link nav_link2 text-uppercase" href="{{route('front.client.register')}}" id="navbarDropdownMenuLink9" aria-haspopup="true" aria-expanded="false">@lang('front.auth.register')</a>
            </li>
            <!-- End Register -->

            <!-- Start Log In-->
            <li class="nav-item">
              <a class="nav-link nav_link2 text-uppercase" href="{{route('front.client.login')}}" id="navbarDropdownMenuLink10" aria-haspopup="true" aria-expanded="false">@lang('front.auth.login')</a>
            </li>
            <!-- End Log In -->
          @else
            <!-- Start My Account-->
            <li class="nav-item dropdown mega-dropdown">
              <a class="nav-link dropdown-toggle text-uppercase slide_toggle" id="navbarDropdownMenuLink11" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::guard('client')->user()->name}}</a>

              <div id="my_account" class="dropdown-menu dropdown-menu-mob mega-menu v-2 z-depth-1 special-color pt-3 px-3 slideContent" aria-labelledby="navbarDropdownMenuLink11" style="">
                <div class="row">
                  <div class="col-md-6 col-xl-6 col-6 sub-menu mb-4">
                    <ul class="list-unstyled">
                      <li>
                        <a class="menu-item font-weight-bold text-capitalize border-0 pl-0 hvr-icon-forward" href="{{route('front.home.profile')}}"><i class="fas fa-caret-right pl-1 pr-2"></i> @lang('front.profile')</a>
                      </li>

                      <li>
                        <a class="menu-item font-weight-bold text-capitalize border-0 pl-0 hvr-icon-forward" href="{{route('front.home.address')}}"><i class="fas fa-caret-right pl-1 pr-2"></i> @lang('front.address')</a>
                      </li>
                    </ul>
                  </div>

                  <div class="col-md-6 col-xl-6 col-6 sub-menu mb-0">
                    <ul class="list-unstyled">
                      <li>
                        <a class="menu-item font-weight-bold text-capitalize border-0 pl-0 hvr-icon-forward" href="{{route('front.home.password')}}"><i class="fas fa-caret-right pl-1 pr-2"></i> @lang('front.auth.password')</a>
                      </li>

                      <li>
                        <a class="menu-item font-weight-bold text-capitalize border-0 pl-0 hvr-icon-forward" href="{{route('front.home.order')}}"><i class="fas fa-caret-right pl-1 pr-2"></i> @lang('front.order')</a>
                      </li>

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
					<li class="nav-item">
						<a class="nav-link text-uppercase slide_toggle" id="navbarDropdownMenuLink112" href="{{url('lang')}}/{{Session::get('applocale') == 'en'? "ar" : "en"}}">
							<img src="{{url('public/frontv2/images/lang/'.(Session::get('applocale') == 'ar'? 'en' : 'ar').'.webp')}}" alt="{{\Session::get('applocale') == 'ar'? "English" : "Arabic"}}">{{\Session::get('applocale') == 'ar'? " English" : " العربية"}}
						</a>

						{{-- <div id="languages" class="dropdown-menu dropdown-menu-mob mega-menu v-2 z-depth-1 special-color pt-3 px-3 slideContent" aria-labelledby="navbarDropdownMenuLink112">
							<div class="row">

								<div class="col-md-6 col-xl-6 col-6 sub-menu mb-4">
									<ul class="list-unstyled">
										<li>
											<a class="menu-item pl-0 dropdown-item hvr-icon-forward {{\Session::get('applocale') == 'en'? "active" : ""}}" href="{{url('lang/en')}}">
												<img src="{{url('public/frontv2/images/lang/en.webp')}}" alt="English Language"> English
											</a>
										</li>
									</ul>
								</div>

								<div class="col-md-6 col-xl-6 col-6 sub-menu mb-0">
									<ul class="list-unstyled">
										<li>
											<a class="menu-item pl-0 dropdown-item hvr-icon-forward {{\Session::get('applocale') == 'ar'? "active" : ""}}" href="{{url('lang/ar')}}">
												<img src="{{url('public/frontv2/images/lang/ar.webp')}}" alt="Arabic Language"> Arabic
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div> --}}
					</li>
					<!-- End Languages-->
				</ul>
			</div>
			<!-- Collapsible content -->
		</nav>

		<!-- Navbar -->
	</header>

	<section class="search_mobile d-block d-sm-none d-md-none d-lg-none d-xl-none">
		<div class="col-12">
        <form class="search-container" id="form_search" action="{{url('clients/productsv2')}}" method="get">
					<input type="text"  name="search" placeholder="@lang('messages.search')">
					<a onclick="document.getElementById('form_search').submit()" href="#">
						<div class="search_background">
							<i class="search-icon fas fa-search fa-2x"></i>
						</div>
					</a>
				</form>
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

     <footer class="footer_footer">
          <div class="footer_content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12 col-xl-12 col-12">
                  <div class="row">
                    <div class="col-md-12 col-xl-6 col-12">
                      <div class="block">
                        <div class="block_title mb-3">
                          <strong>@lang('front.shop_by_category')</strong>
                        </div>

                        <div class="block_content">
                          <div class="row">

						@foreach ($categorys as $category)
						@if($category->sub_cats->count() > 0)
						<div class="col-md-3 col-xl-3 col-6 pr-0 no_padding_mobile">
							<ul class="list-unstyled ul_links">
							<a href="{{url('clients/productsv2?sub_category_id='.$sub_category->id)}}">
							<strong class="font-weight-bold border-bottom">{{$category->getTranslation('title',getCode())}}</strong>
							</a>
							@php
							$count = $category->sub_cats->count();
							$limit = $count/2;
							@endphp
							@foreach ($category->sub_cats->slice(0, $limit) as $sub_category)
							<li>
							<a class="hvr-icon-forward" href="{{url('clients/productsv2?sub_category_id='.$sub_category->id)}}" title="Dish Washers">{{$sub_category->getTranslation('title',getCode())}}</a>
							</li>
							@endforeach
							</ul>
						</div>

						<div class="col-md-3 col-xl-3 col-6 pr-0 no_padding_mobile">
							<ul class="list-unstyled ul_links">
							<a href="{{url('clients/productsv2?sub_category_id='.$sub_category->id)}}">
							<strong class="font-weight-bold border-bottom invisible">Heavy Machines</strong>
							</a>

							@foreach ($category->sub_cats->slice($limit, $count) as $sub_category)
							<li>
							<a class="hvr-icon-forward" href="{{url('clients/productsv2?sub_category_id='.$sub_category->id)}}" title="Dish Washers">{{$sub_category->getTranslation('title',getCode())}}</a>
							</li>
							@endforeach

							</ul>
						</div>
						@endif
						@endforeach

                          </div>
                        </div>
                      </div>
                    </div>


				@php
					$brands = brands();
				@endphp

                    <div class="col-md-6 col-xl-3 col-12">
                      <div class="block block_brand_content">
                        <div class="block_title mb-3">
                          <strong>@lang('front.shop_by_brand')</strong>
                        </div>

                        <div class="block_content">
                          <div class="row">
                            <div class="col-md-3 col-xl-3 col-6 pr-0 no_padding_mobile">
                              <ul class="list-unstyled ul_links">
                                <a href="#0">
                                  <strong class="font-weight-bold border-bottom">@lang('front.brands')</strong>
                                </a>
						  @php
						  $count = $brands->count();
						  $limit = $count/2;
						  @endphp
						  @foreach ($brands->slice(0, $limit) as $item)
						  <li>
                                  <a class="hvr-icon-forward" href="{{url('clients/productsv2?brand_id='.$item->id)}}" title="{{$item->getTranslation('title',getCode())}}">{{$item->getTranslation('title',getCode())}}</a>
                                </li>
						  @endforeach
                              </ul>
                            </div>

                            <div class="col-md-3 col-xl-3 col-6 pr-0 no_padding_mobile">
                              <ul class="list-unstyled ul_links">
                                <a href="#0">
                                  <strong class="font-weight-bold border-bottom invisible">@lang('front.brands')</strong>
                                </a>
						  @foreach ($brands->slice($limit, $count) as $item)
                                <li>
                                  <a class="hvr-icon-forward" href="{{url('clients/productsv2?brand_id='.$item->id)}}" title="{{$item->getTranslation('title',getCode())}}">{{$item->getTranslation('title',getCode())}}</a>
                                </li>
						  @endforeach
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="mobile_center col-md-6 col-xl-3 col-12">
                      <div class="block">
                        <div class="block_title mb-2">
                          <strong>@lang('front.important_links')</strong>
                        </div>

                        <div class="block_content">
                          <div class="row">
                            <div class="col-xl-12 col-12">
                              <ul class="list-unstyled ul_links">
                                <li>
                                  <a class="text-capitalize hvr-icon-forward" href="{{url('clients/contactv2')}}" title="Contact Us">@lang('front.contact')</a>
                                </li>

                                <li>
                                  <a class="text-capitalize hvr-icon-forward" href="{{url('clients/service_centerv2')}}" title="Maintenance">@lang('front.service_center')</a>
                                </li>
                              </ul>
                            </div>

                            <div class="col-xl-12 col-12">
                              <div class="block_title mb-3">
                                <strong>@lang('front.find_us')</strong>
                              </div>

                              <div class="block_content">
                                <div class="row">
                                  <div class="col-xl-6 col-6">
                                    <a class="app-icon" href="https://play.google.com/store" title="Google Play">
                                      <img class="border border-white rounded hvr-icon-forward" src="{{url('public/frontv2/images/google-play.svg')}}" alt="Google Play">
                                    </a>
                                  </div>

                                  <div class="col-xl-6 col-6">
                                    <a class="app-icon" href="https://www.apple.com/ios/app-store/" title="Google Play">
                                      <img class="border border-white rounded hvr-icon-forward" src="{{url('public/frontv2/images/app-store.svg')}}" alt="App Store">
                                    </a>
                                  </div>

                                  <div class="col-sm-12 col-lg-12 col-xl-12">
                                    <div class="rounded-social-buttons text-center my-3">
                                      <a class="social-button facebook_link" title="Facebook" href="https://www.facebook.com/" target="_blank">
                                        <i class="fab fa-facebook-f facebook_icon"></i>
                                      </a>

                                      <a class="social-button whatsapp_link" title="Whatsapp" href="whatsapp://send?abid=phonenumber&text=Hello%2C%20World!">
                                        <i class="fab fa-whatsapp whatsapp_icon"></i>
                                      </a>

                                      <a class="social-button phone_link" title="Phone Number" href="tel:+20111682831">
                                        <i class="fas fa-phone phone_icon"></i>
                                      </a>

                                      <a class="social-button sms_link" title="Messege" href="sms:123">
                                        <i class="far fa-comment sms_icon"></i>
                                      </a>

                                      <a class="social-button mail_link" title="Email" href="mailto:mailto:info@aghzty.com">
                                        <i class="fas fa-envelope mail_icon"></i>
                                      </a>
                                    </div>
                                  </div>

                                  <div class="col-sm-12 col-lg-12 col-xl-12">
                                    <div class="payment_methods text-center">
                                      <img class="w-50" src="{{url('public/frontv2/images/payment-icons.png')}}" alt="Visa">
                                    </div>
                                  </div>

                                  <div class="col-sm-12 col-xl-12">
                                    <div class="hotline mt-2 text-center">
                                      <strong>Telephone</strong>
                                      <a class="d-block" href="tel:+20233047920" title="Phone number">
                                        <strong>0233047920</strong>
                                      </a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12 col-xl-12">
                      <div class="block_bottom">
                        <div class="row">
                          <div class="col-sm-8 col-xl-12 text-right">
                            <address>Aghezty.com 2019 ©. All Rights Reserved.</address>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Scroll Up -->
          <a class="rounded" href="javascript:" id="return-to-top">
            <i class="fas fa-chevron-up"></i>
          </a>
        </footer>

        <!-- script -->
        <!-- jQuery JS -->
        <script src="{{url('public/frontv2/js/jquery-3.3.1.min.js')}}"></script>
        <!-- Bootstrap Popper JS -->
        <script src="{{url('public/frontv2/js/popper.min.js')}}"></script>
        <!-- Bootstrap JS -->
        <!-- <script src="js/bootstrap.min.js"></script> -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <!-- Easy Zoom JS -->
        <script src="{{url('public/frontv2/js/easyzoom.js')}}"></script>
        <!-- owl carousel JS -->
        <script src="{{url('public/frontv2/js/owl.carousel.min.js')}}"></script>
        <!-- typed JS -->
        <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.11"></script>
        <!-- typed JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.10/jquery.lazy.js"></script>
        <!-- Script JS -->
	   <script src="{{url('public/frontv2/js/script.js')}}"></script>
		@foreach ($categorys as $category)
		@if($category->sub_cats->count() > 0)

		<script>

			$(document).ready(function() {

				var heavy_machines_title_typed = new Typed(".type_anime{{$category->id}}", {
					strings: [$('.type_anime{{$category->id}}').parent().parent().parent().siblings('a').html()],
					typeSpeed: 150,
					backSpeed: 0,
					fadeOut: true,
					smartBackspace: true, // this is a default
					loop: true
				});


				var shop_title1_typed = new Typed('#shop_title{{$category->id}}_typed', {
					strings: ['@lang("front.shop_by_price")'],
					typeSpeed: 150,
					backSpeed: 0,
					fadeOut: true,
					smartBackspace: true, // this is a default
					loop: true
				});



			});

		</script>

		@endif
		@endforeach

		<script>
		var heavy_machines_title_typed = new Typed("#brands_title_typed", {
			strings: [$('#brands_title_typed').parent().parent().parent().siblings('a').html()],
			typeSpeed: 150,
			backSpeed: 0,
			fadeOut: true,
			smartBackspace: true, // this is a default
			loop: true
		});

		var shop_titleb_typed = new Typed('#shop_titleb_typed', {
			strings: ['@lang("front.shop_by_price")'],
			typeSpeed: 150,
			backSpeed: 0,
			fadeOut: true,
			smartBackspace: true, // this is a default
			loop: true
		});

		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
            }
        });
		</script>

        @yield('script')
        </body>

        </html>
