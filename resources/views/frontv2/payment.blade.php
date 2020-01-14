<!-- Start Header -->
<?php include 'header.php'; ?>
<!-- End Header -->

<!-- Start Owl Carsoul -->
<?php include 'video_slider.php'; ?>
<!-- End Owl Carsoul -->

<div class="main">
	<div class="mobile_views">
		<div class="status_title my-3">
			<h4 class="text-center border-bottom border-secondary w-25 m-auto">Select Payment Method</h4>
		</div>

		<section class="choose-address">
			<div class="accordionn" id="accordionExample">
				<div class="card">
					<div class="card-header" id="headingThree">
						<button class="btn btn-link collapsed" id="collapsed_pay" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							Select Payment Method</button>
					</div>

					<div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
						<div class="card-body">
							<div class="choose-visa input-group w-75 m-auto rounded px-2 py-1">
								<div class="visa-cash input-group-prepend">
									<span class="span_input_radio">
										<input type="radio" name="payment" value="1" form="checkout-form" id="radioOne">
									</span>

									<span class="span_font_icon">
										<span class="far fa-handshake fa-lg"></span>
									</span>

									<span class="span_label_cash">
										<label for="radioOne">Cash</label>
									</span>
								</div>
							</div>

							<div class="choose-visa input-group w-75 m-auto rounded px-2 py-1">
								<div class="visa-cash input-group-prepend">
									<span class="span_input_radio">
										<input type="radio" name="payment" value="3" form="checkout-form" id="radioTwo">
									</span>

									<span class="span_font_icon">
										<i class="fab fa-cc-visa"></i>
									</span>

									<span class="span_label_cash">
										<label for="radioTwo">Visa After Deliver</label>
									</span>
								</div>
							</div>

							<div class="choose-visa input-group w-75 m-auto rounded px-2 py-1">
								<div class="visa-cash input-group-prepend">
									<span class="span_input_radio">
										<input type="radio" name="payment" value="2" form="checkout-form" id="radioThree">
									</span>

									<span class="span_font_icon">
										<i class="fab fa-cc-visa"></i>
									</span>

									<span class="span_label_cash">
										<label for="radioThree">Visa</label>
									</span>
								</div>
							</div>

							<form class="w-100" action="#0" id="checkout-form" method="POST">
								<div class="row mb-4">
									<div class="col-md-4 col-lg-4 col-xl-4 col-12">
										<input type="hidden" name="address_id" value="197">
										<div class="form-row" style="display:none">
											<div class="form-group w-100" style="height:55px">
												<label for="cc_number">Credit Card Number</label>
												<input type="number" class="form-control" min="0">
												<div class="form-group" id="card-number"></div>
											</div>
										</div>
									</div>

									<div class="col-md-4 col-lg-4 col-xl-4 col-6">
										<input type="hidden" name="address_id" value="197">
										<div class="form-row" style="display:none">
											<div class="form-group w-100" style="height:55px">
												<label for="cc_number">Expiry</label>
												<input type="number" class="form-control" min="0">
												<div class="form-group" id="card-number"></div>
											</div>
										</div>
									</div>

									<div class="col-md-4 col-lg-4 col-xl-4 col-6">
										<input type="hidden" name="address_id" value="197">
										<div class="form-row" style="display:none">
											<div class="form-group w-100" style="height:55px">
												<label for="cc_number">CVV</label>
												<input type="number" class="form-control" min="0">
												<div class="form-group" id="card-number"></div>
											</div>
										</div>
									</div>
								</div>
							</form>

							<button type="submit" class="btn btn-primary btn-lg btn-block w-75 m-auto">Paid Now</button>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
<!-- Start Footer -->
<?php include 'footer.php'; ?>
<!-- End Footer -->