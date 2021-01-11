@extends('frontv2.master')
@section('content')

<div class="main">
  <!-- Start Slider Carsoul -->
  {{-- @include('frontv2.video_slider') --}}
  <!-- End Slider Carsoul -->

  <div class="mobile_views">
    <div class="row">
      <div class="col-md-12 col-lg-12 col-xl-12 col-12">
        <div class="shopping_cart_title mt-3">
          <h2 class="text-center text-uppercase h2 text-primary font-weight-bold">@lang('front.shopping_cart')
            <!-- <marquee class="marquee_cart" behavior="scroll">@lang('front.shopping_cart')</marquee> -->
          </h2>
        </div>
      </div>
      @if (Session::has('success_pr'))
      <div class="col-md-12 col-lg-12 col-xl-12 col-12">
        <div class="alert_msg alert alert-success my-3 w-100 hvr-wobble-to-bottom-right" role="alert">{{Session::get('product')->getTranslation('title',getCode())}} @lang('front.add_message').
          <i class="fas fa-times fa-lg float-right mt-1"></i>
        </div>
      </div>
      @endif
    </div>
  </div>

  <section class="cart_shopping my-2">
    <div class="mobile_views">
      <div class="row" id="href_load">
        <div class="col-md-8 col-lg-8 col-xl-8 col-12">
          <div class='table-responsive'>
            <table id="tablePreview" class="table text-secondary table-sm table-bordered mb-0">
              <thead>
                <tr class="text-light bg-dark">
                  <th class="text-capitalize align-middle text-center">@lang('front.product')</th>
                  <th class="text-capitalize align-middle text-center">@lang('front.price')</th>
                  <th class="text-capitalize align-middle text-center">@lang('front.quantity')</th>
                  <th class="text-capitalize align-middle text-center">@lang('front.sub_total')</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($auth_carts as $cart)
                <tr>
                  <th class="th_th h6" scope="row">
                    <a class="item-delete btn btn-sm text-primary" href="{{route('front.home.cart.delete',['cart_id' => $cart->pivot->id , 'type' => 'auth'])}}">
                      <i class="fas fa-times fa-lg "></i>
                    </a>

                    <a class="img_link" href="{{route('front.home.inner',['id' => $cart->pivot->product_id])}}">
                      <img class="w-25" src="{{product($cart->pivot->product_id)->main_image}}" alt="iphone">

                      <div class="cart_shopping_title">
                        <span>{{product($cart->pivot->product_id)->getTranslation('title',getCode())}}</span>
                      </div>
                    </a>
                  </th>

                  <td class="item-price align-middle">{{number_format((int)$cart->pivot->price)}} @lang('front.egp')</td>

                  <td class="td_td align-middle text-center w-25">
                    <div class="qty-holder text-center">
                      <a href="#0" class="table_qty_dec">-</a>

                      <input value="{{$cart->pivot->quantity}}" name="quantity" data-cart="{{$cart->pivot->id}}" data-type = "auth" size="4"   title="Qty" class="input-text qty" maxlength="12">

                      <a href="#0" class="table_qty_inc">+</a>

                      <a href="{{route('front.home.inner',['id' => $cart->pivot->product_id])}}">
                        <i class="far fa-eye px-2 h6"></i>
                      </a>
                    </div>
                  </td>

                  <td class="item-total align-middle">{{number_format((int)$cart->pivot->total_price) }} @lang('front.egp')</td>
                </tr>
                @endforeach
                @for ($i =0; $i < count($session_carts); $i++)
                  <tr>
                    <th class="th_th h6" scope="row">
                      <a class="item-delete btn btn-sm text-primary" href="{{route('front.home.cart.delete',['cart_id' => $i , 'type' => 'cookie'])}}">
                        <i class="fas fa-times fa-lg "></i>
                      </a>

                      <a class="img_link" ref="{{route('front.home.inner',['id' => $session_carts[$i]['product_id']])}}">
                        <img class="w-25" src="{{product($session_carts[$i]['product_id'])->main_image}}" alt="iphone">

                        <div class="cart_shopping_title">
                          <span>{{product($session_carts[$i]['product_id'])->getTranslation('title',getCode())}}</span>
                        </div>
                      </a>
                    </th>

                    <td class="item-price align-middle">{{number_format((int)$session_carts[$i]['price'])}} @lang('front.egp')</td>

                    <td class="td_td align-middle text-center w-25">
                      <div class="qty-holder text-center">
                        <a href="#0" class="table_qty_dec">-</a>

                        <input value="{{$session_carts[$i]['quantity']}}" data-cart="{{$i}}" data-type = "cookie" size="4" title="Qty" class="input-text qty"  maxlength="12">

                        <a href="#0" class="table_qty_inc">+</a>

                        <a href="{{route('front.home.inner',['id' => $session_carts[$i]['product_id']])}}">
                          <i class="far fa-eye px-2 h6"></i>
                        </a>
                      </div>
                    </td>

                    <td class="item-total align-middle">{{number_format((int)$session_carts[$i]['total_price'])}} @lang('front.egp')</td>
                  </tr>
                @endfor
              </tbody>
            </table>
          </div>

          <div class="row btn_shopping table-bordered mx-0 py-3">
            <div class="col-md-6 col-lg-6 col-xl-6 col-12">
              <button onclick="location.href = '{{route('front.home.list')}}'" class="btn continue_shopping btn-secondary text-capitalize text-white text-left hvr-wobble-to-bottom-right">@lang('front.cont_shop')</button>
            </div>

            <div class="col-md-6 col-lg-6 col-xl-6 col-12">
              <button onclick="location.href= '{{route('front.home.cart.delete',['delete_all' => 'delete_all' , 'type' => Auth::guard('client')->user() ? 'auth' : 'cookie'])}}'" class="btn clear_shopping btn-secondary text-capitalize text-white text-right hvr-wobble-to-bottom-right">@lang('front.clear') @lang('front.shopping_cart')</button>
            </div>
          </div>
        </div>
        @if (count($auth_carts) > 0 || count($session_carts) > 0)
        <div class="col-md-4 col-lg-4 col-xl-4">
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
            <div class="card">
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

                  {{-- <div class="sub_total">
                    <strong class="text-capitalize">@lang('front.shipping_amount')</strong>
                    <strong class="subtotal_price text-uppercase float-right"> 000<span>@lang('front.egp')</span> </strong>
                  </div>

                  <div class="border-bottom border-secondary w-100 my-3"></div> --}}

                  <div class="sub_total">
                    <strong class="text-capitalize">@lang('front.coupon.discount')</strong>
                    <strong class="subtotal_price text-uppercase float-right">{{Auth::guard('client')->user() ? Auth::guard('client')->user()->coupons->sum('value') : '0'}} <span>@lang('front.egp')</span></strong>
                  </div>


                  <div class="border-bottom border-secondary w-100 my-3"></div>

                  <div class="sub_total">
                    <strong class="text-capitalize">@lang('front.total_price')</strong>
                    <strong class="subtotal_price text-uppercase float-right">{{number_format((int)$total_price - (Auth::guard('client')->user() ? Auth::guard('client')->user()->coupons->sum('value') : 0))}} <span>@lang('front.egp')</span></strong>
                  </div>

                  <div class="cart_checkout w-100 my-3">
                    <button onclick="location.href ='{{route('front.home.checkout.address')}}'" class="btn w-100 text-uppercase font-weight-bold hvr-wobble-to-bottom-right">@lang('front.continue_buy')</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Cart Totals -->

            {{-- <div class="ads_img">
              <img class="rounded w-100" style="height:14rem" src="{{$ads->image}}" alt="Ads">
            </div> --}}
          </div>
        </div>
        @endif
      </div>
    </div>
  </section>

  <section class="choose_category mt-3">
    <div class="mobile_views">
      <div class="row no_margin">

        {{-- --}}
        {{-- @foreach ($homepage_cat as $item)

        <div class="col-md-2 col-xl-2 col-6 margin_bottom_mob">
          <div class="choose_category_form text-center">
            <a class="hoverabley" href="{{route('front.home.list',['sub_category_id' => $item->id])}}">
              <div class="hovertitle rounded">
                <p>{{$item->getTranslation('title',getCode())}}</p>
              </div>
              <img class="rounded w-100" src="{{$item->image}}" alt="{{$item->getTranslation('title',getCode())}}">
            </a>
            <h4 class="d-block d-sm-block d-md-none d-lg-none d-xl-none text-capitalize text-center h5">{{$item->getTranslation('title',getCode())}}</h4>
          </div>
        </div>

        @endforeach --}}
        {{-- --}}

      </div>
    </div>
  </section>

  <section class="product_view mt-3">
    <div class="mobile_views">
      <div class="product_view_type">
        <div class="product_title mb-3">
          <div class="row">
            <div class="col-6">
              <div class="title_left text-left font-weight-bold">
                <strong class="selected_fYou_funnyTexty">@lang('messages.selected_for_you')</strong>
              </div>
            </div>

            <div class="col-6">
              <div class="title_right text-right">
              <a href="{{route('front.home.list',['random' => 'random'])}}" class="btn btn-dark">@lang('messages.view_more')</a>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          {{-- --}}
          @foreach ($selected_for_you as $item)

          <div class="col-md-4 col-xl-2 col-6 margin_bottom_mob">
            <div class="px-2 product_desc hvr-bob rounded">
              <a class="m-1" href="{{route('front.home.inner',['id' => $item->id])}}">
                <img src="{{$item->main_image}}" alt="{{$item->getTranslation('title',getCode())}}" class="img_size w-75 d-block m-auto">

                @if($item->discount > 0)
                <div class="product-label text-center font-weight-bold">
                  <span class="sale-product-icon">{{$item->discount}} %</span>
                </div>
                @endif

                <div>
                  <p class="full_desc my-3">{{$item->getTranslation('title',getCode())}}</p>
                </div>
              </a>

              @if(\Auth::guard('client')->check())
                <div class="text-right font-weight-bold" style="bottom: 26px;top: 1px;left: 48px;font-size: 14px;background-image: linear-gradient(45deg, white, transparent);">
                  <span>
                    <i class="fa fa-heart fa-2x grey {{ in_array($item->id, \Auth::guard('client')->user()->wishList()->pluck('product_id')->toArray()) ? 'red':''}}" data-id="{{ $item->id }}"></i>
                  </span>
                </div>
              @endif

              @if ($item->price_after_discount >0)

              <div class="price-box">
                <span class="regular-price">
                  <span class="price">{{number_format($item->price_after_discount)}} @lang('front.egp') </span>
                </span>

                <p class="old-price">
                  <span class="price">
                    {{number_format($item->price)}} @lang('front.egp') </span>
                </p>
              </div>
              @else
              <div class="price-box">
                <span class="regular-price">
                  <span class="price">{{number_format($item->price)}} @lang('front.egp') </span>
                </span>
              </div>
              @endif
            </div>
          </div>

          @endforeach
          {{-- --}}

        </div>
      </div>
    </div>
  </section>
