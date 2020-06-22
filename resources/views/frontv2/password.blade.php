@extends('frontv2.master')

@section('style')
<style>
  .padding_right_oldPassword,
  .padding_right_confirmPassword {
    padding-right: 40px !important;
  }

  .padding_right_newPassword {
    padding-right: 35px !important;
  }
</style>
@endsection
@section('content')

<div class="main mt-2">
  <section class="my_profile">
    <div class="mobile_views">
      <div class="my_profile_bg rounded">
        <div class="row m-0">
          <div class="col-md-12 col-lg-12 col-xl-12 col-12">
            <div class="my_profile_title text-center my-3">
              <h3 class="text-capitalize text-white m-auto w-25 border-bottom border-secondary change_title">@lang('front.change_password')</h3>
            </div>
          </div>
          @if(Session::has('success'))
          <div class="col-md-12 col-lg-12 col-xl-12 col-12 px-0 mt-3 alert alert-success alert-dismissible msg_success_min bounce-in-bottom text-capitalize fade show" role="alert">
              {{Session::get('success')}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          @endif
          @if(Session::has('fail'))
          <div class="col-md-12 col-lg-12 col-xl-12 col-12 px-0 mt-3 alert alert-danger alert-dismissible fade show"  role="alert">
              <strong>@lang('front.error')!</strong> {{Session::get('fail')}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          @endif
          @include('errors')
          <div class="col-md-12 col-lg-12 col-xl-12 col-12">
            <form class="password_accordion w-100 my-3" action="{{route('front.home.password.update')}}" method="post">
              @csrf
              <div class="col-md-12 col-lg-12 col-xl-12 col-12 px-0 mb-4">
                <label class="sr-only" for="inlineFormInputGroupOldPassword">@lang('front.old_password')</label>
                <div class="input-group mb-2 m-auto w-75 hvr-float">
                  <div class="input-group-prepend d-none d-sm-block">
                    <div class="input-group-text padding_right_oldPassword">@lang('front.old_password')</div>
                  </div>

                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-user-lock"></i></div>
                  </div>
                  <input type="password" name="old_password" class="form-control text-center" id="inlineFormInputGroupOldPassword" placeholder="@lang('front.old_password')">
                </div>
              </div>

              <div class="col-md-12 col-lg-12 col-xl-12 col-12 px-0 mb-4">
                <label class="sr-only" for="inlineFormInputGroupNewPassword">@lang('front.new_password')</label>
                <div class="input-group mb-2 m-auto w-75 hvr-float">
                  <div class="input-group-prepend d-none d-sm-block">
                    <div class="input-group-text padding_right_newPassword">@lang('front.new_password')</div>
                  </div>
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-user-lock"></i></div>
                  </div>
                  <input type="password" name="password" class="form-control text-center" id="inlineFormInputGroupNewPassword" placeholder="@lang('front.new_password')">
                </div>
              </div>

              <div class="col-md-12 col-lg-12 col-xl-12 col-12 px-0 mb-4">
                <label class="sr-only" for="inlineFormInputGroupConfirmPassword">@lang('front.confirm_password')</label>
                <div class="input-group mb-2 m-auto w-75 hvr-float">
                  <div class="input-group-prepend d-none d-sm-block">
                    <div class="input-group-text padding_right_confirmPassword">@lang('front.confirm_password')</div>
                  </div>
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-user-lock"></i></div>
                  </div>
                  <input type="password" name="password_confirmation" class="form-control text-center" id="inlineFormInputGroupConfirmPassword" placeholder="@lang('front.confirm_password')">
                </div>
              </div>

              <div class="col-md-12 col-lg-12 col-xl-12 col-12 px-0">
                <button type="submit" class="btn_save btn btn-secondary text-white mb-2 m-auto d-block w-75 text-capitalize hvr-wobble-to-bottom-right">@lang('front.save')</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection
