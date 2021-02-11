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
                    <h3><i class="fa fa-table"></i> @lang('messages.number_of_visitors')</h3>
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
                                    <a href="#0">

                                        <div class="tile tile-green">
                                            <div class="img">
                                                <i class="fa fa-copy"></i>
                                            </div>
                                            <div class="content">
                                                <p class="big">+{{($report_ips->count())}}</p>
                                                <p class="title">@lang('messages.number_of_visitors')</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-12">
                                    <div class="box box-black">
                                    <form class="form-group form-search" action="{{ url('reports') }}" id="filter_form" method="get">
                                        <div class="container">
                                          <div class="row">
                                            <div class="col-md-9">
                                              <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-calender"></i></span>
                                                <input type="date" class="form-control formCode" placeholder="Search.." name="search">
                                              </div>
                                            </div>
                                            <div class="col-md-3">
                                              <button class="btn btn-primary" type="submit"> Search </button>
                                            </div>
                                          </div>
                                        </div>
                                      </form>
                                        <div class="box-content">

                                            <br><br>
                                            <div class="table-responsive">

                                                <div class="table-responsive">
                                                    <table id="" class="table table-striped dt-responsive"
                                                        cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th>date</th>
                                                                <th>count</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tablecontents">
                                                            @foreach($entery_users as $key=>$entery_user)
                                                            <tr class="table-flag-blue">
                                                                <td>{{ $entery_user->date }}</td>
                                                                <td>{{ $entery_user->total }}</td>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
@section('script')
<script type="text/javascript" src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
$(function() {
    $("#example").DataTable();

});
</script>
<script>
$('#report').addClass('active');
$('#report_count').addClass('active');
</script>
@stop
