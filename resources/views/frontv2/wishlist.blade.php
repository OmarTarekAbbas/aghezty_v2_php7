@extends('frontv2.master')
@section('content')

<div class="main">
  <!-- Start Slider Carsoul -->
  {{-- @include('frontv2.video_slider') --}}
  <!-- End Slider Carsoul -->

  <div class="mobile_views">
    <div class="row">
      <div class="col-md-12 col-lg-12 col-xl-12 col-12">
        <div class="shopping_wishlist_title mt-3">
          <h2 class="text-center text-uppercase h2 text-primary font-weight-bold">@lang('front.wishlist.wishlist')
            <!-- <marquee class="marquee_wishlist" behavior="scroll">@lang('front.shopping_wishlist')</marquee> -->
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

  <section class="wishlist_shopping my-2">
    <div class="mobile_views">
      <div class="row" id="href_load">
        <div class="col-md-12 col-lg-12 col-xl-12 col-12">
          <div class='table-responsive'>
            <table id="tablePreview" class="table text-secondary table-sm table-bordered mb-0">
              <thead>
                <tr class="text-light bg-dark">
                  <th class="text-capitalize align-middle text-center">@lang('front.product')</th>
                  <th class="text-capitalize align-middle text-center">@lang('front.price')</th>
                  <th class="text-capitalize align-middle text-center">@lang('front.quantity')</th>
                  <th class="text-capitalize align-middle text-center">@lang('front.sub_total')</th>
                  <th class="text-capitalize align-middle text-center">@lang('front.wishlist.add_to_cart')</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($wishListProducts as $wishlist)
                <tr>
                  <th class="th_th h6" scope="row">
                    <a class="item-delete btn btn-sm text-primary" data-href="{{route('front.toggle.product.wishlist',['product_id' => $wishlist->pivot->product_id])}}">
                      <i class="fas fa-times fa-lg "></i>
                    </a>

                    <a class="img_link" href="{{route('front.home.inner',['id' => $wishlist->pivot->product_id])}}">
                      <img class="w-25" src="{{product($wishlist->pivot->product_id)->main_image}}" alt="iphone">

                      <div class="wishlist_shopping_title">
                        <span>{{product($wishlist->pivot->product_id)->getTranslation('title',getCode())}}</span>
                      </div>
                    </a>
                  </th>

                  <td class="item-price align-middle">{{product($wishlist->pivot->product_id)->price_after_discount > 0? product($wishlist->pivot->product_id)->price_after_discount:  number_format((int)product($wishlist->pivot->product_id)->price)}} @lang('front.egp')</td>

                  <td class = "align-middle">1</td>

                  <td class="item-price align-middle">{{product($wishlist->pivot->product_id)->price_after_discount > 0? product($wishlist->pivot->product_id)->price_after_discount:  number_format((int)product($wishlist->pivot->product_id)->price)}} @lang('front.egp')</td>
                  <td class="align-middle">
                    <a href="{{ route('front.add.wishlist.to.cart',['product_id' => $wishlist->pivot->product_id,'quantity' => 1]) }}" class="btn btn-success">@lang('front.wishlist.add_to_cart')</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          <div class="row btn_shopping table-bordered mx-0 py-3">
            <div class="col-md-6 col-lg-6 col-xl-6 col-12">
              <button onclick="location.href = '{{route('front.home.list')}}'" class="btn continue_shopping btn-secondary text-capitalize text-white text-left hvr-wobble-to-bottom-right">@lang('front.cont_shop')</button>
            </div>

            <div class="col-md-6 col-lg-6 col-xl-6 col-12">
              <button onclick="location.href= '{{route('front.toggle.product.wishlist',['delete_all' => 'delete_all' ])}}'" class="btn clear_shopping btn-secondary text-capitalize text-white text-right hvr-wobble-to-bottom-right">@lang('front.clear') @lang('front.wishlist.shoping_wish_list')</button>
            </div>
          </div>
        </div>

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

              @if(\Auth::guard('client')->check() && setting("wish_list_flag") && setting("wish_list_flag") != '')
                <div class="fav_product">
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

</script>
@endsection
