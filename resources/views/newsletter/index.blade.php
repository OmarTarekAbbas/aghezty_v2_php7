@extends('template')
@section('page_title')
 @lang('messages.newsletter')
@stop
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="row">

            <div class="col-md-12">
                <div class="box box-black">
                    <div class="box-title">
                        <h3><i class="fa fa-table"></i> @lang('messages.newsletter')</h3>
                        <div class="box-tool">
                            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="box-content">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped dt-responsive" cellspacing="0" width="100%">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>@lang('messages.mail')</th>
                                        @if(auth()->user()->id == 1)
                                        <th>@lang('messages.action')</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($newsletters as $newsletter)
                                    <tr>
                                        <td>{{$newsletter->id}}</td>
                                        <td>{{$newsletter->mail}}</td>
                                        @if(auth()->user()->id == 1)
                                        <td>
                                          <a class="btn btn-sm show-tooltip btn-danger" onclick="return ConfirmDelete();" href="{{url("newsletter/".$newsletter->id."/delete")}}" title="Delete"><i class="fa fa-trash"></i></a>
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
    </div>

</div>

@stop

@section('script')
<script>


    $('#advertisement').addClass('active');
    $('#advertisement_index').addClass('active');

</script>
@stop