</div>
@endsection

@section('script')
<script>
  $(document).on('click','.table_qty_inc',function () {
      var x = parseInt($(this).parent().children('.qty').val()) + 1;
      $(this).parent().children('.qty').val(x);
      $.ajax({
            url: "{{route('front.home.cart.update')}}",
            type: "get",
            data: {
                cart_id: $(this).parent().children('.qty').data('cart'),
                type: $(this).parent().children('.qty').data('type'),
                value: $(this).parent().children('.qty').val()
            },
            success: function(data) {
                console.log(data.status);
                if (data.status == 'success') {
                    $("#href_load").load(location.href + " #href_load>*", "");
                }
            },
        });
  })

  $(document).on('click','.table_qty_dec',function () {
    var x = parseInt($(this).parent().children('.qty').val()) - 1;
      if (x > 0)
          $(this).parent().children('.qty').val(x);
          $.ajax({
            url: "{{route('front.home.cart.update')}}",
            type: "get",
            data: {
                cart_id: $(this).parent().children('.qty').data('cart'),
                type: $(this).parent().children('.qty').data('type'),
                value: $(this).parent().children('.qty').val()
            },
            success: function(data) {
                console.log(data.status);
                if (data.status == 'success') {
                    $("#href_load").load(location.href + " #href_load>*", "");
                }
            },
        });
  })
  $(document).on('change', '.qty', function(e) {
    e.preventDefault();
    $.ajax({
        url: "{{route('front.home.cart.update')}}",
        type: "get",
        data: {
            cart_id: $(this).data('cart'),
            type: $(this).data('type'),
            value: $(this).val()
        },
        success: function(data) {
            console.log(data.status);
            if (data.status == 'success') {
                $("#href_load").load(location.href + " #href_load>*", "");
            }
        },
    });
  })
</script>
@endsection
