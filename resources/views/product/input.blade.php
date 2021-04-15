
@if(isset($_REQUEST['category_id']))
<div class="form-group">
    <label for="textfield5" class="col-sm-3 col-lg-2 control-label">@lang('messages.category')<span class="text-danger">*</span></label>
    <div class="col-sm-9 col-lg-10 controls">
        <select  name="category_id" id="cate" class="form-control chosen-rtl" required>
            <option id="category_{{ $_REQUEST['category_id'] }}" value="{{ $_REQUEST['category_id'] }}">{{ $_REQUEST['title']}}</option>
        </select>
    </div>
</div>
@else
<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label">@lang('messages.category')<span class="text-danger">*</span></label>
    <div class="col-sm-9 col-lg-10 controls">
        <select name="category_id" id="cate" class="form-control chosen-rtl" required>
            @foreach ($categorys as $sub_category)
              <option value="{{$sub_category->id}}" @if($product&&$sub_category->id==$product->category_id) selected  @endif>{{$sub_category->getTranslation('title',getCode())}}</option>
            @endforeach
        </select>
    </div>
</div>
@endif

@if(isset($_REQUEST['brand_id']))
<div class="form-group">
    <label for="textfield5" class="col-sm-3 col-lg-2 control-label">@lang('messages.brands')<span class="text-danger">*</span></label>
    <div class="col-sm-9 col-lg-10 controls">
        <select  name="brand_id" class="form-control chosen-rtl" required>
            <option id="category_{{ $_REQUEST['brand_id'] }}" value="{{ $_REQUEST['brand_id'] }}">{{ $_REQUEST['title']}}</option>
        </select>
    </div>
</div>
@else
<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label">@lang('messages.brands')<span class="text-danger">*</span></label>
    <div class="col-sm-9 col-lg-10 controls">
        {!! Form::select('brand_id',$brands->pluck('title','id'),null,['class'=>'form-control chosen-rtl','required']) !!}
    </div>
</div>
@endif

<div class="form-group"  id="cktextarea">
  <label class="col-sm-3 col-lg-2 control-label">@lang('messages.product_name') *</label>
  <div class="col-sm-9 col-lg-10 controls" >
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
                  <input class="form-control" name="title[{{$language->short_code}}]" value="@if($product){!! $product->getTranslation('title',$language->short_code)  !!}@endif" required />
              </div>
          @endforeach
      </div>
  </div>
</div>

<div class="form-group"  id="cktextarea">
    <label class="col-sm-3 col-lg-2 control-label">@lang('messages.description') *</label>
    <div class="col-sm-9 col-lg-10 controls" >
        <ul id="myTab1" class="nav nav-tabs">
                <?php $i=0;?>
                @foreach($languages as $language)
                    <li class="{{($i++)? '':'active'}}"><a href="#description{{$language->short_code}}" data-toggle="tab"> {{$language->title}}</a></li>
                @endforeach
        </ul>
        <div class="tab-content">
            <?php $i=0;?>
            @foreach($languages as $language)
                <div class="tab-pane fade in {{($i++)? '':'active'}}" id="description{{$language->short_code}}">
                    <textarea class="form-control col-md-12 ckeditor{{$i}}" id="ckeditor{{$i}}" name="description[{{$language->short_code}}]" rows="6">
                            @if($product)
                            {!! $product->getTranslation('description',$language->short_code) !!}
                            @endif
                    </textarea>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="form-group"  id="cktextarea">
    <label class="col-sm-3 col-lg-2 control-label">@lang('messages.model') *</label>
    <div class="col-sm-9 col-lg-10 controls" >
        <ul id="myTab1" class="nav nav-tabs">
                <?php $i=0;?>
                @foreach($languages as $language)
                    <li class="{{($i++)? '':'active'}}"><a href="#short_description{{$language->short_code}}" data-toggle="tab"> {{$language->title}}</a></li>
                @endforeach
        </ul>
        <div class="tab-content">
            <?php $i=0;?>
            @foreach($languages as $language)
                <div class="tab-pane fade in {{($i++)? '':'active'}}" id="short_description{{$language->short_code}}">
                    <textarea class="form-control col-md-12" name="short_description[{{$language->short_code}}]" rows="6" required>@if($product){!! $product->getTranslation('short_description',$language->short_code)  !!}@endif</textarea>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-4">
        <label class="col-sm-5 col-lg-4 control-label">@lang('messages.price') <span class="text-danger">*</span></label>
        <div class="col-sm-7 col-lg-8 controls">
            <div class="input-group">
                {!! Form::number('price',null,['placeholder'=>__('messages.price'),'class'=>'form-control price' ,'required'=>true  , 'pattern' => '[0-9]']) !!}
                <span class="input-group-addon">$</span>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <label class="col-sm-5 col-lg-4 control-label">@lang('messages.discount') </label>
        <div class="col-sm-7 col-lg-8 controls">
            <div class="input-group">

                {!! Form::number('discount',null,['placeholder'=>__('messages.discount'),'class'=>'form-control discount' , 'min' => 0  , 'pattern' => '[0-9]']) !!}
                <span class="input-group-addon">%</span>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <label class="col-sm-5 col-lg-4 control-label">@lang('messages.price_after_discount')</label>
        <div class="col-sm-7 col-lg-8 controls">
            <div class="input-group">
                {!! Form::number('price_after_discount',null,['placeholder'=>__('messages.price_after_discount'),'class'=>'form-control price_after' , 'pattern' => '[0-9]']) !!}
                <span class="input-group-addon">$</span>
            </div>
        </div>

    </div>
