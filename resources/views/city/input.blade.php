@if(isset($_REQUEST['governorate_id']))
<div class="form-group">
    <label for="textfield5" class="col-sm-3 col-lg-2 control-label">@lang('messages.governorate')<span class="text-danger">*</span></label>
    <div class="col-sm-9 col-lg-10 controls">
        <select  name="governorate_id" class="form-control chosen-rtl" required>
            <option id="category_{{ $_REQUEST['governorate_id'] }}" value="{{ $_REQUEST['governorate_id'] }}">{{ $_REQUEST['title']}}</option>
        </select>
    </div>
</div>
@else
<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label">@lang('messages.governorate')<span class="text-danger">*</span></label>
    <div class="col-sm-9 col-lg-10 controls">
        {!! Form::select('governorate_id',$governorates->pluck('title_'.getCode(),'id'),null,['class'=>'form-control chosen-rtl','required']) !!}
    </div>
</div>
@endif

<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label">@lang('messages.title_en') <span class="text-danger">*</span></label>
    <div class="col-sm-9 col-lg-10 controls">
        <ul id="myTab1" class="nav nav-tabs">
            <?php $i=0;?>
            @foreach($languages as $language)
                <li class="{{($i++)? '':'active'}}"><a href="#title{{$language->short_code}}" data-toggle="tab"> {{$language->title}}</a></li>
            @endforeach
        </ul>
        <div class="tab-content">
            <?php $i=0;?>
            @foreach($languages as $language)
                <div class="tab-pane fade in {{($i++)? '':'active'}}" id="title{{$language->short_code}}">
                    {!! Form::text("city_".$language->short_code, (isset($category)) ? $category->getTranslation('title',$language->short_code):null, ['class'=>'form-control input-lg']) !!}
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label"> @lang('messages.shipping_amount') <span class="text-danger">*</span></label>
    <div class="col-sm-9 col-lg-10 controls">
        {!! Form::text('shipping_amount',null,['placeholder'=>'120.00','class'=>'form-control input-lg']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
        {!! Form::submit($buttonAction,['class'=>'btn btn-primary']) !!}
    </div>
</div>
