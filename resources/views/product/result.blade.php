{{ $products->appends(Request::all())->render() }}
<table id="myTable" class="table table-striped dt-responsive" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th style="width:18px"><input data-check-all type="checkbox"></th>
        <th>serial id</th>
        <th>product id</th>
        <th>@lang('messages.category')</th>
        <th>@lang('messages.brands')</th>
        <th>@lang('messages.model')</th>
        <th>@lang('messages.product_stock_count')</th>
        <th>@lang('messages.price')</th>
        <th>@lang('messages.main_image')</th>
        <th>@lang('messages.rate')</th>
        <th>sku</th>
        <th>@lang('messages.recently_added')</th>
        <th>@lang('messages.selected_for_you')</th>
        <th>@lang('messages.action')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $key=>$value)
        <tr id="product_{{$value->id}}">
            <td><input data-check-all-item class="select_all_template" type="checkbox" name="selected_rows[]" value="{{$value->id}}"
                       class="roles"></td>
            <td>{{$key+1}}</td>
            <td>{{$value->id}}</td>
            <td>
                @foreach($languages as $language)
                    <li><b>{{$language->title}}
                            :</b> {{$value->category?$value->category->getTranslation('title',$language->short_code):''}}</li>
                @endforeach
            </td>
            <td>
                @foreach($languages as $language)
                    <li><b>{{$language->title}} :</b> {{$value->brand?$value->brand->getTranslation('title',$language->short_code):''}}
                    </li>
                @endforeach
            </td>
            <td>
                @foreach($languages as $language)
                    <li><b>{{$language->title}}
                            :</b> {{$value->getTranslation('short_description',$language->short_code)}}</li>
                @endforeach
            </td>
            <td>{{$value->stock}}</td>
            <td>{{$value->price}}</td>
            <td>
                <img class="" width="100px" height="100px" src="{{$value->main_image}}"/>
            </td>
            <td>{{$value->rate() ? $value->rate():__('messages.not_have_rate_yet')}}</td>
            <td>{{$value->sku}}</td>
            <td class="recently_added">
                <label class="switch">
                    <input id="{{$value->id}}" type="checkbox" name="switch" {{$value->recently_added? 'checked':''}}>
                    <span class="slider round"></span>
                </label>
            </td>
            <td class="selected_for_you">
                <label class="switch">
                    <input id="{{$value->id}}" type="checkbox" name="switch" {{$value->selected_for_you? 'checked':''}}>
                    <span class="slider round"></span>
                </label>
            </td>
            <td>
                <a class="btn btn-sm btn-info show-tooltip" title="Show Product"
                   href="{{route("front.home.inner",['id'=>$value->id])}}" data-original-title="Show Product"><i
                        class="fa fa-forward"></i></a>
                <a class="btn btn-sm btn-success show-tooltip" title="Image Control"
                   href="{{route("admin.image.index",['product_id'=>$value->id])}}" data-original-title="Show Product"><i
                        class="fa fa-image"></i></a>
                @if(count($value->admin_rates) > 0)
                    <a class="btn btn-sm btn-primary show-tooltip" title="Show Rate"
                       href="{{url("rate?product_id=$value->id")}}" data-original-title="show Rate"><i
                            class="fa fa-step-forward"></i></a>
                @endif
                <a class="btn btn-sm show-tooltip edit-ajax" data-href="{{url("product/$value->id/edit")}}"
                   title="@lang('messages.edit')"><i class="fa fa-edit"></i></a>
                   <a class="btn btn-sm show-tooltip" href="{{url("product/$value->id/edit")}}"
                    title="@lang('messages.edit')"><i class="fa fa-pencil"></i></a>
                <a class="btn btn-sm show-tooltip btn-danger" onclick="return ConfirmDelete();"
                   href="{{url("product/$value->id/delete")}}" title="@lang('messages.template.delete')"><i
                        class="fa fa-trash"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $products->appends(request()->all())->render() }}
