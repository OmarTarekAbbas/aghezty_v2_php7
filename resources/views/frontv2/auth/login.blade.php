@extends('frontv2.master')
@section('content')

<!-- main content -->
<div class="main mt-2">
	<section class="log_in justify-content-center">
		<div class="mobile_views">
			<div class="log_in_bg rounded">
        @include('errors')
        <form action="{{route('front.client.login.submit')}}" method="post">
          @csrf
					<div class="row">
						<div class="col-md-12 col-lg-12 col-xl-12 col-12">
							<div class="login_title text-center mb-4">
								<h5 class="text-capitalize text-white m-auto w-25 border-bottom border-secondary">sign in</h5>
							</div>
              <div class="all_forms">
                <div class="col-md-12 col-lg-12 col-xl-12 col-auto mb-4">
                  <label class="sr-only" for="inlineFormInputGroup">@lang('front.auth.email')</label>
                  <div class="input-group mb-2 m-auto w-50 hvr-float">
                    <div class="input-group-prepend hvr-float">
                      <div class="input-group-text">
                        <i class="fas fa-at"></i>
                      </div>
                    </div>
                    <input type="text" name="email" class="form-control text-center hvr-float" id="inlineFormInputGroupUsername" placeholder="@lang('front.auth.email')">
                  </div>
                </div>

                <div class="col-md-12 col-lg-12 col-xl-12 col-auto mb-4">
                  <label class="sr-only" for="inlineFormInputGroup">@lang('front.auth.password')</label>
                  <div class="input-group mb-2 m-auto w-50 hvr-float">
                    <div class="input-group-prepend hvr-float">
                      <div class="input-group-text"><i class="fas fa-unlock-alt"></i></div>
                    </div>
                    <input type="text" type="password" name="password" class="form-control text-center hvr-float" id="inlineFormInputGroupPassword" placeholder="@lang('front.auth.password')">
                  </div>
                </div>

                <div class="col-md-12 col-lg-12 col-xl-12 col-auto mb-4">
                  <div class="form-check mb-2 text-center">
                    <input class="form-check-input form-check-input_login" type="checkbox" id="autoSizingCheck">
                    <label class="form-check-label" for="autoSizingCheck">
                        @lang('front.auth.remember')
                    </label>
                  </div>
                </div>

                <div class="col-md-12 col-lg-12 col-xl-12 col-auto">
                  <button type="submit" class="btn_save btn btn-secondary text-white mb-2 m-auto d-block w-50 text-capitalize hvr-wobble-to-bottom-right">@lang('front.auth.login')</button>

                  {{-- <a href="#0" class="btn forgot_your_password text-capitalize text-white m-auto d-block">Forgot Your Password?</a> --}}
                </div>
              </div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
</div>

@endsection
