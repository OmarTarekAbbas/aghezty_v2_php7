@if(isset($_REQUEST['category_id']))
<div class="form-group">
  <label for="textfield5" class="col-sm-3 col-lg-2 control-label">@lang('front.admin.property.category')<span class="text-danger">*</span></label>
  <div class="col-sm-9 col-lg-10 controls">
    <select name="category_id" class="form-control chosen-rtl">
      <option id="category_{{ $_REQUEST['category_id'] }}" value="{{ $_REQUEST['category_id'] }}">{{ $_REQUEST['title']}}</option>
    </select>
  </div>
</div>
@else
<div class="form-group">
  <label class="col-sm-3 col-lg-2 control-label">@lang('front.admin.property.category')<span class="text-danger">*</span></label>
  <div class="col-sm-9 col-lg-10 controls">
    {!! Form::select('category_id',$categorys->pluck('title','id'),null,['class'=>'form-control chosen-rtl','required']) !!}
  </div>
</div>
@endif

<div class="form-group">
  <label class="col-sm-3 col-lg-2 control-label">@lang('front.admin.property.title') <span class="text-danger">*</span></label>
  <div class="col-sm-9 col-lg-10 controls">
    <ul id="myTab1" class="nav nav-tabs">
      <?php $i = 0; ?>
      @foreach($languages as $language)
      <li class="{{($i++)? '':'active'}}"><a href="#title{{$language->short_code}}" data-toggle="tab"> {{$language->title}}</a></li>
      @endforeach
    </ul>
    <div class="tab-content">
      <?php $i = 0; ?>
      @foreach($languages as $language)
      <div class="tab-pane fade in {{($i++)? '':'active'}}" id="title{{$language->short_code}}">
        {!! Form::text("title[$language->short_code]", (isset($property)) ? $property->getTranslation('title',$language->short_code):null, ['class'=>'form-control input-lg']) !!}
      </div>
      @endforeach
    </div>
  </div>
</div>

<div class="form-group" id="new-property-value">
  <label class="col-sm-3 col-lg-2 control-label">@lang('front.admin.property_value.value') <span class="text-danger">*</span></label>
  <div class="col-sm-9 col-lg-10 controls" style="border: 1px solid #ddd;">
    <div id="new-property-values">
      <div id="new-property-value-div" style="padding-top: 10px;">
        <div class="col-sm-9 col-lg-10">
          <ul id="myTab1" class="nav nav-tabs">
            <?php $i = 0; ?>
            @foreach($languages as $language)
            <li class="{{($i++)? '':'active'}}"><a href="#value_{{$language->short_code}}" data-toggle="tab"> {{$language->title}}</a></li>
            @endforeach
          </ul>
          <div class="tab-content">
            <?php $i = 0; ?>
            @foreach($languages as $language)
            <div class="tab-pane fade in {{($i++)? '':'active'}}" id="value_{{$language->short_code}}">
              {!! Form::text("value[$language->short_code]", (isset($property_value)) ? $property_value->getTranslation('value',$language->short_code):null, ['class'=>'form-control input-lg']) !!}
            </div>
            @endforeach
          </div>
        </div>
        <div class="col-sm-3 col-lg-2">
          <a class="btn btn-danger" href="javascript:void(0)" id="remove-property-value-button" style="margin-top: 40px; height: 45px; padding-top: 12px;">Remove <i class="fa fa-trash"></i></a>
        </div>
      </div>
    </div>
    <div class="col-sm-12 col-lg-12">
      <a class="btn btn-success" href="javascript:void(0)" id="new-property-value-button" style="margin: 10px 0px;">Add New Property</a>
    </div>
  </div>
</div>

<div class="form-group">
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
    {!! Form::submit($buttonAction,['class'=>'btn btn-primary']) !!}
  </div>
</div>
