@extends('front.layout')
@section('page_title')
    @lang('front.payment')
@stop
@section('content')
<style>
.form-group {
    height: 18px;
    width:100%;
}
</style>
<!-- main content -->
<div class="main" style="">
    <div class="container">
        @include('errors')
        <section class="choose-address">
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0 text-right">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                @lang('front.choose_payment')
                            </button>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse show" aria-labelledby="headingThree"
                        data-parent="#accordionExample">
                        <div class="card-body">

                            <div class="choose-visa input-group mb-3">
                                <div class="visa-cash input-group-prepend">
                                    <span class="input-group-text border-0">
                                        <input type="radio" name="payment" value="1" form="checkout-form" id="radioOne">
                                    </span>

                                    <span class="input-group-text border-0">
                                        <span class="far fa-handshake fa-lg"></span>
                                    </span>
                                </div>
                                <label for="radioOne">@lang('front.cash')</label>
                            </div>

                            <div class="choose-visa input-group mb-3">
                                <div class="visa-cash input-group-prepend">
                                    <span class="input-group-text border-0">
                                        <input type="radio" name="payment" value="3" form="checkout-form" id="radioTwo">
                                    </span>
                                    <span class="input-group-text border-0">
                                        <span class="far fa-handshake fa-lg"></span>
                                    </span>
                                </div>
                                <label for="radioTwo">@lang('front.visa_after_deliver')</label>
                            </div>

                            <div class="choose-visa input-group mb-3">
                                <div class="visa-cash input-group-prepend">
                                    <span class="input-group-text border-0">
                                        <input type="radio" name="payment" value="2" form="checkout-form" id="radioThree">
                                    </span>
                                    <span class="input-group-text border-0">
                                        <span class="fas fa-money-check fa-lg"></span>
                                    </span>
                                </div>
                                <label for="">@lang('front.visa')</label>
                            </div>

                            <form action="{{url('clients/payment')}}" id="checkout-form" method="POST">
                                {{ csrf_field() }}
                                @if(isset($_REQUEST['address_id']))
                                <input type="hidden" name="address_id" value="{{$_REQUEST['address_id']}}">
                                @else
                                <input type="hidden" name="address_id" value="{{Auth::guard('client')->user()->cities[0]->id}}">
                                @endif
                                <div id="charge-error" class="alert alert-danger" style="display:none">
                                </div>

                                <div class="form-row" style="direction: {{dir_ar_en()}};display:none">
                                    <div class="form-group" style="height:45px">
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
                                <input id="nonce" name="payment_method_nonce" type="hidden" />
                                <button type="submit" class="btn btn-primary btn-lg btn-block" disabled>@lang('front.paid_now')</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@stop
@section('script')
<script src="{{asset('js/client.min.js')}}"></script>
<script src="{{asset('js/hosted-fields.min.js')}}"></script>
<script src="{{asset('js/payment.js')}}"></script>
@endsection
