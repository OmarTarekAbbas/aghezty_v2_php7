@extends('template')
@section('page_title')
    @lang('messages.reports')
@stop
@section('content')
	@include('errors')
<!-- BEGIN Content -->
<div id="main-content">
	<div class="row">
	    <div class="col-md-12">
	        <div class="box box-black">
	            <div class="box-title">
	                <h3><i class="fa fa-table"></i> @lang('messages.reports')</h3>
	                <div class="box-tool">
	                    <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
	                    <a data-action="close" href="#"><i class="fa fa-times"></i></a>
	                </div>
	            </div>
	            <div class="box-content">
					<div class="btn-toolbar pull-right">
						<div class="btn-group">
							
						</div>
					</div>
					<br><br>
					<div class="table-responsive">
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-12">
								<a href="#0" >

									<div class="tile tile-green">
										<div class="img">
											<i class="fa fa-copy"></i>
										</div>
										<div class="content">
											<p class="big">+{{(App\IpAddress::count())}}</p>
											<p class="title">Visit Website</p>
										</div>
									</div>
								</a>
							</div>
							</div>
						</div>
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
	$('#report').addClass('active');
	$('#report_count').addClass('active');
	</script>
@stop
