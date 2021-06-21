@extends('template')
@section('page_title')
 @lang('messages.coupon')
@stop
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="row">

            <div class="col-md-12">
                <div class="box box-black">
                    <div class="box-title">
                        <h3><i class="fa fa-table"></i> @lang('messages.coupon')</h3>
                        <div class="box-tool">
                            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="box-content">
                        <div class="btn-toolbar pull-right">
                            <div class="btn-group">
                                <a class="btn btn-circle show-tooltip" title="" href="{{url('coupon/create')}}" data-original-title="Add new record"><i class="fa fa-plus"></i></a>

                         
                            </div>
                        </div>
                        <br><br>
                        <div class="table-responsive">
                            <table id="dtcoupon" class="table table-striped dt-responsive" cellspacing="0" width="100%">

                                <thead>
                                    <tr>
                                        <th style="width:18px"><input type="checkbox" onclick="select_all('coupons')"></th>
                                        <th>#</th>
                                        <th>@lang('messages.coupon')</th>
                                        <th>@lang('messages.value')</th>
                                        <th>@lang('messages.expiry_date')</th>
                                        <th>@lang('messages.used')</th>
                                        <th>@lang('messages.action')</th>
                                    </tr>
                                </thead>
                                {{-- <tbody>
                                    @foreach($coupons as $key=>$value)
                                    <tr>
                                        <td><input class="select_all_template" type="checkbox" name="selected_rows[]" value="{{$value->id}}" class="roles" onclick="collect_selected(this)"></td>
                                        <td>{{$value->id}}</td>
                                        <td>
                                            {{$value->coupon}}
                                        </td>
                                        <td>
                                            {{$value->value}}
                                        </td>
                                        <td>{{$value->expire_date}}</td>
                                        <td>{{$value->used}}</td>
                                        <td class="visible-md visible-lg">
                                            <div class="btn-group">
                                                <a class="btn btn-sm show-tooltip btn-danger" onclick="return ConfirmDelete();" href="{{url("coupon/$value->id/delete")}}" title="@lang('messages.template.delete')"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody> --}}
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


    $('#coupon').addClass('active');
    $('#coupon_index').addClass('active');

</script>

<script>
  window.onload = function() {
      $('#dtcoupon').DataTable({
          "processing": true,
          "serverSide": true,
          //"search": {"regex": true},
          "ajax": {
          type: "GET",
          "url": "{!! url('younger_expiry_coupon/allData') !!}",
          "data":"{{csrf_token()}}"
          },
          columns: [
          {data: 'index', searchable: false, orderable: false},
          {data: 'id'},
          {data: 'coupon'},
          {data: 'value'},
          {data: 'expire_date'},
          {data: 'used'},
          {data: 'action', searchable: false}
          ]
          , "pageLength": 10
      });
  };
  </script>
@stop
