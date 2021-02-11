@extends('template')
@section('page_title')
{{ $brand->getTranslation("title", getCode()) }}
@stop
@section('content')
    @include('errors')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="fa fa-bars"></i>{{ $brand->getTranslation("title", getCode()) }}</h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    {!! Form::model($brand,["url"=>"brands/$brand->id/discount","class"=>"form-horizontal","method"=>"post","files"=>"True"]) !!}
                    <div class="form-group">
                        <label for="textfield5" class="col-sm-3 col-lg-2 control-label">@lang('messages.category')</label>
                        <div class="col-sm-9 col-lg-10 controls">
                          {!! Form::select('category_id',$categories->pluck('title','id'),null ,['class'=>'form-control chosen-rtl']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="textfield5" class="col-sm-3 col-lg-2 control-label">@lang('messages.discount')</label>
                      <div class="col-sm-8 col-lg-9 remove_stm controls">
                              {!! Form::number('discount',null,['placeholder'=>__('messages.discount'),'class'=>'form-control' , 'min' => 0 , 'required' => true]) !!}
                      </div>
                      <div class="col-sm-1 col-lg-1 remove_stm controls">
                        %
                      </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
                            {!! Form::submit("save",['class'=>'btn btn-primary']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>

        </div>

    </div>

@stop
@section('script')
    <script>

        $('#brand').addClass('active');
        $('#brand_create').addClass('active');

    </script>
@stop
