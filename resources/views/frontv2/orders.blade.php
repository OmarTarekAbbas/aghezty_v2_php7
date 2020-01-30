@extends('frontv2.master')
@section('content')

<style>
  .padding_right_oldPassword {
    padding-right: 44px;
  }

  .padding_right_newPassword {
    padding-right: 35px;
  }
</style>

<div class="main mt-2">
  <section class="my_profile">
    <div class="mobile_views">
      <div class="my_profile_bg rounded">
        <div class="row m-0" style="min-height:400px">
          <div class="col-md-12 col-lg-12 col-xl-12 col-12">
            <div class="my_profile_title text-center my-3">
              <h5 class="text-capitalize text-white m-auto w-25 border-bottom border-secondary">@lang('front.my_order')</h5>
              @if(count(Auth::guard('client')->user()->orders) == 0)
              <h6>There Is No Order Yet</h6>
              @endif
            </div>
          </div>

          <div class="col-md-12 col-lg-12 col-xl-12 col-12 no_padding_mobile">
            <div class="accordion_add w-100 my-3" id="accordionExample_2">
              @foreach (Auth::guard('client')->user()->orders as $key=>$order)
                <!-- Start My Order 2 -->
                <div class="card z-depth-0 bordered">
                  <div class="card-header" id="heading{{$key+1}}">
                    <h5 class="mb-0">
                      <button class="btn btn-link text-center w-100" type="button" data-toggle="collapse" data-target="#collapse{{$key+1}}" aria-expanded="true" aria-controls="collapseFour">
                        @lang('front.order') {{$key+1}}
                      </button>
                    </h5>
                  </div>

                  <div id="collapse{{$key+1}}" class="collapse {{(!$key)? 'show' : ''}}" aria-labelledby="heading{{$key+1}}" data-parent="#accordionExample_2">
                    <div class="card-body">
                      <div class='table-responsive'>
                        @foreach ($order->products as $key=>$product)
                          <!--Table 1-->
                          <table id="tablePreview" class="table table-sm table-hover">
                            <!--Table body-->
                            <div class="table_title">
                              <h3> <a href="{{route('front.home.inner.order',['id' => $order->id])}}"> @lang('front.product_no') {{$key+1}} </a> </h3>
                            </div>

                            <tbody>
                              <tr>
                                <th>@lang('front.product')</th>
                                <td>{{product($product->product_id)->getTranslation('title',getCode())}}</td>
                              </tr>

                              <tr>
                                <th>@lang('front.product_image')</th>
                                <td>
                                  <a href="{{route('front.home.inner',['id' => $product->product_id])}}">
                                    <img class="product_image" src="{{product($product->product_id)->main_image}}" alt="Mobile">
                                  </a>
                                </td>
                              </tr>

                              <tr>
                                <th>@lang('front.quantity')</th>
                                <td>{{$product->quantity}}</td>
                              </tr>

                              <tr>
                                <th>@lang('front.price')</th>
                                <td>{{$product->price}} <span>@lang('front.pound')</span></td>
                              </tr>
                              @if($product->discount)
                              <tr>
                                <th>@lang('front.discount')</th>
                                <td>{{$product->discount}} <span>%</span></td>
                              </tr>
                              @endif
                              <tr>
                                <th>@lang('front.total_price')</th>
                                <td>{{$order->total_price - $order->shipping_amount}} <span>@lang('front.pound')</span></td>
                              </tr>
                            </tbody>
                            <!--Table body-->
                          </table>
                          <!--Table 1-->
                          <div class="w-100 border-bottom border-dark mt-4"></div>
                        @endforeach
                      </div>

                      <div class="row">
                        <div class="col-xl-12">
                          <aside class="cart-aside w-100">
                            <div class="summary w-100 p-3 my-3 border border-secondary bg-light text-dark">
                              <div class="summary-total-items text-center">
                                <span class="total-items"></span> @lang('front.order') {{$key+1}}
                              </div>

                              <div class="summary-subtotal">
                                <div class="subtotal-title text-left w-50 float-left">@lang('front.total_price')</div>
                                <div class="subtotal-value text-right w-50 float-right">{{$order->total_price - $order->shipping_amount}}</div>
                              </div>

                              <div class="summary-subtotal">
                                <div class="subtotal-title text-left w-50 float-left">@lang('front.shipping_amount')</div>
                                <div class="subtotal-value final-value text-right w-50 float-right">{{(int)$order->shipping_amount}}</div>
                              </div>
                              <div class="summary-subtotal">
                                <div class="subtotal-title text-left w-50 float-left">@lang('front.total_price_after_shipping')</div>
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
                  </div>
                </div>
                <!-- End My Order 2 -->
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection
