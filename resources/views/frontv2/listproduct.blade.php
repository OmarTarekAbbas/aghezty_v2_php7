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
  <div class="mobile_views">
    <nav class="nav_breadcrumb" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <h1 class="breadcrumb-item">
          <a href="{{ route('front.home.index')}}" title="Go To Home">@lang('front.home')</a>
        </h1>

        @if( request()->route("sub_category_id") && isset($products[0]))
        <?php
        $category = \App\Category::where('id',app('request')->route('sub_category_id'))->first();
        $category_parent_id = \App\Category::where('id',$category->parent_id)->first();
        ?>

        <span class="breadcrumb_slash"></span>

        <h1 class="breadcrumb-item">
          <a href="{{url('parent/'.$category_parent_id->id.'/'.setSlug($category_parent_id->title))}}" title="Go To {{$category_parent_id->title}}">{{$category_parent_id->getTranslation('title',getCode())}}</a>
        </h1>

        <span class="breadcrumb_slash"></span>

        <h1 class="breadcrumb-item active" aria-current="page">{{$products[0]->category->getTranslation('title',getCode())}}</h1>
        <span class="breadcrumb_slash"></span>
        @elseif(request()->route("brand_id")!==null && isset($products[0]))
        <h1 class="breadcrumb-item active" aria-current="page">{{$products[0]->brand->getTranslation('title',getCode())}}</h1>
        <span class="breadcrumb_slash"></span>
        @elseif(request()->url("parent") && app('request')->route('category_id')!=null)
        <?php $category_parent = \App\Category::where('id',app('request')->route('category_id'))->first(); ?>
        <h1 class="breadcrumb-item active" aria-current="page">{{$category_parent->getTranslation('title',getCode())}}</h1>
        <span class="breadcrumb_slash"></span>
        @elseif(request()->url("parent") && app('request')->route('sub_category_id')!=null)
        <?php $category_parent = \App\Category::where('id',app('request')->route('sub_category_id'))->first(); ?>
        <h1 class="breadcrumb-item active" aria-current="page">{{$category_parent->getTranslation('title',getCode())}}</h1>
        <span class="breadcrumb_slash"></span>
        @else
        <h1 class="breadcrumb-item active" aria-current="page">@lang('front.products')</h1>
        <span class="breadcrumb_slash"></span>
        @endif

        <div id="fillter_breadcrumb"></div>
      </ol>
    </nav>
  </div>

  <div class="mobile_views">
    <!-- start row -->
    <div class="row">
      <!-- start col-md-2 -->
      <button type="button" id="button_jq" class="btn btn-dark d-md-block d-lg-block d-xl-none" data-toggle="modal" data-target="#exampleModal">
        <i class="fas fa-sliders-h" data-toggle="modal" data-target="#exampleModal"></i>
      </button>

      <!-- Start Filter Search -->
      <div id="toggle_plus_minus" class="col-md-2 col-lg-2 col-xl-2 d-none d-md-none d-lg-none d-xl-block">
        <form id="filter_form" method="post">
          @csrf
          @foreach (filter_categorys() as $item)
          @if(count($item->sub_cats) > 0)
            <button type="button"
              class="
               active w-100 border border-light">{{$item->getTranslation('title',getCode())}}
              <i class="fas fa-minus float-right"></i>
            </button>

            <div class="panel mb-3 w-100 border border-light">
              @if ((request()->has('brand_id') || request()->route("brand_id")) && !request()->has('sub_category_id'))

                @php
                $subs = \App\Category::join('products','products.category_id','=','categories.id')
                        ->join('brands','brands.id','=','products.brand_id')
                        ->where('products.brand_id',request("brand_id"))
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
                <input id="panel_category_{{$category->id}}" class="mb-2 select_one_category sub_cat_id" {{((isset($_REQUEST['sub_category_id']) && $category->id == $_REQUEST['sub_category_id']) || (isset($_REQUEST['search']) && $_REQUEST['search'] == $category->title) || (request()->has('category_id') && in_array($category->id,$sub_category_ids)))?'checked':''}}
                    type="checkbox" name="sub_category_id[]" value="{{$category->id}}">
                  <label  class="d-block text-capitalize"
                    for="panel_category_{{$category->id}}" data-en="{{$category->getTranslation('title','en')}}">{{$category->getTranslation('title',getCode())}}</label>
                </div>
                @endforeach

              @else

                @foreach ($item->sub_cats as $category)
                @if((request()->filled('sub_category_id') && $category->id == request()->get("sub_category_id")) || (request()->route("category_name") && strpos(str_replace("-"," ",request()->route("category_name")),$category->getTranslation('title','en'))!==false) ||
                request()->filled("search")||
                request()->filled("category_id") ||
                (request()->filled("most_solid") && !request()->route("category_name")) ||
                (request()->filled("offer") && !request()->route("category_name")) ||
                request()->route("parent_name") || request()->route("brand_name") ||
                (request()->filled("random") && !request()->route("category_name")))
                  <div class="z-checkbox">
                    <input  id="panel_category_{{$category->id}}" class="mb-2 select_one_category sub_cat_id" {{((isset($_REQUEST['sub_category_id']) && $category->id == $_REQUEST['sub_category_id']) || (isset($_REQUEST['search']) && $_REQUEST['search'] == $category->title) || (in_array($category->id,$sub_category_ids)))?'checked':''}}
                      type="checkbox" name="sub_category_id[]" value="{{$category->id}}">
                    <label class="d-block text-capitalize"
                      for="panel_category_{{$category->id}}" data-en="{{$category->getTranslation('title','en')}}">{{$category->getTranslation('title',getCode())}}</label>
                  </div>
                @endif
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
                  <input :id="'panel_category_'+sub_cat.id" class="mb-2 sub_cat_id" type="checkbox" name="sub_category_id[]" :value="sub_cat.id">
                  <label class="d-block text-capitalize" :for="'panel_category_'+sub_cat.id">@{{sub_cat.title}} </label>
                </div>
              </div>
            </template>
          </div>
          {{-- end thired child from category --}}

          <button type="button" class="accordion active w-100 border border-light text-uppercase">@lang('front.brands')
            <i class="fas fa-minus float-right"></i>
          </button>


          <div class="panel brand_panel_change mb-3 w-100 border border-light">
            @foreach (filtter_brands() as $brand)
            @if((request()->filled("brand_id") && request()->get("brand_id")  == $brand->id) || request()->filled("sub_category_id") || request()->route("category_name") || (request()->route("brand_id") && request()->route("brand_id")  == $brand->id) || request()->filled("offer") || request()->filled("most_solid"))
            <div class="z-checkbox">
              <input id="panel_brand_{{$brand->id}}" class="mb-2 brand_id"
                {{((request()->has('brand_id') && $brand->id == $_REQUEST['brand_id']) || in_array($brand->id,$brand_ids))?'checked':''}} type="checkbox"
                name="brand_id[]" value="{{$brand->id}}">
              <label class="d-block text-capitalize"
                for="panel_brand_{{$brand->id}}" data-en="{{$brand->getTranslation('title','en')}}">{{$brand->getTranslation('title',getCode())}}</label>
            </div>
            @endif
            @endforeach
          </div>

          <button type="button" class="accordion active w-100 border border-light text-uppercase">@lang('front.shop_by_price')
            <i class="fas fa-minus float-right"></i>
          </button>

          <div class="panel mb-3 w-100 border border-light">
            <div class="z-checkbox">
              <input id="panel_34" class="mb-2 price" {{isset($_REQUEST['to'])?'checked':''}} type="checkbox" name="to" value="1000">
              <label class="d-block text-capitalize" for="panel_34">@lang('front.less') @lang('front.from') - 1000 @lang('front.egp') </label>
            </div>

            <div class="z-checkbox">
              <input id="panel_35" class="mb-2 price" {{(isset($_REQUEST['from_to']) && $_REQUEST['from_to'] == '1000,3000')?'checked':''}} type="checkbox" name="from_to" value="1000,3000">
              <label class="d-block text-capitalize" for="panel_35">1000 @lang('front.egp') - 3000 @lang('front.egp') </label>
            </div>

            <div class="z-checkbox">
              <input id="panel_36" class="mb-2 price" {{(isset($_REQUEST['from_to']) && $_REQUEST['from_to'] == '3000,6000')?'checked':''}} type="checkbox" name="from_to" value="3000,6000">
              <label class="d-block text-capitalize" for="panel_36">3000 @lang('front.egp') - 6000 @lang('front.egp') </label>
            </div>

            <div class="z-checkbox">
              <input id="panel_37" class="mb-2 price" {{(isset($_REQUEST['from_to']) && $_REQUEST['from_to'] == '6000,10000')?'checked':''}} type="checkbox" name="from_to" value="6000,10000">
              <label class="d-block text-capitalize" for="panel_37">6000 @lang('front.egp') - 10,000 @lang('front.egp') </label>
            </div>

            <div class="z-checkbox">
              <input id="panel_38" class="mb-2 price" {{isset($_REQUEST['from'])?'checked':''}} type="checkbox" name="from" value="10000">
              <label class="d-block text-capitalize" for="panel_38">@lang('front.more') @lang('front.from') - 10,000 @lang('front.egp')</label>
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

          <button type="button" class="accordion active  w-100 border border-light text-uppercase">@lang('front.most_solid')
            <i class="fas fa-minus float-right"></i>
          </button>

          <div class="panel w-100 border border-light">
            <div class="z-checkbox">
              <input id="panel_40" class="mb-2 most_solid" {{isset($_REQUEST['most_solid'])?'checked':''}} type="checkbox" name="most_solid" value="most_solid">
              <label class="d-block text-capitalize" for="panel_40">@lang('front.most_solid') </label>
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
                  <input :id="'panel_pr'+property_value.id" class="mb-2 property" :checked = '(property_value.value.replace( /^\D+/g, "") != "" && (property_value.value.replace( /^\D+/g, "") >= checked_val.num1 && property_value.value.replace( /^\D+/g, "") <= checked_val.num2)) || pr_values.includes(property_value.id)'   type="checkbox" name="property_value_id[]" :value="property_value.id">
                  <label class="d-block text-capitalize" :for="'panel_pr'+property_value.id">@{{property_value.value}} </label>
                </div>
              </div>
            </template>
          </div>

          <input type="hidden" id="search_in" name="search" value="{{isset($_REQUEST['search'])?$_REQUEST['search']:''}}">
          <input type="hidden" id="ito_in" name="ito" value="{{isset($_REQUEST['ito'])?$_REQUEST['ito']:''}}">
          <input type="hidden" id="ifrom_in" name="ifrom" value="{{isset($_REQUEST['ifrom'])?$_REQUEST['ifrom']:''}}">
          <input type="hidden" id="ifrom_ito_in" name="ifrom_ito" value="{{isset($_REQUEST['ifrom_ito'])?$_REQUEST['ifrom_ito']:''}}">
          <input type="hidden" id="most_solid" name="most_solid" value="{{request()->filled('most_solid') ? request('most_solid') : ''}}">
        </form>
      </div>
      <!-- End Filter Search -->

      <!-- Modal -->
      <div class="modal open_right fade w3-center" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title" style="font-weight: bold;">{{ trans('front.Filter Your Selection') }}</h6>
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
              @if (request()->has('brand_id') && !request()->has('sub_category_id'))
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
                  <input form="filter_form" id="panel_category_{{$category->id}}_mobile"
                  {{((isset($_REQUEST['sub_category_id']) && $category->id == $_REQUEST['sub_category_id']) || (isset($_REQUEST['search']) && $_REQUEST['search'] == $category->title) || (in_array($category->id,$sub_category_ids)))?'checked':''}}
                    class="mb-2 select_one_category sub_cat_id" type="checkbox" name="sub_category_id[]" value="{{$category->id}}">
                  <label class="d-block text-capitalize"
                    for="panel_category_{{$category->id}}_mobile" data-en="{{$category->getTranslation('title','en')}}">{{$category->getTranslation('title',getCode())}}</label>
                </div>
                @endforeach
              @else
                @foreach ($item->sub_cats as $category)
                @if((request()->filled('sub_category_id') && $category->id == request()->get("sub_category_id")) || (request()->route("category_name") && strpos(str_replace("-"," ",request()->route("category_name")),$category->getTranslation('title','en'))!==false) || request()->filled("search")|| request()->filled("category_id") || (request()->filled("most_solid") && !request()->route("category_name")) || (request()->filled("offer") && !request()->route("category_name"))|| request()->route("parent_name") || request()->route("brand_name"))
                <div class="z-checkbox" >
                  <input form="filter_form" id="panel_category_{{$category->id}}_mobile"
                  {{((isset($_REQUEST['sub_category_id']) && $category->id == $_REQUEST['sub_category_id']) || (isset($_REQUEST['search']) && $_REQUEST['search'] == $category->title) || (in_array($category->id,$sub_category_ids)))?'checked':''}}
                    class="mb-2 select_one_category sub_cat_id" type="checkbox" name="sub_category_id[]" value="{{$category->id}}">
                  <label class="d-block text-capitalize"
                    for="panel_category_{{$category->id}}_mobile" data-en="{{$category->getTranslation('title','en')}}">{{$category->getTranslation('title',getCode())}}</label>
                </div>
                @endif
                @endforeach
              @endif
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
                      <input :id="'panel_category_'+sub_cat.id+'_mobile'" class="mb-2 sub_cat_id" type="checkbox" name="sub_category_id[]" :value="sub_cat.id">
                      <label class="d-block text-capitalize" :for="'panel_category_'+sub_cat.id+'_mobile'">@{{sub_cat.title}} </label>
                    </div>
                  </div>
                </template>
              </div>
              {{-- end thired child from category --}}

              <button class="accordion active w-100 border border-light">@lang('front.brands')
                <i class="fas fa-minus float-right"></i>
              </button>

              <div class="panel brand_panel_change_mobile mb-3 border border-secondary">
                @foreach (filtter_brands() as $brand)
                <div class="z-checkbox">
                  <input form="filter_form" id="panel_brand_{{$brand->id}}_mobile"
                  {{((request()->has('brand_id') && $brand->id == $_REQUEST['brand_id']) || in_array($brand->id,$brand_ids))?'checked':''}}
                    class="mb-2 brand_id" type="checkbox" name="brand_id[]" value="{{$brand->id}}">
                  <label class="d-block text-capitalize"
                    for="panel_brand_{{$brand->id}}_mobile" data-en="{{$brand->getTranslation('title','en')}}">{{$brand->getTranslation('title',getCode())}}</label>
                </div>
                @endforeach
              </div>

              <button class="accordion active w-100 border border-light">@lang('front.price')
                <i class="fas fa-minus float-right"></i>
              </button>

              <div class="panel mb-3 border border-secondary">
                <div class="z-checkbox">
                  <input form="filter_form" id="panel_34_mobile" class="mb-2 price" {{isset($_REQUEST['to'])?'checked':''}} type="checkbox" name="to" value="1000">
                  <label class="d-block text-capitalize" for="panel_34_mobile">@lang('front.less') @lang('front.from') - 1000 @lang('front.egp') </label>
                </div>

                <div class="z-checkbox">
                  <input form="filter_form" id="panel_35_mobile" class="mb-2 price" {{(isset($_REQUEST['from_to']) && $_REQUEST['from_to'] == '1000,3000')?'checked':''}} type="checkbox" name="from_to" value="1000,3000">
                  <label class="d-block text-capitalize" for="panel_35_mobile">1000 @lang('front.egp') - 3000 @lang('front.egp') </label>
                </div>

                <div class="z-checkbox">
                  <input form="filter_form" id="panel_36_mobile" class="mb-2 price" {{(isset($_REQUEST['from_to']) && $_REQUEST['from_to'] == '3000,6000')?'checked':''}} type="checkbox" name="from_to" value="3000,6000">
                  <label class="d-block text-capitalize" for="panel_mobile_36">3000 @lang('front.egp') - 6000 @lang('front.egp') </label>
                </div>

                <div class="z-checkbox">
                  <input form="filter_form" id="panel_37_mobile" class="mb-2 price" {{(isset($_REQUEST['from_to']) && $_REQUEST['from_to'] == '6000,10000')?'checked':''}} type="checkbox" name="from_to" value="6000,10000">
                  <label class="d-block text-capitalize" for="panel_37_mobile">6000 @lang('front.egp') - 10,000 @lang('front.egp') </label>
                </div>

                <div class="z-checkbox">
                  <input form="filter_form" id="panel_38_mobile" class="mb-2 price" {{isset($_REQUEST['from'])?'checked':''}} type="checkbox" name="from" value="10000">
                  <label class="d-block text-capitalize" for="panel_38_mobile">@lang('front.more') @lang('front.from') - 10,000 @lang('front.egp')</label>
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

              <button class="accordion active active w-100 border border-light">@lang('front.most_solid')
                <i class="fas fa-minus float-right"></i>
              </button>

              <div class="panel border border-secondary">
                <div class="z-checkbox">
                  <input form="filter_form" id="panel_40_mobile" {{isset($_REQUEST['most_solid'])?'checked':''}} class="mb-2 most_solid" type="checkbox" name="most_solid" value="most_solid">
                  <label class="d-block text-capitalize" for="panel_40_mobile">@lang('front.most_solid') </label>
                </div>
              </div>

              <div id="propertys_mobile">
                <template v-for="(property,i) in properties_data">
                  <button type="button" class="accordion active  w-100 border border-light text-uppercase">@{{properties_data[i].title}}
                    <i class="fas fa-minus float-right"></i>
                  </button>

                  <div class="panel w-100 border border-light">
                    <div class="z-checkbox" v-for="property_value in properties_data[i].pvalue">
                      <input :id="'panel_pr'+property_value.id+'_mobile'" class="mb-2 property" type="checkbox"    :checked = '(property_value.value.replace( /^\D+/g, "") != "" && (property_value.value.replace( /^\D+/g, "") >= checked_val.num1 && property_value.value.replace( /^\D+/g, "") <= checked_val.num2)) || pr_values.includes(property_value.id)'  name="property_value_id[]" :value="property_value.id"  form="filter_form">
                      <label class="d-block text-capitalize" :for="'panel_pr'+property_value.id+'_mobile'">@{{property_value.value}} </label>
                    </div>
                  </div>
                </template>

                <a href="#0" class="btn filter_close" id="" data-toggle="modal" data-target="#exampleModal">@lang('front.filter')</a>
              </div>

            </div>

          </div>
        </div>
      </div>
      <!-- Start Grid & List View -->
      <!-- Start Image Cover -->
      <div class="col-md-12 col-lg-12 col-xl-10">
        <div class="list_cover">
          @if(app('request')->input('offer'))
            @if(setting('offer_image'))
            <img class="w-100 rounded" src="{{url(setting('offer_image'))}}" alt="Cover" title="Apple" style="height: auto !important">
            @else
            <img class="w-100 rounded" src="{{url(setting('list_banner'))}}" alt="Cover" title="Apple" style="height: auto !important">
            @endif
          @elseif(app('request')->input('brand_id'))
            @if(setting('brands_image'))
              <img class="w-100 rounded" src="{{url(setting('brands_image'))}}" alt="Cover" title="Apple" style="height: auto !important">
              @else
              <img class="w-100 rounded" src="{{url(setting('list_banner'))}}" alt="Cover" title="Apple" style="height: auto !important">
              @endif
          @elseif( request()->route("sub_category_id"))

            <?php  $sub_category= \App\Category::where('id',app('request')->route('sub_category_id'))->first()?>
              @if($sub_category->cat->offer_image)
              @if ($sub_category->cat->offer_image_link)
              <a href="{{$sub_category->cat->offer_image_link}}">
                <img class="w-100 rounded" src="{{url( checkImageResize($sub_category->cat->offer_image, $sub_category->cat->offer_image_resize) )}}" alt="Cover" title="Apple" style="height: auto !important">
              </a>
              @else
              <img class="w-100 rounded" src="{{url( checkImageResize($sub_category->cat->offer_image, $sub_category->cat->offer_image_resize) )}}" alt="Cover" title="Apple" style="height: auto !important">
              @endif
              @else
              <img class="w-100 rounded" src="{{url(setting('list_banner'))}}" alt="Cover" title="Apple" style="height: auto !important">
              @endif
          @else
          <img class="w-100 rounded" src="{{url(setting('list_banner'))}}" alt="Cover" title="Apple" style="height: auto !important">
          @endif
        </div>
        <!-- End Image Cover -->
        @if(!request()->filled('most_solid'))
        <!-- Start Toolbar -->
        <div class="toolbar mt-3 p-2 border bg-white">
          <div class="sort-by mr-3 float-left">
            <label class="labelclass m-auto font-weight-normal">@lang('front.sort_by'):</label>
          </div>

          <select class="selsort p-1 border border-secondary bg-white" id="sorted" form="filter_form" name="sorted">
            <option value="" selected="selected">@lang('messages.users.select')</option>
            <option value="title,asc">@lang('messages.scheduled.name')</option>
            <option value="price,desc" {{ request()->get("sorted") == "price,desc" ? 'selected' : '' }}>@lang('front.price') @lang('front.desc')</option>
            <option value="price,asc" {{ request()->get("sorted") == "price,asc"   ? 'selected' : '' }}>@lang('front.price') @lang('front.asc')</option>
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
        @endif

        <!-- start row product -->
        <div id="grid_two" class="row mt-3 content_view_mobile">

          @foreach ($products as $product)

          <div class="col-md-4 col-lg-4 col-xl-4 col-6 content_view_mobile_col6">
            <div class="content_view hvr-bob px-2 bg-white rounded">
              <a href="{{route('front.home.inner',['id' => $product->product_id ,'slug' => setSlug($product->getTranslation('title',getCode()))]) }}">
                <img class="lazy text-center d-block" src="{{checkImageResize($product->main_image, $product->main_image_resize)}}" alt="Product">



                <h6 class="full_desc text-dark text-left text-capitalize mb-0">
                  {{$product->getTranslation('title',getCode())}}
                </h6>
              </a>

              @if(\Auth::guard('client')->check() && setting("wish_list_flag") && setting("wish_list_flag") != '')
              <div class="fav_product">
                    <span>
                      <i class="fa fa-heart fa-2x grey {{ in_array($product->id, \Auth::guard('client')->user()->wishList()->pluck('product_id')->toArray()) ? 'red':''}}" data-id="{{ $product->id }}"></i>
                    </span>
                  </div>
            @endif

              @if($product->discount > 0)
                <div class="product-label text-center font-weight-bold">
                  <span class="sale-product-icon">{{$product->discount}} %</span>
                </div>
                @endif

              <div class="rating_list_product">
                @for ($i = 1; $i <= 5; $i++) @if(round($product->rate() - .25) >= $i)
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
                  <span class="price font-weight-bold">{{number_format(($product->price_after_discount > 0 && $product->price  > $product->price_after_discount)?$product->price_after_discount:$product->price)}}
                    @lang('front.egp') </span>
                </span>
                @if($product->price_after_discount > 0 && $product->price  > $product->price_after_discount)
                <p class="old-price">
                  <span class="price font-weight-bold">{{number_format($product->price)}} @lang('front.egp') </span>
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
$( document ).ready(function(){
  /**
   * Method getUrlParameter
   * get Query Parmater in url
   * @return Array
   */
  function getUrlParameter(sParam) {
      const queryString = window.location.search;
      const urlParams = new URLSearchParams(queryString);
      return urlParams.getAll(sParam)
  }

  var start  = 0;
  var action = 'inactive';
  var click  = 0;
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
  $('.price').click(function() {
    $('.price').not(this).each(function() {
      $(this).prop('checked', false)
    });
  })
  $('.select_one_category').click(function() {
    if($(this).attr("checked")) {
      $(this).prop('checked', true)
    }
    $('.select_one_category').not(this).each(function() {
      $(this).prop('checked', false)
    });
  })
  $('.sub_cat_id').change(function() {
      var cats = ''
      $('.sub_cat_id').each(function(i, obj) {
        if ($(this).prop("checked") == true) {
          cats += $(this).val()+','
        }
      });

      $.ajax({
      url: '{{url("clients/brands")}}',
      type: "get",
      data: {category_ids : cats},
      success: function(data) {
        var html        = ''
        var html_mobile = ''
        var brands = data.data
        var brand_array = "{{ json_encode($brand_ids) }}"
        brand_array     = JSON.parse(brand_array)
        var old_brand = getUrlParameter("brand_id[]")
        old_brand = old_brand ? old_brand.map(function (x) {
          return parseInt(x);
        }) : []
        if(brands.length){
          for (let i = 0; i < brands.length; i++) {
            checked = old_brand.includes(brands[i].id) || brand_array.includes(brands[i].id)? 'checked':''
            html += `<div class="z-checkbox">
                            <input form="filter_form" ${checked} id="panel_brand_${brands[i].id}" class="mb-2 brand_id"
                              type="checkbox"
                              name="brand_id[]" value="${brands[i].id}">
                            <label class="d-block text-capitalize"
                              for="panel_brand_${brands[i].id}" data-en="${brands[i].title_en}">${brands[i].title}</label>
                          </div>`;
            html_mobile += `<div class="z-checkbox">
                            <input form="filter_form" ${checked} id="panel_brand_${brands[i].id}_mobile" class="mb-2 brand_id"
                              type="checkbox"
                              name="brand_id[]" value="${brands[i].id}">
                            <label class="d-block text-capitalize"
                              for="panel_brand_${brands[i].id}_mobile" data-en="${brands[i].title_en}">${brands[i].title}</label>
                          </div>`;
          }
          $('.brand_panel_change').html(html)
          $('.brand_panel_change_mobile').html(html_mobile)
        }
      },
    });

  })
  function load_content_data(start) {
    $.ajax({
      url: '{{url("clients/loadproductsv2")}}?' + 'start=' + start,
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

//------------------------------------------------------------------
  $(document).on('change', '.sub_cat_id', function() {
    $("[name='sub_category_id[]']:checked").each(function () {
      var checked_value = $(this).val();
      console.log( checked_value );

      var input_id = 'panel_category_' + checked_value;
      console.log(input_id);

      var parent_node = document.getElementById("myLI").parentNode.nodeName;
      conslole.log(parent_node);
    });

  });

  $(document).on('change', '.sub_cat_id , .brand_id , .price , .offer, .most_solid , #sorted', function() {
    $('#most_solid').remove()
    $('.load').show();
    $('#search_in , #ito_in , #ifrom_in , #ifrom_ito_in').val('')
    if ($(this).prop('checked') == false) {
      str = $(this).attr('id')
      $(this).removeAttr('checked')
      $('#' + $(this).attr('id') + '_mobile').removeAttr('checked')
      $('#' + str.split('_mobile')[0]).removeAttr('checked')
    }

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

    var full_url = fullUrl()
    if(($(".price:checkbox, .property, .offer, .most_solid").filter(":checked")).length) {
      full_url += "?"+$("#filter_form").serialize()
    }
    history.pushState({}, null, full_url);
  })
  $(document).on('change', '.property', function() {

    $('.load').show();
    $('#search_in , #ito_in , #ifrom_in , #ifrom_ito_in').val('')
    if ($(this).prop('checked') == false) {

      str = $(this).attr('id')
      $(this).removeAttr('checked') // remove this
      $('#' + $(this).attr('id') + '_mobile').removeAttr('checked')
      $('#' + str.split('_mobile')[0]).removeAttr('checked')
      $('#' + str.split('_mobile')[0]).prop("checked", false)
      $('#' + $(this).attr('id') + '_mobile').prop("checked", false)
      $(this).attr('id').checked = false;
    }else{
      str = $(this).attr('id')
      $(this).attr('id').checked = true;
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
    var full_url = fullUrl()
    if(($(".price:checkbox, .property, .offer, .most_solid").filter(":checked")).length) {
      full_url += "?"+$("#filter_form").serialize()
    }
    history.pushState({}, null, full_url);
  })
  $('#button_jq , .fa-sliders-h').click(function() {
    //$(this).prop('disabled',true)
    if ($('#exampleModal').hasClass('show')) {
      $('.modal-backdrop').remove();
      $('#SL_balloon_obj').remove();
      $('#exampleModal').attr('aria-hidden', true)
      $('#exampleModal').css('display', 'none')
      $('body').removeClass('modal-open')
    }
  })
})
$( document ).ready(function(){
    var cats = ''
    $('.sub_cat_id').each(function(i, obj) {
      if ($(this).attr("checked")) {
        $(this).prop("checked", true)
      } else {
        $(this).removeAttr("checked")
      }
      if ($(this).prop("checked") == true) {
        cats += $(this).val()+','
      }
    });





    $.ajax({
      url: '{{url("clients/brands")}}',
      type: "get",
      data: {category_ids : cats},
      success: function(data) {
        var html        = ''
        var html_mobile = ''
        var brands = data.data
        var brand_array = "{{ json_encode($brand_ids) }}"
        brand_array     = brand_array.replace(/&quot;/g, '\"');
        brand_array     = JSON.parse(brand_array)
        console.log(brand_array);
        var old_brand   = "{{ json_encode(request()->get('brand_id')??[]) }}"
        old_brand = old_brand.replace(/&quot;/g, '\"');
        old_brand = JSON.parse(old_brand);
        old_brand = old_brand ? old_brand.map(function (x) {
          return parseInt(x);
        }) : []
        if(brands.length){
          for (let i = 0; i < brands.length; i++) {
            checked=old_brand.includes(brands[i].id) || brand_array.includes(brands[i].id)? 'checked':''
            html += '<div class="z-checkbox">\
                            <input form="filter_form" '+checked+' id="panel_brand_'+brands[i].id+'" class="mb-2 brand_id"\
                              type="checkbox"\
                              name="brand_id[]" value="'+brands[i].id+'">\
                            <label class="d-block text-capitalize"\
                              for="panel_brand_'+brands[i].id+'" data-en="'+brands[i].title_en+'">'+brands[i].title+'</label>\
                          </div>';
            html_mobile += '<div class="z-checkbox">\
                              <input form="filter_form" '+checked+' id="panel_brand_'+brands[i].id+'_mobile" class="mb-2 brand_id"\
                                type="checkbox"\
                                name="brand_id[]" value="'+brands[i].id+'">\
                              <label class="d-block text-capitalize"\
                                for="panel_brand_'+brands[i].id+'_mobile" data-en="'+brands[i].title_en+'">'+brands[i].title+'</label>\
                            </div>';
          }
          $('.brand_panel_change').html(html)
          $('.brand_panel_change_mobile').html(html_mobile)
        }
      },
    });
  })

  $( document ).ready(function(){
    $('.brand_id').each(function(i, obj) {
      if ($(this).attr("checked")) {
        $(this).prop("checked", true)
      } else {
        $(this).prop("checked", false)
      }
    });
    @if(!request()->has('sorted'))
      $.ajax({
        url: '{{url("clients/productsv2")}}?start=0',
        type: "get",
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
    @endif
  })

  function fullUrl() {
      var category_name  = ''
      var category_id    = ''
      var brands_name    = []
      var brands_id       = []
      //get checked category
      $(".sub_cat_id").each(function(){
        if($(this).is(":checked")) {
          category_name = $(this).next(".text-capitalize").data('en')
          category_id = $(this).val()
        }
      })
      //get checked brand
      $(".brand_id").each(function(){
        if($(this).is(":checked")) {
          if(!brands_name.includes($(this).next(".text-capitalize").data("en")))
            brands_name.push($(this).next(".text-capitalize").data("en"))
            brands_id.push($(this).val())
        }
      })
      if(category_name && !brands_name.length) {
        var url = '{{url("category")}}'+ '/' + category_id + '/'+ category_name.replaceAll(" ","-")
      }
      if(brands_name.length == 1 && !category_name) {
        var url = '{{url("brand")}}'+ '/' + brands_id[0] + '/'+ brands_name.join('-')
      }
      if(brands_name.length && category_name) {
        var url = '{{url("filter")}}'+ '/' + category_name.replaceAll(" ","-") + '/' + brands_name.join('-')
      }

      return url
  }
</script>

<script>
  const property = new Vue({
    el:'#propertys',
    data:{
      category_id : [],
      properties_data : [],
      pr_values:[],
      checked_val :{'num1' : 0, 'num2':0}
    },
    methods: {
      tvFilter() {
        str = location.search;
        number = str.substring(str.indexOf("=") + 1, str.indexOf("&"));
        if (number.indexOf('%2C') != -1) {
          this.checked_val.num1 = number.split('%2C')[0]
          this.checked_val.num2 = number.split('%2C')[1]
        } else {
          if (str.indexOf('ifrom=') != -1) {
            this.checked_val.num1 = number
            this.checked_val.num2 = 500
          } else {
            this.checked_val.num1 = 0
            this.checked_val.num2 = number
          }
        }
      },
      getOldSelectProperty() {
        this.pr_values = this.getUrlParameter('property_value_id[]')
        this.pr_values = this.pr_values ? this.pr_values.map(function (x) {
          return parseInt(x);
        }) : []
      },
      getPropertyFromSelectCategory() {
        var _this = this
        $.ajax({
            type: "get",
            data: {
              category_id: this.category_id
            },
            url: "{{url('getProperty')}}",
            success: function(data, status) {
              _this.properties_data = data.data
              _this.getOldSelectProperty()
            }
        })
      },
      getSelectCategory() {
        var _this = this
        _this.category_id = []
        $('.sub_cat_id').each(function(i, obj) {
          if ($(this).prop("checked") == true && !($(this).parent().children("input").attr('id')).includes("mobile")) {
            _this.category_id.push($(this).val())
          }
        });
      },
      getUrlParameter(sParam) {
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        return urlParams.getAll(sParam)
      }
    },
    created() {
      var _this = this
      this.getSelectCategory()
      this.getPropertyFromSelectCategory()
      this.getOldSelectProperty()
      $('.sub_cat_id').change(function() {
        _this.getSelectCategory()
        _this.getPropertyFromSelectCategory()
        _this.getOldSelectProperty()
      })
      @if((request()->filled("search") && request('search') == 'TV'))
        this.tvFilter()
      @endif
    }
  })


  /************************** child category vue *************************/
  const child_category = new Vue({
    el: '#child_category',
    data: {
      category_id: [],
      childrens: [],
    },
    watch: {
      category_id: function(val) {
        var _this = this
        if (val.length > 0) {
          $.ajax({
            type: "get",
            data: {
              category_id: val
            },
            url: "{{url('getChild')}}",
            success: function(data, status) {
              _this.childrens = data.data
            }
          });
        } else {
          this.childrens = []
        }
      }
    },
    created() {
      var _this = this
      $('.sub_cat_id').each(function(i, obj) {
        if ($(this).prop("checked") == true) {
          _this.category_id.push($(this).val())
          return false;
        }
      });
      $('.sub_cat_id').change(function() {
        if ($(this).prop("checked") == true) {
          _this.category_id.push($(this).val())
        } else {
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
      mobile_category_id : [],
      properties_data : [],
      pr_values:[],
      checked_val :{'num1' : 0, 'num2':0}
    },
    methods: {
      tvFilter() {
        str = location.search;
        number = str.substring(str.indexOf("=") + 1, str.indexOf("&"));
        if (number.indexOf('%2C') != -1) {
          this.checked_val.num1 = number.split('%2C')[0]
          this.checked_val.num2 = number.split('%2C')[1]
        } else {
          if (str.indexOf('ifrom=') != -1) {
            this.checked_val.num1 = number
            this.checked_val.num2 = 500
          } else {
            this.checked_val.num1 = 0
            this.checked_val.num2 = number
          }
        }
      },
      getOldSelectProperty() {
        this.pr_values = this.getUrlParameter('property_value_id[]')
        this.pr_values = this.pr_values ? this.pr_values.map(function (x) {
          return parseInt(x);
        }) : []
      },
      getPropertyFromSelectCategory() {
        var _this = this
        $.ajax({
            type: "get",
            data: {
              category_id: this.mobile_category_id
            },
            url: "{{url('getProperty')}}",
            success: function(data, status) {
              _this.properties_data = data.data
              _this.getOldSelectProperty()
            }
        })
      },
      getSelectCategory() {
        var _this = this
        _this.mobile_category_id = []
        $('.sub_cat_id').each(function(i, obj) {
          if ($(this).prop("checked") == true && ($(this).parent().children("input").attr('id')).includes("mobile")) {
            _this.mobile_category_id.push($(this).val())
          }
        });
      },
      getUrlParameter(sParam) {
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        return urlParams.getAll(sParam)
      }
    },
    created() {
      var _this = this
      this.getSelectCategory()
      this.getPropertyFromSelectCategory()
      this.getOldSelectProperty()
      $('.sub_cat_id').change(function() {
        _this.getSelectCategory()
        _this.getPropertyFromSelectCategory()
        _this.getOldSelectProperty()
      })
      @if((request()->filled("search") && request('search') == 'TV'))
        this.tvFilter()
      @endif
    }
  })

  /************************** child category vue *************************/
  // const child_category_mobile = new Vue({
  //   el: '#child_category_mobile',
  //   data: {
  //     category_id: [],
  //     childrens: [],
  //   },
  //   watch: {
  //     category_id: function(val) {
  //       var _this = this
  //       if (val.length > 0) {
  //         $.ajax({
  //           type: "get",
  //           data: {
  //             category_id: val
  //           },
  //           url: "{{url('getChild')}}",
  //           success: function(data, status) {
  //             _this.childrens = data.data
  //           }
  //         });
  //       } else {
  //         this.childrens = []
  //       }
  //     }
  //   },
  //   created() {
  //     var _this = this
  //     $('.sub_cat_id').each(function(i, obj) {
  //       if ($(this).prop("checked") == true) {
  //         _this.category_id.push($(this).val())
  //         return false;
  //       }
  //     });
  //     $('.sub_cat_id').change(function() {
  //       if ($(this).prop("checked") == true) {
  //         _this.category_id.push($(this).val())
  //       } else {
  //         _this.category_id.pop($(this).val())
  //       }
  //     })
  //   }
  // })
  /************************** child category vue *************************/
</script>
@endsection
