@extends('frontv2.master')
@section('content')

<style>
nav.container-fluid {
  padding-right: 0 !important;
  padding-left: 0 !important;
}
</style>

<link rel="stylesheet" href="{{asset('front/css/loader.css')}}">

<!-- start container -->
<div class="main">
  <nav class="mobile_views nav_breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ route('front.home.index')}}" title="Go To Home">@lang('front.home')</a>
      </li>
      @if(isset($_REQUEST['sub_category_id']) && isset($products[0]))
      <li class="breadcrumb-item active" aria-current="page">{{$products[0]->category->getTranslation('title',getCode())}}</li>
      @elseif(isset($_REQUEST['brand_id']) && isset($products[0]))
      <li class="breadcrumb-item active" aria-current="page">{{$products[0]->brand->getTranslation('title',getCode())}}</li>
      @else
      <li class="breadcrumb-item active" aria-current="page">@lang('front.products')</li>
      @endif
    </ol>
  </nav>

  <div class="mobile_views">
    <!-- start row -->
    <div class="row">
      <!-- start col-md-2 -->
      <button type="button" id="button_jq" class="btn btn-dark d-md-none" data-toggle="modal"
        data-target="#exampleModal">
        <i class="fas fa-sliders-h" data-toggle="modal" data-target="#exampleModal"></i>
      </button>

      <!-- Start Filter Search -->
      <div id="toggle_plus_minus" class="col-md-2 d-none d-md-block">
        <form id="filter_form" method="post">
          @csrf
          @foreach (filter_categorys() as $item)
          @if(count($item->sub_cats) > 0)
          <button type="button"
            class="accordion active w-100 border border-light">{{$item->getTranslation('title',getCode())}}
            <i class="fas fa-minus float-right"></i>
          </button>

          <div class="panel mb-3 w-100 border border-light">
            @if (request()->has('brand_id'))

              @php
              $subs = \App\Category::join('products','products.category_id','=','categories.id')
                      ->join('brands','brands.id','=','products.brand_id')
                      ->where('products.brand_id', request()->get('brand_id'))
                      ->select('categories.*')
                      ->groupBy('categories.id')
                      ->get();
              $subsid = [];
              foreach($subs as $category){
                  array_push($subsid ,$category->id);
              }
              @endphp

              @foreach ($item->sub_cats->whereIn('id', $subsid) as $category)
              <div class="z-checkbox">
                <input id="panel_category_{{$category->id}}" class="mb-2 sub_cat_id" {{((isset($_REQUEST['sub_category_id']) && $category->id == $_REQUEST['sub_category_id']) || (isset($_REQUEST['search']) && $_REQUEST['search'] == $category->title) || (request()->has('category_id') && in_array($category->id,$sub_category_ids)))?'checked':''}}
                  type="checkbox" name="sub_category_id[]" value="{{$category->id}}">
                <label class="d-block text-capitalize"
                  for="panel_category_{{$category->id}}">{{$category->getTranslation('title',getCode())}}</label>
              </div>
              @endforeach

            @else

              @foreach ($item->sub_cats as $category)
              <div class="z-checkbox">
                <input id="panel_category_{{$category->id}}" class="mb-2 sub_cat_id" {{((isset($_REQUEST['sub_category_id']) && $category->id == $_REQUEST['sub_category_id']) || (isset($_REQUEST['search']) && $_REQUEST['search'] == $category->title) || (request()->has('category_id') && in_array($category->id,$sub_category_ids)))?'checked':''}}
                  type="checkbox" name="sub_category_id[]" value="{{$category->id}}">
                <label class="d-block text-capitalize"
                  for="panel_category_{{$category->id}}">{{$category->getTranslation('title',getCode())}}</label>
              </div>
              @endforeach

            @endif
          </div>
          @endif
          @endforeach

          {{-- third child from  category --}}
          <div id="child_category">
            <template v-for="(child,i) in childrens">
              <button type="button" class="accordion active  w-100 border border-light text-uppercase">@{{child.title}}
                <i class="fas fa-minus float-right"></i>
              </button>

              <div class="panel w-100 border border-light">
                <div class="z-checkbox" v-for="sub_cat in child.sub_cats">
                  <input :id="'panel_category_'+sub_cat.id" class="mb-2 sub_cat_id"    type="checkbox" name="sub_category_id[]" :value="sub_cat.id">
                  <label class="d-block text-capitalize" :for="'panel_category_'+sub_cat.id">@{{sub_cat.title}} </label>
                </div>
              </div>
            </template>
          </div>
          {{-- end thired child from category --}}

          <button type="button" class="accordion active w-100 border border-light text-uppercase">@lang('front.brands')
            <i class="fas fa-minus float-right"></i>
          </button>


          <div class="panel mb-3 w-100 border border-light">
            @foreach (filtter_brands() as $brand)
            <div class="z-checkbox">
              <input id="panel_brand_{{$brand->id}}" class="mb-2 brand_id"
                {{(isset($_REQUEST['brand_id']) && $brand->id == $_REQUEST['brand_id'])?'checked':''}} type="checkbox"
                name="brand_id[]" value="{{$brand->id}}">
              <label class="d-block text-capitalize"
                for="panel_brand_{{$brand->id}}">{{$brand->getTranslation('title',getCode())}}</label>
            </div>
            @endforeach
          </div>

          <button type="button" class="accordion active w-100 border border-light text-uppercase">@lang('front.shop_by_price')
            <i class="fas fa-minus float-right"></i>
          </button>

          <div class="panel mb-3 w-100 border border-light">
            <div class="z-checkbox">
              <input id="panel_34" class="mb-2 price" {{isset($_REQUEST['to'])?'checked':''}} type="checkbox" name="to"
                value="1000">
              <label class="d-block text-capitalize" for="panel_34">@lang('front.less')  @lang('front.from')  - 1000 @lang('front.egp') </label>
            </div>

            <div class="z-checkbox">
              <input id="panel_35" class="mb-2 price"
                {{(isset($_REQUEST['from_to']) && $_REQUEST['from_to'] == '1000,3000')?'checked':''}} type="checkbox"
                name="from_to" value="1000,3000">
              <label class="d-block text-capitalize" for="panel_35">1000 @lang('front.egp')  - 3000 @lang('front.egp') </label>
            </div>

            <div class="z-checkbox">
              <input id="panel_36" class="mb-2 price"
                {{(isset($_REQUEST['from_to']) && $_REQUEST['from_to'] == '3000,6000')?'checked':''}} type="checkbox"
                name="from_to" value="3000,6000">
              <label class="d-block text-capitalize" for="panel_36">3000 @lang('front.egp')  - 6000 @lang('front.egp') </label>
            </div>

            <div class="z-checkbox">
              <input id="panel_37" class="mb-2 price"
                {{(isset($_REQUEST['from_to']) && $_REQUEST['from_to'] == '6000,10000')?'checked':''}} type="checkbox"
                name="from_to" value="6000,10000">
              <label class="d-block text-capitalize" for="panel_37">6000 @lang('front.egp')  - 10,000 @lang('front.egp') </label>
            </div>

            <div class="z-checkbox">
              <input id="panel_38" class="mb-2 price" {{isset($_REQUEST['from'])?'checked':''}} type="checkbox"
                name="from" value="10000">
              <label class="d-block text-capitalize" for="panel_38">10,000 @lang('front.egp')  - @lang('front.more') @lang('front.from') </label>
            </div>
          </div>

          <button type="button" class="accordion active  w-100 border border-light text-uppercase">@lang('front.offer')
            <i class="fas fa-minus float-right"></i>
          </button>

          <div class="panel w-100 border border-light">
            <div class="z-checkbox">
              <input id="panel_39" class="mb-2 offer" {{isset($_REQUEST['offer'])?'checked':''}} type="checkbox" name="offer" value="offer">
              <label class="d-block text-capitalize" for="panel_39">@lang('front.offer') </label>
            </div>
          </div>

          <br>

          <div id="propertys">
            <template v-for="(property,i) in properties_data">
              <button type="button" class="accordion active  w-100 border border-light text-uppercase">@{{properties_data[i].title}}
                <i class="fas fa-minus float-right"></i>
              </button>

              <div class="panel w-100 border border-light">
                <div class="z-checkbox" v-for="property_value in properties_data[i].pvalue">
                  <input :id="'panel_pr'+property_value.id" class="mb-2 property" :checked = 'property_value.value.replace( /^\D+/g, "") != "" && (property_value.value.replace( /^\D+/g, "") >= checked_val.num1 && property_value.value.replace( /^\D+/g, "") <= checked_val.num2)'   type="checkbox" name="property_value_id[]" :value="property_value.id">
                  <label class="d-block text-capitalize" :for="'panel_pr'+property_value.id">@{{property_value.value}} </label>
                </div>
              </div>
            </template>
          </div>

          <input type="hidden" id="search_in" name="search" value="{{isset($_REQUEST['search'])?$_REQUEST['search']:''}}">
          <input type="hidden" id="ito_in" name="ito" value="{{isset($_REQUEST['ito'])?$_REQUEST['ito']:''}}">
          <input type="hidden" id="ifrom_in"  name="ifrom" value="{{isset($_REQUEST['ifrom'])?$_REQUEST['ifrom']:''}}">
          <input type="hidden" id="ifrom_ito_in" name="ifrom_ito" value="{{isset($_REQUEST['ifrom_ito'])?$_REQUEST['ifrom_ito']:''}}">
        </form>
      </div>
      <!-- End Filter Search -->

      <!-- Modal -->
      <div class="modal open_right fade w3-center" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title" style="font-weight: bold;">Filter Your Selection</h6>
              <button type="button" class="close close_modal" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div id="toggle_plus_minus" class="modal-body">
              @foreach (filter_categorys() as $item)
              @if(count($item->sub_cats) > 0)
              <button class="accordion active w-100 border border-light">{{$item->getTranslation('title',getCode())}}
                <i class="fas fa-minus float-right"></i>
              </button>

              <div class="panel mb-3 border border-secondary">
                @foreach ($item->sub_cats as $category)
                <div class="z-checkbox">
                  <input form="filter_form" id="panel_category_{{$category->id}}_mobile"
                  {{((isset($_REQUEST['sub_category_id']) && $category->id == $_REQUEST['sub_category_id']) || (isset($_REQUEST['search']) && $_REQUEST['search'] == $category->title) || (request()->has('category_id') && in_array($category->id,$sub_category_ids)))?'checked':''}}
                    class="mb-2 sub_cat_id" type="checkbox" name="sub_category_id[]" value="{{$category->id}}">
                  <label class="d-block text-capitalize"
                    for="panel_category_{{$category->id}}_mobile">{{$category->getTranslation('title',getCode())}}</label>
                </div>
                @endforeach
              </div>
              @endif
              @endforeach

              {{-- third child from  category --}}
                <div id="child_category_mobile">
                  <template v-for="(child,i) in childrens">
                    <button type="button" class="accordion active  w-100 border border-light text-uppercase">@{{child.title}}
                      <i class="fas fa-minus float-right"></i>
                    </button>

                    <div class="panel w-100 border border-light">
                      <div class="z-checkbox" v-for="sub_cat in child.sub_cats">
                        <input :id="'panel_category_'+sub_cat.id+'_mobile'" class="mb-2 sub_cat_id"    type="checkbox" name="sub_category_id[]" :value="sub_cat.id">
                        <label class="d-block text-capitalize" :for="'panel_category_'+sub_cat.id+'_mobile'">@{{sub_cat.title}} </label>
                      </div>
                    </div>
                  </template>
                </div>
            {{-- end thired child from category --}}

              <button class="accordion active w-100 border border-light">@lang('front.brands')
                <i class="fas fa-minus float-right"></i>
              </button>

              <div class="panel mb-3 border border-secondary">
                @foreach (filtter_brands() as $brand)
                <div class="z-checkbox">
                  <input form="filter_form" id="panel_brand_{{$brand->id}}_mobile"
                    {{(isset($_REQUEST['brand_id']) && $brand->id == $_REQUEST['brand_id'])?'checked':''}}
                    class="mb-2 brand_id" type="checkbox" name="brand_id[]" value="{{$brand->id}}">
                  <label class="d-block text-capitalize"
                    for="panel_brand_{{$brand->id}}_mobile">{{$brand->getTranslation('title',getCode())}}</label>
                </div>
                @endforeach
              </div>

              <button class="accordion active w-100 border border-light">@lang('front.price')
                <i class="fas fa-minus float-right"></i>
              </button>

              <div class="panel mb-3 border border-secondary">
                <div class="z-checkbox">
                  <input form="filter_form" id="panel_34_mobile" class="mb-2 price" {{isset($_REQUEST['to'])?'checked':''}} type="checkbox" name="to" value="1000">
                  <label class="d-block text-capitalize" for="panel_34_mobile">@lang('front.less')  @lang('front.from')  - 1000 @lang('front.egp') </label>
                </div>

                <div class="z-checkbox">
                  <input form="filter_form" id="panel_35_mobile" class="mb-2 price"
                    {{(isset($_REQUEST['from_to']) && $_REQUEST['from_to'] == '1000,3000')?'checked':''}}
                    type="checkbox" name="from_to" value="1000,3000">
                  <label class="d-block text-capitalize" for="panel_35_mobile">1000 @lang('front.egp')  - 3000 @lang('front.egp') </label>
                </div>

                <div class="z-checkbox">
                  <input form="filter_form" id="panel_36_mobile" class="mb-2 price"
                    {{(isset($_REQUEST['from_to']) && $_REQUEST['from_to'] == '3000,6000')?'checked':''}}
                    type="checkbox" name="from_to" value="3000,6000">
                  <label class="d-block text-capitalize" for="panel_mobile_36">3000 @lang('front.egp')  - 6000 @lang('front.egp') </label>
                </div>

                <div class="z-checkbox">
                  <input form="filter_form" id="panel_37_mobile" class="mb-2 price"
                    {{(isset($_REQUEST['from_to']) && $_REQUEST['from_to'] == '6000,10000')?'checked':''}}
                    type="checkbox" name="from_to" value="6000,10000">
                  <label class="d-block text-capitalize" for="panel_37_mobile">6000 @lang('front.egp')  - 10,000 @lang('front.egp') </label>
                </div>

                <div class="z-checkbox">
                  <input form="filter_form" id="panel_38_mobile" class="mb-2 price" {{isset($_REQUEST['from'])?'checked':''}} type="checkbox"
                    name="from" value="10000">
                  <label class="d-block text-capitalize" for="panel_38_mobile">10,000 @lang('front.egp')  - @lang('front.more') @lang('front.from') </label>
                </div>
              </div>

              <button class="accordion active active w-100 border border-light">@lang('front.offer')
                <i class="fas fa-minus float-right"></i>
              </button>

              <div class="panel border border-secondary">
                <div class="z-checkbox">
                  <input form="filter_form" id="panel_39_mobile" {{isset($_REQUEST['offer'])?'checked':''}} class="mb-2 offer" type="checkbox" name="offer" value="offer">
                  <label class="d-block text-capitalize" for="panel_39_mobile">@lang('front.offer') </label>
                </div>
              </div>

              <div id="propertys_mobile">
                <template v-for="(property,i) in properties_data">
                  <button type="button" class="accordion active  w-100 border border-light text-uppercase">@{{properties_data[i].title}}
                    <i class="fas fa-minus float-right"></i>
                  </button>

                  <div class="panel w-100 border border-light">
                    <div class="z-checkbox" v-for="property_value in properties_data[i].pvalue">
                      <input :id="'panel_prm'+property_value.id" class="mb-2 property" type="checkbox" :checked = 'property_value.value.replace( /^\D+/g, "") != "" && (property_value.value.replace( /^\D+/g, "") >= checked_val.num1 && property_value.value.replace( /^\D+/g, "") <= checked_val.num2)'  name="property_value_id[]" :value="property_value.id">
                      <label class="d-block text-capitalize" :for="'panel_prm'+property_value.id">@{{property_value.value}} </label>
                    </div>
                  </div>
                </template>
              </div>

            </div>

          </div>
        </div>
      </div>

      <!-- Start Grid & List View -->
      <!-- Start Image Cover -->
      <div class="col-md-10">
        <div class="list_cover">
          <img class="w-100 rounded" src="{{url(setting('list_banner'))}}" alt="Cover" title="Apple">
        </div>
        <!-- End Image Cover -->

        <!-- Start Toolbar -->
        <div class="toolbar mt-3 p-2 border bg-white">
          <div class="sort-by mr-3 float-left">
            <label class="labelclass m-auto font-weight-normal">@lang('front.sort_by'):</label>
          </div>

          <select class="selsort p-1 border border-secondary bg-white" id="sorted" form="filter_form" name="sorted">
            <option value="">@lang('messages.users.select')</option>
            <option value="title,asc">@lang('messages.scheduled.name')</option>
            <option value="price,desc">@lang('front.price') @lang('front.desc')</option>
            <option value="price,asc">@lang('front.price') @lang('front.asc')</option>
          </select>

          <strong class="grid_list float-right">
            <a href="#0" id="grid_list_two">
              <i class="fas fa-th active_grid"></i>
            </a>

            <a href="#0" id="grid_list_one">
              <i class="fas fa-list list_view border"></i>
            </a>
          </strong>
        </div>
        <!-- End Toolbar -->

        <!-- start row product -->
        <div id="grid_two" class="row mt-3 content_view_mobile">

          @foreach ($products as $product)

          <div class="col-md-3 col-6 mb-3 content_view_mobile_col6">
            <div class="content_view hvr-bob px-2 h-100 bg-white rounded">
              <a href="{{route('front.home.inner',['id' => $product->id]) }}">
                <img class="lazy" src="{{$product->main_image}}" alt="Product" width="202px" height="202px" class="w-75 d-block m-auto">

                @if($product->discount > 0)
                <div class="product-label text-center font-weight-bold">
                  <span class="sale-product-icon">{{$product->discount}} %</span>
                </div>
                @endif

                <h6 class="full_desc text-dark text-left text-capitalize">
                  {{$product->getTranslation('title',getCode())}}</h6>
              </a>

              <div class="rating_list_product">
                  @for ($i = 1; $i <= 5; $i++)
                    @if(round($product->rate() - .25) >= $i)
                      <i class="fas fa-star colorstar"></i>
                    @elseif(round($product->rate() + .25) >= $i)
                     <i class="fas fa-star-half-alt colorstar"></i>
                    @else
                     <i class="far fa-star"></i>
                    @endif
                  @endfor
              </div>

              <div class="price-description text-uppercase">Cash Price</div>

              <div class="price-box">
                <span class="regular-price">
                  <span
                    class="price font-weight-bold">{{number_format(($product->price_after_discount > 0)?$product->price_after_discount:$product->price)}}
                    @lang('front.egp') </span>
                </span>
                @if($product->price_after_discount > 0)
                <p class="old-price">
                  <span class="price font-weight-bold">{{number_format($product->price)}} @lang('front.egp')  </span>
                </p>
                @endif
              </div>
            </div>
          </div>

          @endforeach

        </div>
      </div>
      <!-- End row product -->
    </div>
    <!-- end row -->
  </div>
