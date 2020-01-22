@extends('frontv2.master')
@section('content')

<div class="main mt-2">
  <section class="my_profile">
    <div class="mobile_views">
      <div class="my_profile_bg rounded">
        <div class="row m-0">
          <div class="col-md-12 col-lg-12 col-xl-12 col-12 px-0 mt-3">
            <div class="my_profile_title text-center">
              <h3 class="text-capitalize text-white m-auto w-25 border-bottom border-secondary">@lang('front.my_profile')</h3>
            </div>
          </div>
          @if(Session::has('success'))
          <div class="col-md-12 col-lg-12 col-xl-12 col-12 px-0 mt-3 alert alert-success alert-dismissible fade show" role="alert">
              <strong>@lang('front.success')!</strong> {{Session::get('success')}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          @endif
          @include('errors')
          <form class="profile_accordion w-100 my-4" action="{{route('front.home.update')}}" method="post" enctype="multipart/form-data">
            @csrf
              <div class="col-md-12 col-lg-12 col-xl-12 col-12 px-0 mt-3">
                  <!-- Start Upload Image -->
                  @include('frontv2.upload_img')
                  <!-- End Upload Image -->
                </div>
            <div class="col-md-12 col-lg-12 col-xl-12 col-12 mb-4">
              <label class="sr-only" for="inlineFormInputGroupNameProfile">@lang('front.name')</label>
              <div class="input-group mb-2 m-auto w-75 hvr-float">
                <div class="input-group-prepend d-none d-sm-block hvr-float">
                  <div class="input-group-text hvr-float">@lang('front.auth.name')</div>
                </div>
                <div class="input-group-prepend hvr-float">
                  <div class="input-group-text"><i class="fas fa-user"></i></div>
                </div>
                <input type="text" name="name" value="{{Auth::guard('client')->user()->name}}"  class="form-control text-center hvr-float" id="inlineFormInputGroupNameProfile" placeholder="@lang('front.name')">
              </div>
            </div>

            <div class="col-md-12 col-lg-12 col-xl-12 col-12 mb-4">
              <label class="sr-only" for="inlineFormInputGroupEmailProfile">@lang('front.auth.email')</label>
              <div class="input-group mb-2 m-auto w-75 hvr-float">
                <div class="input-group-prepend d-none d-sm-block">
                  <div class="input-group-text">@lang('front.auth.email')</div>
                </div>
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-at"></i></div>
                </div>
                <input type="text" class="form-control text-center" name="email" value="{{Auth::guard('client')->user()->email}}" id="inlineFormInputGroupEmailProfile" placeholder="@lang('front.auth.email')">
              </div>
            </div>

            <div class="col-md-12 col-lg-12 col-xl-12 col-12 mb-4">
              <label class="sr-only" for="inlineFormInputGroupPhoneProfile">@lang('front.auth.phone')</label>
              <div class="input-group mb-2 m-auto w-75 hvr-float">
                <div class="input-group-prepend d-none d-sm-block">
                  <div class="input-group-text">@lang('front.auth.phone')</div>
                </div>
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-tty"></i></div>
                </div>
                <input type="text" name="phone" value="{{Auth::guard('client')->user()->phone}}"  class="form-control text-center" id="inlineFormInputGroupMobileProfile" placeholder="@lang('front.auth.phone')">
              </div>
            </div>

            <div class="col-md-12 col-lg-12 col-xl-12 col-12">
              <button type="submit" class="btn_save btn btn-secondary text-white mb-2 m-auto d-block w-75 text-capitalize hvr-wobble-to-bottom-right">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection
