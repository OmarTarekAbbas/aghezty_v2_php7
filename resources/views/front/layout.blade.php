<!DOCTYPE html>
<html lang="en">

<head>
    <!-- metas -->
    <meta charset="utf-8">
    <!-- IE compatibility meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- for phons -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- links -->
    <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/ion.rangeSlider.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/main-style.css')}}">
    <meta name="token" content="{{ csrf_token() }}">
    <style>
    .main .owl-carousel.owl-one button.owl-prev,
    .main .owl-carousel.owl-one button.owl-next {
        bottom: 40%
    }

    .quantity-offer .minus-offer,
    .quantity-offer .quantity-input,
    .quantity-offer .plus-offer,
    .quantity .minus,
    .quantity .quantity-input,
    .quantity .plus-offer {
        float: left;
        left: 0;
    }

    .quantity-offer,
    .quantity {
        width: 114px;
    }

    .quantity-offer {
        position: relative;
    }

    .subtotal-value:after {
        content: "  @lang('front.pound')";
    }

    .subtotal-value:before {
        content: "";
    }
    .subtotal:after {
    content: "  @lang('front.pound')";
    }
    .subtotal:before {
    content: "";
    }
    .price:after {
    content: "  @lang('front.pound')";
    }
    .price:before {
    content: "";
    }
    .subtotal-title{
        font-weight: bold;
    }
    </style>
    @if(App::getLocale() == 'ar')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.min.css">
    @endif
    <!-- title -->
    <title>@lang('front.title') | @yield('page_title')</title>
</head>

