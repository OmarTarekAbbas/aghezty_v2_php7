@extends('template')
@section('page_title')
 Sub Category
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
                        <h3><i class="fa fa-table"></i> Sub Category Table</h3>
                        <div class="box-tool">
                            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="box-content">
                        <div class="btn-toolbar pull-right">
                            <div class="btn-group">
                                <a class="btn btn-circle show-tooltip" title="" href="{{url('sub_category/create')}}" data-original-title="Add new record"><i class="fa fa-plus"></i></a>
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
                                        <th>Parent Category</th>
                                        <th>@lang('messages.homepage')</th>
                                        <th>@lang('messages.action')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sub_categorys as $value)
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
                                            @foreach($languages as $language)
                                            <li> <b>{{$language->title}} :</b> {{$value->cat->getTranslation('title',$language->short_code)}}</li>
                                            @endforeach
                                        </td>
                                        <td id="homepage">
                                            <label class="switch">
                                                <input id="{{$value->id}}" type="checkbox" name="switch" {{$value->homepage? 'checked':''}}>
                                                <span class="slider round"></span>
                                            </label>
                                        </td>
                                        <td class="visible-md visible-lg">
                                            <div class="btn-group">
                                                <a class="btn btn-sm btn-success show-tooltip" title="Add Product" href="{{url("product/create?category_id=".$value->id."&title=".$value->title)}}" data-original-title="Add Product"><i class="fa fa-plus"></i></a>
                                                @if(count($value->products) > 0)
                                                <a class="btn btn-sm show-tooltip" title="Show Product" href="{{url("product?category_id=$value->id")}}" data-original-title="show Product"><i class="fa fa-step-forward"></i></a>
                                                @endif
                                                <a class="btn btn-sm show-tooltip" href="{{url("sub_category/$value->id/edit")}}" title="Edit"><i class="fa fa-edit"></i></a>
                                                @if (setting('enable_delete'))
                                                <a class="btn btn-sm show-tooltip btn-danger" onclick="return ConfirmDelete();" href="{{url("sub_category/$value->id/delete")}}" title="Delete"><i class="fa fa-trash"></i></a>
                                                @endif
                                                <a class="btn btn-sm btn-warning show-primary" title="Add Property" href="{{url("property/create?category_id=".$value->id."&title=".$value->title)}}" data-original-title="Add Property"><i class="fa fa-plus"></i></a>
                                                @if(count($value->property) > 0)
                                                <a class="btn btn-sm show-tooltip btn-primary" title="Show Property" href="{{url("property?category_id=$value->id")}}" data-original-title="show Property"><i class="fa fa-step-forward"></i></a>
                                                @endif
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
    $('#category_subindex').addClass('active');

</script>
<script>
	$('#homepage .switch input').change(function(){
        var x = $(this).siblings();
		$.ajax({
            type:'GET',
            url:'{{url("homepage/homepage_category")}}',
            headers:'_token = {{ csrf_token() }}',
			data: {
				switch: $(this).is( ':checked'),
				id: $(this).attr('id')
			},
            success: function(data) {
                if(data == 'no'){
                    alert('max product to select is 6!');
                    x.trigger('click');
                }
            }
		});
	})
</script>

@stop
