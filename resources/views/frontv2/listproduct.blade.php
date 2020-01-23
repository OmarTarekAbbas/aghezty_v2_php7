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
      @if(isset($_REQUEST['sub_category_id']))
      <li class="breadcrumb-item active" aria-current="page">{{$products[0]->category->getTranslation('title',getCode())}}</li>
      @elseif(isset($_REQUEST['brand_id']))
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
          @foreach (categorys() as $item)
          @if(count($item->sub_cats) > 0)
          <button type="button"
            class="accordion active w-100 border border-light">{{$item->getTranslation('title',getCode())}}
            <i class="fas fa-minus float-right"></i>
          </button>

          <div class="panel mb-3 w-100 border border-light">
            @foreach ($item->sub_cats as $category)
            <div class="z-checkbox">
              <input id="panel_category_{{$category->id}}" class="mb-2 sub_cat_id" {{((isset($_REQUEST['sub_category_id']) && $category->id == $_REQUEST['sub_category_id']) || (isset($_REQUEST['search']) && $_REQUEST['search'] == $category->title))?'checked':''}}
                type="checkbox" name="sub_category_id[]" value="{{$category->id}}">
              <label class="d-block text-capitalize"
                for="panel_category_{{$category->id}}">{{$category->getTranslation('title',getCode())}}</label>
            </div>
            @endforeach
          </div>
          @endif
          @endforeach

          <button type="button" class="accordion active w-100 border border-light text-uppercase">@lang('front.brands')
            <i class="fas fa-minus float-right"></i>
          </button>


          <div class="panel mb-3 w-100 border border-light">
            @foreach (brands() as $brand)
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

          <input type="hidden" id="search_in" name="search" value="{{isset($_REQUEST['search'])?$_REQUEST['search']:''}}">
          <input type="hidden" id="ito_in" name="ito" value="{{isset($_REQUEST['ito'])?$_REQUEST['ito']:''}}">
          <input type="hidden" id="ifrom_in"  name="ifrom" value="{{isset($_REQUEST['ifrom'])?$_REQUEST['ifrom']:''}}">
          <input type="hidden" id="ifrom_ito_in" name="ifrom_ito" value="{{isset($_REQUEST['ifrom_ito'])?$_REQUEST['ifrom_ito']:''}}">
        </form>
      </div>
      <!-- End Filter Search -->

      <!-- Modal -->
      <div class="modal open_right fade w3-center" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title" style="font-weight: bold;">Filter Your Selection</h6>
              <button type="button" class="close close_modal" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div id="toggle_plus_minus" class="modal-body">
              @foreach (categorys() as $item)
              @if(count($item->sub_cats) > 0)
              <button class="accordion active w-100 border border-light">{{$item->getTranslation('title',getCode())}}
                <i class="fas fa-minus float-right"></i>
              </button>

              <div class="panel mb-3 border border-secondary">
                @foreach ($item->sub_cats as $category)
                <div class="z-checkbox">
                  <input form="filter_form" id="panel_category_{{$category->id}}_mobile"
                  {{((isset($_REQUEST['sub_category_id']) && $category->id == $_REQUEST['sub_category_id']) || (isset($_REQUEST['search']) && $_REQUEST['search'] == $category->title))?'checked':''}}
                    class="mb-2 sub_cat_id" type="checkbox" name="sub_category_id[]" value="{{$category->id}}">
                  <label class="d-block text-capitalize"
                    for="panel_category_{{$category->id}}_mobile">{{$category->getTranslation('title',getCode())}}</label>
                </div>
                @endforeach
              </div>
              @endif
              @endforeach

              <button class="accordion active w-100 border border-light">@lang('front.brands')
                <i class="fas fa-minus float-right"></i>
              </button>

              <div class="panel mb-3 border border-secondary">
                @foreach (brands() as $brand)
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
                <img class="lazy" src="{{$product->main_image}}" alt="Product" class="w-75 d-block m-auto">

                @if($product->discount > 0)
                <div class="product-label text-center font-weight-bold">
                  <span class="sale-product-icon">-{{$product->discount}}%</span>
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
                    class="price font-weight-bold">{{($product->discount > 0)?$product->price_after_discount:$product->price}}
                    @lang('front.egp') </span>
                </span>
                @if($product->discount > 0)
                <p class="old-price">
                  <span class="price font-weight-bold">{{$product->price}} @lang('front.egp')  </span>
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
  {{-- <div class='loader'>
    <div class='loader_overlay'></div>
    <div class='loader_cogs'>
      <div class='loader_cogs__top'>
        <div class='top_part'></div>
        <div class='top_part'></div>
        <div class='top_part'></div>
        <div class='top_hole'></div>
      </div>
      <div class='loader_cogs__left'>
        <div class='left_part'></div>
        <div class='left_part'></div>
        <div class='left_part'></div>
        <div class='left_hole'></div>
      </div>
      <div class='loader_cogs__bottom'>
        <div class='bottom_part'></div>
        <div class='bottom_part'></div>
        <div class='bottom_part'></div>
        <div class='bottom_hole'>
          <!-- lol -->
        </div>
      </div>
    </div>
  </div> --}}
  {{-- <img id="loading" src="http://www.vitorazevedo.net/external_files/loading_small.png"> --}}
  <img src="{{url('public\frontv2\images\loading\load1.gif')}}" width="22%" />
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

$('.sub_cat_id , .brand_id , .price , .offer , #sorted').change(function() {
  $('.load').show();
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
</script>
@endsection
