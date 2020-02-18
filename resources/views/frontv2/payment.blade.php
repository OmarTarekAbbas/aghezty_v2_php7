@extends('frontv2.master')
@section('content')

<!-- Start Owl Carsoul -->

<!-- End Owl Carsoul -->

<div class="main">
	<div class="mobile_views">
		<div class="status_title my-3">
			<h4 class="text-center border-bottom border-secondary w-25 m-auto">@lang('front.choose_payment')</h4>
		</div>

		<section class="choose-address">
			<div class="accordionn" id="accordionExample">
				<div class="card">
					<div class="card-header" id="headingThree">
						<button class="btn btn-link collapsed" id="collapsed_pay" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							Select Payment Method</button>
					</div>

					<div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
						<div class="card-body">
							<div class="choose-visa input-group w-75 m-auto d-block rounded px-2 py-1 hvr-wobble-to-bottom-right">
								<div class="visa-cash input-group-prepend cash" for="radioOne">
									<span class="span_input_radio">
										<input type="radio" name="payment" value="1" form="checkout-form" id="radioOne">
									</span>

									<span class="span_font_icon">
										<span class="far fa-handshake fa-lg"></span>
									</span>

									<span class="span_label_cash">
										<label for="radioOne">@lang('front.cash')</label>
									</span>
								</div>
							</div>

							<div class="choose-visa input-group w-75 m-auto d-block rounded px-2 py-1 hvr-wobble-to-bottom-right">
								<div class="visa-cash input-group-prepend cash" for="radioTwo">
									<span class="span_input_radio">
										<input type="radio" name="payment" value="3" form="checkout-form" id="radioTwo">
									</span>

									<span class="span_font_icon">
										<i class="fab fa-cc-visa"></i>
									</span>

									<span class="span_label_cash">
										<label for="radioTwo">@lang('front.visa_after_deliver')</label>
									</span>
								</div>
							</div>

							<div class="choose-visa input-group w-75 m-auto d-block rounded px-2 py-1 hvr-wobble-to-bottom-right">
								<div class="visa-cash input-group-prepend visa" for="radioThree">
									<span class="span_input_radio ">
										<input type="radio" name="payment" value="2" form="checkout-form" id="radioThree">
									</span>

									<span class="span_font_icon">
										<i class="fab fa-cc-visa"></i>
									</span>

									<span class="span_label_cash">
										<label for="radioThree">@lang('front.visa')</label>
									</span>
								</div>
							</div>

              <form action="{{route('front.home.checkout.submit')}}"  id="checkout-form" method="POST">
                {{ csrf_field() }}
                @if(isset($_REQUEST['address_id']))
                <input type="hidden" name="address_id" class="add_id" value="{{$_REQUEST['address_id']}}">
                @else
                <input type="hidden" name="address_id" class="add_id"   value="{{Auth::guard('client')->user()->cities[0]->id}}">
                @endif
                <div id="charge-error" class="alert alert-danger" style="display:none">
                </div>

                <div class="form-row" style="direction: {{dir_ar_en()}};display:none;text-align: center;display: flow-root;">
                    <div class="">
                        <div id="paypal-button" class="has paypal-button"></div>
                    </div>
                </div>
                    {{-- <div class="form-group" style="height:45px">
                        <label for="cc_number">Credit Card Number</label>
                        <!-- <input type="number" class="form-control" id="card-number"> -->
                        <div class="form-group" id="card-number"></div>
                    </div>

                    <div class="col-6">
                        <label for="expiry">Expiry</label>
                        <div class="form-group" id="expiration-date"></div>
                    </div>

                    <div class="col-6">
                        <label for="cvv">CVV</label>
                        <div class="form-group" id="cvv"></div>
                    </div>
                </div>
                <meta name="api_token" content="">
                <input id="nonce" name="payment_method_nonce" type="hidden" /> --}}
                <button type="submit" class="btn btn-primary btn-lg btn-block w-75 m-auto d-block hvr-wobble-to-bottom-right btn-pay" style="display:none!important">@lang('front.paid_now')</button>
            </form>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>

@endsection
@section('script')
<script src="{{asset('js/checkout.js')}}"></script>
<script src="{{asset('js/paymentv2.js')}}"></script>
@endsection
