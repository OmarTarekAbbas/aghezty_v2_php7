@extends('template')
@section('page_title')
@lang('messages.products')
@stop
@section('content')
@include('errors')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-bars"></i>@lang('messages.products')</h3>
                <div class="box-tool">
                    <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                    <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="box-content">
                <form method='POST' class="form-horizontal" action='{!!url("products/product_update_price_excel_post")!!}'
                    enctype="multipart/form-data">
                    <input type='hidden' name='_token' value='{{Session::token()}}'>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Excel file</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="input-group">
                                    <div class="form-control uneditable-input">
                                        <i class="fa fa-file fileupload-exists"></i>
                                        <span class="fileupload-preview"></span>
                                    </div>
                                    <div class="input-group-btn">
                                        <a class="btn bun-default btn-file">
                                            <span class="fileupload-new">Select file</span>
                                            <span class="fileupload-exists">Change</span>
                                            <input type="file" name="fileToUpload" required class="file-input">
                                        </a>
                                        <a href="#" class="btn btn-default fileupload-exists"
                                            data-dismiss="fileupload">Remove</a>
                                    </div>
                                </div>
                                <a href="{{url('product_update_price_excel_download')}}">Download Sample</a>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

@stop

@section('script')
<script>
$('#product').addClass('active');
$('#product_create').addClass('active');
</script>
@stop
