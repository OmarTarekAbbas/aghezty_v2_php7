@extends('template')
@section('page_title')
  @lang('messages.products')
@stop
@section('content')
<style>
.grid-custom img {
        margin-bottom: 3px;
        border-radius: 4px;
    }

    .grid-custom {
        background: #d59a878c;
        border-radius: 7px;
        border: 3px solid #eee;
        padding: 5px;
    }

    .remove-image{
      position: absolute;
      cursor: pointer;
      background-color: #e40b0b;
      color: white;
      top: -1px;
      right: 15px;
      padding: 0 3px;
      font-size: 13px;
      -webkit-border-radius: 5px;
      -moz-border-radius: 5px;
      border-radius: 5px;
    }
</style>
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
                    @if($product)
                    {!! Form::model($product,["url"=>"product/$product->id","class"=>"form-horizontal","method"=>"patch","files"=>"True"]) !!}
                    @include('product.input',['buttonAction'=>'Edit','required'=>'  (optional)'])
                    @else
                    {!! Form::open(["url"=>"product","class"=>"form-horizontal","method"=>"POST","files"=>"True"]) !!}
                    @include('product.input',['buttonAction'=>__('messages.save'),'required'=>'  *'])
                    @endif
                    {!! Form::close() !!}
                </div>
            </div>

        </div>

    </div>

@stop
@section('script')
    <script>

        $('#product').addClass('active');
        $('#product_create').addClass('active');
        var counter_img = [];
        function loadFile(event)
        {
            $('#append_image .new_img').empty()
            for (var i = 0; i < event.target.files.length; i++) {
                var image_url = URL.createObjectURL(event.target.files[i])
                var x = ' <div class="col-xs-4">\
                            <img width="100%" height="100px" src="'+image_url+'" alt="upload image">\
                        </div>';
                $('#append_image').css('display','block')
                $('#append_image .new_img').append(x);
            }

        }
        function remove_image(event,key,item_id=null)
        {

            event.target.parentElement.remove()
            counter_img.push(key)
            if(item_id){
                $.get("{{url('delete_image/')}}/"+item_id,function(data,status){
                    console.log(status);
                });
            }
            else{
                $('#counter_image').val(counter_img)
            }


        }
        $('.discount').keyup(function(){
            $('.price_after').val($('.price').val() - (($(this).val()/100) * $('.price').val()))
        })
        $('#cate').change(function(){
          if($(this).find("option:selected").text().toLowerCase() == 'tv'){
            $('.inch').show()
          }
          else{
            $('.inch').hide()
          }
        })
    </script>
@stop