</div>

<div class="form-group">
    <label for="textfield5" class="col-sm-3 col-lg-2 control-label">@lang('messages.stock_number')<span class="text-danger">*</span></label>
    <div class="col-sm-9 col-lg-10 controls">
            {!! Form::number('stock',null,['placeholder'=>__('messages.stock_number'),'class'=>'form-control' , 'min' => 0 , 'required' => true]) !!}
    </div>
</div>
@php
    if($product){
        if($product->Installments != null){
            $Installments = json_decode($product->Installments, true);
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
      <i class="fa fa-close fa-2x"></i>
    </div>
</div>

<div class="form-group">
    <label for="textfield5" class="col-sm-3 col-lg-2 control-label">@lang('messages.Installments') 12 @lang('messages.Months')</label>
    <div class="col-sm-8 col-lg-9 controls">
            {!! Form::number('Installments[12]',($Installments)? $Installments[12] : '',['placeholder'=>__('messages.Installments'),'class'=>'form-control in_12' , 'min' => 0 , 'required' => false]) !!}
    </div>
    <div class="col-sm-1 col-lg-1 remove_stm controls">
      <i class="fa fa-close fa-2x"></i>
    </div>
</div>

<div class="form-group">
    <label for="textfield5" class="col-sm-3 col-lg-2 control-label">@lang('messages.Installments') 18 @lang('messages.Months')</label>
    <div class="col-sm-8 col-lg-9 controls">
            {!! Form::number('Installments[18]',($Installments)? $Installments[18] : '',['placeholder'=>__('messages.Installments'),'class'=>'form-control in_18' , 'min' => 0 , 'required' => false]) !!}
    </div>
    <div class="col-sm-1 col-lg-1 remove_stm controls">
      <i class="fa fa-close fa-2x"></i>
    </div>
</div>

<div class="form-group">
    <label for="textfield5" class="col-sm-3 col-lg-2 control-label">@lang('messages.Installments') 24 @lang('messages.Months')</label>
    <div class="col-sm-8 col-lg-9 remove_stm controls">
            {!! Form::number('Installments[24]',($Installments)? $Installments[24] : '',['placeholder'=>__('messages.Installments'),'class'=>'form-control in_24' , 'min' => 0 , 'required' => false]) !!}
    </div>
    <div class="col-sm-1 col-lg-1 remove_stm controls">
      <i class="fa fa-close fa-2x"></i>
    </div>
</div>

<div class="form-group">
  <label for="textfield5" class="col-sm-3 col-lg-2 control-label">sku</label>
  <div class="col-sm-9 col-lg-10 controls">
        {!! Form::text('sku',null,['placeholder'=>'sku','class'=>'form-control']) !!}
  </div>
</div>

<!-- <div class="form-group">
  <label class="col-sm-3 col-lg-2 control-label">@lang('messages.warranty') </label>
  <div class="col-sm-9 col-lg-10 controls" >
      <ul id="myTab1" class="nav nav-tabs">
              <?php $i=0;?>
              @foreach($languages as $language)
                  <li class="{{($i++)? '':'active'}}"><a href="#warranty{{$language->short_code}}" data-toggle="tab"> {{$language->title}}</a></li>
              @endforeach
      </ul>
      <div class="tab-content">
          <?php $i=0;?>
          @foreach($languages as $language)
              <div class="tab-pane fade in {{($i++)? '':'active'}}" id="warranty{{$language->short_code}}">
                  <input class="form-control" name="warranty[{{$language->short_code}}]" value="@if($product){!! $product->getTranslation('warranty',$language->short_code)  !!}@endif" />
              </div>
          @endforeach
      </div>
  </div>
</div>

<div class="form-group">
  <label class="col-sm-3 col-lg-2 control-label">@lang('messages.delivery_time') </label>
  <div class="col-sm-9 col-lg-10 controls" >
      <ul id="myTab1" class="nav nav-tabs">
              <?php $i=0;?>
              @foreach($languages as $language)
                  <li class="{{($i++)? '':'active'}}"><a href="#delivery_time{{$language->short_code}}" data-toggle="tab"> {{$language->title}}</a></li>
              @endforeach
      </ul>
      <div class="tab-content">
          <?php $i=0;?>
          @foreach($languages as $language)
              <div class="tab-pane fade in {{($i++)? '':'active'}}" id="delivery_time{{$language->short_code}}">
                  <input class="form-control" name="delivery_time[{{$language->short_code}}]" value="@if($product){!! $product->getTranslation('delivery_time',$language->short_code)  !!}@endif" />
              </div>
          @endforeach
      </div>
  </div>
</div>

<div class="form-group">
  <label class="col-sm-3 col-lg-2 control-label">@lang('messages.cash_on_delivery') </label>
  <div class="col-sm-9 col-lg-10 controls" >
      <ul id="myTab1" class="nav nav-tabs">
              <?php $i=0;?>
              @foreach($languages as $language)
                  <li class="{{($i++)? '':'active'}}"><a href="#cash_on_delivery{{$language->short_code}}" data-toggle="tab"> {{$language->title}}</a></li>
              @endforeach
      </ul>
      <div class="tab-content">
          <?php $i=0;?>
          @foreach($languages as $language)
              <div class="tab-pane fade in {{($i++)? '':'active'}}" id="cash_on_delivery{{$language->short_code}}">
                  <input class="form-control" name="cash_on_delivery[{{$language->short_code}}]" value="@if($product){!! $product->getTranslation('cash_on_delivery',$language->short_code)  !!}@endif" />
              </div>
          @endforeach
      </div>
  </div>
</div>

<div class="form-group" >
  <label class="col-sm-3 col-lg-2 control-label">@lang('messages.return_or_refund') </label>
  <div class="col-sm-9 col-lg-10 controls" >
      <ul id="myTab1" class="nav nav-tabs">
              <?php $i=0;?>
              @foreach($languages as $language)
                  <li class="{{($i++)? '':'active'}}"><a href="#return_or_refund{{$language->short_code}}" data-toggle="tab"> {{$language->title}}</a></li>
              @endforeach
      </ul>
      <div class="tab-content">
          <?php $i=0;?>
          @foreach($languages as $language)
              <div class="tab-pane fade in {{($i++)? '':'active'}}" id="return_or_refund{{$language->short_code}}">
                  <input class="form-control" name="return_or_refund[{{$language->short_code}}]" value="@if($product){!! $product->getTranslation('return_or_refund',$language->short_code)  !!}@endif" />
              </div>
          @endforeach
      </div>
  </div>
</div> !-->

<div class="form-group"  id="cktextarea">
  <label class="col-sm-3 col-lg-2 control-label">@lang('messages.key_feature') *</label>
  <div class="col-sm-9 col-lg-10 controls" >
      <ul id="myTab1" class="nav nav-tabs">
              <?php $i=0;?>
              @foreach($languages as $language)
                  <li class="{{($i++)? '':'active'}}"><a href="#key_feature{{$language->short_code}}" data-toggle="tab"> {{$language->title}}</a></li>
              @endforeach
      </ul>
      <div class="tab-content">
          <?php $i=0;?>
          @foreach($languages as $language)
              <div class="tab-pane fade in {{($i++)? '':'active'}}" id="key_feature{{$language->short_code}}">
                  <textarea class="form-control col-md-12 key_editor{{$i}}" id="key_editor{{$i}}" name="key_feature[{{$language->short_code}}]" rows="6">
                          @if($product)
                          {!! $product->getTranslation('key_feature',$language->short_code) !!}
                          @endif
                  </textarea>
              </div>
          @endforeach
      </div>
  </div>
</div>

{{-- <div class="form-group">
    <div class="col-sm-6">
        <label class="col-sm-5 col-lg-4 control-label">@lang('messages.special')  </label>
        <div class="col-sm-7 col-lg-8 controls" >
            <input type="hidden" name="special" value ="0">
            {!! Form::checkbox('special',true,null,['placeholder'=>__('messages.special'),'class'=>'form-control']) !!}
        </div>
    </div>
    <div class="col-sm-6">
        <label class="col-sm-5 col-lg-4 control-label">@lang('messages.active')  </label>
        <div class="col-sm-7 col-lg-8 controls" >
            <input type="hidden" name="active" value ="0">
            {!! Form::checkbox('active',true,null,['placeholder'=>__('messages.active'),'class'=>'form-control' ,(!$product)? 'checked' :'']) !!}
        </div>
    </div>
</div> --}}

<div class="form-group">
    <label class="col-sm-3 col-md-2 control-label">@lang('messages.main_image') *</label>
    <div class="col-sm-9 col-md-8 controls">
        <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="fileupload-new img-thumbnail" style="width: 200px; height: 150px;">
                @if($product)
                    <img src="{{$product->main_image}}" alt="" />
                @else
                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                @endif
            </div>
            <div class="fileupload-preview fileupload-exists img-thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
            <div>
                <span class="btn btn-file"><span class="fileupload-new">@lang('messages.select_image')</span>
                    <span class="fileupload-exists">@lang('messages.users.change')</span>
                    {!! Form::file('main_image',["accept"=>"image/*" ,"class"=>"default"]) !!}
                </span>
                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">@lang('messages.users.remove')</a>
            </div>
        </div>
        <span class="label label-important">NOTE!</span>
        <span>Only extensions supported png, jpg, and jpeg</span>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-7 controls">
        <div id="append_image" class="row grid-custom" @if($product && count($product->images) > 0) @else style="display:none"@endif>
            <div class="new_img">

            </div>
            @if($product && count($product->images) > 0)
                @foreach ($product->images as $key=>$item)
                <div class="col-xs-4">
                    <img width="100%" height="100px" src="{{$item->image}}" alt="upload image">
                    <span class="remove-image" onclick="remove_image(event,{{$key}},{{$item->id}})">✖</span>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label">images </label>
    <div class="col-sm-9 col-lg-10 controls">
        <input type="file" name="images[]"   accept="image/*" onchange="loadFile(event)" multiple>
    </div>
</div>
<div style="background:#fff;box-shadow:1px 1px 1px #eee;color:#000" id="propertys">
  <p class="text-center">@lang('front.admin.property.propertys')</p>
  <div class="form-group" v-for="(property,i) in properties_data">
    <div class="col-sm-6">
      <label class="col-sm-5 col-lg-4 control-label">@lang('front.admin.property.title')</label>
      <div class="col-sm-7 col-lg-8 controls">
        <select class="form-control">
          <option :value="properties_data[i].id">@{{properties_data[i].title}}</option>
        </select>
      </div>
    </div>
    <div class="col-sm-6">
      <label class="col-sm-5 col-lg-4 control-label">@lang('front.admin.property_value.value')</label>
      <div class="col-sm-7 col-lg-8 controls" >
        <select class="form-control" @change="setProprtyValue($event)" name="property_value_id[]" :required="i === 0 ? true : false ">
          <option value="">Remove Property</option>
          <option v-for="property_value in properties_data[i].pvalue" :value="property_value.id" @if($product) :selected="!!~jQuery.inArray(property_value.id,{{$product->pr_value->pluck('id') }}) ?'selected' : ''" @endif >@{{property_value.value}}</option>
        </select>
      </div>
    </div>
  </div>
</div>


<div >
  <div class="form-group">
    <div class="col-sm-6">
      <label class="col-sm-5 col-lg-4 control-label">@lang('front.offer')</label>
      <div class="col-sm-7 col-lg-8 controls">
      <div class="offer">
      <label class="switch">
        <input type="checkbox" name="offer" @if($product && $product->offer == 1) checked @endif>
          <span class="slider round"></span>
      </label>
    </div>
      </div>
    </div>
  </div>
</div>


<input type="hidden" id="counter_image" name="counter_img">
<div class="form-group">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
        {!! Form::submit($buttonAction,['class'=>'btn btn-primary']) !!}
    </div>
</div>


