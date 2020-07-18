<div class="form-group">
        <label class="col-sm-3 col-lg-2 control-label">@lang('messages.campain.title') <span class="text-danger">*</span></label>
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
                     {!! Form::text("title[$language->short_code]", (isset($brand)) ? $brand->getTranslation('title',$language->short_code):null, ['class'=>'form-control input-lg']) !!}
                  </div>
                @endforeach
            </div>
        </div>
</div>
@php
    if($brand){
        if($brand->Installments != null){
            $Installments = json_decode($brand->Installments, true);
        }else{
            $Installments = false;
        }
    }else{
        $Installments = false;
    }
@endphp
<div class="form-group">
    <label for="textfield5" class="col-sm-3 col-lg-2 control-label">@lang('messages.Installments') 6 @lang('messages.Months')</label>
    <div class="col-sm-8 col-lg-9 controls">
            {!! Form::number('Installments[6]',($Installments)? $Installments[6] : '',['placeholder'=>__('messages.Installments'),'class'=>'form-control in_6' , 'min' => 0 , 'required' => false]) !!}
    </div>
    <div class="col-sm-1 col-lg-1 remove_stm controls">
      %
    </div>
</div>

<div class="form-group">
    <label for="textfield5" class="col-sm-3 col-lg-2 control-label">@lang('messages.Installments') 12 @lang('messages.Months')</label>
    <div class="col-sm-8 col-lg-9 controls">
            {!! Form::number('Installments[12]',($Installments)? $Installments[12] : '',['placeholder'=>__('messages.Installments'),'class'=>'form-control in_12' , 'min' => 0 , 'required' => false]) !!}
    </div>
    <div class="col-sm-1 col-lg-1 remove_stm controls">
      %
    </div>
</div>

<div class="form-group">
    <label for="textfield5" class="col-sm-3 col-lg-2 control-label">@lang('messages.Installments') 18 @lang('messages.Months')</label>
    <div class="col-sm-8 col-lg-9 controls">
            {!! Form::number('Installments[18]',($Installments)? $Installments[18] : '',['placeholder'=>__('messages.Installments'),'class'=>'form-control in_18' , 'min' => 0 , 'required' => false]) !!}
    </div>
    <div class="col-sm-1 col-lg-1 remove_stm controls">
      %
    </div>
</div>

<div class="form-group">
    <label for="textfield5" class="col-sm-3 col-lg-2 control-label">@lang('messages.Installments') 24 @lang('messages.Months')</label>
    <div class="col-sm-8 col-lg-9 remove_stm controls">
            {!! Form::number('Installments[24]',($Installments)? $Installments[24] : '',['placeholder'=>__('messages.Installments'),'class'=>'form-control in_24' , 'min' => 0 , 'required' => false]) !!}
    </div>
    <div class="col-sm-1 col-lg-1 remove_stm controls">
      %
    </div>
</div>

<div class="form-group">
  <label for="textfield5" class="col-sm-3 col-lg-2 control-label">@lang('messages.price')</label>
  <div class="col-sm-8 col-lg-9 remove_stm controls">
          {!! Form::number('limit_price',null,['placeholder'=>__('messages.price'),'class'=>'form-control' , 'min' => 0 , 'required' => false]) !!}
  </div>
  <div class="col-sm-1 col-lg-1 remove_stm controls">
    LE
  </div>
</div>

<div class="form-group">
    <label class="col-sm-3 col-md-2 control-label">@lang('messages.image')</label>
    <div class="col-sm-9 col-md-8 controls">
        <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="fileupload-new img-thumbnail" style="width: 200px; height: 150px;">
                @if($brand)
                    <img src="{{$brand->image}}" alt="" />
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
