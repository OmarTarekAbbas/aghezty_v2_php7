@extends('template')
@section('page_title')
@lang('messages.reports')
@stop
@section('content')
@include('errors')
<!-- BEGIN Content -->
<div id="main-content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-black">
                <div class="box-title">
                    <h3><i class="fa fa-table"></i> @lang('messages.most_sold_product')</h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <div class="btn-toolbar pull-right">
                        <div class="btn-group">

                        </div>
                    </div>
                    <br><br>
                    <div class="table-responsive">

                        <div class="table-responsive">
                            <table id="example" class="table table-striped dt-responsive" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>@lang('messages.image')</th>
                                        <th>@lang('messages.campain.title')</th>
                                        <th>@lang('messages.sold_times')</th>
                                        <th>@lang('front.quantity')</th>
                                        <th class="visible-md visible-lg" style="width:130px">@lang('messages.action')
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="tablecontents">
                                @foreach($products as $key=>$product)

                                    <tr class="table-flag-blue">
                                    <td>{{$key+1}}</td>
                                        <td><img src="{{url($product->main_image)}}" alt="{{$product->title}}" style="width: 25%;"></td>
                                        <td> <h4>{{$product->title}} </h4></td>
                                        <td> <h4>{{count_product($product->id)}} </h4></td>
                                        <td> <h4>{{count_quantities($product->id)}} </h4></td>
                                        <td class="visible-md visible-lg">
                                            <div class="btn-group">
                                            <a href="{{url('clients/productv2/'.$product->id)}}" class="btn btn-primary" target="_blank">Show Product</a>
                                            </div>
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


<!-- <div class="row">

    @foreach($products as $product)
    <div class="col-sm-6 col-md-12">
        <div class="thumbnail">
            <img src="{{url($product->main_image)}}" alt="{{$product->title}}" style="width: 50%;">
            <div class="caption">
                <h3>{{$product->title}}</h3>
                <p><a href="{{url('clients/productv2/'.$product->id)}}" class="btn btn-primary" target="_blank">Show
                        Product</a>
            </div>
        </div>
    </div>
    @endforeach
</div> -->



@stop
@section('script')
<script type="text/javascript" src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
$(function() {
    $("#example").DataTable();

});
</script>
<script>
$('#report').addClass('active');
$('#most_sold_product').addClass('active');
</script>
@stop
