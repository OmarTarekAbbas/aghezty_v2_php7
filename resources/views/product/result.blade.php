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
        <th>@lang('messages.price')</th>
        <th>@lang('messages.discount')</th>
        <th>@lang('messages.price_after_discount')</th>
        <th>@lang('messages.recently_added')</th>
        <th>@lang('messages.selected_for_you')</th>
        <th>@lang('front.offer')</th>
        <th>@lang('messages.action')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $key=>$value)
        <tr id="product_{{$value->product_id}}">
        <style>
        td, th {
          padding: 6px !important;
        }
        </style>
            <td><input data-check-all-item class="select_all_template" type="checkbox" name="selected_rows[]" value="{{$value->product_id}}"
                       class="roles"></td>
            <td>{{$key+1}}</td>
            <td>{{$value->product_id}}</td>
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
            <td>
            <div class="btn-group">
              <button class="btn increment_stock"> <i class="fa fa-plus"></i> </button>
              <button class="btn stock_number" id="{{ $value->product_id }}" > {{ $value->stock }} </button>
              <button class="btn decrement_stock"> <i class="fa fa-minus"></i> </button>
            </div>
            </td>
            <td>{{$value->price}}</td>
            <td>
                <img class="" width="100px" height="100px" src="{{$value->main_image}}"/>
            </td>
            <td>{{$value->rate() ? $value->rate():__('messages.not_have_rate_yet')}}</td>
            <td>{{$value->sku}}</td>
            <td>{{$value->price}}</td>
            <td>{{$value->discount?$value->discount.'%':'-'}}</td>
            <td>{{$value->price_after_discount?$value->price_after_discount:'-'}}</td>
            <td class="recently_added">
                <label class="switch">
                    <input id="{{$value->product_id}}" type="checkbox" name="switch" {{$value->recently_added? 'checked':''}}>
                    <span class="slider round"></span>
                </label>
            </td>
            <td class="selected_for_you">
                <label class="switch">
                    <input id="{{$value->product_id}}" type="checkbox" name="switch" {{$value->selected_for_you? 'checked':''}}>
                    <span class="slider round"></span>
                </label>
            </td>
            <td class="offer">
                <label class="switch">
                    <input id="{{$value->product_id}}" type="checkbox" name="switch" {{$value->offer? 'checked':''}}>
                    <span class="slider round"></span>
                </label>
            </td>
            <td>
                <a class="btn btn-sm btn-info show-tooltip" title="Show Product"
                   href="{{route("front.home.inner",['id'=>$value->product_id ,'slug' => setSlug($value->getTranslation('title',getCode()))])}}" data-original-title="Show Product"><i
                        class="fa fa-forward"></i></a>
                <a class="btn btn-sm btn-success show-tooltip" title="Image Control"
                   href="{{route("admin.image.index",['product_id'=>$value->product_id])}}" data-original-title="Show Product"><i
                        class="fa fa-image"></i></a>
                @if(count($value->admin_rates) > 0)
                    <a class="btn btn-sm btn-primary show-tooltip" title="Show Rate"
                       href="{{url("rate?product_id=$value->product_id")}}" data-original-title="show Rate"><i
                            class="fa fa-step-forward"></i></a>
                @endif
                @if(!setting('edit_without_ajax'))
                <a class="btn btn-sm show-tooltip edit-ajax" data-href="{{url("product/$value->product_id/edit")}}"
                   title="@lang('messages.edit')"><i class="fa fa-edit"></i></a>
                @endif
                @if(setting('edit_without_ajax'))
                <a class="btn btn-sm show-tooltip" href="{{url("product/$value->product_id/edit")}}"
                    title="@lang('messages.edit')"><i class="fa fa-pencil"></i></a>
                @endif

                <a class="btn btn-sm show-tooltip btn-danger" onclick="return ConfirmDelete();"
                   href="{{url("product/$value->product_id/delete")}}" title="@lang('messages.template.delete')"><i
                        class="fa fa-trash"></i></a>

                <a class="btn btn-sm show-tooltip btn-warning"
                   href="{{url("product/$value->product_id/dublicate")}}" title="@lang('messages.template.dublicate')"><i
                        class="fa fa-copy"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $products->appends(request()->all())->render() }}
