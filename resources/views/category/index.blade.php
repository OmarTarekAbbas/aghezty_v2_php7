@extends('template')
@section('page_title')
 @lang('messages.category')
@stop
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="row">

            <div class="col-md-12">
                <div class="box box-black">
                    <div class="box-title">
                        <h3><i class="fa fa-table"></i> @lang('messages.categories_table')</h3>
                        <div class="box-tool">
                            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="box-content">
                        <div class="btn-toolbar pull-right">
                            <div class="btn-group">
                                <a class="btn btn-circle show-tooltip" title="" href="{{url('category/create')}}" data-original-title="Add new record"><i class="fa fa-plus"></i></a>
                                <?php
                                $table_name = "categories";
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
                                        <th style="width:18px"><input type="checkbox" onclick="select_all('categories')"></th>
                                        <th>id</th>
                                        <th>@lang('messages.campain.title')</th>
                                        <th>@lang('messages.coding')</th>
                                        <th>@lang('messages.image')</th>
                                        <th>@lang('messages.offer_image')</th>
                                        <th >@lang('messages.action')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categorys as $value)
                                    <tr>
                                        <td><input class="select_all_template" type="checkbox" name="selected_rows[]" value="{{$value->id}}" class="roles" onclick="collect_selected(this)"></td>
                                        <td>{{$value->id}}</td>
                                        <td>
                                            @foreach($languages as $language)
                                            <li> <b>{{$language->title}} :</b> {{$value->getTranslation('title',$language->short_code)}}</li>
                                            @endforeach
                                        </td>
                                        <td>{{$value->coding}}</td>
                                        <td>
                                            <img class="" width="100px" height="100px" src="{{$value->image}}"/>
                                        </td>
                                        <td>
                                            <img class="" width="100px" height="100px" src="{{url("$value->offer_image")}}"/>
                                        </td>
                                        <td class="visible-md visible-lg">
                                            <div class="btn-group">
                                                <a class="btn btn-sm btn-success show-tooltip" title="Add Product" href="{{url("product/create?category_id=".$value->id."&title=".$value->title)}}" data-original-title="Add Product"><i class="fa fa-plus"></i></a>
                                                @if(count($value->products) > 0)
                                                <a class="btn btn-sm show-tooltip" title="Show Product" href="{{url("product?category_id=$value->id")}}" data-original-title="show Product"><i class="fa fa-step-forward"></i></a>
                                                @endif
                                                <a class="btn btn-sm show-tooltip" href="{{url("category/$value->id/edit")}}" title="Edit"><i class="fa fa-edit"></i></a>
                                                @if (setting('enable_delete'))
                                                <a class="btn btn-sm show-tooltip btn-danger" onclick="return ConfirmDelete();" href="{{url("category/$value->id/delete")}}" title="Delete"><i class="fa fa-trash"></i></a>
                                                @endif
                                                <a class="btn btn-sm btn-warning show-tooltip" title="Add Sub Category" href="{{url("sub_category/create?category_id=".$value->id."&title=".$value->title)}}" data-original-title="Add Sub Category"><i class="fa fa-plus"></i></a>
                                                @if(count($value->sub_cats) > 0)
                                                <a class="btn btn-sm  btn-primary show-tooltip" title="Show Sub Category" href="{{url("sub_category/$value->id")}}" data-original-title="Show Sub Category"><i class="fa fa-step-forward"></i></a>
                                                @endif
                                                <a class="btn btn-sm btn btn-info show-tooltip" title="Delete Offer Image" href="{{url("offer_image/".$value->id."/delete"  )}}" data-original-title="Delete Offer Image"><i class="fa fa-trash-o"></i></a>
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


    $('#category').addClass('active');
    $('#category_index').addClass('active');

</script>


@stop
