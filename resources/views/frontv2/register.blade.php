<!-- header -->
<?php include 'header.php'; ?>
<!-- end header-->

<!-- main content -->
<div class="main mt-2">
	<section class="log_in justify-content-center">
		<div class="mobile_views">
			<div class="log_in_bg rounded">
				<form action="#" method="POST">
					<div>
						<div class="reg-title text-center mb-4">
							<h5 class="text-capitalize m-auto w-25 border-bottom border-secondary">Create New Account</h5>
						</div>

						<!-- Start Upload Image -->
						<?php include 'upload_img.php'; ?>
						<!-- End Upload Image -->

						<div class="all_forms">
							<div class="col-md-12 col-lg-12 col-xl-12 col-auto mb-4">
								<label class="sr-only" for="inlineFormInputGroupNameReg">Name</label>
								<div class="input-group mb-2 m-auto w-50">
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="fas fa-user"></i></div>
									</div>
									<input type="text" class="form-control text-center" id="inlineFormInputGroupNameReg" placeholder="Name">
								</div>
							</div>

							<div class="col-md-12 col-lg-12 col-xl-12 col-auto mb-4">
								<label class="sr-only" for="inlineFormInputGroupEmailReg">Email</label>
								<div class="input-group mb-2 m-auto w-50">
									<div class="input-group-prepend">
										<div class="input-group-text">
											<i class="fas fa-at"></i>
										</div>
									</div>
									<input type="text" class="form-control text-center" id="inlineFormInputGroupEmailReg" placeholder="Email">
								</div>
							</div>

							<div class="col-md-12 col-lg-12 col-xl-12 col-auto mb-4">
								<label class="sr-only" for="inlineFormInputGroupPhoneReg">Phone</label>
								<div class="input-group mb-2 m-auto w-50">
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="fas fa-phone"></i></div>
									</div>
									<input type="text" class="form-control text-center" id="inlineFormInputGroupPhoneReg" placeholder="Phone">
								</div>
							</div>

							<div class="col-md-12 col-lg-12 col-xl-12 col-auto mb-4">
								<label class="sr-only" for="inlineFormInputGroupPasswordReg">Password</label>
								<div class="input-group mb-2 m-auto w-50">
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="fas fa-unlock-alt"></i></div>
									</div>
									<input type="text" class="form-control text-center" id="inlineFormInputGroupPasswordReg" placeholder="Password">
								</div>
							</div>

							<div class="col-md-12 col-lg-12 col-xl-12 col-auto mb-4">
								<label class="sr-only" for="inlineFormInputGroupConfirmPasswordReg">Confirm Password</label>
								<div class="input-group mb-2 m-auto w-50">
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="fas fa-unlock-alt"></i></div>
									</div>
									<input type="text" class="form-control text-center" id="inlineFormInputGroupConfirmPasswordReg" placeholder="Confirm Password">
								</div>
							</div>


							<div class="reg-title text-center mb-4">
								<h5 class="text-capitalize m-auto w-25 border-bottom border-secondary">Address</h5>
							</div>

							<div class="col-md-12 col-lg-12 col-xl-12 col-auto mb-4">
								<div class="input-group mb-2 m-auto w-50">
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="fas fa-map-marker-alt"></i></div>
									</div>
									<select class="form-control .dropdown-dark">
										<option value="Governorate">Governorate</option>
										<option value="Cairo">Cairo</option>
										<option value="Giza">Giza</option>
										<option value="Alexandria">Alexandria</option>
									</select>
								</div>
							</div>

							<div class="col-md-12 col-lg-12 col-xl-12 col-auto mb-4">
								<div class="input-group mb-2 m-auto w-50">
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="fas fa-map-marker-alt"></i></div>
									</div>
									<select class="form-control .dropdown-dark">
										<option value="Governorate">City</option>
										<option value="Nasrcity">Nasrcity</option>
										<option value="Masr El Gdida">Masr El Gdida</option>
										<option value="6 Octobar">6 Octobar</option>
									</select>
								</div>
							</div>

							<div class="col-md-12 col-lg-12 col-xl-12 col-auto mb-4">
								<div class="input-group mb-2">
									<div class="input-group-prepend m-auto">
										<div class="input-group-text"><i class="fas fa-keyboard"></i></div>
										<textarea name="" id="" cols="97" rows="5"></textarea>
									</div>
								</div>
							</div>

							<div class="authentication-info d-flex justify-content-center">
								<div class="col-md-12 col-lg-12 col-xl-12 col-auto">
									<div class="form-check mb-2 text-center">
										<input class="form-check-input form-check-input_register" type="checkbox" id="autoSizingCheckReg">
										<label class="form-check-label" for="autoSizingCheckReg">Remember me</label>
									</div>
								</div>
							</div>

							<div class="col-md-12 col-lg-12 col-xl-12 col-12">
								<button type="submit" class="btn_save btn btn-secondary text-white mb-2 m-auto d-block w-50 text-capitalize">Save</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
</div>
<!-- footer -->
<?php include 'footer.php'; ?>
<!-- end footer-->