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
<style media="screen">
  .pagination {
    float: right;
  }

  #myInput {
    background-image: url('/css/searchicon.png');
    background-position: 10px 10px;
    background-repeat: no-repeat;
    width: 100%;
    font-size: 16px;
    padding: 12px 20px 12px 40px;
    border: 1px solid #ddd;
    margin-bottom: 12px;
  }

  .highlight {
    background-color: #8fe090 !important;
  }

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

  input:checked+.slider {
    background-color: #2196F3;
  }

  input:focus+.slider {
    box-shadow: 0 0 1px #2196F3;
  }

  input:checked+.slider:before {
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
const property = new Vue({
  el:'#propertys',
  data:{
    category_id : '',
    properties_data : [],
  },
  methods: {
    setProprtyValue(event){
      console.log(event.target.value);
    }
  },
  watch: {
    category_id:function(val){
      var _this = this
      $.get("{{url('property?category_id=')}}"+val,function(data,status){
          _this.properties_data = data
      })
    }
  },
  created() {
    var _this = this
    this.category_id = $('#cate').find("option:selected").val()
    $('#cate').change(function(){
      _this.category_id = $(this).find("option:selected").val()
    })
  },
  mounted() {
    var _this = this
    this.category_id = $('#cate').find("option:selected").val()
    $('#cate').change(function(){
      _this.category_id = $(this).find("option:selected").val()
    })
  }
})
</script>
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
      $('.price_after').val(Math.ceil( $('.price').val() - (($(this).val()/100) * $('.price').val()) ))
    })

    // $('.price_after').keyup(function(){
    //   $('.discount').val(Math.ceil(($('.price').val() - ($('.price_after').val()) *100) / $('.price').val() ))
    // })
    $('.price').keyup(function(){
      $('.in_6').val(parseInt($('.price').val() / 6))
      $('.in_12').val(parseInt($('.price').val() / 12))
      $('.in_18').val(parseInt($('.price').val() / 18))
      $('.in_24').val(parseInt($('.price').val() / 24))
    })

    $('.remove_stm').click(function(){
      console.log($(this).parent().find('input'));
      $(this).parent().find('input').val('');
    })


    CKEDITOR.replace( 'ckeditor1' );
    CKEDITOR.replace( 'ckeditor2' );
    CKEDITOR.replace( 'key_editor1' );
    CKEDITOR.replace( 'key_editor2' );

</script>
@stop
