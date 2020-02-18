@extends('template')
@section('page_title')
 @lang('front.admin.property.propertys')
@stop
@section('styles')

<style>
/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
  margin: 0px !important;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>

@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="row">

            <div class="col-md-12">
                <div class="box box-black">
                    <div class="box-title">
                        <h3><i class="fa fa-table"></i> @lang('front.admin.property.propertys') Table</h3>
                        <div class="box-tool">
                            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="box-content">
                        <div class="btn-toolbar pull-right">
                            <div class="btn-group">
                                <a class="btn btn-circle show-tooltip" title="" href="{{url('property/create')}}" data-original-title="Add new record"><i class="fa fa-plus"></i></a>
                                <?php
                                $table_name = "properties";
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
                                        <th style="width:18px"><input type="checkbox" onclick="select_all('properties')"></th>
                                        <th>id</th>
                                        <th>@lang('front.admin.property.title')</th>
                                        <th>@lang('front.admin.property.category')</th>
                                        <th>@lang('messages.action')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($propertys as $value)
                                    <tr>
                                        <td><input class="select_all_template" type="checkbox" name="selected_rows[]" value="{{$value->id}}" class="roles" onclick="collect_selected(this)"></td>
                                        <td>{{$value->id}}</td>
                                        <td>
                                            @foreach($languages as $language)
                                            <li> <b>{{$language->title}} :</b> {{$value->getTranslation('title',$language->short_code)}}</li>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($languages as $language)
                                            <li> <b>{{$language->title}} :</b> {{$value->category->getTranslation('title',$language->short_code)}}</li>
                                            @endforeach
                                        </td>
                                        <td class="visible-md visible-lg">
                                            <div class="btn-group">
                                                <a class="btn btn-sm btn-success show-tooltip" title="Add Values" href="{{url("property_value/create?property_id=".$value->id."&title=".$value->title)}}" data-original-title="Add Values"><i class="fa fa-plus"></i></a>
                                                @if(count($value->pvalue) > 0)
                                                <a class="btn btn-sm show-tooltip" title="Show Values" href="{{url("property_value?property_id=$value->id")}}" data-original-title="show Values"><i class="fa fa-step-forward"></i></a>
                                                @endif
                                                <a class="btn btn-sm show-tooltip" href="{{url("property/$value->id/edit")}}" title="Edit"><i class="fa fa-edit"></i></a>
                                                <a class="btn btn-sm show-tooltip btn-danger" onclick="return ConfirmDelete();" href="{{url("property/$value->id/delete")}}" title="Delete"><i class="fa fa-trash"></i></a>
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
    $('#property').addClass('active');
    $('#property_subindex').addClass('active');
</script>

@stop
