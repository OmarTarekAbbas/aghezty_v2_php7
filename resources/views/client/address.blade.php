@extends('template')
@section('page_title')
 @lang('messages.clients')
@stop
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="row">

            <div class="col-md-12">
                <div class="box box-black">
                    <div class="box-title">
                        <h3><i class="fa fa-table"></i> @lang('messages.clients')</h3>
                        <div class="box-tool">
                            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="box-content">
                        <div class="btn-toolbar pull-right">
                            <div class="btn-group">
                                {{-- <i class="btn btn-circle show-tooltip" title="" href="{{url('client/create')}}" data-original-title="Add new record"><i class="fa fa-plus"></i></i> --}}
                                <?php
                                $table_name = "clients";
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
                                        <th style="width:18px"><input type="checkbox" onclick="select_all('clients')"></th>
                                        <th>@lang('messages.client_name')</th>
                                        <th>@lang('messages.governoratee')</th>
                                        <th>@lang('messages.cityy')</th>
                                        <th>@lang('messages.address')</th>
                                        <th>@lang('messages.details')</th>
                                        <th>@lang('messages.action')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($clients as $value)
                                    @foreach ($value->cities as $item)
                                        <tr>
                                            <td><input class="select_all_template" type="checkbox" name="selected_rows[]" value="{{$value->id}}" class="roles" onclick="collect_selected(this)"></td>
                                            <td>
                                                {{$value->name}}
                                            </td>
                                            <td>{{$item->governorate->title_en}}</td>
                                            <td>{{$item->city_en}}</td>
                                            <td>{{$item->pivot->address}}</td>
                                            <td>{{$item->pivot->details}}</td>
                                            <td class="visible-md visible-lg">
                                                <div class="btn-group">
                                                    <a class="btn btn-sm show-tooltip" href="{{url("client/$value->id/edit")}}" title="@lang('messages.edit')"><i class="fa fa-edit"></i></a>
                                                    <a class="btn btn-sm show-tooltip btn-danger" onclick="return ConfirmDelete();" href="{{url("client/$value->id/delete")}}" title="@lang('messages.template.delete')"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

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
