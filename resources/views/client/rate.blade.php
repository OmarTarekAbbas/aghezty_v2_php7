@extends('template')
@section('page_title')
 @lang('messages.rate')
@stop
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="row">

            <div class="col-md-12">
                <div class="box box-black">
                    <div class="box-title">
                        <h3><i class="fa fa-table"></i> @lang('messages.rate')</h3>
                        <div class="box-tool">
                            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="box-content">
                        <div class="btn-toolbar pull-right">
                            <div class="btn-group">
                                {{-- <i class="btn btn-circle show-tooltip" title="" href="{{url('rate/create')}}" data-original-title="Add new record"><i class="fa fa-plus"></i></i> --}}
                                <a href="{{url("rate?publish=1")}}" class="btn btn-success">Publish</a> &nbsp;
                                <a href="{{url("rate?publish=0")}}" class="btn btn-danger">UnPublish</a>
                                <?php
                                $table_name = "rates";
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
                                        <th style="width:18px"><input type="checkbox" onclick="select_all('rates')"></th>
                                        <th>@lang('messages.client_name')</th>
                                        <th>@lang('messages.product_name')</th>
                                        <th>@lang('messages.rate')</th>
                                        <th>@lang('messages.comment')</th>
                                        <th>@lang('messages.publish')</th>
                                        <th>@lang('messages.action')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rates as $item)
                                        <tr>
                                            <td><input class="select_all_template" type="checkbox" name="selected_rows[]" value="{{$item->id}}" class="roles" onclick="collect_selected(this)"></td>
                                            <td>
                                                {{$item->client->name}}
                                            </td>
                                            <td>{{$item->product->title}}</td>
                                            <td>{{$item->rate}}</td>
                                            <td>{{$item->comment}}</td>
                                            <td>{!! $item->publish ? '<i class="green fa fa-check fa-3x" aria-hidden="true"></i>': '<i class="red fa fa-times fa-3x" aria-hidden="true"></i>' !!}</td>
                                            <td class="visible-md visible-lg">
                                                <div class="btn-group">
                                                    @if($item->publish)
                                                        <a class="btn btn-sm show-tooltip" href="{{url("rate/publish/".$item->id."?value=0")}}" title="P">UnPublish</a>
                                                    @else
                                                        <a class="btn btn-sm show-tooltip" href="{{url("rate/publish/".$item->id."?value=1")}}" title="P">Publish</a>
                                                    @endif
                                                    <a class="btn btn-sm show-tooltip btn-danger" onclick="return ConfirmDelete();" href="{{url("rate/$item->id/delete")}}" title="@lang('messages.template.delete')"><i class="fa fa-trash"></i></a>
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

@stop

@section('script')
<script>


    $('#client').addClass('active');
    $('#client_address').addClass('active');

</script>
@stop
