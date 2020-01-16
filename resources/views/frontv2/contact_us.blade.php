<style>
	.mapouter {
		position: relative;
		text-align: right;
		height: auto;
		width: 100%;
	}

	.gmap_canvas {
		overflow: hidden;
		background: none !important;
		height: auto;
		width: 100%;
	}
</style>

<!-- header -->
<?php include 'header.php'; ?>
<!-- end header-->

<!-- main content -->
<div class="main p-0">
	<div class="mobile_views">
		<h2 class="text-center mt-4">Contact Us</h2>
		<div class="call-center w-100 m-auto p-3 hvr-wobble-to-bottom-right">
			<a href="tel:1999">
				<span class="font-weight-bold">1999</span>
				<i class="fas fa-phone fa-2x"></i>
			</a>
		</div>

		<div class="call-center w-100 m-auto p-3 hvr-wobble-to-bottom-right">
			<a href="mailto:info@aghzty.com9">
				<span class="font-weight-bold">info@aghzty.com</span>
				<i class="far fa-envelope fa-2x"></i>
			</a>
		</div>
		<div class="border-bottom border-dark my-5"></div>

		<div class="mapouter">
			<h2 class="text-center">Find Us</h2>
			<div class="gmap_canvas"><iframe width="100%" height="50%" id="gmap_canvas" src="https://maps.google.com/maps?q=ivas&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.embedgooglemap.net/blog/best-wordpress-themes/"></a>
			</div>
		</div>

		<div class="border-bottom border-dark my-5"></div>

		<div class="your_comments w-100 p-3 rounded">
			<form>
				<div class="row m-0">
					<div class="col-md-6 col-lg-6 col-xl-6 col-12">
						<input type="text" class="form-control my-2 hvr-float" placeholder="Username">
					</div>

					<div class="col-md-6 col-lg-6 col-xl-6 col-12">
						<input type="email" class="form-control my-2 hvr-float" placeholder="Email">
					</div>

					<div class="col-md-12 col-lg-12 col-xl-12 col-12">
						<input type="tel" class="form-control my-2 hvr-float" placeholder="Phone">
					</div>

					<div class="col-12">
						<textarea placeholder="Add Your Message" class="form-control w-100 my-2 hvr-float" name="" id="" cols="10" rows="5"></textarea>
					</div>

					<div class="col-12">
						<button class="btn btn-secondary w-100 my-2 hvr-wobble-to-bottom-right">Send</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<!-- footer -->
	<?php include 'footer.php'; ?>
	<!-- end footer-->