<body>

    <!-- navbar -->
    <header>
        <div class="container-fluid">
            <div class="row">
                <!-- shopping cart -->
                <div class="col-4 shopping">
                    <a href="{{url('clients/cart')}}">
                        <i class="fas fa-shopping-cart fa-lg"></i>
                    </a>
                    <span
                        class="total-count">{{((Auth::guard('client')->user()) ? count(Auth::guard('client')->user()->carts):0)+count_session_cart()}}</span>
                </div>

                <div class="language text-right">
                    @if(App::getLocale() == 'ar')
                    <a href="{{url('lang/en')}}">
                        <span class="lang">En</span>
                    </a>
                    @else
                    <a href="{{url('lang/ar')}}">
                        <span class="lang">Ar</span>
                    </a>
                    @endif
                </div>

                <!-- hamburger -->
                <div class="col-4">
                    <input type="checkbox" id="menu-toggle">
                    <label class="hamburger-wrapper open" for="menu-toggle">
                        <span class="hamburger"></span>
                    </label>
                    <nav>
                        <div class="spacer"></div>
                        <!-- accordion -->
                        <ul id="accordion" class="accordion list-unstyled">
                            <li class="text-center">
                                <a href="{{url('clients/profile')}}" class="img-hero">
                                    @if(isset(Auth::guard('client')->user()->image))
                                    <img src="{{Auth::guard('client')->user()->image}}" alt="">
                                    @else
                                    <img src="{{asset('front/img/profial_pic.jpg')}}" alt="">
                                    @endif
                                </a>
                                <div class="link">
                                    <span class="fas fa-dice-d6 fa-2x"></span> @lang('front.categorys')
                                    <i class="down fa fa-chevron-down"></i>
                                </div>
                                <ul class="submenu list-unstyled">
                                    @php
                                    $categorys = categorys();
                                    @endphp
                                    @foreach ($categorys as $category)
                                    <li>
                                        <a href="#" class="link-link">{{$category->getTranslation('title',getCode())}}
                                            <i class="fa fa-chevron-down"></i>
                                        </a>
                                        <ul class="submenu-submenu list-unstyled">
                                            @foreach ($category->sub_cats as $sub_category)
                                            <li><a
                                                    href="{{url('clients/products?sub_category_id='.$sub_category->id)}}">{{$sub_category->getTranslation('title',getCode())}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endforeach

                                </ul>
                            </li>
                            <!---------->
                            <li>
                                <div class="link">
                                    <span class="fab fa-font-awesome-flag fa-2x"></span> @lang('front.brands')
                                    <i class="down fa fa-chevron-down"></i>
                                </div>
                                <ul class="submenu list-unstyled">
                                    @php
                                    $brands = brands();
                                    @endphp
                                    @foreach ($brands as $item)
                                    <li>
                                        <a href="#" class="link-link">{{$item->getTranslation('title',getCode())}}
                                            <i class="fa fa-chevron-down"></i>
                                        </a>
                                        <ul class="submenu-submenu list-unstyled">
                                            @php
                                            $sub_cat_from_brand = sub_cat_from_brand($item->id);
                                            @endphp
                                            @foreach ($sub_cat_from_brand as $value)
                                            <li><a
                                                    href="{{url('clients/products?sub_category_id='.$value->id.'&brand_id='.$item->id)}}">{{$value->getTranslation('title',getCode())}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endforeach

                                </ul>
                            </li>
                            <!---------->
                            <li>
                                <a href="{{url('clients/products?offer=offer')}}" class="link">
                                    <span class="fas fa-tag fa-2x"></span> @lang('front.offer')
                                </a>
                            </li>
                            <!---------->
                            <li>
                                <a href="{{url('clients/contact')}}" class="link">
                                    <span class="fas fa-phone fa-2x"></span> @lang('front.contact')
                                </a>
                            </li>
                            <!---------->
                            <li>
                                <a href="{{url('clients/service_center')}}" class="link">
                                    <span class="fas fa-phone fa-2x"></span> @lang('front.service_center')
                                </a>
                            </li>
                            <!---------->
                            <li>
                                <a href="{{url('clients/home')}}" class="link">
                                    <span class="fas fa-home fa-2x"></span> @lang('front.home')
                                </a>
                            </li>
                            @if(\Auth::guard('client')->check())
                            <li>
                                <a href="{{url('clients/logout')}}" class="link">
                                    <span class="fas fa-lock fa-2x"></span> @lang('front.sign_out')
                                </a>
                            </li>
                            @endif
                        </ul>
                    </nav>
                </div>
                <div class="col-4 h_arrow">
                    <a class="arrow back" href="#"><i class="fas fa-angle-left fa-lg"></i></a>
                </div>

            </div>
        </div>
    </header>
    <!-- end navbar -->
    <button
        style="border-bottom-right-radius: 35%; border-top-right-radius: 35%; position: fixed; left: 0px; top: 8.5%; z-index: 99999999;"
        type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong1">
        <i class="fas fa-search"></i>
    </button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{url('clients/products')}}" method="GET" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">@lang('front.search_title')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- main content -->
                    <div class="container">
                        <main class="" role="main" style="padding-top: 0; margin-bottom: 0;">
                            <div class="wrapper cf">
                                <aside class="sidebar">
                                    <ul class="filter ul-reset">
                                        <li class="filter-item">
                                            <section class="filter-item-inner">
                                                <h5 class="filter-item-inner-heading minus-filter text-right">
                                                    @lang('front.brands')</h5>
                                                <ul class="filter-attribute-list ul-reset text-right">
                                                    <div class="filter-attribute-list-inner">
                                                        @foreach ($brands as $item)
                                                        <li class="filter-attribute-item">
                                                            <input type="checkbox" name="brand_id[]"
                                                                value="{{$item->id}}" id="colour-attribute-1"
                                                                class="filter-attribute-checkbox ib-m">
                                                            <label for="colour-attribute-1"
                                                                class="filter-attribute-label ib-m">{{$item->getTranslation('title',getCode())}}</label>
                                                        </li>
                                                        @endforeach
                                                    </div>
                                                </ul>
                                            </section>
                                        </li>

                                        <li class="filter-item">
                                            <section class="filter-item-inner">
                                                <h5 class="filter-item-inner-heading minus-filter text-right">
                                                    @lang('front.categorys')</h5>
                                                <ul class="filter-attribute-list ul-reset text-right">
                                                    <div class="filter-attribute-list-inner">
                                                        @foreach ($categorys as $value)
                                                        <li class="filter-attribute-item">
                                                            <input type="checkbox" id="colour-attribute-1"
                                                                class="filter-attribute-checkbox selectAll ib-m">
                                                            <label for="colour-attribute-1"
                                                                class="filter-attribute-label ib-m">{{$value->getTranslation('title',getCode())}}</label>
                                                            <div class="col-md-3">
                                                                <div class="panel-group" id="accordion" role="tablist"
                                                                    aria-multiselectable="true">
                                                                    <div class="panel panel-default">
                                                                        <div class="panel-heading" role="tab"
                                                                            id="headingOne">
                                                                            <h4 class="panel-title">
                                                                                <a data-toggle="collapse"
                                                                                    data-parent="#accordion"
                                                                                    href="#collapseOne"
                                                                                    aria-expanded="true"
                                                                                    aria-controls="collapseOne">
                                                                                    @lang('front.more')
                                                                                </a>
                                                                            </h4>

                                                                        </div>
                                                                        <div id="collapseOne"
                                                                            class="panel-collapse collapse in show"
                                                                            role="tabpanel"
                                                                            aria-labelledby="headingOne">
                                                                            <ul class="panel-body make_select">
                                                                                @foreach ($value->sub_cats as $sub_cat)
                                                                                <li class="filter-attribute-item">
                                                                                    <input type="checkbox"
                                                                                        name="sub_category_id[]"
                                                                                        value="{{$sub_cat->id}}"
                                                                                        id="colour-attribute-1"
                                                                                        class="filter-attribute-checkbox ib-m">
                                                                                    <label for="colour-attribute-1"
                                                                                        class="filter-attribute-label ib-m">{{$sub_cat->getTranslation('title',getCode())}}</label>
                                                                                </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </li>
                                                        @endforeach

                                                    </div>
                                                </ul>
                                            </section>
                                        </li>

                                        <li class="filter-item">
                                            <section class="filter-item-inner">

                                                <ul class="filter-attribute-list ul-reset text-right">
                                                    <div class="filter-attribute-list-inner">
                                                        <li class="filter-attribute-item">
                                                            <input type="checkbox" name="offer" value="offer"
                                                                id="colour-attribute-1"
                                                                class="filter-attribute-checkbox ib-m">
                                                            <label for="colour-attribute-1"
                                                                class="filter-attribute-label ib-m">@lang('front.offer')</label>
                                                        </li>
                                                    </div>
                                                </ul>
                                            </section>
                                        </li>

                                        <li class="filter-item" style="direction: ltr;">
                                            <section class="filter-item-inner">
                                                <h5 class="filter-item-inner-heading minus-filter text-right">
                                                    @lang('front.price')</h5>
                                                <ul class="filter-attribute-list ul-reset text-right">
                                                    <div class="filter-attribute-list-inner">
                                                        <li class="filter-attribute-item">
                                                            <input type="text" name="" id="demo_4" data-from=""
                                                                data-to="" value="">
                                                            <input type="hidden" name="from" id="from_price" value="">
                                                            <input type="hidden" name="to" id="to_price" value="">
                                                        </li>
                                                    </div>
                                                </ul>
                                            </section>
                                        </li>
                                    </ul>
                                </aside>
                            </div>
                        </main>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('front.close')</button>
                    <button type="submit" class="btn btn-primary">@lang('front.search')</button>
                </div>
            </form>
        </div>
    </div>
    <!-- end navbar -->
    @yield('content')
    <!-- loading -->
    <div class="loading-overlay">
        <div class="spinner">
            <img src="{{asset('front/img/logo.png')}}" alt="loading">
        </div>
    </div>
    <!-- end loading -->

    <style>
    a:hover {
        color: #f3e5b8;
        text-decoration: none;
    }
    </style>

    <!-- footer -->
    <footer>
        <a class="fab fa-facebook-f" href="{{ setting('facebook') }}" target="_blank"></a>
        <a class="fab fa-whatsapp" href='<?php echo strip_tags(setting('whatsapp')) ?>'></a>
        <a class="fas fa-phone" href="tel:{{ setting('phone') }}"></a>
        <a class="far fa-comment" href="sms:{{ setting('sms') }}"></a>
        <a class="fas fa-envelope" href="mailto:{{ setting('mail') }}"></a>
    </footer>
    <!-- end footer -->

    <!-- script -->
    <script src="{{asset('front/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('front/js/popper.min.js')}}"></script>
    <script src="{{asset('front/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('front/js/wow.min.js')}}"></script>
    <script src="{{asset('front/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('front/js/ion.rangeSlider.min.js')}}"></script>
    <script src="{{asset('front/js/jquery.fancybox.min.js')}}"></script>
    <script src="{{asset('front/js/script.js')}}"></script>
    <script src="{{url('js/pusher.min.js')}}"></script>
    <script src="{{url('js/pusher_config.js')}}"></script>
    <script>
        $(".selectAll").click(function() {
            $(this).parent().find('.make_select input[type="checkbox"]').prop('checked', $(this).prop('checked'));
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
            }
        });

        function ConfirmDelete() {
            var x = confirm("Are you sure you want to delete?");
            if (x)
                return true;
            else
                return false;
        }
    </script>
    <script>
        $(function() {
            url = window.location.href
            x = 0;
            $('.list-unstyled li a').each(function() {
                if (!url.localeCompare(this.href)) {
                    $(this).parent('li').css({
                        'background-color': '#82b34c'
                    })
                    $(this).css({
                        'color': 'blue'
                    })
                    $(this).parent('li').parent('ul').parent('li').addClass('open');
                    $(this).parent('li').parent('ul').parent('li').parent('ul').parent('li').addClass(
                        'open');
                    $(this).parent('li').parent('ul').parent('li').parent('ul').css('display', 'block');
                    $(this).parent('li').parent('ul').css('display', 'block');
                    x++;
                }
            });
            if (x == 0) {
                var new_url = sessionStorage.getItem("current_url");
                console.log(sessionStorage.getItem("current_url"));
                $('.list-unstyled li a').each(function() {
                    if (!new_url.localeCompare(this.href)) {
                        $(this).parent('li').css({
                            'background-color': '#82b34c'
                        })
                        $(this).css({
                            'color': 'blue'
                        })
                        $(this).parent('li').parent('ul').parent('li').addClass('open');
                        $(this).parent('li').parent('ul').parent('li').parent('ul').parent('li').addClass(
                            'open');
                        $(this).parent('li').parent('ul').parent('li').parent('ul').css('display', 'block');
                        $(this).parent('li').parent('ul').css('display', 'block');
                    }
                });
            }

        });
    </script>
    <script>
    channel = pusher.subscribe('product');
    channel.bind('product-event', function(data) {
        var notification = new window.Notification("{{__('front.title')}}!", {
            body: data.message,
            icon: "{{url('public/frontv2/images/logo/01.png')}}",
        });
        notification.onclick = function(event) {
            event.preventDefault();  //prevent the browser from focusing the Notification's tab, while it stays also open
            var new_window = window.open('','_blank'); //open empty window(tab)
            new_window.location = data.url; //set url of newly created window(tab) and focus
            this.close()
        };
    })
    </script>
    @yield('script')
</body>

</html>
