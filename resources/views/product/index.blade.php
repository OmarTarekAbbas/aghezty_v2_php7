@extends('template')
@section('page_title')
 @lang('messages.products')
@stop
@section('content')
  <style media="screen">
    .pagination{
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


  @php
      $append=isset($category)?'?category_id='.$category->id."&title=".$category->title:'';
  @endphp
<div class="row">
    <div class="col-md-12">
        <div class="row">

            <div class="col-md-12">
                <div class="box box-black">
                    <div class="box-title">
                        <h3><i class="fa fa-table"></i> @lang('messages.products')</h3>
                        <div class="box-tool">
                            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="box-content">
                        <div class="btn-toolbar pull-right">
                            <div class="btn-group">
                                <a class="btn btn-circle show-tooltip" title="" href="{{url('product/create'.$append)}}" data-original-title="Add new record"><i class="fa fa-plus"></i></a>
                                <?php
                                $table_name = "products";
                                // pass table name to delete all function
                                // if the current route exists in delete all table flags it will appear in view
                                // else it'll not appear
                                ?>
                                @include('partial.delete_all')
                            </div>
                        </div>
                        <br><br>
                        <div class="table-responsive">
                          <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

                          <div id="tag_container">
                                @include('product.result')
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<input type="hidden" id="page_number" value="1" name="">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:60%!important" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>
@stop

@section('script')
<script>

    $('#product').addClass('active');
    $('#product_index').addClass('active');

    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value
        $.ajax({
            url: "{{url('product')}}",
            type: "get",
            data:{
                'search_value' : filter
            }
        }).done(function(data)
            {
                $("#tag_container").empty().html(data);
            })

            .fail(function(jqXHR, ajaxOptions, thrownError)
            {
                console.log('No response from server');
            });
    }
</script>

<script type="text/javascript">

	$(window).on('hashchange', function() {
	        if (window.location.hash) {
	            var page = window.location.hash.replace('#', '');
	            if (page == Number.NaN || page <= 0) {
	                return false;
	            }else{
	                getData(page,0);
	            }
	        }
        });

	$(document).ready(function()
	{
	     $(document).on('click', '.pagination a',function(event)
	    {
	        event.preventDefault();
	        $('li').removeClass('active');
	        $(this).parent('li').addClass('active');
	        var myurl = $(this).attr('href');
            var page=$(this).attr('href').split('page=')[1];
            let url = new URL($(this).attr('href'));
            search = url.searchParams.get('search_value') ? url.searchParams.get('search_value') : 0;  // to get search_value from url
            console.log(search);
	        getData(page,search);
	    });

	});
	function getData(page , value , id=null){
        $('#page_number').val(page)
        append = '';
        if(value){
            append = '&search_value='+ value
        }
	        $.ajax(
	        {
	            url: '?page=' + page+append,
	            type: "get",
	            datatype: "html"
	        })
	        .done(function(data)
	        {
	            $("#tag_container").empty().html(data);
	            if(id){
                    $('#product_'+id).addClass('highlight')
                }
	        })
	        .fail(function(jqXHR, ajaxOptions, thrownError)
	        {
	              console.log('No response from server');
	        });



	}

</script>

{{-- edit product with ajax --}}
<script>
    $(document).on('click','.edit-ajax',function(e){
        e.preventDefault()
        href_url = $(this).data('href')
        $.ajax(
	        {
	            url:href_url,
	            type: "get",
	            datatype: "html"
	        })
	        .done(function(data)
	        {
	            $(".modal-body").empty().html(data);
	            //location.hash = page;
	        })
	        .fail(function(jqXHR, ajaxOptions, thrownError)
	        {
	              console.log('No response from server');
	        });
        $('#exampleModal').modal('show')
        if($('#myTable a').parents('tr').hasClass('highlight')){
            $('#myTable a').parents('tr').removeClass('highlight')
        }
        $(this).parents('tr').addClass('highlight')


    })
    $(document).on('submit','.edit-form',function(e){
        e.preventDefault();
        $.ajax({
            url:$(this).attr('action'),
            data:new FormData($(this)[0]),
            processData: false,
            contentType: false,
            type:'post',
            success:function(data){
                $('#exampleModal').modal('hide')
                input = document.getElementById("myInput");
                filter = input.value ? input.value:0
                getData($('#page_number').val(),filter,data.id);
            }
        })
    })

    // $("#myTable a").click(function () {
    //     var selected = $(this).parents('tr').hasClass("highlight");
    //     $("#myTable a").parents('tr').removeClass("highlight");
    //     if (!selected)
    //         $(this).parents('tr').addClass("highlight");
    // });
</script>

<script>
	$('.recently_added .switch input').change(function(){
        var x = $(this).siblings();
		$.ajax({
               type:'GET',
               url:'{{url("homepage/recently_added")}}',
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
            }
		});
	})
</script>


<script>
	$('.selected_for_you .switch input').change(function(){
        var x = $(this).siblings();
		$.ajax({
            type:'GET',
            url:'{{url("homepage/selected_for_you")}}',
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
            }
		});
	})
</script>

<script>
    $(document).on('change','.recently_added .switch input',function(){
      var x = $(this).siblings();
      $.ajax({
        type:'GET',
        url:'{{url("homepage/recently_added")}}',
        headers:'_token = {{ csrf_token() }}',
        data: {
          switch: $(this).is( ':checked'),
          id: $(this).attr('id')
        },
        success: function(data) {
            if(data == 'no'){
                alert('max product to select is 6!');
                //x.trigger('click');
            }
        }
      });
    })
  </script>


  <script>
    $(document).on('change','.selected_for_you .switch input',function(){
      var x = $(this).siblings();
      $.ajax({
        type:'GET',
        url:'{{url("homepage/selected_for_you")}}',
        headers:'_token = {{ csrf_token() }}',
        data: {
          switch: $(this).is( ':checked'),
          id: $(this).attr('id')
        },
        success: function(data) {
            if(data == 'no'){
                alert('max product to select is 6!');
                //x.trigger('click');
            }
        }
      });
    })
  </script>
@stop
