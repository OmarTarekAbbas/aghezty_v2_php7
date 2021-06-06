@extends('template')
@section('page_title')
@lang('messages.products')
@stop
@section('content')
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
        <h3><i class="fa fa-bars"></i>@lang('messages.product_description_simulate')</h3>
        <div class="box-tool">
          <a data-action="collapse" href="javascript:void(0);"><i class="fa fa-chevron-up"></i></a>
          <a data-action="close" href="javascript:void(0);"><i class="fa fa-times"></i></a>
        </div>
      </div>

      <div class="box-content">
        <div class="form-group">
          <label class="col-sm-3 col-lg-2 control-label">@lang('messages.description') *</label>
          <div class="col-sm-9 col-lg-10 controls">
            <textarea class="form-control col-md-12 ckeditor" id="ckeditor" name="description" rows="6"></textarea>
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2" style="margin-top: 25px;">
            <input type="submit" class="btn btn-primary" onclick="CKEDITOR.tools.callFunction(71,this);return false;">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@stop
@section('script')
<script>
  $('#product').addClass('active');
  $('#description_simulate').addClass('active');

  CKEDITOR.replace('ckeditor');
</script>
@stop
