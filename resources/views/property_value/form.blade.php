@extends('template')
@section('page_title')
@lang('front.admin.property_value.property_values')
@stop
@section('content')
    @include('errors')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="fa fa-bars"></i>@lang('front.admin.property_value.property_values')</h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    @if($property_value)
                    {!! Form::model($property_value,["url"=>"property_value/$property_value->id","class"=>"form-horizontal","method"=>"patch","files"=>"True"]) !!}
                    @include('property_value.input',['buttonAction'=>'Edit','required'=>'  (optional)'])
                    @else
                    {!! Form::open(["url"=>"property_value","class"=>"form-horizontal","method"=>"POST","files"=>"True"]) !!}
                    @include('property_value.input',['buttonAction'=>__('messages.save'),'required'=>'  *'])
                    @endif
                    {!! Form::close() !!}
                </div>
            </div>

        </div>

    </div>

@stop
@section('script')
    <script>

        $('#property_value').addClass('active');
        $('#property_value_create').addClass('active');

    </script>
@stop
