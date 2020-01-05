<!-- Start Header -->
<?php include 'header.php'; ?>
<!-- End Header -->

<style>
	nav.container-fluid {
		padding-right: 0 !important;
		padding-left: 0 !important;
	}
</style>

<div class="main">
	<nav class="mobile_views nav_breadcrumb" aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="index.php" title="Go To Home">Home</a>
			</li>

			<li class="breadcrumb-item">
				<a href="listproduct.php" title="Go To Heavy Machine">Heavy Machine</a>
			</li>

			<li class="breadcrumb-item active" aria-current="page">Fridge</li>
		</ol>
	</nav>

	<section id="inner-page" class="mobile_views">
		<div class="">
			<h3 class="product-title font-weight-bold">Toshiba Freestanding Refrigerator No Frost, 349 Litres, 2 Doors,
				Gold - GR-EF37-J-G</h3>

			<span class="rating rating_star">
				<i class="fas fa-star fa-xs" id="colorstar"></i>
				<i class="fas fa-star fa-xs" id="colorstar"></i>
				<i class="fas fa-star fa-xs" id="colorstar"></i>
				<i class="fas fa-star fa-xs" id="colorstar"></i>
				<i class="far fa-star fa-xs"></i>
			</span>

			<span class="rating rating_review  d-none d-lg-inline-block">8 Review(s) </span>

			<span class="d-none rating_space d-lg-inline-block" style="color: #c3c5c9;"> | </span>

			<a href="#review">
				<span class="rating rating_addReview d-none d-lg-inline-block"> Add Your Review</span>
			</a>
		</div>

		<div class="row w-100">
			<div class="col-lg-7">
				<div class="row">
					<div class="col-md-3 d-none d-sm-block">
						<div class="c-slide border btn bg-white my-1">
							<p data-target="#carouselExampleControls" data-slide-to="0" class="active">
								<img class="w-100 d-block" src="images/products/fridge_1.jpg" />
							</p>
						</div>

						<div class="c-slide border btn btn bg-white my-1">
							<p data-target="#carouselExampleControls" data-slide-to="1">
								<img class="w-100 d-block" src="images/products/fridge_2.jpg" />
							</p>
						</div>
					</div>

					<div class="col-md-9">
						<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="border: 1px solid #dcdcdc;">
							<div class="carousel-inner">
								<div class="carousel-item active">
									<div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
										<a class="zoom_image" href="images/products/fridge_1.jpg">
											<img class="w-100" src="images/products/fridge_1.jpg" alt="First slide" />
										</a>
									</div>
								</div>

								<div class="carousel-item">
									<div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
										<a class="zoom_image" href="images/products/fridge_2.jpg">
											<img class="w-100" src="images/products/fridge_2.jpg" alt="Second slide" />
										</a>
									</div>
								</div>
							</div>

							<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
								<i class="fas fa-chevron-left fa-3x left_slider" style="color:#106db6"></i>
							</a>

							<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
								<i class="fas fa-chevron-right fa-3x right_slider" style="color:#106db6"></i>
								<span class="sr-only">Next</span>
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="info col-lg-5">
				<div class="row">
					<div class="features col-md-12">
						<h5 class="font-weight-bold py-2">Key Features</h5>

						<div class="modal_feature">
							<h5 class="font-weight-bold d-inline-block">Modal:</h5>
							<p class="d-inline-block px-1">BHWD 125 GCC</p>
						</div>

						<div class="desc_feature">
							<h5 class="font-weight-bold d-inline-block">Description:</h6>
								<p class="d-inline-block px-1">BUILT IN WASHER DRYERS-Ariston-BHWD 125 GCC</p>
						</div>

						<!-- <div>
              <h5 class="font-weight-bold d-inline-block">Cooling Type:</h6>
                <p class="d-inline-block px-1">No Frost</p>
						</div>

            <div>
              <h5 class="font-weight-bold d-inline-block">Number Of Doors:</h6>
                <p class="d-inline-block px-1">2</p>
						</div>

            <div>
              <h5 class="font-weight-bold d-inline-block">Total Capacity In Litres:</h6>
                <p class="d-inline-block px-1">328 Liters</p>
			</div> -->
						<div>
							<h6 class="font-weight-bold d-inline-block">Availability:</h6>
							<p class="d-inline-block px-1">In stock</p>
						</div>

						<div class="row price_disc_offer">
							<h4 class="col-md-6 price text-primary font-weight-bold">5,380 EGP</h4>
							<h4 class="col-md-6 discount text-muted font-weight-bold">5,700 EGP</h4>
							<div class="product-label text-center font-weight-bold">
								<span class="sale-product-icon">
									<span class="testtt"></span>
								</span>
							</div>
						</div>

						<p class="quantity">only
							<span class="text-primary font-weight-bold">2</span> left
						</p>
					</div>

					<div class="col-md-12">
						<form class="quantity-form">
							<input id="np-qu" class="form-control" type="text" value="1">

							<span class="btn btn-light btn-sm border np-plus p-0 px-1">
								<i class="fa fa-plus fa-xs" aria-hidden="true"></i>
							</span>

							<span class="btn btn-light btn-sm border np-minus p-0 px-1">
								<i class="fa fa-minus fa-xs" aria-hidden="true"></i>
							</span>

							<button class="w-75 btn btn-primary float-left font-weight-bold" id="add_to">ADD TO CART</button>
						</form>
					</div>

					<!-- <div class="col-md-12">
            <p class="text-danger m-2 font-weight-bold"><i class="fa fa-heart"></i> ADD TO WISHLIST</p>
					</div> -->

					<div class="social-share col-md-12 col-lg-12 col-xl-12 mt-3">
						<div class="social-likes">
							<div data-service="facebook" title="Share link on Facebook"></div>

							<div data-service="twitter" title="Share link on Twitter"></div>

							<div class="social-likes__widget_whatsapp text-center">
								<img src="images/whatsapp.PNG" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="mobile_view taste mt-5">
			<div class="border-bottom w-100 mt-3"></div>
		</div>
	</section>

	<section class="inner_table_desc">
		<div class="mobile_views">
			<div class="table_desc pt-3">
				<div class="table_desc_title">
					<h5>General</h5>
				</div>

				<table class="table table-striped">
					<tbody>
						<tr>
							<th scope="row">
								<h6>Seller SKU</h6>
							</th>

							<td>GR-EF37-J-G</td>
						</tr>

						<tr>
							<th scope="row">
								<h6>Brand</h6>
							</th>

							<td>Toshiba</td>
						</tr>

						<tr>
							<th scope="row">
								<h6>Model Name</h6>
							</th>

							<td>GR-EF37-J-G</td>
						</tr>
					</tbody>
				</table>

				<div class="table_desc_title">
					<h5>Specifications</h5>
				</div>

				<table class="table table-striped">
					<tbody>
						<tr>
							<th scope="row">
								<h6>Refrigerator Design</h6>
							</th>

							<td>Freestanding Refrigerator</td>
						</tr>

						<tr>
							<th>
								<h6>Refrigerator Style</h6>
							</th>

							<td>Fridge Freezer</td>
						</tr>

						<tr>
							<th scope="row">
								<h6>Cooling Type </h6>
							</th>

							<td>No Frost</td>
						</tr>

						<tr>
							<th scope="row">
								<h6>Capacity In FT </h6>
							</th>

							<td>13</td>
						</tr>

						<tr>
							<th scope="row">
								<h6>Total Capacity In Litres </h6>
							</th>

							<td>328 Liters</td>
						</tr>

						<tr>
							<th scope="row">
								<h6>Product Color </h6>
							</th>

							<td>Gold</td>
						</tr>
						<tr>
							<th scope="row">
								<h6>Freezer Position </h6>
							</th>

							<td>Top</td>
						</tr>

						<tr>
							<th scope="row">
								<h6>Digital Display </h6>
							</th>

							<td>No</td>
						</tr>

						<tr>
							<th scope="row">
								<h6>Number Of Doors </h6>
							</th>

							<td>2</td>
						</tr>

						<tr>
							<th scope="row">
								<h6>Type Of Interior Light </h6>
							</th>

							<td>Bulb Light</td>
						</tr>

						<tr>
							<th scope="row">
								<h6>Ice-Cube Maker </h6>
							</th>

							<td>No</td>
						</tr>

						<tr>
							<th scope="row">
								<h6>Water Dispenser </h6>
							</th>

							<td>Yes</td>
						</tr>

						<tr>
							<th scope="row">
								<h6>Number Of Shelves </h6>
							</th>

							<td>4 Or More</td>
						</tr>

						<tr>
							<th scope="row">
								<h6>Inverter Technology </h6>
							</th>

							<td>No</td>
						</tr>

						<tr>
							<th scope="row">
								<h6>Adjustable Shelves</h6>
							</th>

							<td>Yes</td>
						</tr>

						<tr>
							<th scope="row">
								<h6>Refrigerator Dimensions </h6>
							</th>

							<td>604 x 681 x 1723</td>
						</tr>
					</tbody>
				</table>

				<div class="table_desc_title">
					<h5>Aghezty</h5>
				</div>

				<table class="table table-striped">
					<tbody>
						<tr>
							<th scope="row">
								<h6>Warranty</h6>
							</th>

							<td>10 Years</td>
						</tr>

						<tr>
							<th scope="row">
								<h6>Delivery Time</h6>
							</th>

							<td>5-7 Business Days</td>
						</tr>

						<tr>
							<th scope="row">
								<h6>Cash On Delivery (COD) </h6>
							</th>

							<td>Yes</td>
						</tr>

						<tr>
							<th scope="row">
								<h6>Return Or Refund </h6>
							</th>

							<td> 14 Days</td>
						</tr>
					</tbody>
				</table>

				<div class="table_desc_title">
					<h5>More Details</h5>
				</div>

				<div class="more_info">
					<ul class="text-capitalize">
						<li>Brand: Toshiba</li>
						<li>Type: Freestanding Refrigerator</li>
						<li>Capacity in Liters: 349 Litre</li>
						<li>Capacity in FT: 13</li>
						<li>Number Of Doors: 2 Doors</li>
						<li>Refrigerator Color: Gold</li>
						<li>Refrigerator Handle: Circular Handle</li>
						<li>Platinum Deodorizer Filter</li>
						<li>Glass Shelves</li>
						<li>Non CFC</li>
						<li>Low Noise Design</li>
						<li>Refrigerator Dimensions ( mm ): Width x Depth x Height: 604 x 681 x 1723</li>
						<li>Net Weight: 64 kg</li>
						<li>Gross Weight: 71 kg</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<section class="based_selection">
		<div class="mobile_views mt-5">
			<div class="table_desc_title">
				<h6 class="font-weight-bold">BASED ON YOUR SELECTION YOU MAY ALSO LIKE</h6>
			</div>

			<div class="border-bottom w-100"></div>
			<div class="row  mt-3">
				<div class="col-md-2 col-6 mb-3">
					<div class="content_view px-2 h-100 bg-white">
						<a href="#0">
							<img src="images/download.jfif" alt="Product" class="w-100">

							<h6 class="text-dark text-center text-capitalize">Apple iPhone XS Max, 256GB, 4GB RAM, 4G LTE, Space
								Grey</h6>
						</a>

						<div class="rating_list_product">
							<i class="fas fa-star" id="colorstar"></i>
							<i class="fas fa-star" id="colorstar"></i>
							<i class="far fa-star"></i>
							<i class="far fa-star"></i>
							<i class="far fa-star"></i>
						</div>

						<div class="price-description text-uppercase">Cash Price</div>

						<div class="price-box">
							<span class="regular-price">
								<span class="price font-weight-bold">30,200 EGP</span>
							</span>
						</div>
					</div>
				</div>

				<div class="col-md-2 col-6 mb-3">
					<div class="content_view px-2 h-100 bg-white">
						<a href="#0">
							<img src="images/product2.webp" alt="Product" class="w-100">

							<h6 class="text-dark text-center text-capitalize">Devia Ocean2 series case for iPhone XI 5.8 2019 - Clear
								Tea</h6>
						</a>

						<div class="rating_list_product">
							<i class="fas fa-star" id="colorstar"></i>
							<i class="fas fa-star" id="colorstar"></i>
							<i class="fas fa-star" id="colorstar"></i>
							<i class="far fa-star"></i>
							<i class="far fa-star"></i>
						</div>

						<div class="price-description text-uppercase">Cash Price</div>

						<div class="price-box">
							<span class="regular-price">
								<span class="price font-weight-bold">349 EGP</span>
							</span>
						</div>
					</div>
				</div>

				<div class="col-md-2 col-6 mb-3">
					<div class="content_view px-2 h-100 bg-white">
						<a href="#0">
							<img src="images/product3.webp" alt="Product" class="w-100">

							<div class="product-label text-center font-weight-bold">
								<span class="sale-product-icon">-10%</span>
							</div>

							<h6 class="text-dark text-center text-capitalize">Apple iPhone 11, 128GB, 4GB RAM, 4G LTE, Green</h6>
						</a>

						<div class="rating_list_product">
							<i class="fas fa-star" id="colorstar"></i>
							<i class="fas fa-star" id="colorstar"></i>
							<i class="fas fa-star" id="colorstar"></i>
							<i class="fas fa-star" id="colorstar"></i>
							<i class="far fa-star"></i>
						</div>

						<div class="price-description text-uppercase">Cash Price</div>

						<div class="price-box">
							<span class="regular-price">
								<span class="price font-weight-bold">16,999 EGP</span>
							</span>

							<p class="old-price">
								<span class="price font-weight-bold">506 EGP </span>
							</p>
						</div>
					</div>
				</div>

				<div class="col-md-2 col-6 mb-3">
					<div class="content_view px-2 h-100 bg-white">
						<a href="#0">
							<img src="images/product3.webp" alt="Product" class="w-100">

							<h6 class="text-dark text-center text-capitalize">Apple iPhone XS, 256GB, 4GB RAM, 4G LTE, Gold</h6>
						</a>

						<div class="rating_list_product">
							<i class="fas fa-star" id="colorstar"></i>
							<i class="fas fa-star" id="colorstar"></i>
							<i class="fas fa-star" id="colorstar"></i>
							<i class="fas fa-star" id="colorstar"></i>
							<i class="fas fa-star" id="colorstar"></i>
						</div>

						<div class="price-description text-uppercase">Cash Price</div>

						<div class="price-box">
							<span class="regular-price">
								<span class="price font-weight-bold">27,500 EGP</span>
							</span>
						</div>
					</div>
				</div>

				<div class="col-md-2 col-6 mb-3">
					<div class="content_view px-2 h-100 bg-white">
						<a href="#0">
							<img src="images/download.jfif" alt="Product" class="w-100">

							<h6 class="text-dark text-center text-capitalize">Apple iPhone XS Max, 256GB, 4GB RAM, 4G LTE, Space
								Grey</h6>
						</a>

						<div class="rating_list_product">
							<i class="fas fa-star" id="colorstar"></i>
							<i class="fas fa-star" id="colorstar"></i>
							<i class="far fa-star"></i>
							<i class="far fa-star"></i>
							<i class="far fa-star"></i>
						</div>

						<div class="price-description text-uppercase">Cash Price</div>

						<div class="price-box">
							<span class="regular-price">
								<span class="price font-weight-bold">30,200 EGP</span>
							</span>
						</div>
					</div>
				</div>

				<div class="col-md-2 col-6 mb-3">
					<div class="content_view px-2 h-100 bg-white">
						<a href="#0">
							<img src="images/product2.webp" alt="Product" class="w-100">

							<h6 class="text-dark text-center text-capitalize">Devia Ocean2 series case for iPhone XI 5.8 2019 - Clear
								Tea</h6>
						</a>

						<div class="rating_list_product">
							<i class="fas fa-star" id="colorstar"></i>
							<i class="fas fa-star" id="colorstar"></i>
							<i class="fas fa-star" id="colorstar"></i>
							<i class="far fa-star"></i>
							<i class="far fa-star"></i>
						</div>

						<div class="price-description text-uppercase">Cash Price</div>

						<div class="price-box">
							<span class="regular-price">
								<span class="price font-weight-bold">349 EGP</span>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="review_comment">
		<div class="mobile_views">
			<div class="row mt-5">
				<div class="col-md-6">
					<div class="review_title">
						<h4 class="text-capitalize">Reviews</h4>
					</div>

					<div class="review-area">
						<span class="review-by"> Review by <strong>Mohamed </strong> on 12/8/2019</span>
						<i class="fas fa-star" id="colorstar"></i>
						<i class="fas fa-star" id="colorstar"></i>
						<i class="fas fa-star" id="colorstar"></i>
						<i class="fas fa-star" id="colorstar"></i>
						<i class="fas fa-star" id="colorstar"></i>
						<p>
							<strong class="review-area-title">Good product </strong><br>
							Good production </p>
					</div>

					<div class="review-area mt-3">
						<span class="review-by"> Review by <strong>Moaz Mahmoud </strong> on 11/3/2019</span>

						<i class="fas fa-star" id="colorstar"></i>
						<i class="fas fa-star" id="colorstar"></i>
						<i class="fas fa-star" id="colorstar"></i>
						<i class="fas fa-star" id="colorstar"></i>
						<i class="fas fa-star" id="colorstar"></i>
						<p>
							<strong class="review-area-title">Good product</strong><br>
							Thank You for this product
						</p>
					</div>
				</div>

				<div class="col-md-6" id="review">
					<div class="review_title">
						<h4 class="text-capitalize">Write Your Own Review</h4>
					</div>

					<p style="color: #777;">How do you rate this product? *</p>

					<form class="rating-widget">
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
					</form>

					<form action="" class="mt-3 mb-3 add_comment">
						<label for="nickname_field" class="required w-100">Nickname
							<em>*</em>
							<input type="text" class="form-control">
						</label>

						<label for="nickname_field" class="required w-100">Summary of Your Review
							<em>*</em>
							<input type="text" class="form-control">
						</label>

						<label for="nickname_field" class="required w-100">Review
							<em>*</em>
							<textarea type="text" cols="5" rows="3" class="form-control"></textarea>
						</label>

						<button class="btn btn-primary" style="float: right;margin-top: 11px;">Submit Review</button>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>

<!-- Start Footer -->
<?php include 'footer.php'; ?>
<!-- End Footer -->