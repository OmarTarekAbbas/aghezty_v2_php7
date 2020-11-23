@extends('template')
@section('page_title')
	@lang('messages.request_product')
@stop
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-black">
				<div class="box-title">
					<h3><i class="fa fa-table"></i> @lang('messages.request_product')</h3>
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
                                <th>@lang('messages.users.user_name')</th>
								<th>@lang('messages.users.email')</th>
								<th>@lang('messages.users.phone')</th>
                                <th>@lang('front.product')</th>
                                <th>@lang('messages.users.address')</th>
								<th class="visible-md visible-lg" style="width:130px">@lang('messages.action')</th>
                
							</tr>
							</thead>
							<tbody>
							@foreach($contacts as $contact)
									<tr class="table-flag-blue">
                                        <th><input type="checkbox" name="selected_rows[]" class="contacts" value="{{$contact->id}}" onclick="collect_selected(this)"></th>
                                        <th>{{$contact->name}}</th>
										<td>{{$contact->email}}</td>
										<td>{{$contact->phone}}</td>
                                        <td>{{$contact->product->getTranslation('title',getCode())}}</td>
                                        <td>{{$contact->city['city_'.getcode()]}},{{$contact->city->governorate['title_'.getcode()]}}</td>
                                          <td class="visible-md visible-lg">
                                            <div class="btn-group">
                                                                      <a class="btn btn-sm btn-default show-tooltip send_message" title="Send Message" data-lang="{{$contact->lang}}" data-con_id="{{$contact->id}}" data-product_id="{{$contact->product_id}}" data-toggle="modal" data-target="#myModal" data-original-title="Send Message"><i class="fa fa-envelope"></i></a>
                                                                      <a class="btn btn-sm btn-info show-tooltip" title="Show Product" href="{{url("product/".$contact->product_id."/edit")}}" data-original-title="Show Product" target="_blank"><i class="fa fa-forward"></i></a>
                                                                      @if(Auth::user()->hasRole('super_admin'))

                                              <a class="btn btn-sm btn-danger show-tooltip" title="" onclick="return confirm('Are you sure you want to delete this ?');" href="{{url('contact/'.$contact->id.'/delete')}}" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                              @endif
                                            </div>
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
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">@lang('messages.campain.send-message')</h4>
            </div>
            <div class="modal-body">
                <form action="{{url("unavailable")}}" id="form_data" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="product_id" value="" id="product_id">
                    <textarea name="subject" id="subject" rows="10" placeholder="@lang('messages.text-messages')" style="width:100%"></textarea>
                    <button type="submit" class="btn btn-success">@lang('messages.send')</button>
                </form>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('front.close')</button>
            </div>
            </div>

        </div>
    </div>
@stop

@section('script')
	<script>
		$('#request_product').addClass('active');
		$('#request_product_index').addClass('active');

        $('.send_message').click(function(){
            p_id = $(this).data('product_id')
            c_id = $(this).data('con_id')
            lang = $(this).data('lang')
            $('#form_data').attr('action','{{url("unavailable")}}/'+c_id)
            $('#product_id').val(p_id)
            $('#subject').css('direction',lang == 'ar'? 'rtl':'ltr')
        })
	</script>
@stop