</div>

<div class="load" style="position: fixed;top: 40%;left:40%;display:none">
  <img src="{{url('public\frontv2\images\loading\load1.gif')}}" width="10%" />
</div>
<!-- end container -->
@endsection
@section('script')
<script type="text/javascript">
  var start = 0;
  var action = 'inactive';
  $('.load').hide();
  $(window).on("scroll", function() {
    if ($(window).scrollTop() + $(window).height() > $("#grid_two").height() && action == 'inactive') {
      $('.load').show();
      action = 'active';
      start = start + {{ get_limit_paginate() }};
      setTimeout(function() {
        load_content_data(start);
      }, 500);
    }
    })

    $('.price').click(function(){
      $('.price').not(this).each(function(){
          $(this).prop('checked',false)
      });
    })

  function load_content_data(start) {
    $.ajax({
      url: '{{url("clients/loadproductsv2")}}?'+ '&start=' + start,
      type: "post",
      data: $('#filter_form').serialize(),
      success: function(data) {
        if (data.html == '') {
          action = 'active';
        } else {
          $('#grid_two').append(data.html);
          action = 'inactive';
        }
        $('.load').hide();
      },
    });

  }
  $(document).on('change','.sub_cat_id , .brand_id , .price , .offer , #sorted',function() {
    $('.load').show();
    console.log($(this).val());
    $('#search_in , #ito_in , #ifrom_in , #ifrom_ito_in').val('')
    if($(this).prop('checked')==false){
      str = $(this).attr('id')
      $(this).removeAttr('checked')
      $('#'+$(this).attr('id')+'_mobile').removeAttr('checked')
      $('#'+str.split('_mobile')[0]).removeAttr('checked')
    }
    start = 0
    $.ajax({
      url: '{{url("clients/loadproductsv2")}}?start=0',
      type: "post",
      data: $('#filter_form').serialize(),
      success: function(data) {
        if (data.html == '') {
          action = 'active';
          $('#grid_two').html('<h3 class="text-center">@lang("front.no_product")</h3>')
        } else {
          $('#grid_two').html(data.html);
          action = 'inactive';
        }
        $('.load').hide();
      },
    });
  })
  $(document).on('change','.property',function() {
    $('.load').show();
    console.log($(this).val());
    $('#search_in , #ito_in , #ifrom_in , #ifrom_ito_in').val('')
    if($(this).prop('checked')==false){
      str = $(this).attr('id')
      $(this).removeAttr('checked')
      $('#'+$(this).attr('id')+'_mobile').removeAttr('checked')
      $('#'+str.split('_mobile')[0]).removeAttr('checked')
    }
    start = 0
    $.ajax({
      url: '{{url("clients/loadproductsv2")}}?start=0',
      type: "post",
      data: $('#filter_form').serialize(),
      success: function(data) {
        if (data.html == '') {
          action = 'active';
          $('#grid_two').html('<h3 class="text-center">@lang("front.no_product")</h3>')
        } else {
          $('#grid_two').html(data.html);
          action = 'inactive';
        }
        $('.load').hide();
      },
    });
  })
  $('#button_jq , .fa-sliders-h').click(function(){
    //$(this).prop('disabled',true)
    if($('#exampleModal').hasClass('show')){
      $('.modal-backdrop').remove();
      $('#SL_balloon_obj').remove();
      $('#exampleModal').attr('aria-hidden',true)
      $('#exampleModal').css('display','none')
      $('body').removeClass('modal-open')
    }
  })
  $( document ).ready(function(){
    $.ajax({
      url: '{{url("clients/loadproductsv2")}}?start=0',
      type: "post",
      data: $('#filter_form').serialize(),
      success: function(data) {
        if (data.html == '') {
          action = 'active';
          $('#grid_two').html('<h3 class="text-center">@lang("front.no_product")</h3>')
        } else {
          $('#grid_two').html(data.html);
          action = 'inactive';
        }
        $('.load').hide();
      },
    });
  })
