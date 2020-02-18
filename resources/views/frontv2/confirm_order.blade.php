@extends('frontv2.master')
@section('content')

<div class="main">

  <section class="cart_shopping my-2">
    <div class="mobile_views">
      <div class="row" id="href_load">
        @if (count($auth_carts) > 0 || count($session_carts) > 0)
        <div class="col-md-12 col-lg-12 col-xl-12">
          <div class="discount_code_accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
            <!-- Start Discount Codes -->
            @if(Auth::guard('client')->user())
            <div class="card">
              @if(Session::has('success'))
              <div class="col-md-12 col-lg-12 col-xl-12 col-12 px-0 mt-3 alert alert-success alert-dismissible msg_success_min bounce-in-bottom text-capitalize fade show" role="alert">
                  {{Session::get('success')}}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              @endif
              @if(Session::has('fail'))
              <div class="col-md-12 col-lg-12 col-xl-12 col-12 px-0 mt-3 alert alert-danger alert-dismissible msg_danger_min bounce-in-bottom text-capitalize fade show" role="alert">
                  {{Session::get('fail')}}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              @endif
              @include('errors')
              <div class="card-header w-100" role="tab" id="headingOne1">
                <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1">
                  <h5 class="mb-0 text-uppercase text-dark">
                   @lang('front.coupon.do_you_have_coupon')<i class="fas fa-angle-down rotate-icon float-right"></i>
                  </h5>
                </a>
              </div>

              <div id="collapseOne1" class="collapse" role="tabpanel" aria-labelledby="headingOne1" data-parent="#accordionEx">
                <form action="{{route('front.home.coupon')}}" method="post">
                  @csrf
                  <div class="card-body">
                    <div class="input-group mb-2 m-auto w-100 hvr-float">
                      <div class="input-group-prepend">
                        <div class="input-group-text text-capitalize">@lang('messages.coupon')</div>
                      </div>
                      <input type="text" name="coupon" class="form-control text-center" placeholder="@lang('messages.coupon')">
                      <input type="submit" class="btn add_coupon" value="@lang('front.coupon.add')">
                    </div>
                  </div>
                </form>
              </div>
            </div>
            @endif
            <!-- End Discount Codes -->

            <!-- Start Cart Totals -->
            <div class="card my-3">
              <div class="card-header w-100" role="tab" id="headingTwo2">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2">
                  <h5 class="mb-0 text-uppercase text-dark">
                    @lang('front.invoice') <i class="fas fa-angle-down rotate-icon float-right"></i>
                  </h5>
                </a>
              </div>

              <div id="collapseTwo2" class="collapse show" role="tabpanel" aria-labelledby="headingTwo2" data-parent="#accordionEx">
                <div class="card-body">
                  <div class="sub_total">
                    <strong class="text-capitalize">@lang('front.sub_total')</strong>
                    <strong class="subtotal_price text-uppercase float-right">{{number_format((int)$total_price)}} <span>@lang('front.egp')</span></strong>
                  </div>

                  <div class="border-bottom border-secondary w-100 my-3"></div>

                  <div class="sub_total">
                    <strong class="text-capitalize">@lang('front.shipping_amount')</strong>
                    <strong class="subtotal_price text-uppercase float-right">@if($city) {{number_format((int)$city->shipping_amount)}} @else 0 @endif <span>@lang('front.egp')</span> </strong>
                  </div>

                  <div class="border-bottom border-secondary w-100 my-3"></div>

                  <div class="sub_total">
                    <strong class="text-capitalize">@lang('front.coupon.discount')</strong>
                    <strong class="subtotal_price text-uppercase float-right">{{Auth::guard('client')->user() ? Auth::guard('client')->user()->coupons->sum('value') : '0'}} <span>@lang('front.egp')</span></strong>
                  </div>


                  <div class="border-bottom border-secondary w-100 my-3"></div>

                  <div class="sub_total">
                    <strong class="text-capitalize">@lang('front.total_price')</strong>
                    <strong class="subtotal_price text-uppercase float-right">{{number_format(($city ? $total_price+$city->shipping_amount:(int)$total_price) - (Auth::guard('client')->user() ? Auth::guard('client')->user()->coupons->sum('value') : 0))}} <span>@lang('front.egp')</span></strong>
                  </div>

                  <div class="cart_checkout w-100 my-3">
                    <button onclick="location.href ='{{route('front.home.checkout.get',['address_id' => $id])}}'" class="btn w-100 text-uppercase font-weight-bold hvr-wobble-to-bottom-right">@lang('front.continue_buy')</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Cart Totals -->
          </div>
        </div>
        @endif
      </div>
    </div>
  </section>

</div>
@endsection

@section('script')

@endsection
