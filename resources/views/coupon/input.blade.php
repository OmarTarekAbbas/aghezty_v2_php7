<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label">@lang('messages.coupon_number') <span class="text-danger">*</span></label>
    <div class="col-sm-9 col-lg-10 controls">
        {!! Form::number('coupon_number',null,['placeholder'=>__('messages.coupon_number') ,'required','class'=>'form-control input-lg' , 'value' => 1 , 'min' => 1]) !!}
    </div>
</div>

<div class="form-group">
        <label class="col-sm-3 col-lg-2 control-label">@lang('messages.expiry_date') <span class="text-danger">*</span></label>
        <div class="col-sm-9 col-lg-10 controls">
            {!! Form::text('expire_date',null,['placeholder'=>__('messages.expiry_date'),'class'=>'form-control js-datepicker' ,'value' => 'date("Y-m-d")' , 'autocomplete' => 'off' ,'required']) !!}
        </div>
</div>

<div class="form-group">
        <label class="col-sm-3 col-lg-2 control-label">@lang('messages.value') <span class="text-danger">*</span></label>
        <div class="col-sm-9 col-lg-10 controls">
            {!! Form::text('value',null,['placeholder'=>__('messages.value'),'class'=>'form-control' , 'autocomplete' => 'off' ,'required']) !!}
        </div>
</div>

<div class="form-group">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
        {!! Form::submit($buttonAction,['class'=>'btn btn-primary']) !!}
    </div>
</div>
