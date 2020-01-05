<!-- header -->
<?php include 'header.php'; ?>
<!-- end header-->

<!-- main content -->
<div class="main mt-2">
	<section class="log_in justify-content-center">
		<div class="mobile_views">
			<div class="log_in_bg rounded">
				<form action="#" method="post">
					<input type="hidden" name="_token" value="xgnOt2OAHRTUAzHxV6ZmzT5X1o8NrFj0NaPQ43Yn">
					<div class="row">
						<div class="col-md-12 col-lg-12 col-xl-12 col-12">
							<div class="login_title mb-4">
								<h4 class="text-capitalize text-center mt-3">sign in</h4>
							</div>

							<form>
								<div class="all_forms">
									<div class="col-md-12 col-lg-12 col-xl-12 col-auto mb-4">
										<label class="sr-only" for="inlineFormInputGroup">Email</label>
										<div class="input-group mb-2 m-auto w-50">
											<div class="input-group-prepend">
												<div class="input-group-text">
													<i class="fas fa-at"></i>
												</div>
											</div>
											<input type="text" class="form-control text-center" id="inlineFormInputGroupUsername" placeholder="Email">
										</div>
									</div>

									<div class="col-md-12 col-lg-12 col-xl-12 col-auto mb-4">
										<label class="sr-only" for="inlineFormInputGroup">Password</label>
										<div class="input-group mb-2 m-auto w-50">
											<div class="input-group-prepend">
												<div class="input-group-text"><i class="fas fa-unlock-alt"></i></div>
											</div>
											<input type="text" class="form-control text-center" id="inlineFormInputGroupPassword" placeholder="Password">
										</div>
									</div>

									<div class="col-md-12 col-lg-12 col-xl-12 col-auto mb-4">
										<div class="form-check mb-2 text-center">
											<input class="form-check-input" type="checkbox" id="autoSizingCheck">
											<label class="form-check-label" for="autoSizingCheck">
												Remember me
											</label>
										</div>
									</div>

									<div class="col-md-12 col-lg-12 col-xl-12 col-auto">
									<button type="submit" class="btn_save btn btn-secondary text-secondary bg-light mb-2 m-auto d-block w-50 text-capitalize">login</button>

										<a href="#0" class="btn forgot_your_password text-capitalize text-white m-auto d-block">Forgot Your Password?</a>
									</div>
								</div>
							</form>
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