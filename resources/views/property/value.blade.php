<div id="new-property-value-div-{{$item_counter}}" style="padding-top: 10px;">
  <div class="col-sm-9 col-lg-10">
    <ul class="nav nav-tabs">
      @foreach ($languages as $key=>$language)
      <li class="{{!$key? 'active' : ''}}"><a href="#value_{{$language->short_code}}_{{$item_counter}}" data-toggle="tab"> {{$language->title}} </a></li>
      @endforeach
    </ul>
    <div class="tab-content">
      @foreach ($languages as $key=>$language)
      <div class="tab-pane fade in {{!$key? 'active' : ''}}" id="value_{{$language->short_code}}_{{$item_counter}}">
        <input class="form-control input-lg" name="new_values[{{$item_counter}}][{{$language->short_code}}]" type="text">
      </div>
      @endforeach
    </div>
  </div>
  <div class="col-sm-3 col-lg-2">
    <a class="btn btn-danger" href="javascript:void(0)" id="remove-property-value-button" style="margin-top: 40px; height: 45px; padding-top: 12px;">Remove <i class="fa fa-trash"></i></a>
  </div>
