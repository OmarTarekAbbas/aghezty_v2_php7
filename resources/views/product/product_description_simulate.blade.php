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
