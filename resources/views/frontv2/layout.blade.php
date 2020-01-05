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
	<meta name="keywords" content="Buy Online, Buy in Egypt, Shop in Egypt, Online Shop, Online Store, Raya, RayaShop, RayaShop.com, Electronics, Mobiles, Tablets, Laptops, Computers, TVs, Home Appliance, Personal Care, Refrigerators, Cookers, Heaters, Accessories. Electronics Brands, Cash On Delivery, Installment, Premium Card, Ahly Visa Installment, Credit Card, Free Delivery, Agent Warranty">
	<meta name="description" content="Aghezty is the is the first and largest e-commerce website in Egypt dedicated for all types of consumer electronics">
	<meta name="title" content="Buy Online, Buy in Egypt, Shop in Egypt, Online Shop, Online Store, Raya, RayaShop, RayaShop.com, Electronics, Mobiles, Tablets, Laptops, Computers, TVs, Home Appliance, Personal Care, Refrigerators, Cookers, Heaters, Accessories. Electronics Brands, Cash On Delivery, Installment, Premium Card, Ahly Visa Installment, Credit Card, Free Delivery, Agent Warranty" />
	<!-- Bootstrap CSS-->
	<link rel="stylesheet" type="text/css" href="{{url('public/frontv2/css/bootstrap.min.css')}}">
	<!-- Fontawesome CSS-->
	<link rel="stylesheet" type="text/css" href="{{url('public/frontv2/css/all.min.css')}}">
	<!-- Owl Carousel CSS-->
	<link rel="stylesheet" type="text/css" href="{{url('public/frontv2/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('public/frontv2/css/owl.theme.default.css')}}">
	<!-- Easy Zoom-->
	<link rel="stylesheet" type="text/css" href="{{url('public/frontv2/css/easyzoom.css')}}">
	<!-- social-likes-->
	<link rel="stylesheet" type="text/css" href="{{url('public/frontv2/css/social-likes_flat.css')}}">
	<!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
	<link rel="stylesheet" type="text/css" href="{{url('public/frontv2/css/style_AR.css')}}">

	
	<?php
	/*
	if ($_REQUEST['lang'] == "en") {
	?>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	<?php
	} else {
	?>
		<link rel="stylesheet" type="text/css" href="css/style_AR.css">
	<?php

	}
	*/
	?>
</head>

