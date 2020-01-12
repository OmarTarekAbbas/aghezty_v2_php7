@extends('template')
@section('styles')

<style>
.col-sm-9.col-lg-10.controls {
    padding: 10px;
}
/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
  margin: 0px !important;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
    
@endsection

@section('page_title')
  @lang('messages.slides')
@stop
@section('content')
    @include('errors')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="fa fa-bars"></i>@lang('messages.slides')</h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content">
				 {!! Form::open(["url"=>url('slides/'.$slide->id.'/edit'),"class"=>"form-horizontal","method"=>"post","files"=>"True"]) !!}
				<br>			
				<br>			
				<br>
				<div class="form-group">
				    <label class="col-sm-3 col-lg-2 control-label"> @lang('messages.image') <span class="text-danger">*</span></label>
				    <div class="col-sm-9 col-lg-10 controls">
					   {!! Form::file('file',null,['placeholder'=>'120.00','class'=>'form-control input-lg']) !!}
				    </div>
				</div>
				<br>			
				<br>			
				<br>			
				<div class="form-group">
					<label class="col-sm-3 col-lg-2 control-label"></label>
					<div class="col-sm-9 col-lg-10 controls">
						<img width="300px" src="{{$slide->image}}" alt="{{$slide->ads_url}}">
					</div>
				</div>
				<br>			
				<br>			
				<br>			

				<div class="form-group">
				    <label class="col-sm-3 col-lg-2 control-label"> @lang('messages.url') <span class="text-danger">*</span></label>
				    <div class="col-sm-9 col-lg-10 controls">
					   {!! Form::text('slide_url',null,['placeholder'=>'url','class'=>'form-control input-lg','value' => '{{$slide->ads_url}}']) !!}
				    </div>
				</div>
				<br>			
				<br>			
				<br>			

				<div class="form-group">
					<label class="col-sm-3 col-lg-2 control-label switch"> @lang('messages.active') <span class="text-danger">*</span></label>
					<div class="col-sm-9 col-lg-10 controls">
						<label id="{{$slide->id}}" class="switch">
							<input id="{{$slide->id}}" type="checkbox" name="switch" {{$slide->active? 'checked':''}}>
							<span class="slider round"></span>
						</label>
					</div>
				</div>
				<br>			
				<br>			
				<br>			

				<div class="form-group text-center">
				    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
					   {!! Form::submit('edit',['class'=>'btn btn-primary']) !!}
				    </div>
				</div>
				<br>			
				<br>			
				<br>			
				<br>			
				<br>			
                    {!! Form::close() !!}
			</div>
            </div>

        </div>

    </div>

@stop
@section('script')
<script>
	$('.switch input').change(function(){
		$.ajax({
               type:'GET',
               url:'{{url("homepage/change_state")}}',
               headers:'_token = {{ csrf_token() }}',
			data: {
				switch: $(this).is( ':checked'),
				id: $(this).attr('id')
			}
		});
	})
	</script>

@stop
