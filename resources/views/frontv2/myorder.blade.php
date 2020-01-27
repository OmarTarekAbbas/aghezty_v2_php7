@extends('frontv2.master')
@section('content')

<!-- Start Owl Carsoul -->

<!-- End Owl Carsoul -->
<style>
.order_one .cart-aside .summary .summary-subtotal .subtotal-value::after, .order_two .cart-aside .summary .summary-subtotal .subtotal-value::after{
  content:"@lang('front.egp')"
}
</style>
<div class="main">
  <section class="order_one">
    <h3 class="text-center date_order">@lang('front.status')</h3>

    <div class="mobile_views">
      <div class="row">
        <div class="col-md-6 col-lg-6 col-xl-6 col-6 my-3">
          <h4 class="date_order date_order_1 text-left">{{$order->created_at->format('M  d,Y')}}</h4>
        </div>

        {{-- <div class="col-md-6 col-lg-6 col-xl-6 col-6 my-3">
          <h4 class="date_order date_order_2 text-right">{{$order->created_at->format('M d,Y')}}</h4>
        </div> --}}
      </div>

      <div class="row">
        <div class="col-md-4 col-lg-4 col-xl-4 col-6">
          <div class="order_method text-center">
            <h6 class="date_order text-center text-capitalize">@lang('front.admin_status.pending')</h6>
            <i class="fas fa-check-circle fa-4x text-center order_icon_check"></i>
          </div>
        </div>


        <div class="col-md-4 col-lg-4 col-xl-4 col-6">
          <div class="order_method text-center">
            <h6 class="date_order text-center text-capitalize">@lang('front.admin_status.under_shipping')</h6>
            <i class="fas fa-check-circle fa-4x text-center order_icon_check"></i>
          </div>
        </div>

        <div class="col-md-4 col-lg-4 col-xl-4 col-6">
          <div class="order_method text-center">
            <h6 class="date_order text-center text-capitalize">Finishd</h6>
            <i class="fas fa-truck fa-2x text-center rounded-circle p-3 order_icon_track"></i>
          </div>
        </div>

        <div class="col-md-12 col-lg-12 col-xl-12 col-12 mt-4">
          <h3 class="date_order">@lang('messages.order_details')</h3>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12 col-12">
          <h3 class="text-center w-25 m-auto rounded py-2 order_nm">@lang('messages.order_number'). #{{$order->id}}</h3>
        </div>
      </div>
    </div>
  </section>

  <section class="order_two">
    <div class="mobile_views">
      @foreach ($order->products as $product)
      <div class="row mt-5">
        <div class="col-md-3 col-lg-5 col-xl-5 col-5">
          <h6 class="date_order">
            {{product($product->product_id)->getTranslation('title',getCode())}}
          </h6>

          <img src="{{product($product->product_id)->main_image}}" class="img_order rounded img-thumbnail" alt="{{product($product->product_id)->getTranslation('title',getCode())}}">
        </div>

        <div class="col-md-3 col-lg-3 col-xl-3 col-3 text-right">
          <h6 class="date_order text-center">@lang('front.price')</h6>
          <p class="date_order text-center">{{$product->price}}@lang('front.egp')</p>
        </div>

        <div class="col-md-3 col-lg-2 col-xl-2 col-2 p-0">
          <h6 class="date_order text-center">@lang('front.quantity')</h6>
          <p class="date_order text-center">{{$product->quantity}}</p>
        </div>

        <div class="col-md-3 col-lg-2 col-xl-2 col-2 text-right">
          <h6 class="date_order text-center">@lang('front.total_price')</h6>
          <p class="date_order text-center">{{$product->total_price}}  @lang('front.egp')</p>
        </div>
      </div>
      @endforeach

      <div class="row">
        <div class="col-xl-12">
          <aside class="cart-aside w-100">
            <div class="summary w-100 p-3 my-3 border border-secondary bg-light text-dark">
              <div class="summary-total-items text-center">
                <span class="total-items"></span> @lang('front.order') {{$order->id}}
              </div>

              <div class="summary-subtotal">
                <div class="subtotal-title text-left w-50 float-left">@lang('front.total_price')</div>
                <div class="subtotal-value text-right w-50 float-right">{{$order->sum()}}</div>
              </div>

              <div class="summary-subtotal">
                <div class="subtotal-title text-left w-50 float-left">@lang('front.shipping_amount')</div>
                <div class="subtotal-value final-value text-right w-50 float-right">{{(int)$order->shipping_amount}}</div>
              </div>
              <div class="summary-subtotal">
                <div class="subtotal-title text-left w-50 float-left">@lang('front.total_price_after_shipping')</div>
                <div class="subtotal-value  text-right w-50 float-right ">{{$order->sum() + $order->shipping_amount}}</div>
              </div>

              <div class="summary-subtotal">
                <div class="subtotal-title text-left w-50 float-left">@lang('front.coupon.discount')</div>
                <div class="subtotal-value  text-right w-50 float-right ">{{($order->sum() + $order->shipping_amount) - $order->total_price}}</div>
              </div>

              <div class="summary-subtotal">
                <div class="subtotal-title text-left w-50 float-left">@lang('front.total_price_after_coupon')</div>
                <div class="subtotal-value  text-right w-50 float-right ">{{$order->total_price}}</div>
              </div>

              <div class="summary-subtotal">
                <div class="subtotal-title text-left w-50 float-left">@lang('front.address')</div>
                <div class="final-value text-right w-50 float-right">{{$order->address->address}} , {{$order->address->city['city_'.getcode()]}}-{{$order->address->city->governorate['title_'.getcode()]}}</div>
              </div>
              <div class="summary-subtotal">
                <div class="subtotal-title text-left w-50 float-left">@lang('front.status')</div>
                <div class="final-value text-right w-50 float-right">{{$order->status}}</div>
              </div>
            </div>
          </aside>
        </div>
      </div>
    </div>
  </section>

  <section class="product_view mt-3">
    <div class="mobile_views">
      <div class="product_view_type">
        <div class="product_title mb-3">
          <div class="title_left text-left font-weight-bold">
            <strong class="recently_added_funnyTexty">@lang('messages.recently_added')</strong>
          </div>

          <div class="title_right text-right">
            <a href="{{route('front.home.list',['last' => 'last'])}}" class="btn btn-dark">@lang('messages.view_more')</a>
          </div>
        </div>

        <div class="row">
          @foreach ($recently_added as $item)
            <div class="col-md-4 col-xl-2 col-6 margin_bottom_mob">
              <div class="px-2 product_desc hvr-bob rounded">
                <a class="m-1" href="{{route('front.home.inner',['id' => $item->id])}}">
                  <img src="{{$item->main_image}}" alt="{{$item->getTranslation('title',getCode())}}" class="w-100 rounded d-block m-auto">

                  @if($item->discount > 0)
                  <div class="product-label text-center font-weight-bold">
                    <span class="sale-product-icon">-{{$item->discount}}%</span>
                  </div>
                  @endif

                  <div class="mt-1">
                    <p class="full_desc my-3">{{$item->getTranslation('title',getCode())}}</p>
                  </div>
                </a>
                @if ($item->price_after_discount >0)

                <div class="price-box">
                  <span class="regular-price">
                    <span class="price">{{$item->price_after_discount}} @lang('front.egp') </span>
                  </span>

                  <p class="old-price">
                    <span class="price">
                      {{$item->price}} @lang('front.egp') </span>
                  </p>
                </div>
                @else
                <div class="price-box">
                  <span class="regular-price">
                    <span class="price">{{$item->price}} @lang('front.egp') </span>
                  </span>
                </div>
                @endif
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>
</div>

@endsection
@section('script')

<script>
  $(document).ready(function() {
    var recently_added_funnyTexty = new Typed(".recently_added_funnyTexty", {
      strings: [$('.recently_added_funnyTexty').html()],
      typeSpeed: 150,
      backSpeed: 0,
      fadeOut: true,
      smartBackspace: true, // this is a default
      loop: true
    });
  });
</script>
@endsection
