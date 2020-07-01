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
                <table id="dtposts" class="table table-striped dt-responsive" cellspacing="0" width="100%">

                  <thead>
                  <tr>
                    <th style="width:18px"><input type="checkbox" onclick="select_all('products')"></th>
                    <th>id</th>
                    <th>@lang('messages.client_name')</th>
                    <th>@lang('messages.total_price')</th>
                    <th>@lang('messages.shipping_amount')</th>
                    <th>@lang('messages.price_after_shipping')</th>
                    <th>@lang('messages.address')</th>
                    <th>{{trans('payment_status')}}</th>
                    <th>{{trans('payment')}}</th>
                    <th>@lang('messages.scheduled.status')</th>
                    <th>Action</th>
                  </tr>
                  </thead>

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
  <script>
    window.onload = function () {
      $('#dtposts').DataTable({
        "processing": true,
        "serverSide": true,
        //"search": {"regex": true},
        "ajax": {
          type: "GET",
          "url": "{!! url('order/allData?client_id='.request()->get('client_id')) !!}",
          "data": "{{csrf_token()}}"
        },
        columns: [
          {data: 'index', searchable: false, orderable: false},
          {data: 'id'},
          {data: 'client_name', name: 'client_name'},
          {data: 'total_price', name: 'total_price'},
          {data: 'shipping_amount', name: 'shipping_amount'},
          {data: 'price_after_shipping', name: 'price_after_shipping'},
          {data: 'address', name: 'address'},
          {data: 'payment_status', name: 'payment_status'},
          {data: 'payment', name: 'payment'},
          {data: 'status', name: 'status'},
          {data: 'action', searchable: false}
        ]
        , "pageLength": 10
      });
    };
  </script>

@stop
