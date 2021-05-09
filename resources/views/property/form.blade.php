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

  $("#new-property-value-button").click(function() {
    //$("#new-property-value-div").clone().appendTo("#new-property-values");

    var property_value_html = "<div id='new-property-value-div' style='padding-top: 10px;'>";
    property_value_html += "<div class='col-sm-9 col-lg-10'>";
    property_value_html += "<ul id='myTab1' class='nav nav-tabs'>";
    property_value_html += "<?php $i = 0; ?>";
    property_value_html += "@foreach($languages as $language)";
    property_value_html += "<li class='{{($i++)? '':'active'}}'><a href='#value_{{$language->short_code}}' data-toggle='tab'> {{$language->title}}</a></li>";
    property_value_html += "@endforeach";
    property_value_html += "</ul>";
    property_value_html += "<div class='tab-content'>";
    property_value_html += "<?php $i = 0; ?>";
    property_value_html += "@foreach($languages as $language)";
    property_value_html += "<div class='tab-pane fade in {{($i++)? '':'active'}}' id='value_{{$language->short_code}}'>";
    property_value_html += '{!! Form::text("value[$language->short_code]", (isset($property_value)) ? $property_value->getTranslation("value",$language->short_code):null, ["class"=>"form-control input-lg"]) !!}';
    property_value_html += "</div>";
    property_value_html += "@endforeach";
    property_value_html += "</div>";
    property_value_html += "</div>";
    property_value_html += "<div class='col-sm-3 col-lg-2'>";
    property_value_html += "<a class='btn btn-danger' href='javascript:void(0)' id='remove-property-value-button' style='margin-top: 40px; height: 45px; padding-top: 12px;'>Remove <i class='fa fa-trash'></i></a>";
    property_value_html += "</div>";

    $("#new-property-values").append(property_value_html);
  });

  $(document).on("click", "#remove-property-value-button", function() {
    $(this).parent().parent().remove();
  });
</script>
@stop
