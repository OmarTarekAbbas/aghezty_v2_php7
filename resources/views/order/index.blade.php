@extends('template')
@section('page_title')
 @lang('messages.orders')
@stop
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="row">

            <div class="col-md-12">
                <div class="box box-black">
                    <div class="box-title">
                        <h3><i class="fa fa-table"></i> @lang('messages.orders')</h3>
                        <div class="box-tool">
                            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="box-content">
                        <div class="btn-toolbar pull-right">
                            <div class="btn-group">

                                <?php
                                $table_name = "orders";
                                // pass table name to delete all function
                                // if the current route exists in delete all table flags it will appear in view
                                // else it'll not appear
                                ?>
                                @include('partial.delete_all')
                            </div>
                        </div>
                        <br><br>
                        <div class="table-responsive">
                            <table id="example" class="table table-striped dt-responsive" cellspacing="0" width="100%">

                                <thead>
                                    <tr>
                                        <th style="width:18px"><input type="checkbox" onclick="select_all('products')"></th>
                                        <th>id</th>
                                        <th>@lang('messages.client_name')</th>
                                        <th>@lang('messages.total_price')</th>
                                        <th>@lang('messages.shipping_amount')</th>
                                        <th>@lang('messages.price_after_shipping')</th>
                                        <th>@lang('messages.address')</th>
                                        <th>@lang('messages.scheduled.status')</th>
                                        <th>@lang('messages.action')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $key=>$order)
                                    <tr>
                                        <td><input class="select_all_template" type="checkbox" name="selected_rows[]" order="{{$order->id}}" class="roles" onclick="collect_selected(this)"></td>
                                        <td>{{($key+1)}}</td>
                                        <td>
                                           {{$order->client->name}}
                                        </td>
                                        <td>{{$order->total_price - $order->shipping_amount}}</td>
                                        <td>{{(int)$order->shipping_amount}}</td>
                                        <td>{{$order->total_price}}</td>
                                        <td>{{$order->address->address}} , {{$order->address->city->city_ar}}-{{$order->address->city->governorate->title_ar}}</td>
                                        <td><span class="blue">{{$order->status}}</span></td>
                                        <td>
                                            @if(count($order->products) > 0)
                                            <a class="btn btn-sm show-tooltip" title="@lang('messages.show_product')" href="{{url("order/".$order->id)}}" data-original-title="show Products"><i class="fa fa-step-forward"></i></a>
                                            @endif
                                            <a class="btn btn-sm show-tooltip btn-danger" onclick="return ConfirmDelete();" href="{{url("order/$order->id/delete")}}" title="@lang('messages.template.delete')"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@stop

@section('script')
<script>


    $('#order').addClass('active');
    $('#order_index').addClass('active');

</script>
@stop
