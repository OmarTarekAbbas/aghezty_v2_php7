@extends('template')
@section('page_title')
@lang('messages.advertisement')
@stop
@section('content')
@include('errors')
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-title">
        <h3><i class="fa fa-bars"></i>@lang('messages.advertisement')</h3>
        <div class="box-tool">
          <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
          <a data-action="close" href="#"><i class="fa fa-times"></i></a>
        </div>
      </div>
      <div class="">

        <form action="{{url('newsletter/send_message')}}" method="POST">
          @csrf
          <div class="form-group" id="cktextarea">
            <div class="col-sm-9 col-lg-10 controls">
              <input class="form-control col-md-12" name="subject" placeholder="Subject"/>
            </div>
          </div>

          <div class="form-group" id="cktextarea">
            <div class="col-sm-9 col-lg-10 controls">
              <textarea class="form-control col-md-12 ckeditor" name="message" rows="6"></textarea>
            </div>
          </div>

          <div class="form-group last">
            <div class="">
              <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> @lang('messages.send')</button>
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
  $('#newsletter').addClass('active');
    $('#newsletter_send').addClass('active');

</script>
@stop