<body>
	<header class="head_two d-none d-sm-block d-md-none d-none d-md-none d-lg-block">
		<div class="row mr-0">
			<div class="col-md-3 col-lg-3 col-xl-1">
				<div class="img_logo">
					<a href="index.php">
						<img class="d-block m-auto" src="{{url('public/frontv2/images/logo/01.png')}}" alt="Logo">
					</a>
				</div>
			</div>

			<div class="col-md-6 col-lg-6 col-xl-10">
				<form class="search-container">
					<input type="text" id="search-bar" placeholder="Search...">
					<a href="#">
						<div class="search_background">
							<i class="search-icon fas fa-search fa-2x"></i>
						</div>
					</a>
				</form>
			</div>

			<div class="col-md-3 col-lg-3 col-xl-1">
				<div class="shopping_cart">
					<button type="button" class="" data-toggle="modal" data-target="#cart">
						<!-- <i class="fas fa-shopping-cart fa-3x"></i> -->
						<span class="shopping_cart_num">0</span>
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
			<a class="mobile_logo d-sm-block d-md-block d-lg-none" href="index.php">
				<img class="d-block m-auto w-25" src="{{url('public/frontv2/images/logo/01.png')}}" alt="Logo">
			</a>


			<!-- Collapse button -->
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<!-- Collapsible content -->
			<div class="collapse navbar-collapse" id="navbarSupportedContent2">

				<!-- Start Desktop Nav -->
				<ul id="sub-header" class="navbar-nav mr-auto w-100 d-none d-md-none d-none d-lg-inline-flex d-none d-xl-inline-flex">

					<!-- Start Heavy Machines -->
					<li class="nav-item dropdown mega-dropdown m-auto">
						<a class="nav-link dropdown-toggle text-uppercase" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Heavy Machines
							<span class="sr-only">(current)</span>
						</a>

						<div id="heavy_machines" class="dropdown-menu mega-menu v-2 z-depth-1 py-5 px-3" aria-labelledby="navbarDropdownMenuLink2">
							<div class="row">
								<div class="col-md-6 col-xl-4 sub-menu mb-xl-0 mb-4">
									<h6 class="sub-title text-uppercase font-weight-bold">Heavy Machines</h6>
									<ul class="list-unstyled">
										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Dish Washers</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Hobs</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">B-In</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Ovens</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Bult-In Washer Dryers</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Dryers</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Washing Machines</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Washer Dryers</a>
										</li>
									</ul>
								</div>

								<div class="col-md-6 col-xl-4 sub-menu mb-xl-0 mb-4">
									<h6 class="sub-title text-uppercase font-weight-bold invisible">Heavy Machines</h6>
									<ul class="list-unstyled">
										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Fridges</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Freezers</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">TV</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Cookers</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Air Conditioner</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Kitchen Ventilating Fan</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Kitchen Cooker Hood</a>
										</li>
									</ul>
								</div>

								<div class="col-md-6 col-xl-4 sub-menu mb-xl-0 mb-4">
									<h6 class="sub-title text-uppercase font-weight-bold">Shop By Price</h6>
									<ul class="list-unstyled">
										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Less Than 1000 EGP</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">From 1000 EGP TO 3000 EGP</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">From 6000 EGP TO 10000 EGP</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">More Than 10000 EGP</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</li>
					<!-- End Heavy Machines -->

					<!-- Start Light Machines -->
					<li class="nav-item dropdown mega-dropdown test">
						<a class="nav-link dropdown-toggle text-uppercase" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Light Machines
							<span class="sr-only">(current)</span>
						</a>
						<div id="light_machines" class="dropdown-menu mega-menu v-2 z-depth-1 py-5 px-3" aria-labelledby="navbarDropdownMenuLink2">
							<div class="row">
								<div class="col-md-6 col-xl-4 sub-menu mb-xl-0 mb-4">
									<h6 class="sub-title text-uppercase font-weight-bold">Light Machines</h6>
									<ul class="list-unstyled">
										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Microwaves</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Coffee &amp; Espresso Makers</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Electric Kettle</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Food Steamer</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Air Fryer</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Table Grill</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Sandwich Maker</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Fans</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Sound Bar</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Home Theater</a>
										</li>
									</ul>
								</div>

								<div class="col-md-6 col-xl-4 sub-menu mb-xl-0 mb-4">
									<h6 class="sub-title text-uppercase font-weight-bold invisible">Light Machines</h6>
									<ul class="list-unstyled">
										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Blenders</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">PowerLife Bagged</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Collection Salad Maker</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Iron</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Water Dispenser</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Water Heater</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Oil Heater</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Wall Clock</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Shake System</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Portable Hot Plate</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">One Box Entertainment</a>
										</li>
									</ul>
								</div>

								<div class="col-md-6 col-xl-4 sub-menu mb-xl-0 mb-4">
									<h6 class="sub-title text-uppercase font-weight-bold">Shop By Price</h6>
									<ul class="list-unstyled">
										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Less Than 1000 EGP</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">From 1000 EGP TO 3000 EGP</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">From 6000 EGP TO 10000 EGP</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">More Than 10000 EGP</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</li>
					<!-- End Light Machines -->

					<!-- Start Brands -->
					<li class="nav-item dropdown mega-dropdown">
						<a class="nav-link dropdown-toggle text-uppercase" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Brands
							<span class="sr-only">(current)</span>
						</a>
						<div id="brands" class="dropdown-menu mega-menu v-2 z-depth-1 py-5 px-3" aria-labelledby="navbarDropdownMenuLink2">
							<div class="row">
								<div class="col-md-6 col-xl-4 sub-menu mb-xl-0 mb-4">
									<h6 class="sub-title text-uppercase font-weight-bold">Brands</h6>
									<ul class="list-unstyled">
										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Ariston</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Philips</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">QLED TVs</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Samsung</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">LG</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Sharp</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Toshiba</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Tornado</a>
										</li>
									</ul>
								</div>

								<div class="col-md-6 col-xl-4 sub-menu mb-xl-0 mb-4">
									<h6 class="sub-title text-uppercase font-weight-bold invisible">Brands</h6>
									<ul class="list-unstyled">
										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Candy</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Sony</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">La Germania</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Mienta</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Elba</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Franke</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Hover</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">I Cook</a>
										</li>
									</ul>
								</div>

								<div class="col-md-6 col-xl-4 sub-menu mb-xl-0 mb-4">
									<h6 class="sub-title text-uppercase font-weight-bold">Shop By Price</h6>
									<ul class="list-unstyled">
										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Less Than 1000 EGP</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">From 1000 EGP TO 3000 EGP</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">From 6000 EGP TO 10000 EGP</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">More Than 10000 EGP</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</li>
					<!-- End Brands -->

					<!-- Start Offers -->
					<li class="nav-item ">
						<a href="#" class="nav-link nav_link2 text-uppercase" href="#">Offers</a>
					</li>
					<!-- End Offers -->

					<!-- Start Maintenance -->
					<li class="nav-item">
						<a href="#" class="nav-link nav_link2 text-uppercase" href="#">Maintenance</a>
					</li>
					<!-- End Maintenance -->

					<!-- Start Contact Us -->
					<li class="nav-item">
						<a href="#" class="nav-link nav_link2 text-uppercase" href="#">Contact Us</a>
					</li>
					<!-- End Contact Us -->

					<!-- Start My Account -->
					<!-- <li class="nav-item">
						<a href="profile.php" class="nav-link nav_link2 text-uppercase" href="#">My Account</a>
					</li> -->
					<!-- End My Accounty -->

					<!-- Start My Wishlist -->
					<li class="nav-item">
						<a href="#" class="nav-link nav_link2 text-uppercase" href="#">My Wishlist</a>
					</li>
					<!-- End My Wishlist -->

					<!-- Start My Wishlist -->
					<li class="nav-item">
						<a href="register.php" class="register_tap nav-link nav_link2 text-uppercase">Register</a>
					</li>
					<!-- End My Wishlist -->

					<!-- Start Log In -->
					<li class="nav-item">
						<a href="login.php" class="nav-link nav_link2 text-uppercase">Log In</a>
					</li>
					<!-- End Log In -->

					<!-- Start My Account -->
					<li class="nav-item dropdown mega-dropdown">
						<a class="nav-link dropdown-toggle text-uppercase" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Account
							<span class="sr-only">(current)</span>
						</a>
						<div id="languages" class="dropdown-menu mega-menu v-2 z-depth-1 py-4 px-3 text-center" aria-labelledby="navbarDropdownMenuLink2" style="left: 83%; min-width: 17%;">
							<div class="row">
								<div class="col-md-6 col-xl-6 sub-menu mb-xl-0 mb-4">
									<ul class="list-unstyled">
										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="profile.php">Profile</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="address.php">Address</a>
										</li>
									</ul>
								</div>

								<div class="col-md-6 col-xl-4 sub-menu mb-xl-0 mb-4">
									<ul class="list-unstyled">
										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="password.php">Password</a>
										</li>

										<li>
											<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="orders.php">orders</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</li>
					<!-- End My Account -->

					<!-- Start languages -->
					<li class="nav-item dropdown mega-dropdown">
						<a class="nav-link dropdown-toggle text-uppercase" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">English
							<span class="sr-only">(current)</span>
						</a>
						<div id="languages" class="dropdown-menu mega-menu v-2 z-depth-1 py-5 px-3 text-center" aria-labelledby="navbarDropdownMenuLink2" style="left: 83%; min-width: 17%;">
							<div class="row">
								<div class="col-md-6 col-xl-6 sub-menu mb-xl-0 mb-4">
									<ul class="list-unstyled">
										<li>
											<button class="menu-item pl-0 dropdown-item active" type="button">
												<img src="{{url('public/frontv2/images/lang/en.webp')}}" alt="English Language"> English
											</button>
										</li>
									</ul>
								</div>

								<div class="col-md-6 col-xl-4 sub-menu mb-xl-0 mb-4">
									<ul class="list-unstyled">
										<li>
											<button class="menu-item pl-0 dropdown-item" type="button">
												<img src="{{url('public/frontv2/images/lang/ar.webp')}}" alt="Arabic Language"> Arabic
											</button>
											<!-- <a class="menu-item pl-0" href="#!">Philips</a> -->
										</li>
									</ul>
								</div>
							</div>
						</div>
					</li>
					<!-- End languages -->
				</ul>
				<!-- End Desktop Nav -->

				<!-- Start Mobile Nav -->
				<div id="mobile_nav" class="col-md-12 d-block d-md-block d-lg-none">
					<button class="accordion_two w-100 border border-dark bg-light font-weight-bold">Heavy Machines
						<i class="fas fa-plus float-right"></i>
					</button>

					<div class="panel mb-3 w-100">
						<ul class="list-unstyled m-0 p-2">
							<li>
								<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Dish Washers</a>
							</li>

							<li>
								<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Hobs</a>
							</li>

							<li>
								<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">B-In</a>
							</li>

							<li>
								<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Ovens</a>
							</li>

							<li>
								<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Bult-In Washer Dryers</a>
							</li>

							<li>
								<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Dryers</a>
							</li>

							<li>
								<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Washing Machines</a>
							</li>

							<li>
								<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Washer Dryers</a>
							</li>
						</ul>
					</div>

					<button class="accordion_two active w-100 border border-dark bg-light font-weight-bold">Light Machines
						<i class="fas fa-plus float-right"></i>
					</button>

					<div class="panel mb-3 w-100">
						<ul class="list-unstyled m-0 p-2">
							<li>
								<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Microwaves</a>
							</li>

							<li>
								<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Coffee &amp; Espresso Makers</a>
							</li>

							<li>
								<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Electric Kettle</a>
							</li>

							<li>
								<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Food Steamer</a>
							</li>

							<li>
								<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Air Fryer</a>
							</li>

							<li>
								<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Table Grill</a>
							</li>

							<li>
								<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Sandwich Maker</a>
							</li>

							<li>
								<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Fans</a>
							</li>

							<li>
								<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Sound Bar</a>
							</li>

							<li>
								<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Home Theater</a>
							</li>
						</ul>
					</div>

					<button class="accordion_two active w-100 border border-dark bg-light font-weight-bold">BRAND
						<i class="fas fa-plus float-right"></i>
					</button>

					<div class="panel mb-3 w-100">
						<ul class="list-unstyled m-0 p-2">
							<li>
								<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Ariston</a>
							</li>

							<li>
								<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Philips</a>
							</li>

							<li>
								<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">QLED TVs</a>
							</li>

							<li>
								<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Samsung</a>
							</li>

							<li>
								<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">LG</a>
							</li>

							<li>
								<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Sharp</a>
							</li>

							<li>
								<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Toshiba</a>
							</li>

							<li>
								<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Tornado</a>
							</li>
						</ul>
					</div>

					<button class="accordion_two active w-100 border border-dark bg-light font-weight-bold">PRICE
						<i class="fas fa-plus float-right"></i>
					</button>

					<div class="panel mb-3 w-100">
						<ul class="list-unstyled m-0 p-2">
							<li>
								<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">Less Than 1000 EGP</a>
							</li>

							<li>
								<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">From 1000 EGP TO 3000 EGP</a>
							</li>

							<li>
								<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">From 6000 EGP TO 10000 EGP</a>
							</li>

							<li>
								<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="listproduct.php">More Than 10000 EGP</a>
							</li>
						</ul>
					</div>

					<button class="accordion_two active active w-100 border border-dark bg-light font-weight-bold">Offer
						<i class="fas fa-plus float-right"></i>
					</button>

					<div class="panel mb-3 w-100">
						<ul class="list-unstyled m-0 p-2">
							<li>
								<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="#0">Offer</a>
							</li>
						</ul>
					</div>

					<button class="active w-100 border border-dark bg-light font-weight-bold">
						<a style="color: #000; cursor: pointer;" class="menu-item text-capitalize border-0 pl-0" href="#0">Maintenance</a>
					</button>

					<button class="active w-100 border border-dark bg-light font-weight-bold">
						<a style="color: #000; cursor: pointer;" class="menu-item text-capitalize border-0 pl-0" href="#0">Contact Us</a>
					</button>

					<!-- <button class="active w-100 border border-dark bg-light font-weight-bold">
						<a style="color: #000; cursor: pointer;" class="menu-item text-capitalize border-0 pl-0" href="profile.php">My Account</a>
					</button> -->

					<button class="active w-100 border border-dark bg-light font-weight-bold">
						<a style="color: #000; cursor: pointer;" class="menu-item text-capitalize border-0 pl-0" href="#0">My Wishlist</a>
					</button>

					<button class="active w-100 border border-dark bg-light font-weight-bold">
						<a style="color: #000; cursor: pointer;" class="menu-item text-capitalize border-0 pl-0" href="register.php">Register</a>
					</button>

					<button class="active w-100 border border-dark bg-light font-weight-bold">
						<a style="color: #000; cursor: pointer;" class="menu-item text-capitalize border-0 pl-0" href="login.php">Log In</a>
					</button>

					<button class="accordion_two active active w-100 border border-dark bg-light font-weight-bold">My Account
						<i class="fas fa-plus float-right"></i>
					</button>

					<div class="panel w-100">
						<ul class="list-unstyled m-0 p-2">
							<li>
								<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="profile.php">Profile</a>
							</li>

							<li>
								<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="address.php">Address</a>
							</li>

							<li>
								<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="password.php">Password</a>
							</li>

							<li>
								<a class="menu-item font-weight-bold text-capitalize border-0 pl-0" href="orders.php">Orders</a>
							</li>
						</ul>
					</div>

					<button class="accordion_two active active w-100 border border-dark bg-light font-weight-bold">English
						<i class="fas fa-plus float-right"></i>
					</button>

					<div class="panel w-100">
						<ul class="list-unstyled m-0 p-2">
							<li>
								<a class="menu-item font-weight-bold text-capitalize border-0 pl-0 text-white" type="button">
									<img src="images/lang/en.webp" alt="English Language"> English
								</a>
							</li>

							<li>
								<a class="menu-item font-weight-bold text-capitalize border-0 pl-0 text-white" type="button">
									<img src="{{url('public/frontv2/images/lang/ar.webp')}}" alt="English Language"> Arabic
								</a>
							</li>
						</ul>
					</div>
					<!-- End Mobile Nav -->
				</div>
			</div>
			<!-- Collapsible content -->

		</nav>
		<!-- Navbar -->
	</header>

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
                          <strong>Shop By Category</strong>
                        </div>
        
                        <div class="block_content">
                          <div class="row">
                            <div class="col-md-3 col-xl-3 col-6 pr-0 no_padding_mobile">
                              <ul class="list-unstyled ul_links">
                                <a href="#0">
                                  <strong class="font-weight-bold border-bottom">Heavy Machines</strong>
                                </a>
        
                                <li>
                                  <a href="#0" title="Dish Washers">Dish Washers</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="Hobs">Hobs</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="B - in">B-In</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="Ovens">Ovens</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="Bult-In Washer Dryers">Bult-In Washer Dryers</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="Dryers">Dryers</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="Washing Machines">Washing Machines</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="Washer Dryers">Washer Dryers</a>
                                </li>
                              </ul>
                            </div>
        
                            <div class="col-md-3 col-xl-3 col-6 pr-0 pl-0 no_padding_mobile">
                              <ul class="list-unstyled ul_links">
                                <a href="#0">
                                  <strong class="font-weight-bold border-bottom invisible">Heavy Machines</strong>
                                </a>
        
                                <li>
                                  <a href="#0" title="Fridges">Fridges</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="Freezers">Freezers</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="TV">TV</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="Cookers">Cookers</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="Air Conditioner">Air Conditioner</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="Kitchen Ventilating Fan">Kitchen Ventilating Fan</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="Kitchen Cooker Hood">Kitchen Cooker Hood</a>
                                </li>
        
                              </ul>
                            </div>
        
                            <div class="col-md-3 col-xl-3 col-6 pr-0 pl-0 no_padding_mobile">
                              <ul class="list-unstyled ul_links">
                                <a href="#0">
                                  <strong class="font-weight-bold border-bottom">Light Machines</strong>
                                </a>
        
                                <li>
                                  <a href="#0" title="Microwaves">Microwaves</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="Coffee &amp; Espresso Makers">Coffee &amp; Espresso Makers</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="Electric Kettle">Electric Kettle</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="Food Steamer">Food Steamer</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="Air Fryer">Air Fryer</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="Table Grill">Table Grill</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="Sandwich Maker">Sandwich Maker</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="Blenders">Blenders</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="PowerLife Bagged">PowerLife Bagged</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="Collection Salad Maker">Collection Salad Maker</a>
                                </li>
                              </ul>
                            </div>
        
                            <div class="col-md-3 col-xl-3 col-6 pr-0 pl-0 no_padding_mobile">
                              <ul class="list-unstyled ul_links">
                                <a href="#0">
                                  <strong class="font-weight-bold border-bottom invisible">Light Machines</strong>
                                </a>
        
                                <li>
                                  <a href="#0" title="Microwaves">Iron</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="Water Dispenser">Water Dispenser</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="Water Heater">Water Heater</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="Oil Heater">Oil Heater</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="Fans">Fans</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="Wall Clock">Wall Clock</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="Portable Hot Plate">Portable Hot Plate</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="Sound Bar">Sound Bar</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="Home Theater">Home Theater</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="Shake System">Shake System</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="One Box Entertainment">One Box Entertainment</a>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
        
                    <div class="col-md-6 col-xl-3 col-12">
                      <div class="block block_brand_content">
                        <div class="block_title mb-3">
                          <strong>Shop By Brand</strong>
                        </div>
        
                        <div class="block_content">
                          <div class="row">
                            <div class="col-md-3 col-xl-3 col-6 pr-0 pl-0 no_padding_mobile">
                              <ul class="list-unstyled ul_links">
                                <a href="#0">
                                  <strong class="font-weight-bold border-bottom">Brands</strong>
                                </a>
        
                                <li>
                                  <a href="#0" title="Ariston">Ariston</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="Philips">Philips</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="Samsung">Samsung</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="LG">LG</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="Sharp">Sharp</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="Toshiba">Toshiba</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="Tornado">Tornado</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="Hover">Hover</a>
                                </li>
                              </ul>
                            </div>
        
                            <div class="col-md-3 col-xl-3 col-6 pr-0 pl-0 no_padding_mobile">
                              <ul class="list-unstyled ul_links">
                                <a href="#0">
                                  <strong class="font-weight-bold border-bottom invisible">Brands</strong>
                                </a>
        
                                <li>
                                  <a href="#0" title="Candy">Candy</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="Sony">Sony</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="La Germania">La Germania</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="Mienta">Mienta</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="Elba">Elba</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="Franke">Franke</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="I Cook">I Cook</a>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
        
                    <div class="mobile_center col-md-6 col-xl-3 col-12">
                      <div class="block">
                        <div class="block_title mb-2">
                          <strong>Important Links</strong>
                        </div>
        
                        <div class="block_content">
                          <div class="row">
                            <div class="col-xl-12 col-12">
                              <ul class="list-unstyled ul_links">
                                <li>
                                  <a href="#0" title="About us">About us</a>
                                </li>
        
                                <li>
                                  <a href="#0" title="Aghezty Maintenance">Aghezty Maintenance</a>
                                </li>
                              </ul>
                            </div>
        
                            <div class="col-xl-12 col-12">
                              <div class="block_title mb-3">
                                <strong>Find Us On</strong>
                              </div>
        
                              <div class="block_content">
                                <div class="row">
                                  <div class="col-xl-6 col-6">
                                    <a class="app-icon" href="https://play.google.com/store" title="Google Play">
                                      <img class="border border-white rounded" src="{{url('public/frontv2/images/google-play.svg')}}" alt="Google Play">
                                    </a>
                                  </div>
        
                                  <div class="col-xl-6 col-6">
                                    <a class="app-icon" href="https://www.apple.com/ios/app-store/" title="Google Play">
                                      <img class="border border-white rounded" src="{{url('public/frontv2/images/app-store.svg')}}" alt="App Store">
                                    </a>
                                  </div>
        
                                  <div class="col-sm-12 col-lg-12 col-xl-12">
                                    <div class="social-links text-center">
                                      <a class="fab fa-facebook-f fa-2x" href="http://www.facebook.com" title="Facebook" target="_blank"></a>
                                      <a class="fab fa-whatsapp fa-2x" href="whatsapp://send?phone=+0201019500621" title="Whatsapp"></a>
                                      <a class="fas fa-phone fa-2x" href="tel:+20233047920" title="Phone number"></a>
                                      <a class="far fa-comment fa-2x" href="sms:123" title="Messege"></a>
                                      <a class="fas fa-envelope fa-2x" href="mailto:mailto:info@aghzty.com" title="Email"></a>
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
        
                                <!-- <div class="row">
                                <div class="col-sm-12">
                                  <div class="hotline mt-2">
                                    <strong>Telephone</strong>
                                    <a class="d-block" href="tel:+20233047920" title="Phone number">
                                      <strong>0233047920</strong>
                                    </a>
                                  </div>
                                </div>
                              </div> -->
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
        <!-- Owl Carousel CSS-->
        <script src="{{url('public/frontv2/js/owl.carousel.min.js')}}"></script>
        <!-- Easy Zoom JS -->
        <script src="{{url('public/frontv2/js/easyzoom.js')}}"></script>
        <!-- social-likes JS -->
        <script src="{{url('public/frontv2/js/social-likes.min.js')}}"></script>
        <!-- Script JS -->
        <script src="{{url('public/frontv2/js/script.js')}}"></script>
        
        
        </div>
        @yield('scripts')
        </body>
        
        </html>