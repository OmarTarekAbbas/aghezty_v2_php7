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
{!! Form::model($product,["url"=>"product/$product->id","class"=>"form-horizontal edit-form","method"=>"patch","files"=>"True"]) !!}
    @include('product.input',['buttonAction'=>'Edit','required'=>'  (optional)'])
{!! Form::close() !!}
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
      $('.price_after').val($('.price').val() - (($(this).val()/100) * $('.price').val()))
    })


    CKEDITOR.replace( 'ckeditor1' );
    CKEDITOR.replace( 'ckeditor2' );
    CKEDITOR.replace( 'key_editor1' );
    CKEDITOR.replace( 'key_editor2' );
</script>
