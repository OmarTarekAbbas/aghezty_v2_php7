<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label">@lang('messages.country.country-name') <span class="text-danger">*</span></label>
    <div class="col-sm-9 col-lg-10 controls">
        {!! Form::text('title',null,['placeholder'=>''.__('messages.campain.title').'','class'=>'form-control input-lg']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
        {!! Form::submit($buttonAction,['class'=>'btn btn-primary']) !!}
    </div>
</div>
