@extends('frontv2.master')

@section('style')
<style>
  .padding_right_oldPassword {
    padding-right: 44px !important;
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
              <h3 class="text-capitalize text-white m-auto w-25 border-bottom border-secondary change_title">Change Password</h3>
            </div>
          </div>

          <div class="col-md-12 col-lg-12 col-xl-12 col-12">
            <form class="password_accordion w-100 my-3" action="">
              <div class="col-md-12 col-lg-12 col-xl-12 col-12 px-0 mb-4">
                <label class="sr-only" for="inlineFormInputGroupOldPassword">Old Password</label>
                <div class="input-group mb-2 m-auto w-75 hvr-float">
                  <div class="input-group-prepend d-none d-sm-block hvr-float">
                    <div class="input-group-text padding_right_oldPassword">Old Password</div>
                  </div>

                  <div class="input-group-prepend hvr-float">
                    <div class="input-group-text"><i class="fas fa-user-lock"></i></div>
                  </div>
                  <input type="password" class="form-control text-center hvr-float" id="inlineFormInputGroupOldPassword" placeholder="Old Password">
                </div>
              </div>

              <div class="col-md-12 col-lg-12 col-xl-12 col-12 px-0 mb-4">
                <label class="sr-only" for="inlineFormInputGroupNewPassword">New Password</label>
                <div class="input-group mb-2 m-auto w-75 hvr-float">
                  <div class="input-group-prepend d-none d-sm-block hvr-float">
                    <div class="input-group-text padding_right_newPassword">New Password</div>
                  </div>
                  <div class="input-group-prepend hvr-float">
                    <div class="input-group-text"><i class="fas fa-user-lock"></i></div>
                  </div>
                  <input type="password" class="form-control text-center hvr-float" id="inlineFormInputGroupNewPassword" placeholder="New Password">
                </div>
              </div>

              <div class="col-md-12 col-lg-12 col-xl-12 col-12 px-0 mb-4">
                <label class="sr-only" for="inlineFormInputGroupConfirmPassword">Confirm Password</label>
                <div class="input-group mb-2 m-auto w-75 hvr-float">
                  <div class="input-group-prepend d-none d-sm-block hvr-float">
                    <div class="input-group-text">Confirm Password</div>
                  </div>
                  <div class="input-group-prepend hvr-float">
                    <div class="input-group-text"><i class="fas fa-user-lock"></i></div>
                  </div>
                  <input type="password" class="form-control text-center hvr-float" id="inlineFormInputGroupConfirmPassword" placeholder="Confirm Password">
                </div>
              </div>

              <div class="col-md-12 col-lg-12 col-xl-12 col-12 px-0">
                <button type="submit" class="btn_save btn btn-secondary text-white mb-2 m-auto d-block w-75 text-capitalize hvr-wobble-to-bottom-right">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection