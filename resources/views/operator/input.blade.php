<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label">@lang('messages.operator_name') <span class="text-danger">*</span></label>
    <div class="col-sm-9 col-lg-10 controls">
        {!! Form::text('name',null,['placeholder'=>__('messages.operator_name'),'class'=>'form-control btn-lg','required']) !!}
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label">@lang('messages.used_code') </label>
    <div class="col-sm-9 col-lg-10 controls">
        {!! Form::number('rbt_ussd_code',null,['placeholder'=>__('messages.used_code'),'class'=>'form-control','min'=>0]) !!}
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label">@lang('messages.sms_code') <span class="text-danger">*</span></label>
    <div class="col-sm-9 col-lg-10 controls">
        {!! Form::number('rbt_sms_code',null,['placeholder'=>__('messages.sms_code'),'class'=>'form-control','min'=>0,'required']) !!}
    </div>
</div>

@if(isset($_REQUEST['country_id']))
<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label">@lang('messages.country.country') <span class="text-danger">*</span></label>
    <div class="col-sm-9 col-lg-10 controls">
        {!! Form::select('country_id',array($_REQUEST['country_id'] => $_REQUEST['title']),null,['class'=>'form-control chosen-rtl btn-lg','required' => true]) !!}
    </div>
</div>
@else
<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label">@lang('messages.country.country')<span class="text-danger">*</span></label>
    <div class="col-sm-9 col-lg-10 controls">
        {!! Form::select('country_id',$countrys->pluck('title','id'),null,['class'=>'form-control chosen-rtl','required']) !!}
    </div>
</div>
@endif

<div class="form-group">
    <label class="col-sm-3 col-md-2 control-label">@lang('messages.operator_image') <span class="text-danger">*</span></label>
    <div class="col-sm-9 col-md-8 controls">
        <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="fileupload-new img-thumbnail" style="width: 200px; height: 150px;">
                @if($operator)
                    <img src="{{$operator->image}}" alt="" />
                @else
                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                @endif
            </div>
            <div class="fileupload-preview fileupload-exists img-thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
            <div>
                <span class="btn btn-file"><span class="fileupload-new">@lang('messages.select_image')</span>
                    <span class="fileupload-exists">@lang('messages.users.change')</span>
                    {!! Form::file('image',["accept"=>"image/*" ,"class"=>"default"]) !!}
                </span>
                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">@lang('messages.users.remove')</a>
            </div>
        </div>
        <span class="label label-important">NOTE!</span>
        <span>Only extensions supported png, jpg, and jpeg</span>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
        {!! Form::submit($buttonAction,['class'=>'btn btn-primary']) !!}
    </div>
</div>
