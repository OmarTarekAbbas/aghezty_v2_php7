@extends('template')
@section('page_title')
@lang('messages.products')
@stop
@section('content')
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
                <a class="btn btn-circle show-tooltip" title="" href="{{url('product/create'.$append)}}"
                  data-original-title="Add new record"><i class="fa fa-plus"></i></a>
                <a onclick="remove_all()" class="btn btn-circle btn-danger show-tooltip"
                  title="@lang('messages.template.delete_many')" href="#"><i class="fa fa-trash-o"></i></a>
                <a class="btn btn-sm show-tooltip" onclick="change()" title="@lang('messages.edit')"><i
                    class="fa fa-edit"></i></a>
                <form action="{{route('admin.product.delete.all')}}" style="display:none;" id="delete_all"
                  method="post">
                  @csrf
                  <input type="text" name="product_ids" class="product_ids" value="">
                </form>
                <div class="modal fade" id="change_column" tabindex="-1" role="dialog"
                  aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" style="width:60%!important" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Some Of Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="{{route('admin.product.update.all')}}" method="post">
                          @csrf
                          <div class="row">
                            <div class="col-md-12">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-book"></i></span>
                                {!! Form::select('column',['price' => 'Price','discount' =>
                                'Discount%','minus'=>'Money Discount','short_description' => 'Model','stock' => 'Stock','sku'=>'Sku','active' =>
                                'active' , 'brand_id' => 'Brands' , 'category_id' =>
                                'Categories'],null,['class'=>'form-control edit_select']) !!}
                              </div>
                            </div>
                            <div class="col-md-12 normal">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-smile-o"></i></span>
                                {!! Form::text('value',null,['class'=>'form-control']) !!}
                              </div>
                            </div>
                            <div class="col-md-12 sel_category" style="display:none">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-smile-o"></i></span>
                                <select name="value" id="cate" class="form-control" disabled>
                                  @foreach (categorys() as $category)
                                  @if(count($category->sub_cats) > 0)
                                  <optgroup label="{{$category->title}}">
                                    @foreach ($category->sub_cats as $sub_category)
                                    <option value="{{$sub_category->id}}">{{$sub_category->title}}</option>
                                    @endforeach
                                  </optgroup>
                                  @endif
                                  @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="col-md-12 sel_brand" style="display:none">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-smile-o"></i></span>
                                {!! Form::select('value',brands()->pluck('title','id'),null,['class'=>'form-control','disabled'])
                                !!}
                              </div>
                            </div>
                            <input type="text" style="display:none;" name="product_ids" class="edit_product_ids"
                              value="">
                            <button type="submit" class="btn btn-primary pull-right mr-2">Save</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <br><br>
            <div data-check-all-container class="table-responsive">
              <form class="form-group form-search" id="filter_form" method="post">
                @csrf
                <div class="container">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                        <input type="text" class="form-control" placeholder="Search.." name="search"
                          placeholder="Email">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                        <input name="search_model" type="text" class="form-control"
                          placeholder="Search For Multiple Model">
                      </div>
                    </div>
                    <div class="col-md-5">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                        <input name="sku" type="text" class="form-control" placeholder="Search For Multiple sku">
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-book"></i></span>
                        <select name="category_id[]" class="form-control chosen-rtl" multiple>
                          @foreach (categorys() as $category)
                          @if(count($category->sub_cats) > 0)
                          <optgroup label="{{$category->title}}">
                            @foreach ($category->sub_cats as $sub_category)
                            <option value="{{$sub_category->id}}">{{$sub_category->title}}</option>
                            @endforeach
                          </optgroup>
                          @endif
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-book"></i></span>
                        {!! Form::select('brand_id[]',brands()->pluck('title','id'),null,['class'=>'form-control
                        chosen-rtl','required' , 'multiple']) !!}
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-book"></i></span>
                        {!! Form::select('limit',array_combine(range(10,500,10),
                        range(10,500,10)),null,['class'=>'form-control chosen-rtl','required']) !!}
                      </div>
                    </div>
                    <div class="col-md-1">
                      <button class="btn btn-small btn-primary" type="button" onclick="Search()"> submit </button>
                    </div>
                  </div>
                </div>
              </form>
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" style="width:60%!important" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body edit_body">

      </div>
    </div>
  </div>
</div>
@stop

@section('script')
<script>
  $('#product').addClass('active');
  $('#product_index').addClass('active');

  function Search() {

    $.ajax({
        url: "{{url('product')}}",
        type: "get",
        data: $('#filter_form').serialize(),
      }).done(function (data) {
        $("#tag_container").empty().html(data);
      })

      .fail(function (jqXHR, ajaxOptions, thrownError) {
        console.log('No response from server');
      });
  }

</script>

<script type="text/javascript">
  $(window).on('hashchange', function () {
    if (window.location.hash) {
      var page = window.location.hash.replace('#', '');
      if (page == Number.NaN || page <= 0) {
        return false;
      } else {
        getData(page, 0);
      }
    }
  });

  $(document).ready(function () {
    $(document).on('click', '.pagination a', function (event) {
      event.preventDefault();
      $('li').removeClass('active');
      $(this).parent('li').addClass('active');
      var myurl = $(this).attr('href');
      var page = $(this).attr('href').split('page=')[1];
      let url = new URL($(this).attr('href'));
      search = url.searchParams // to get search_value from url
      getData(page, search);
    });

  });

  function getData(page, value, id = null) {
    $('#page_number').val(page)
    append = '';
    if (value) {
      append = value
    }
    $.ajax({
        url: '?' + append,
        type: "get",
        datatype: "html"
      })
      .done(function (data) {
        $("#tag_container").empty().html(data);
        if (id) {
          $('#product_' + id).addClass('highlight')
        }
      })
      .fail(function (jqXHR, ajaxOptions, thrownError) {
        console.log('No response from server');
      });



  }

</script>

{{-- edit product with ajax --}}
<script>
  $(document).on('click', '.edit-ajax', function (e) {
    e.preventDefault()
    href_url = $(this).data('href')
    $.ajax({
        url: href_url,
        type: "get",
        datatype: "html"
      })
      .done(function (data) {
        $(".edit_body").empty().html(data);
        //location.hash = page;
      })
      .fail(function (jqXHR, ajaxOptions, thrownError) {
        console.log('No response from server');
      });
    $('#exampleModal').modal('show')
    if ($('#myTable a').parents('tr').hasClass('highlight')) {
      $('#myTable a').parents('tr').removeClass('highlight')
    }
    $(this).parents('tr').addClass('highlight')


  })
  $(document).on('submit', '.edit-form', function (e) {
    e.preventDefault();
    $.ajax({
      url: $(this).attr('action'),
      data: new FormData($(this)[0]),
      processData: false,
      contentType: false,
      type: 'post',
      success: function (data) {
        $('#exampleModal').modal('hide')
        input = document.getElementById("myInput");
        filter = input.value ? input.value : 0
        getData($('#page_number').val(), filter, data.id);
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
  $('.recently_added .switch input').change(function () {
    var x = $(this).siblings();
    $.ajax({
      type: 'GET',
      url: '{{url("homepage/recently_added")}}',
      headers: '_token = {{ csrf_token() }}',
      data: {
        switch: $(this).is(':checked'),
        id: $(this).attr('id')
      },
      success: function (data) {
        if (data == 'no') {
          alert('max product to select is 6!');
          x.trigger('click');
        }
      }
    });
  })

</script>


<script>
  $('.selected_for_you .switch input').change(function () {
    var x = $(this).siblings();
    $.ajax({
      type: 'GET',
      url: '{{url("homepage/selected_for_you")}}',
      headers: '_token = {{ csrf_token() }}',
      data: {
        switch: $(this).is(':checked'),
        id: $(this).attr('id')
      },
      success: function (data) {
        if (data == 'no') {
          alert('max product to select is 6!');
          x.trigger('click');
        }
      }
    });
  })

</script>

<script>
  $(document).on('change', '.recently_added .switch input', function () {
    var x = $(this).siblings();
    $.ajax({
      type: 'GET',
      url: '{{url("homepage/recently_added")}}',
      headers: '_token = {{ csrf_token() }}',
      data: {
        switch: $(this).is(':checked'),
        id: $(this).attr('id')
      },
      success: function (data) {
        if (data == 'no') {
          alert('max product to select is 6!');
          //x.trigger('click');
        }
      }
    });
  })

</script>


<script>
  $(document).on('change', '.selected_for_you .switch input', function () {
    var x = $(this).siblings();
    $.ajax({
      type: 'GET',
      url: '{{url("homepage/selected_for_you")}}',
      headers: '_token = {{ csrf_token() }}',
      data: {
        switch: $(this).is(':checked'),
        id: $(this).attr('id')
      },
      success: function (data) {
        if (data == 'no') {
          alert('max product to select is 6!');
          //x.trigger('click');
        }
      }
    });
  })

</script>

<script type="text/javascript" src="{{ asset('js/check-all.umd.js') }}"></script>
<script type="text/javascript">
  var x = checkAll.default(document.querySelector('[data-check-all-container]'))

  function remove_all() {
    var str = ''
    $('.select_all_template').each(function () {
      if (this.checked) {
        str += $(this).val() + ','
      }
    });
    $('.product_ids').val(str.slice(0, -1))
    if (confirm("are you Sure ?")) {
      $('#delete_all').submit()
    }
  }

  function change() {
    var str = ''
    $('.select_all_template').each(function () {
      if (this.checked) {
        str += $(this).val() + ','
      }
    });
    $('.edit_product_ids').val(str.slice(0, -1))
    $('#change_column').modal('show')
  }

</script>
<script>
  $('.edit_select').change(function () {
    if ($(this).val() == 'brand_id') {
      $('.sel_brand').css('display', 'block')
      $('.sel_category').css('display', 'none')
      $('.normal').css('display', 'none')

      $('.sel_brand select').prop('disabled', false)
      $('.sel_category select').prop('disabled', true)
    } else if ($(this).val() == 'category_id') {
      $('.sel_brand').css('display', 'none')
      $('.sel_category').css('display', 'block')
      $('.normal').css('display', 'none')

      $('.sel_brand select').prop('disabled', true)
      $('.sel_category select').prop('disabled', false)
    } else {
      $('.sel_brand').css('display', 'none')
      $('.sel_category').css('display', 'none')
      $('.normal').css('display', 'block')
      $('.sel_brand select').prop('disabled', true)
      $('.sel_category select').prop('disabled', true)
    }

  })

</script>
@stop
