@extends('template')
@section('page_title')
@lang('front.admin.property.propertys')
@stop
@section('content')
@include('errors')
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-title">
        <h3><i class="fa fa-bars"></i>@lang('front.admin.property.propertys')</h3>
        <div class="box-tool">
          <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
          <a data-action="close" href="#"><i class="fa fa-times"></i></a>
        </div>
      </div>
      <div class="box-content">
        @if($property)
        {!! Form::model($property,["url"=>"property/$property->id","class"=>"form-horizontal","method"=>"patch","files"=>"True"]) !!}
        @include('property.input',['buttonAction'=>'Edit','required'=>' (optional)'])
        @else
        {!! Form::open(["url"=>"property","class"=>"form-horizontal","method"=>"POST","files"=>"True"]) !!}
        @include('property.input',['buttonAction'=>__('messages.save'),'required'=>' *'])
        @endif
        {!! Form::close() !!}
      </div>
    </div>

  </div>

</div>

@stop
@section('script')
<script>
  $('#property').addClass('active');
  $('#property_create').addClass('active');

  var counter = 1;
  $("#new-property-value-button").click(function() {
    $.ajax({
      type: "GET",
      url: "{{url('property/create-html/')}}/"+counter,
      success: function(property_value_html) {
        $("#new-property-values").append(property_value_html);
        counter++;
      }
    });

  });

  $(document).on("click", "#remove-property-value-button", function() {
    $(this).parent().parent().remove();
  });

  function removePropertyValue(value_id) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
      }
    });

    $.ajax({
      type: "post",
      url: "{{route('property.destroy.value')}}",
      data: {
        'value_id': value_id
      },
      success: function(response) {
        $('#remove-property-value-button-' + value_id).parent().parent().remove();
      }
    });
  }
</script>
@stop
