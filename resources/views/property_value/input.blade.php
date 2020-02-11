@if(isset($_REQUEST['property_id']))
<div class="form-group">
    <label for="textfield5" class="col-sm-3 col-lg-2 control-label">@lang('front.admin.property.title')<span class="text-danger">*</span></label>
    <div class="col-sm-9 col-lg-10 controls">
        <select  name="property_id" class="form-control chosen-rtl">
            <option id="property_{{ $_REQUEST['property_id'] }}" value="{{ $_REQUEST['property_id'] }}">{{ $_REQUEST['title']}}</option>
        </select>
    </div>
</div>
@else
<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label">@lang('front.admin.property.title')<span class="text-danger">*</span></label>
    <div class="col-sm-9 col-lg-10 controls">
        {!! Form::select('property_id',$propertys->pluck('title','id'),null,['class'=>'form-control chosen-rtl','required']) !!}
    </div>
</div>
@endif

<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label">@lang('front.admin.property_value.value')<span class="text-danger">*</span></label>
    <div class="col-sm-9 col-lg-10 controls">
        <ul id="myTab1" class="nav nav-tabs">
            <?php $i=0;?>
            @foreach($languages as $language)
                <li class="{{($i++)? '':'active'}}"><a href="#value{{$language->short_code}}" data-toggle="tab"> {{$language->title}}</a></li>
            @endforeach
        </ul>
        <div class="tab-content">
            <?php $i=0;?>
            @foreach($languages as $language)
                <div class="tab-pane fade in {{($i++)? '':'active'}}" id="value{{$language->short_code}}">
                    {!! Form::text("value[$language->short_code]", (isset($property_value)) ? $property_value->getTranslation('value',$language->short_code):null, ['class'=>'form-control input-lg']) !!}
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
        {!! Form::submit($buttonAction,['class'=>'btn btn-primary']) !!}
    </div>
</div>
