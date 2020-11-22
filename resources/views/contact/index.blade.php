@extends('template')
@section('page_title')
	@lang('messages.contact_us')
@stop
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-black">
				<div class="box-title">
					<h3><i class="fa fa-table"></i> @lang('messages.contact_us')</h3>
					<div class="box-tool">
						<a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
						<a data-action="close" href="#"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<div class="box-content">
					<div class="btn-toolbar pull-right">
						<div class="btn-group">
							{{-- <i class="btn btn-circle show-tooltip" title="" href="{{url('contact/create')}}" data-original-title="Add new record"><i class="fa fa-plus"></i></i> --}}
							<?php
								$table_name = "contacts" ;
							?>
							@include('partial.delete_all')
						</div>
					</div>
					<br><br>
					<div class="table-responsive">
						<table id="example" class="table table-striped dt-responsive" cellspacing="0" width="100%">
							<thead>
							<tr>
                                <th style="width:18px"><input type="checkbox" onclick="select_all()"></th>
								<th>@lang('messages.users.email')</th>
								<th>@lang('messages.users.phone')</th>
								<th>@lang('messages.template.message')</th>
                @if(Auth::user()->hasRole('super_admin'))
								<th class="visible-md visible-lg" style="width:130px">@lang('messages.action')</th>
                @endif
							</tr>
							</thead>
							<tbody>
							@foreach($contacts as $contact)
									<tr class="table-flag-blue">
										<th><input type="checkbox" name="selected_rows[]" class="contacts" value="{{$contact->id}}" onclick="collect_selected(this)"></th>
										<td>{{$contact->email}}</td>
										<td>{{$contact->phone}}</td>
										<td>{{$contact->message}}</td>
                    @if(Auth::user()->hasRole('super_admin'))
										<td class="visible-md visible-lg">
											<div class="btn-group">
												<a class="btn btn-sm btn-danger show-tooltip" title="" onclick="return confirm('Are you sure you want to delete this ?');" href="{{url('contact/'.$contact->id.'/delete')}}" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
											</div>
										</td>
                    @endif
									</tr>
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop

@section('script')
	<script>
		$('#contact').addClass('active');
		$('#contact-index').addClass('active');
	</script>
@stop
