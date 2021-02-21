@extends('template')
@section('page_title')
@lang('messages.products')
@stop
@section('content')
<style>
.grid-custom img {
    margin-bottom: 3px;
    border-radius: 4px;
}

.grid-custom {
    background: #d59a878c;
    border-radius: 7px;
    border: 3px solid #eee;
    padding: 5px;
}

.remove-image {
    position: absolute;
    cursor: pointer;
    background-color: #e40b0b;
    color: white;
    top: -1px;
    right: 15px;
    padding: 0 3px;
    font-size: 13px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
}
</style>
<style media="screen">
.pagination {
    float: right;
}

#myInput {
    background-image: url('/css/searchicon.png');
    background-position: 10px 10px;
    background-repeat: no-repeat;
    width: 100%;
    font-size: 16px;
    padding: 12px 20px 12px 40px;
    border: 1px solid #ddd;
    margin-bottom: 12px;
}

.highlight {
    background-color: #8fe090 !important;
}

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

input:checked+.slider {
    background-color: #2196F3;
}

input:focus+.slider {
    box-shadow: 0 0 1px #2196F3;
}

input:checked+.slider:before {
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

                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <strong>Original Image:</strong>
                        <br />

                        <img src="{{ url('uploads/test_omar/') }}{{ Session::get('imageName') }}" />
                    </div>
                    <div class="col-md-4">
                        <strong>Thumbnail Image:</strong>
                        <br />
                        <img src="{{ url('uploads/test_omar/') }}{{ Session::get('imageName') }}" />
                    </div>
                </div>
                @endif

                {!! Form::open(array('route' => 'resizeImagePost','enctype' => 'multipart/form-data')) !!}
                <div class="row">
                    <div class="col-md-4">
                        <br />
                        {!! Form::text('title', null,array('class' => 'form-control','placeholder'=>'Add Title')) !!}
                    </div>
                    <div class="col-md-12">
                        <br />
                        {!! Form::file('image', array('class' => 'image')) !!}
                    </div>
                    <div class="col-md-12">
                        <br />
                        <button type="submit" class="btn btn-success">Upload Image</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

</div>

</div>

@stop
