@extends('template')
@section('styles')

<style>
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
    @lang('messages.homepage')
@stop
@section('content')
	@include('errors')
<!-- BEGIN Content -->
<div id="main-content">
	<div class="row">
	    <div class="col-md-12">
	        <div class="box box-black">
	            <div class="box-title">
	                <h3><i class="fa fa-table"></i> @lang('messages.homepage')</h3>
	                <div class="box-tool">
	                    <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
	                    <a data-action="close" href="#"><i class="fa fa-times"></i></a>
	                </div>
	            </div>
	            <div class="box-content">
					<br><br>
					<div class="table-responsive">
						<table id="example" class="table table-striped dt-responsive" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>@lang('messages.campain.title')</th>
								<th>@lang('messages.image')</th>
								<th>@lang('messages.active')</th>
							</tr>
						</thead>
						<tbody id="tablecontents">
						@foreach($selected_HPcat as $slide)
                                   <tr id="item-{{$slide->id}}" class="table-flag-blue">
                                   <td>{{$slide->title}}</td>
							<td><img width="300px" src="{{url($slide->image)}}" alt="{{$slide->title}}"></td>
							<td>
								<label class="switch">
									<input id="{{$slide->id}}" type="checkbox" name="switch" {{$slide->homepage? 'checked':''}}>
									<span class="slider round"></span>
								</label>
							</td>
							</tr>
						@endforeach
						</tbody>
						</table>
					</div>
	            </div>
	        </div>
	    </div>
	</div>
</div>

@stop
@section('script')
    <script type="text/javascript" src="//code.jquery.com/ui/1.12.1/jquery-ui.js" ></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">

    $(function () {
    	$("#example").DataTable();

    });

    </script>
	<script>
	$('#homepage').addClass('active');
	$('#selected_HPcat').addClass('active');
     </script>
     
     <script>
          $('.switch input').change(function(){
             var x = $(this).parent().parent().parent();
               $.ajax({
                    type:'GET',
                    url:'{{url("homepage/homepage_category")}}',
                    headers:'_token = {{ csrf_token() }}',
                    data: {
                         switch: $(this).is( ':checked'),
                         id: $(this).attr('id')
                    },
                 success: function(data) {
                     if(data == 'no'){
                      alert('max product to select is 6!');
                         x.trigger('click');
                     }
                     if(data == 'yes'){
                         x.fadeOut('300');
                     }
                 }
               });
          })
     </script>
     

	
@stop
