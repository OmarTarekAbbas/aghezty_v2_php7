@extends('template')
@section('page_title')
  @lang('messages.products')
@stop
@section('content')
    @include('errors')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="fa fa-bars"></i>@lang('messages.products')</h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <form method = 'POST' class="form-horizontal" action = '{!! route("admin.product.download.excel") !!}' enctype="multipart/form-data">
                        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>

                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label">@lang('messages.category')</label>
                            <div class="col-sm-9 col-lg-10 controls">
                                <select name="category_id"  class="form-control chosen-rtl" required>
                                    <option value="-1">@lang('messages.select_category')</option>
                                    @foreach ($categorys as $category)
                                        @if(count($category->sub_cats) > 0)
                                            <optgroup label="{{$category->title}}">
                                                @foreach ($category->sub_cats as $sub_category)
                                                <option value="{{$sub_category->id}}">{{$sub_category->title}}</option>
                                                @endforeach
                                            </optgroup>
                                        @endif
                                    @endforeach
                                </select>
                                {{-- {!! Form::select('category_id',$categorys,null,['class'=>'form-control chosen-rtl','required']) !!} --}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label">@lang('messages.brands')<span class="text-danger">*</span></label>
                            <div class="col-sm-9 col-lg-10 controls">
                                {!! Form::select('brand_id',$brands->pluck('title','id'),null,['class'=>'form-control chosen-rtl','required']) !!}
                            </div>
                        </div>

                         <div class="form-group">
                            <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
                                <input type="submit" class="btn btn-primary" value="Download Excel File">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@stop

@section('script')
    <script>
        $('#product').addClass('active');
        $('#product_create').addClass('active');
    </script>
@stop