</script>
<script>
  const property = new Vue({
    el:'#propertys',
    data:{
      category_id : [],
      properties_data : [],
      checked_val :{'num1' : 0, 'num2':0}
    },
    watch: {
      category_id:function(val){
        var _this = this
        if(val.length  > 0){
          $.ajax({
            type: "get",
            data: {category_id:val},
            url: "{{url('getProperty')}}",
            success: function(data,status){
              _this.properties_data = data.data
          }
        });
        }
        else{
          this.properties_data = []
        }
      }
    },
    created() {
      var _this = this
      $('.sub_cat_id').each(function(i, obj) {
        if($(this).prop("checked") == true){
          _this.category_id.push($(this).val())
          return false;
        }
      });
      $('.sub_cat_id').change(function(){
        if($(this).prop("checked") == true){
          _this.category_id.push($(this).val())
        }
        else{
          _this.category_id.pop($(this).val())
        }
      })
      @if(isset($_REQUEST['search']) == 'TV')
      str = location.search;
      number = str.substring(str.indexOf("=") + 1,str.indexOf("&"));
      if(number.indexOf('%2C') != -1){
        this.checked_val.num1 = number.split('%2C')[0]
        this.checked_val.num2 = number.split('%2C')[1]
      }
      else{
        if(str.indexOf('ifrom=') != -1){
          this.checked_val.num1 = number
          this.checked_val.num2 =  500
        }
        else{
          this.checked_val.num1 = 0
          this.checked_val.num2 = number
        }
      }
      console.log(this.checked_val);
      @endif
    }
  })


  /************************** child category vue *************************/
  const child_category = new Vue({
    el:'#child_category',
    data:{
      category_id : [],
      childrens : [],
    },
    watch: {
      category_id:function(val){
        var _this = this
        if(val.length  > 0){
          $.ajax({
            type: "get",
            data: {category_id:val},
            url: "{{url('getChild')}}",
            success: function(data,status){
              _this.childrens = data.data
          }
        });
        }
        else{
          this.childrens = []
        }
      }
    },
    created() {
      var _this = this
      $('.sub_cat_id').each(function(i, obj) {
        if($(this).prop("checked") == true){
          _this.category_id.push($(this).val())
          return false;
        }
      });
      $('.sub_cat_id').change(function(){
        if($(this).prop("checked") == true){
          _this.category_id.push($(this).val())
        }
        else{
          _this.category_id.pop($(this).val())
        }
      })
    }
  })
  /************************** child category vue *************************/
