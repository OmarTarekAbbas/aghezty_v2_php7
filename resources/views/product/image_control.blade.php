@extends('template')
@section('page_title')
 @lang('messages.products')
@stop
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="row">

            <div class="col-md-12">
                <div class="box box-black">
                    <div class="box-title">
                        <h3><i class="fa fa-table"></i> @lang('messages.products')</h3>
                        <div class="box-tool">
                            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="box-content">
                        <div class="btn-toolbar pull-right">

                        </div>
                        <br><br>
                        <div class="table-responsive">
                          <div id="tag_container">
                            <table id="myTable" class="table table-striped dt-responsive" cellspacing="0" width="100%">
                              <thead>
                              <tr>
                                  <td>id</td>
                                  <th>Image</th>
                                  <th>Created_at</th>
                                  <th>@lang('messages.action')</th>
                              </tr>
                              </thead>
                              <tbody>
                                @foreach ($images as $key=>$item)
                                  <tr id="{{$item->image}}" class="row-table">
                                    <td>
                                      {{$key + 1}}
                                    </td>
                                    <td>
                                      <img src="{{$item->image}}" width="300px" height="200px" alt="">
                                    </td>
                                    <td>{{$item->created_at->format('d/m/Y')}}</td>
                                    <td>
                                     <a class="btn btn-sm show-tooltip btn-danger" onclick="return ConfirmDelete();"
                                        href="{{url("image/$item->id/delete")}}" title="@lang('messages.template.delete')"><i
                                             class="fa fa-trash"></i></a>
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

</div>

@stop

@section('script')
<script type="text/javascript" src="{{ asset('js/table-dragger.min.js')}}"></script>
<script>
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
        }
  });
  var list = []
  var el = document.getElementById('myTable');
  var dragger = tableDragger(el, {
    mode: 'row',
    dragHandler: '.row-table',
    onlyBody: true,
  });
  dragger.on('drop',function(from, to){
    $('.row-table').each(function(index,e){
      list.push($(this).attr('id'))
    });

    $.ajax({
      type:'post',
      url:'{{url("admin/image/order/".request()->get("product_id"))}}',
      data: {
        list: list,
      },
      success: function(data) {
        list = []
        alert('reorder success')
      }
		});
  });
</script>

@stop
