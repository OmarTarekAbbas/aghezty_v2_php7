@extends('frontv2.master')
@section('content')

<!-- main content -->
<div class="main mt-2">
  <section class="log_in justify-content-center">
    <div class="mobile_views">
      <div class="log_in_bg rounded log_in_bg_home">
        @include('errors')
        <form action="{{route('front.client.register.submit')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div>
            <div class="reg-title text-center mb-4">
              <h5 class="text-capitalize m-auto w-25 border-bottom border-secondary">Create New Account</h5>
            </div>

            <!-- Start Upload Image -->
            <!-- @include('frontv2.upload_img') -->
            <!-- End Upload Image -->

            <div class="all_forms my-5">
              <div class="col-md-12 col-lg-12 col-xl-12 col-auto mb-4">
                <label class="sr-only" for="inlineFormInputGroupNameReg">@lang('front.auth.name')</label>
                <div class="input-group mb-1 m-auto w-50 hvr-float">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                  </div>
                  <input type="text" class="form-control text-center" name="name" value="{{old('name')}}" id="inlineFormInputGroupNameReg" placeholder="@lang('front.auth.name')">
                </div>
              </div>

              <div class="col-md-12 col-lg-12 col-xl-12 col-auto mb-4">
                <label class="sr-only" for="inlineFormInputGroupEmailReg">@lang('front.auth.name')</label>
                <div class="input-group mb-1 m-auto w-50 hvr-float">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-at"></i>
                    </div>
                  </div>
                  <input type="text" class="form-control text-center" id="inlineFormInputGroupEmailReg" name="email" value="{{old('email')}}" placeholder="@lang('front.auth.email')">
                </div>
              </div>

							<div class="col-md-12 col-lg-12 col-xl-12 col-auto mb-4">
								<label class="sr-only" for="inlineFormInputGroupPhoneReg">@lang('front.auth.phone')</label>
								<div class="input-group mb-2 m-auto w-50 hvr-float">
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="fas fa-phone"></i></div>
									</div>
									<input type="text" class="form-control text-center" name="phone" id="inlineFormInputGroupPhoneReg" value="{{old('phone')}}" placeholder="@lang('front.auth.phone')">
								</div>
							</div>

              <div class="col-md-12 col-lg-12 col-xl-12 col-auto mb-4">
                <label class="sr-only" for="inlineFormInputGroupPasswordReg">@lang('front.auth.password')</label>
                <div class="input-group mb-1 m-auto w-50 hvr-float">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-unlock-alt"></i></div>
                  </div>
                  <input type="password" class="form-control text-center" name="password" id="inlineFormInputGroupPasswordReg" placeholder="@lang('front.auth.password')">
                </div>
              </div>

              <div class="col-md-12 col-lg-12 col-xl-12 col-auto mb-4">
                <label class="sr-only" for="inlineFormInputGroupConfirmPasswordReg">Confirm Password</label>
                <div class="input-group mb-1 m-auto w-50 hvr-float">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-unlock-alt"></i></div>
                  </div>
                  <input type="password" class="form-control text-center" name="password_confirmation" placeholder="@lang('front.auth.confirm_password')" id="inlineFormInputGroupConfirmPasswordReg">
                </div>
              </div>


              <!-- <div class="reg-title text-center mb-4">
								<h5 class="text-capitalize m-auto w-75 border-bottom border-secondary">@lang('front.auth.address')</h5>
							</div>

							<div class="col-md-12 col-lg-12 col-xl-12 col-auto mb-4">
								<div class="input-group mb-2 m-auto w-75 hvr-float">
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="fas fa-map-marker-alt"></i></div>
                  </div>
                  {!! Form::select("governorate_id", \App\Governorate::pluck('title_'.getCode(),'id'),null, ['required' , 'class' => 'form-control dropdown-dark' ,'id' => 'gover_add']) !!}
								</div>
							</div>

							<div class="col-md-12 col-lg-12 col-xl-12 col-auto mb-4">
								<div class="input-group mb-2 m-auto w-75 hvr-float">
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="fas fa-map-marker-alt"></i></div>
									</div>
								{!! Form::select("city_id",[],null, ['required' ,'id' => 'add_city' ,'class' => 'form-control dropdown-dark']) !!}
								</div>
							</div>

							<div class="col-md-12 col-lg-12 col-xl-12 col-auto mb-4">
								<div class="input-group w-75 m-auto">
									<div class="input-group-prepend w-100 m-auto hvr-float">
										<div class="input-group-text"><i class="fas fa-keyboard"></i></div>
										<textarea class="w-100" name="address" placeholder="@lang('front.address')" cols="97" rows="5"></textarea>
									</div>
								</div>
							</div> -->

              <div class="authentication-info d-flex justify-content-center">
                <div class="col-md-12 col-lg-12 col-xl-12 col-auto">
                  <div class="form-check mb-1 text-center">
                    <input class="form-check-input form-check-input_register" type="checkbox" id="autoSizingCheckReg">
                    <label class="form-check-label" for="autoSizingCheckReg">@lang('front.auth.remember')</label>
                  </div>
                </div>
              </div>

              <div class="col-md-12 col-lg-12 col-xl-12 col-12">
                <button type="submit" class="btn_save btn btn-secondary text-white mb-1 m-auto d-block w-50 text-capitalize hvr-wobble-to-bottom-right">@lang('front.auth.register')</button>
              </div>
{{--
              <div class="col-md-12 col-lg-12 col-xl-12 col-auto">
                <a href="{{url('/facebook_redirect')}}" class="btn_log_fb btn m-auto d-block text-capitalize"><i class="fab fa-facebook-f"></i> @lang('front.auth.facebook')</a>
              </div>  --}}
          </div>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>

@endsection
@section('script')
<script>
  $('#gover_add').change(function(){
      $.ajax({
      url: "{{url('clients/city')}}/"+$(this).val(),
      type: "get",
      success: function(data){
      $('#add_city').empty();
          for (let i = 0; i < data.length; i++) {
              const element = '<option value="'+data[i].id+'">'+data[i].city+'</option>'
              $('#add_city').append(element)
          }
      },
      });
  })
  $(document).ready(function () {
  $.ajax({
      url: "{{url('clients/city')}}/"+$('#gover_add').val(),
      type: "get",
      success: function(data){
      $('#add_city').empty();
          for (let i = 0; i < data.length; i++) {
              const element = '<option value="'+data[i].id+'">'+data[i].city+'</option>'
              $('#add_city').append(element)
          }
      },
      });
  });
</script>
@endsection