</script>
<script>
  const propertys_mobile = new Vue({
    el:'#propertys_mobile',
    data:{
      category_id : [],
      properties_data : [],
      checked_val :{'num1' : '', 'num2':''}
    },
    watch: {
      category_id:function(val){
        var _this = this
        if(val.length  > 0){
          $.ajax({
            type: "get",
            data: {category_id:val},
            url: "{{url('getProperty')}}",
            success: function(data,status){
              _this.properties_data = data.data
          }
        });
        }
        else{
          this.properties_data = []
        }
      }
    },
    created() {
      var _this = this
      $('.sub_cat_id').each(function(i, obj) {
        if($(this).prop("checked") == true){
          _this.category_id.push($(this).val())
          return false;
        }
      });

      $('.sub_cat_id').change(function(){
        if($(this).prop("checked") == true){
          _this.category_id.push($(this).val())
        }
        else{
          _this.category_id.pop($(this).val())
        }
      })
      @if(isset($_REQUEST['search']) == 'TV')
      str = location.search;
      number = str.substring(str.indexOf("=") + 1,str.indexOf("&"));
      if(number.indexOf('%2C') != -1){
        this.checked_val.num1 = number.split('%2C')[0]
        this.checked_val.num2 = number.split('%2C')[1]
      }
      else{
        if(str.indexOf('ifrom=') != -1){
          this.checked_val.num1 = 0
          this.checked_val.num2 = number
        }
        else{
          this.checked_val.num1 = number
          this.checked_val.num2 = 0
        }
      }
      console.log(this.checked_val);
      @endif
    }
  })

  /************************** child category vue *************************/
  const child_category_mobile = new Vue({
    el:'#child_category_mobile',
    data:{
      category_id : [],
      childrens : [],
    },
    watch: {
      category_id:function(val){
        var _this = this
        if(val.length  > 0){
          $.ajax({
            type: "get",
            data: {category_id:val},
            url: "{{url('getChild')}}",
            success: function(data,status){
              _this.childrens = data.data
          }
        });
        }
        else{
          this.childrens = []
        }
      }
    },
    created() {
      var _this = this
      $('.sub_cat_id').each(function(i, obj) {
        if($(this).prop("checked") == true){
          _this.category_id.push($(this).val())
          return false;
        }
      });
      $('.sub_cat_id').change(function(){
        if($(this).prop("checked") == true){
          _this.category_id.push($(this).val())
        }
        else{
          _this.category_id.pop($(this).val())
        }
      })
    }
  })
  /************************** child category vue *************************/
</script>
@endsection
