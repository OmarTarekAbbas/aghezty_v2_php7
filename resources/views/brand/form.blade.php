@extends('template')
@section('page_title')
  @lang('messages.brands')
@stop
@section('content')
    @include('errors')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="fa fa-bars"></i>@lang('messages.brands')</h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    @if($brand)
                    {!! Form::model($brand,["url"=>"brand/$brand->id","class"=>"form-horizontal","method"=>"patch","files"=>"True"]) !!}
                    @include('brand.input',['buttonAction'=>'Edit','required'=>'  (optional)'])
                    @else
                    {!! Form::open(["url"=>"brand","class"=>"form-horizontal","method"=>"POST","files"=>"True"]) !!}
                    @include('brand.input',['buttonAction'=>__('messages.save'),'required'=>'  *'])
                    @endif
                    {!! Form::close() !!}
                </div>
            </div>

        </div>

    </div>

@stop
@section('script')
    <script>

        $('#brand').addClass('active');
        $('#brand_create').addClass('active');

    </script>
@stop
