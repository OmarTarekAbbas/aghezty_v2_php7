@extends('template')
@section('page_title')
@lang('messages.orders')
@stop
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-content">
                <div class="invoice">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>@lang('messages.order_details')</h2>
                        </div>

                        <div class="col-md-6 invoice-info">
                            <p class="font-size-17"><strong>@lang('messages.order_number')</strong> #{{$order->id}}</p>
                            <p>{{$order->created_at->format('d M Y')}}</p>
                            <p style="font-weight: bold;">{{$order->status}}</p>
                        </div>
                    </div>

                    <hr class="margin-0">

                    <div class="row">
                        <div class="col-md-6 company-info">
                            <h4>{{$order->client->name}}</h4>

                            <p>{{{ $order->address->address or '----'}}},<br>{{{ $order->address->city->city_ar or '----' }}},{{{ $order->address->city->governorate->title_ar or '----' }}}</p>
                            <p><i class="fa fa-phone"></i>{{$order->client->phone}}</p>
                            <p><i class="fa fa-envelope"></i> {{$order->client->email}}</p>
                        </div>
                        <div class="col-md-6 company-info">
                            <div class="alert alert-info">
                                <h4 class="text-center">@lang('messages.Send_Mail')
                                    <span><strong>{{ ($order->lang == 'ar') ? 'In Arabic' : 'In English'}}</strong></span>
                                </h4><br>
                                <div class="row text-center">
                                    <form action="{{url('orders/update_status')}}" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="order_id" value="{{$order->id}}">
                                        <input type="hidden" name="client_id" value="{{$order->client_id}}">
                                        @if($order->status != $orderStatus::getLabel($orderStatus::NOT_AVAILABLE))
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">@lang('messages.Under_Shipping')</label>
                                                @if($order->status == $orderStatus::getLabel($orderStatus::UNDER_SHIPPING)
                                                || $order->status == $orderStatus::getLabel($orderStatus::FINISHED))
                                                <span> <i class= "fa fa-check fa-2x text-success"></i> </span>
                                                @else
                                                <input type="radio" name="status" value="2" id="under_shipping">
                                                @endif
                                            </div>
                                        </div>
                                        @endif
                                        @if($order->status != $orderStatus::getLabel($orderStatus::NOT_AVAILABLE))
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">@lang('messages.Finished')</label>
                                                @if($order->status == $orderStatus::getLabel($orderStatus::FINISHED))
                                                <span> <i class= "fa fa-check fa-2x text-success"></i> </span>
                                                @else
                                                <input type="radio" name="status" value="3" id="finished">
                                                @endif
                                            </div>
                                        </div>
                                        @endif
                                        @if(!($order->status == $orderStatus::getLabel($orderStatus::FINISHED) || $order->status == $orderStatus::getLabel($orderStatus::UNDER_SHIPPING)))
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">@lang('messages.Not_available')</label>
                                                @if($order->status == $orderStatus::getLabel($orderStatus::NOT_AVAILABLE))
                                                <span> <i class= "fa fa-check fa-2x text-success"></i> </span>
                                                @else
                                                <input type="radio" name="status" value="4" id="not_available">
                                                @endif
                                            </div>
                                        </div>
                                        @endif
                                        @if($order->status == $orderStatus::getLabel($orderStatus::PENDING) || $order->status == $orderStatus::getLabel($orderStatus::UNDER_SHIPPING))
                                        <div class="col-md-12">
                                            <textarea type="text" name="message"
                                                style="width:100%;text-align:{{ ($order->lang == 'ar') ? 'right' : 'left'}}"
                                                cols="70" rows="9" class="form-control" required
                                                placeholder="{{ ($order->lang == 'ar') ? ' ??????????????' : 'Your Message'}}">
                                            </textarea>
                                            <br>
                                        <button type="submit" class="btn btn-primary btn-lg">@lang('messages.send')</button>
                                        </div>
                                        @endif
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>

                    <br><br>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="center">#</th>
                                    <th>@lang('messages.main_image')</th>
                                    <th>@lang('messages.campain.title')</th>
                                    <th>@lang('messages.price')</th>
                                    <th>@lang('messages.scheduled.count')</th>
                                    <th>@lang('messages.total_price')</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->products as $key=>$value)
                                <tr>
                                    <td class="center">{{($key+1)}}</td>
                                    <td>
                                        <img class=" img-circle" width="100px" height="100px"
                                            src="{{ $value->order_product->main_image }}" />
                                    </td>
                                    <td>
                                        @foreach($languages as $language)
                                        <li> <b>{{$language->title}} :</b>
                                            {{$value->order_product->getTranslation('title',$language->short_code)}}</li>
                                        @endforeach
                                    </td>
                                    <td>{{$value->price}}</td>
                                    <td>{{$value->quantity}}</td>
                                    <td>{{$value->total_price}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-success show-tooltip" title="Show Product"
                                            href="{{route("front.home.inner",['id'=>$value->order_product->id ,'slug' => setSlug($value->order_product->getTranslation('title',getCode()))])}}"
                                            data-original-title="Show Product"><i class="fa fa-forward"></i></a>
                                        {{-- <i class="btn btn-sm show-tooltip" href="{{url("product/$value->id/edit")}}"
                                        title="Edit"><i class="fa fa-edit"></i></i> --}}
                                        {{-- <i class="btn btn-sm show-tooltip btn-danger" onclick="return ConfirmDelete();" href="{{url("delete_order?product_id=".$value->id."&order_id=".$order->id)}}"
                                        title="Delete"><i class="fa fa-trash"></i></i> --}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <p class="text-left"><strong
                                style="font-weight:bolder;font-size:21px">@lang('front.payment'):</strong> <span
                                class="blue" style="font-weight:bolder;font-size:20px">{{$order->payment}}</span></p>
                    </div>

                    <div class="row">
                        {{-- <div class="col-md-6">
                            <p>Some extra information</p>
                            <ul>
                                <li>Maybe it's need list style</li>
                                <li>In several list item</li>
                                <li>In several list item</li>
                                <li>In several list item</li>
                            </ul>
                        </div> --}}
                        <div class="col-md-12 invoice-amount">
                            <p><strong>@lang('messages.total_price'):</strong> <span>{{$order->sum()}}</span></p>
                            <p><strong>@lang('messages.shipping_amount'):</strong>
                                @if((int)$order->shipping_amount!=0)
                                  <span>{{ (int)$order->shipping_amount}}</span>
                                @else
                                  @lang('front.shipping_amount_message')
                                @endif
                            </p>
                            <p><strong>@lang('messages.price_after_shipping') :</strong>
                                <span>{{$order->sum() + $order->shipping_amount}}</span></p>
                            @if((($order->sum() + $order->shipping_amount)-$order->total_price) > 0)
                            <p><strong>@lang('front.coupon.discount'):</strong>
                                <span>{{($order->sum() + $order->shipping_amount) - $order->total_price}}</span></p>
                            <p><strong>@lang('front.total_price_after_coupon'):</strong> <span
                                    class="green"><strong>{{$order->total_price}}</strong></span></p>
                            @endif

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="col-md-12">
      <h4 class="text-danger"> Order Replay </h4>
      <div class="table-responsive">
          <table class="table table-striped table-bordered">
              <thead>
                  <tr>
                      <th>@lang('front.auth.name')</th>
                      <th>@lang('front.auth.email')</th>
                      <th>@lang('front.admin_reply')</th>
                      <th>@lang('front.status')</th>
                      <th>  @lang('front.message') </th>
                      <th> @lang('front.date')</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($order->replaies as $key => $replay)
                  <tr>
                      <td> {{  $order->client->name }} </td>
                      <td> {{  $order->client->email }} </td>
                      <td> {{  $replay->admin->name }} </td>
                      <td>{{  $replay->status }}</td>
                      <td> {{  $replay->message }} </td>
                      <td> {{  $replay->created_at }} </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
    </div>
</div>
@stop
