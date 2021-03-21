<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Admin Panel</title>
          <!-- SEO Engine -->
        <meta name="keywords" content="Buy Online, Buy in Egypt, Shop in Egypt, Online Shop, Online Store, Aghezty, Aghezty.com, Electronics, Mobiles, Tablets, Laptops, Computers, TVs, Home Appliance, Personal Care, Refrigerators, Cookers, Heaters, Accessories. Electronics Brands, Cash On Delivery, Installment, Premium Card, Ahly Visa Installment, Credit Card, Free Delivery, Agent Warranty, شراء عبر الإنترنت ، شراء في مصر ، متجر في مصر ، متجر على الإنترنت ، متجر على شبكة الإنترنت ، إلكترونيات ، هواتف محمولة ، أجهزة لوحية ، أجهزة الكمبيوتر المحمولة ، أجهزة الكمبيوتر ، تلفزيونات ، الأجهزة المنزلية ، العناية الشخصية ، ثلاجات ، طباخات ، سخانات ، اكسسوارات. العلامات التجارية الإلكترونية ، الدفع عند الاستلام ، القسط ، البطاقة المميزة ، تقسيط بطاقة التأشيرة من الأهلي ، بطاقة الائتمان ، التوصيل المجاني ، ضمان الوكيل">
        <meta name="description" content="Aghezty is the is the first and largest e-commerce website in Egypt dedicated for all types of consumer electronics, أجهزتى هو أول وأكبر موقع للتجارة الإلكترونية في مصر مخصص لجميع أنواع الإلكترونيات الاستهلاكية">
        <meta name="title" content="Buy Online, Buy in Egypt, Shop in Egypt, Online Shop, Online Store, Aghezty, Aghezty.com, Electronics, Mobiles, Tablets, Laptops, Computers, TVs, Home Appliance, Personal Care, Refrigerators, Cookers, Heaters, Accessories. Electronics Brands, Cash On Delivery, Installment, Premium Card, Ahly Visa Installment, Credit Card, Free Delivery, Agent Warranty, شراء عبر الإنترنت ، شراء في مصر ، متجر في مصر ، متجر على الإنترنت ، متجر على شبكة الإنترنت ، إلكترونيات ، هواتف محمولة ، أجهزة لوحية ، أجهزة الكمبيوتر المحمولة ، أجهزة الكمبيوتر ، تلفزيونات ، الأجهزة المنزلية ، العناية الشخصية ، ثلاجات ، طباخات ، سخانات ، اكسسوارات. العلامات التجارية الإلكترونية ، الدفع عند الاستلام ، القسط ، البطاقة المميزة ، تقسيط بطاقة التأشيرة من الأهلي ، بطاقة الائتمان ، التوصيل المجاني ، ضمان الوكيل" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <link rel="stylesheet" href="{{url('css/cropper.min.css')}}">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <style>
            #resizable { width: 150px; height: 150px; padding: 0.5em; }
            #resizable h3 { text-align: center; margin: 0; }
        </style>

        @yield('styles')

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <!--page specific css styles-->
        <link rel="stylesheet" type="text/css" href="{{url('assets/chosen-bootstrap/chosen.min.css')}}" />
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="{{url('assets/jquery-tags-input/jquery.tagsinput.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{url('assets/jquery-pwstrength/jquery.pwstrength.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{url('assets/bootstrap-fileupload/bootstrap-fileupload.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{url('assets/bootstrap-duallistbox/duallistbox/bootstrap-duallistbox.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{url('assets/dropzone/downloads/css/dropzone.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{url('assets/bootstrap-colorpicker/css/colorpicker.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{url('assets/bootstrap-timepicker/compiled/timepicker.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{url('assets/clockface/css/clockface.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{url('assets/bootstrap-datepicker/css/datepicker.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{url('assets/bootstrap-daterangepicker/daterangepicker.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{url('assets/bootstrap-switch/static/stylesheets/bootstrap-switch.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{url('assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css')}}" />

        <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />


        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css" />
        <link rel="stylesheet" href="{{url('assets/data-tables/bootstrap3/dataTables.bootstrap.css')}}" />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" />
        <link rel="stylesheet" type="text/css" href="{{url('css/quill.snow.css')}}" />

        <!--base css styles-->
        <link rel="stylesheet" href="{{url('assets/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{url('assets/font-awesome/css/font-awesome.min.css')}}">
        <!--page specific css styles-->

        <!--flaty css styles-->
        <link rel="stylesheet" href="{{url('css/flaty.css')}}">
        <link rel="stylesheet" href="{{url('css/flaty-responsive.css')}}">

        {{-- {{dd(App::getLocale())}} --}}
        @if(App::getLocale() == 'ar')
        <link rel="stylesheet" type="text/css" href="{{url('css/rtl.css')}}">
        <link href="{{url('https://fonts.googleapis.com/css?family=Cairo:600')}}" rel="stylesheet">
        <style>
          .modal-open .modal {
                overflow: auto;
          }
        </style>
        @endif

        <link rel="shortcut icon" href="{{url('img/favicon.png')}}">
        <meta name="token" content="{{ csrf_token() }}">

        <script>
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
                }
        });
function ConfirmDelete()
{
    var x = confirm("Are you sure you want to delete?");
    if (x)
        return true;
    else
        return false;
}
        </script>


    </head>
    <body>
        <div id="theme-setting">
            <a href="#"><i class="fa fa-gears fa fa-2x"></i></a>
            <ul>
                <li>
                    <span>Skin</span>
                    <ul class="colors" data-target="body" data-prefix="skin-">
                        <li class="active"><a class="blue" href="#"></a></li>
                        <li><a class="red" href="#"></a></li>
                        <li><a class="green" href="#"></a></li>
                        <li><a class="orange" href="#"></a></li>
                        <li><a class="yellow" href="#"></a></li>
                        <li><a class="pink" href="#"></a></li>
                        <li><a class="magenta" href="#"></a></li>
                        <li><a class="gray" href="#"></a></li>
                        <li><a class="black" href="#"></a></li>
                    </ul>
                </li>
                <li>
                    <span>Navbar</span>
                    <ul class="colors" data-target="#navbar" data-prefix="navbar-">
                        <li class="active"><a class="blue" href="#"></a></li>
                        <li><a class="red" href="#"></a></li>
                        <li><a class="green" href="#"></a></li>
                        <li><a class="orange" href="#"></a></li>
                        <li><a class="yellow" href="#"></a></li>
                        <li><a class="pink" href="#"></a></li>
                        <li><a class="magenta" href="#"></a></li>
                        <li><a class="gray" href="#"></a></li>
                        <li><a class="black" href="#"></a></li>
                    </ul>
                </li>
                <li>
                    <span>Sidebar</span>
                    <ul class="colors" data-target="#main-container" data-prefix="sidebar-">
                        <li class="active"><a class="blue" href="#"></a></li>
                        <li><a class="red" href="#"></a></li>
                        <li><a class="green" href="#"></a></li>
                        <li><a class="orange" href="#"></a></li>
                        <li><a class="yellow" href="#"></a></li>
                        <li><a class="pink" href="#"></a></li>
                        <li><a class="magenta" href="#"></a></li>
                        <li><a class="gray" href="#"></a></li>
                        <li><a class="black" href="#"></a></li>
                    </ul>
                </li>
                <li>
                    <span></span>
                    <a data-target="navbar" href="#"><i class="fa fa-square-o"></i> Fixed Navbar</a>
                    <a class="hidden-inline-xs" data-target="sidebar" href="#"><i class="fa fa-square-o"></i> Fixed Sidebar</a>
                </li>
            </ul>
        </div>
        <!-- BEGIN Navbar -->
        <div id="navbar" class="navbar">
            <button type="button" class="navbar-toggle navbar-btn collapsed" data-toggle="collapse" data-target="#sidebar">
                <span class="fa fa-bars"></span>
            </button>
            <a class="navbar-brand" href="{{url('/')}}">
                <small>
                    <i class="fa fa-user-secret"></i>
                    {{setting('title')}}
                </small>
            </a>

            <!-- BEGIN Navbar Buttons -->
            <ul class="nav flaty-nav pull-right">
                <template id="app">
                    <!-- BEGIN Tasks Dropdown -->
                    <li class="hidden-xs">
                            <a data-toggle="dropdown" class="dropdown-toggle" @click="read_notify()" href="#">
                                <i class="fa fa-bell"></i>
                                <span class="badge badge-important">@{{notify_count}}</span>
                            </a>
                            <!-- BEGIN Notifications Dropdown -->
                            <ul class="dropdown-navbar dropdown-menu not" :id="containerId" style="overflow-y:scroll;max-height: 157px;">
                                <li class="nav-header animt">
                                    <i class="fa fa-warning"></i>
                                    @{{notify_count}} Notifications
                                </li>
                                <li v-for="item in all_notifications" class="notify" style="width:100%">
                                    <a :href="item.link">
                                        <p v-if="item.seen"><strong>@{{item.name}}</strong> @{{item.subject}}</p>
                                        <p v-else class="green hover_remove"><strong>@{{item.name}}</strong> @{{item.subject}}</p>
                                    </a>
                                </li>
                            </ul>
                            <!-- END Notifications Dropdown -->
                    </li>
                    <!-- End BEGIN Tasks Dropdown -->
                </template>
                <!-- BEGIN Tasks Dropdown -->
                <li>
                    <a href="<?php

                    use App\Notification;

if (Config::get('languages')[App::getLocale()] == "English") {
                        echo route('lang.switch', "ar");
                    } else {
                        echo route('lang.switch', "en");
                    }
                    ?>" >
                           <?php
                           if (Config::get('languages')[App::getLocale()] == "English")
                               echo "عربي";
                           else
                               echo "English";
                           ?>
                    </a>
                </li>
                <!-- BEGIN Button User -->
                <li class="user-profile">
                    <a data-toggle="dropdown" href="#" class="user-menu dropdown-toggle">
                        <span class="hhh" id="user_info">
                            {!! Auth::user()->name !!}
                        </span>
                        <i class="fa fa-caret-down"></i>
                    </a>

                    <!-- BEGIN User Dropdown -->
                    <ul class="dropdown-menu dropdown-navbar" id="user_menu">
                        <li>
                            <a href="{{url('user_profile')}}">
                                <i class="fa fa-user"></i>
                                @lang('messages.profile')
                            </a>
                        </li>

                        <li class="divider visible-xs"></li>

                        <li class="divider"></li>

                        <li>
                            <a href="{{url('logout')}}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                <i class="fa fa-off"></i>
                                @lang('messages.logout')
                            </a>
                            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                    <!-- BEGIN User Dropdown -->
                </li>
                <!-- END Button User -->
            </ul>
            <!-- END Navbar Buttons -->
        </div>
        <!-- END Navbar -->

        <!-- BEGIN Container -->
        <div class="container" id="main-container">
            <!-- BEGIN Sidebar -->
            <div id="sidebar" class="navbar-collapse collapse">
                <!-- BEGIN Navlist -->
                    @if(Auth::user()->hasRole('super_admin'))
                      @if(Auth::user()->id == 1)
                        <ul class="nav nav-list">
                            <li id="user">
                                <a href="#" class="dropdown-toggle">
                                    <i class="glyphicon glyphicon-user"></i>
                                    <span>@lang('messages.users.users')</span>
                                    <b class="arrow fa fa-angle-right"></b>
                                </a>

                                <!-- BEGIN Submenu -->
                                <ul class="submenu">
                                    <li id="user-create"><a href="{{url('users/new')}}">@lang('messages.users.add_user')</a></li>
                                    <li id="user-index"><a href="{{url('users')}}">@lang('messages.users.users')</a></li>
                                </ul>
                                <!-- END Submenu -->
                            </li>

                            <li id="role">
                                <a href="#" class="dropdown-toggle">
                                    <i class="glyphicon glyphicon-road"></i>
                                    <span>@lang('messages.role')</span>
                                    <b class="arrow fa fa-angle-right"></b>
                                </a>

                                <!-- BEGIN Submenu -->
                                <ul class="submenu">
                                    <li id="role-create"><a href="{{url('roles/new')}}">@lang('messages.create-role')</a></li>
                                    <li id="role-index"><a href="{{url('roles')}}">@lang('messages.role')</a></li>
                                    <li id="route-index"><a href="{{url('all_routes')}}">@lang('messages.routes')</a></li>
                                    <li id="route-v2-index"><a href="{{url('routes/index_v2')}}">@lang('messages.routes_V2')</a></li>

                                </ul>
                                <!-- END Submenu -->
                            </li>

                            <li id="setting">
                                <a href="#" class="dropdown-toggle">
                                    <i class="fa fa-gears"></i>
                                    <span>@lang('messages.setting')</span>
                                    <b class="arrow fa fa-angle-right"></b>
                                </a>

                                <!-- BEGIN Submenu -->
                                <ul class="submenu">
                                    <li id="setting-create"><a href="{{url('setting/new')}}">@lang('messages.add_settings')</a></li>
                                    <li id="setting-index"><a href="{{url('setting')}}">@lang('messages.settings')</a></li>
                                    <li id="setting-import-DB"><a href="{{url('database_backups')}}">@lang('messages.database_backups')</a></li>
                                    <li id="setting-index"><a href="{{url('clear-cache')}}">@lang('messages.clear_cache')</a></li>
                                    <li id="setting-seed"><a href="{{url('admin/seed_manager')}}">@lang('messages.create_seed_files')</a></li>
                                    <li id="setting-migrate"><a href="{{url('admin/migrate_manager')}}">@lang('messages.create_migrate_files')</a></li>
                                </ul>
                                <!-- END Submenu -->
                            </li>

                            <ul class="nav nav-list">
                                <li id="type">
                                    <a href="#" class="dropdown-toggle">
                                        <i class="glyphicon glyphicon-tag"></i>
                                        <span>@lang('messages.setting_types')</span>
                                        <b class="arrow fa fa-angle-right"></b>
                                    </a>
                                    <ul class="submenu">
                                        <li id="type-create"><a href="{{url('types/create')}}">@lang('messages.add_type')</a></li>
                                        <li id="type-index"><a href="{{url('types/index')}}">@lang('messages.list_types')</a></li>
                                    </ul>
                                </li>
                            </ul>
                       @endif
                    @endif

                        @if(Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('content'))
                        <ul class="nav nav-list">
                            <li id="file_manager">
                                <a href="#" class="dropdown-toggle">
                                    <i class="fa fa-file"></i>
                                    <span>@lang('messages.file_manager')</span>
                                    <b class="arrow fa fa-angle-right"></b>
                                </a>

                                <!-- BEGIN Submenu -->
                                <ul class="submenu">
                                    <!--<li id="elfinder"><a href="{{url('file_manager')}}">UI File Manager</a></li>-->
                                    <li id="file_elfinder"><a href="{{url('admin/elfinder')}}">@lang('messages.ui_file_manager')</a></li>
                                    <li id="uploader"><a href="{{url('upload_items')}}">@lang('messages.file_uploader')</a></li>
                                </ul>
                                <!-- END Submenu -->
                            </li>
                            </ul>
                        @endif

                     @if(Auth::user()->hasRole('super_admin'))
                      @if(Auth::user()->id == 1)
                            <li id="images">
                                <a href="#" class="dropdown-toggle">
                                    <i class="glyphicon glyphicon-fullscreen"></i>
                                    <span>@lang('messages.images')</span>
                                    <b class="arrow fa fa-angle-right"></b>
                                </a>

                                <!-- BEGIN Submenu -->
                                <ul class="submenu">
                                    <li id="upload_resize"><a href="{{url('upload_resize')}}">@lang('messages.upload_/_resize_image')</a></li>
                                    <li id="upload_resize_v2"><a href="{{url('upload_resize_v2')}}">@lang('messages.upload_/_resize_image_v2')</a></li>
                                </ul>
                                <!-- END Submenu -->
                            </li>
                            <ul class="nav nav-list">
                                <li id="static">
                                    <a href="#" class="dropdown-toggle">
                                        <i class="glyphicon glyphicon-cog"></i>
                                        <span>@lang('messages.static_translations')</span>
                                        <b class="arrow fa fa-angle-right"></b>
                                    </a>

                                    <!-- BEGIN Submenu -->
                                    <ul class="submenu">
                                        <li id="static-create"><a href="{{url('static_translation/create')}}">@lang('messages.add_static_translations')</a></li>
                                        <li id="static-index"><a href="{{url('static_translation')}}">@lang('messages.static_translations')</a></li>
                                    </ul>
                                    <!-- END Submenu -->
                                </li>
                            </ul>

                            <ul class="nav nav-list">
                                <li id="language">
                                    <a href="#" class="dropdown-toggle">
                                        <i class="glyphicon glyphicon-cloud"></i>
                                        <span>@lang('messages.languages')</span>
                                        <b class="arrow fa fa-angle-right"></b>
                                    </a>

                                    <!-- BEGIN Submenu -->
                                    <ul class="submenu">
                                        <li id="language-create"><a href="{{url('language/create')}}">@lang('messages.add_language')</a></li>
                                        <li id="language-index"><a href="{{url('language')}}">@lang('messages.languages')</a></li>
                                    </ul>
                                    <!-- END Submenu -->
                                </li>
                            </ul>

                            <ul class="nav nav-list">
                                <li id="delete-all">
                                    <a href="#" class="dropdown-toggle">
                                        <i class="glyphicon glyphicon-trash"></i>
                                        <span>@lang('messages.delete_all_flags')</span>
                                        <b class="arrow fa fa-angle-right"></b>
                                    </a>

                                    <!-- BEGIN Submenu -->
                                    <ul class="submenu">
                                        <li id="delete-all-index"><a href="{{url('delete_all')}}">@lang('messages.all_flags')</a></li>
                                    </ul>
                                    <!-- END Submenu -->
                                </li>
                            </ul>

                            <ul class="nav nav-list">
                                <li id="country">
                                    <a href="#" class="dropdown-toggle">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>@lang('messages.countries')</span>
                                        <b class="arrow fa fa-angle-right"></b>
                                    </a>

                                    <!-- BEGIN Submenu -->
                                    <ul class="submenu">
                                        <li id="country_index"><a href="{{url('country')}}">@lang('messages.list_countries')</a></li>
                                        <li id="country_create"><a href="{{url('country/create')}}">@lang('messages.add_country')</a></li>
                                    </ul>
                                </li>
                            </ul>


                            {{-- <ul class="nav nav-list">
                              <li id="operator">
                                  <a href="#" class="dropdown-toggle">
                                      <i class="glyphicon glyphicon-user"></i>
                                      <span>@lang('messages.operator')</span>
                                      <b class="arrow fa fa-angle-right"></b>
                                  </a>

                                  <!-- BEGIN Submenu -->
                                  <ul class="submenu">
                                      <li id="operator_index"><a href="{{url('operator')}}">@lang('messages.list_operator')</a></li>
                                      <li id="operator_create"><a href="{{url('operator/create')}}">@lang('messages.create_operator')</a></li>
                                  </ul>
                              </li>
                          </ul> --}}
                          @endif



                          <ul class="nav nav-list">
                                  <li id="governorate">
                                      <a href="#" class="dropdown-toggle">
                                          <i class="glyphicon glyphicon-globe"></i>
                                          <span>@lang('messages.governorate')</span>
                                          <b class="arrow fa fa-angle-right"></b>
                                      </a>

                                      <!-- BEGIN Submenu -->
                                      <ul class="submenu">
                                          <li id="governorate_index"><a href="{{url('governorate')}}">@lang('messages.list_governorate')</a></li>
                                          <li id="governorate_create"><a href="{{url('governorate/create')}}">@lang('messages.create_governorate')</a></li>
                                      </ul>
                                  </li>
                              </ul>

                              <ul class="nav nav-list">
                                  <li id="city">
                                      <a href="#" class="dropdown-toggle">
                                          <i class="glyphicon glyphicon-user"></i>
                                          <span>@lang('messages.city')</span>
                                          <b class="arrow fa fa-angle-right"></b>
                                      </a>

                                      <!-- BEGIN Submenu -->
                                      <ul class="submenu">
                                          <li id="city_index"><a href="{{url('city')}}">@lang('messages.list_city')</a></li>
                                          <li id="city_create"><a href="{{url('city/create')}}">@lang('messages.create_city')</a></li>
                                      </ul>
                                  </li>
                              </ul>

                          <ul class="nav nav-list">
                              <li id="category">
                                  <a href="#" class="dropdown-toggle">
                                      <i class="glyphicon glyphicon-folder-open"></i>
                                      <span>@lang('messages.category')</span>
                                      <b class="arrow fa fa-angle-right"></b>
                                  </a>

                                  <!-- BEGIN Submenu -->
                                  <ul class="submenu">
                                      <li id="category_index"><a href="{{url('category')}}">@lang('messages.list_department')</a></li>
                                      <li id="category_subindex"><a href="{{url('sub_category')}}">@lang('messages.list_category')</a></li>
                                      <li id="category_create"><a href="{{url('category/create')}}">@lang('messages.create_category')</a></li>
                                  </ul>
                              </li>
                          </ul>

                          <ul class="nav nav-list">
                                  <li id="brand">
                                      <a href="#" class="dropdown-toggle">
                                          <i class="glyphicon glyphicon-folder-open"></i>
                                          <span>@lang('messages.brands')</span>
                                          <b class="arrow fa fa-angle-right"></b>
                                      </a>

                                      <!-- BEGIN Submenu -->
                                      <ul class="submenu">
                                          <li id="brand_index"><a href="{{url('brand')}}">@lang('messages.list_brands')</a></li>
                                          <li id="brand_create"><a href="{{url('brand/create')}}">@lang('messages.create_brands')</a></li>
                                      </ul>
                                  </li>
                              </ul>

                          <!-- <ul class="nav nav-list">
                              <li id="sub_category">
                                  <a href="#" class="dropdown-toggle">
                                      <i class="glyphicon glyphicon-folder-open"></i>
                                      <span>@lang('messages.sub_category')</span>
                                      <b class="arrow fa fa-angle-right"></b>
                                  </a>


                                  <ul class="submenu">
                                      <li id="sub_category_index"><a href="{{url('sub_category')}}">@lang('messages.list_sub_category')</a></li>
                                      <li id="sub_category_create"><a href="{{url('sub_category/create')}}">@lang('messages.create_sub_category')</a></li>
                                  </ul>
                              </li>
                          </ul> -->

                          <ul class="nav nav-list">
                              <li id="product">
                                  <a href="#" class="dropdown-toggle">
                                      <i class="glyphicon glyphicon-cloud"></i>
                                      <span>@lang('messages.products')</span>
                                      <b class="arrow fa fa-angle-right"></b>
                                  </a>

                                  <!-- BEGIN Submenu -->
                                  <ul class="submenu">
                                      <li id="product_index"><a href="{{url('product')}}">@lang('messages.list_products')</a></li>
                                      <li id="product_create"><a href="{{url('product/create')}}">@lang('messages.create_product')</a></li>
                                      <li id="product_create"><a href="{{url('products/get_excel')}}">@lang('messages.create_from_excel')</a></li>
                                      <li id="product_create"><a href="{{url('products/product_update_price_excel')}}">@lang('messages.product_update_price_excel')</a></li>
                                      <li id="product_create"><a href="{{url('products/export_product_excel')}}">@lang('messages.export_product_excel')</a></li>
                                  </ul>
                              </li>
                          </ul>

                          <ul class="nav nav-list">
                              <li id="client">
                                  <a href="#" class="dropdown-toggle">
                                      <i class="glyphicon glyphicon-cloud"></i>
                                      <span>@lang('messages.clients')</span>
                                      <b class="arrow fa fa-angle-right"></b>
                                  </a>

                                  <!-- BEGIN Submenu -->
                                  <ul class="submenu">
                                      <li id="client_index"><a href="{{url('client')}}">@lang('messages.list_clients')</a></li>
                                      <li id="client_address"><a href="{{url('address')}}">@lang('messages.list_clients_addresses')</a></li>
                                      <li id="client_rate"><a href="{{url('rate?publish=0')}}">@lang('messages.list_clients_rates')</a></li>
                                      {{-- <li id="product_create"><a href="{{url('product/create')}}">Create Product</a></li> --}}
                                  </ul>
                              </li>
                          </ul>


                          <ul class="nav nav-list">
                              <li id="order">
                                  <a href="#" class="dropdown-toggle">
                                      <i class="glyphicon glyphicon-cloud"></i>
                                      <span>@lang('messages.orders')</span>
                                      <b class="arrow fa fa-angle-right"></b>
                                  </a>

                                  <!-- BEGIN Submenu -->
                                  <ul class="submenu">
                                      <li id="order_index"><a href="{{url('order')}}">@lang('messages.list_orders')</a></li>
                                  </ul>
                              </li>
                          </ul>

                        {{-- <ul class="nav nav-list">
                              <li id="post">
                                  <a href="#" class="dropdown-toggle">
                                      <i class="fa fa-file"></i>
                                      <span>@lang('messages.post')</span>
                                      <b class="arrow fa fa-angle-right"></b>
                                  </a>

                                  <!-- BEGIN Submenu -->
                                  <ul class="submenu">
                                      <li id="post_index"><a href="{{url('post')}}">@lang('messages.list_post')</a></li>
                                      <li id="post_create"><a href="{{url('post/create')}}">@lang('messages.create_post')</a></li>
                                  </ul>
                              </li>
                          </ul>--}}

                          <ul class="nav nav-list">
                                  <li id="coupon">
                                      <a href="#" class="dropdown-toggle">
                                          <i class="fa fa-file"></i>
                                          <span>@lang('messages.coupon')</span>
                                          <b class="arrow fa fa-angle-right"></b>
                                      </a>

                                      <!-- BEGIN Submenu -->
                                      <ul class="submenu">
                                          <li id="coupon_index"><a href="{{url('coupon')}}">@lang('messages.list_coupon')</a></li>
                                          <li id="coupon_create"><a href="{{url('coupon/create')}}">@lang('messages.create_coupon')</a></li>
                                      </ul>
                                  </li>
                              </ul>



                              {{-- <ul class="nav nav-list">
                                  <li id="advertisement">
                                      <a href="#" class="dropdown-toggle">
                                          <i class="glyphicon glyphicon-folder-open"></i>
                                          <span>@lang('messages.advertisement')</span>
                                          <b class="arrow fa fa-angle-right"></b>
                                      </a>

                                      <!-- BEGIN Submenu -->
                                      <ul class="submenu">
                                          <li id="advertisement_index"><a href="{{url('advertisement')}}">@lang('messages.list_advertisement')</a></li>
                                          <li id="advertisement_create"><a href="{{url('advertisement/create')}}">@lang('messages.create_advertisement')</a></li>
                                      </ul>
                                  </li>
                              </ul> --}}


                              @endif
                              @if(Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('content'))
                                <ul class="nav nav-list">
                                    <li id="contact">
                                        <a href="#" class="dropdown-toggle">
                                            <i class="glyphicon glyphicon-cloud"></i>
                                            <span>@lang('messages.contacts')</span>
                                            <b class="arrow fa fa-angle-right"></b>
                                        </a>

                                        <!-- BEGIN Submenu -->
                                        <ul class="submenu">
                                            <li id="contact_index"><a href="{{url('contact')}}">@lang('messages.list_contacts')</a></li>
                                            {{-- <li id="product_create"><a href="{{url('product/create')}}">Create Product</a></li> --}}
                                        </ul>
                                    </li>
                                </ul>
                                <ul class="nav nav-list">
                                        <li id="request_product">
                                            <a href="#" class="dropdown-toggle">
                                                <i class="glyphicon glyphicon-folder-open"></i>
                                                <span>@lang('messages.request_product')</span>
                                                <b class="arrow fa fa-angle-right"></b>
                                            </a>

                                            <!-- BEGIN Submenu -->
                                            <ul class="submenu">
                                                <li id="request_product_index"><a href="{{url('unavailable')}}">@lang('messages.request_product')</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                              @endif
                              @if(Auth::user()->hasRole('super_admin'))
                              <ul class="nav nav-list">
                                  <li id="homepage">
                                      <a href="#" class="dropdown-toggle">
                                          <i class="glyphicon glyphicon-home"></i>
                                          <span>@lang('messages.homepage')</span>
                                          <b class="arrow fa fa-angle-right"></b>
                                      </a>

                                      <!-- BEGIN Submenu -->
                                      <ul class="submenu">
                                          <li id="advertisement_slides"><a href="{{url('homepage/slides')}}">@lang('messages.slides')</a></li>
                                          <li id="advertisement_banners"><a href="{{url('homepage/banners')}}">@lang('messages.banners')</a></li>
                                          <li id="recently_added"><a href="{{url('homepage/recently_addedv')}}">@lang('messages.recently_added')</a></li>
                                          <li id="selected_for_you"><a href="{{url('homepage/selected_for_youv')}}">@lang('messages.selected_for_you')</a></li>
                                          <li id="selected_HPcat"><a href="{{url('homepage/selected_HPcat')}}">@lang('messages.category')</a></li>
                                      </ul>
                                  </li>
                              </ul>
                               <ul class="nav nav-list">
                                  <li id="report">
                                      <a href="#" class="dropdown-toggle">
                                          <i class="glyphicon glyphicon-home"></i>
                                          <span>@lang('messages.reports')</span>
                                          <b class="arrow fa fa-angle-right"></b>
                                      </a>

                                      <!-- BEGIN Submenu -->
                                      <ul class="submenu">
                                          <li id="report_count"><a href="{{url('reports')}}">@lang('messages.number_of_visitors')</a></li>
                                          <li id="most_sold_product"><a href="{{url('most_sold_product')}}">@lang('messages.most_sold_product')</a></li>
                                          <li id="number_of_purchases"><a href="{{url('number_of_purchases')}}">@lang('messages.number_of_purchases')</a></li>
                                      </ul>
                                  </li>
                              </ul>

                               <ul class="nav nav-list">
                                  <li id="newsletter">
                                      <a href="#" class="dropdown-toggle">
                                          <i class="glyphicon glyphicon-home"></i>
                                          <span>@lang('messages.newsletter')</span>
                                          <b class="arrow fa fa-angle-right"></b>
                                      </a>

                                      <!-- BEGIN Submenu -->
                                      <ul class="submenu">
                                        <li id="newsletter_index"><a href="{{url('newsletter')}}">@lang('messages.newsletter')</a></li>
                                        <li id="newsletter_send"><a href="{{url('newsletter/send')}}">@lang('messages.newsletter_send')</a></li>
                                      </ul>
                                  </li>
                              </ul>

                              @endif

                        </ul>

                        <br>
                    
                <!-- END Navlist -->

                <!-- BEGIN Sidebar Collapse Button -->
                <div id="sidebar-collapse" class="visible-lg">
                    <i class="fa fa-angle-double-left"></i>
                </div>
                <!-- END Sidebar Collapse Button -->
            </div>
            <!-- END Sidebar -->

            <!-- BEGIN Content -->
            <div id="main-content">
                <!-- BEGIN Page Title -->
                <div class="page-title">
                    <div>
                        <h1><i class="fa fa-file-o"></i> @yield('page_title')</h1>
                    </div>
                </div>
                <!-- END Page Title -->

                <!-- BEGIN Breadcrumb -->
                <div id="breadcrumbs">
                    <ul class="breadcrumb">
                        <li class="active"><i class="fa fa-home"></i> @lang('messages.home')/ @yield('page_title') </li>
                    </ul>
                </div>
                <!-- END Breadcrumb -->

                @include('partial.flash')
                @yield('content')
            </div>
            <div class="footer" align="center">
                <p style="margin-top:-23px">{{\Carbon\Carbon::now()->year}} © iVAS Template</p>
            </div>
            <a id="btn-scrollup" class="btn btn-circle btn-lg" href="#"><i class="fa fa-chevron-up"></i></a>
        </div>
        <!-- END Content -->
        <!-- END Container -->

        <!--basic scripts-->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="assets/jquery/jquery-2.1.4.min.js"><\/script>')</script>
        <script src="{{url('assets/jquery-cookie/jquery.cookie.js')}}"></script>
        <script src="{{url('assets/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{url('assets/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{url('js/flaty.js')}}"></script>
        <?php
        $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        if (strpos($url, 'elfinder') === false) {
            ?>
            <!--page specific plugin scripts-->
            <script src="{{url('assets/flot/jquery.flot.js')}}"></script>
            <script src="{{url('assets/flot/jquery.flot.resize.js')}}"></script>
            <script src="{{url('assets/flot/jquery.flot.pie.js')}}"></script>
            <script src="{{url('assets/flot/jquery.flot.stack.js')}}"></script>
            <script src="{{url('assets/flot/jquery.flot.crosshair.js')}}"></script>
            {{--<script src="{{url('assets/flot/jquery.flot.tooltip.min.js')}}"></script>--}}
        <script src="{{url('assets/sparkline/jquery.sparkline.min.js')}}"></script>


        <script type="text/javascript" src="{{url('assets/chosen-bootstrap/chosen.jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{url('assets/bootstrap-inputmask/bootstrap-inputmask.min.js')}}"></script>
        <script type="text/javascript" src="{{url('assets/jquery-tags-input/jquery.tagsinput.min.js')}}"></script>
        <script type="text/javascript" src="{{url('assets/jquery-pwstrength/jquery.pwstrength.min.js')}}"></script>
        <script type="text/javascript" src="{{url('assets/bootstrap-fileupload/bootstrap-fileupload.min.js')}}"></script>
        <script type="text/javascript" src="{{url('assets/bootstrap-duallistbox/duallistbox/bootstrap-duallistbox.js')}}"></script>
        <script type="text/javascript" src="{{url('assets/dropzone/downloads/dropzone.min.js')}}"></script>
        <script type="text/javascript" src="{{url('assets/bootstrap-timepicker/js/bootstrap-timepicker.js')}}"></script>
        <script type="text/javascript" src="{{url('assets/clockface/js/clockface.js')}}"></script>
        <script type="text/javascript" src="{{url('assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script>
        <script type="text/javascript" src="{{url('assets/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
        <script type="text/javascript" src="{{url('assets/bootstrap-daterangepicker/date.js')}}"></script>
        <script type="text/javascript" src="{{url('assets/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
        <script type="text/javascript" src="{{url('assets/bootstrap-switch/static/js/bootstrap-switch.js')}}"></script>
        <script type="text/javascript" src="{{url('assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js')}}"></script>
        <script type="text/javascript" src="{{url('assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js')}}"></script>
        <script type="text/javascript" src="{{url('assets/ckeditor/ckeditor.js')}}"></script>


        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="{{url('assets/data-tables/bootstrap3/dataTables.bootstrap.js')}}"></script>
        <script src="{{url('js/pusher.min.js')}}"></script>
        <script src="{{url('js/pusher_config.js')}}"></script>
        <script src="{{url('js/vue.min.js')}}"></script>
        <script src="{{url('js/quill.js')}}"></script>
        <script src="{{url('js/ckquill.js')}}"></script>

        <!--flaty scripts-->
        <script>
                var app = new Vue({
                      el:'#app',
                      data:{
                          notify_count:0,
                          containerId:'notify',
                          notifications:[],
                          number : 0,
                          channel:''
                      },
                      methods:{
                          read_notify:function(){
                              var _this = this
                              $.get("{{url('read_notify')}}",function(data,status){
                                  _this.notify_count=0
                                  $('.badge-important').html(0)
                              })
                          },
                          handleScroll:function(){
                            // console.log(this.number);
                            // var _this = this
                            // $.get("{{url('get_notify/')}}/"+this.number,function(data,status){
                            //     console.log(data);
                            //     if(data.length == 0 ){
                            //         document.getElementById(_this.containerId).removeEventListener('scroll', this.handleScroll);
                            //     }
                            //     else{
                            //         for (let index = 0; index < data.length; index++) {
                            //         let object={
                            //             name:data[index].send_user.name ,
                            //             subject:data[index].subject,
                            //             link:data[index].link,
                            //             seen:data[index].seen
                            //         }
                            //         _this.notifications.push(object)
                            //         _this.number++;
                            //         console.log(_this.number);

                            //         }
                            //     }
                            //   });
                          }
                      },
                      computed:{
                          all_notifications:function(){
                              var _this = this
                              var data = "{{json_encode(all_notify())}}";
                             this.notification_data = JSON.parse(data.replace(/&quot;/g,'"'))
                             for (let index = 0; index < this.notification_data['Notification'].length; index++) {
                                 let object={
                                     name:this.notification_data['Notification'][index].send_user.name ,
                                     subject:this.notification_data['Notification'][index].subject,
                                     link:this.notification_data['Notification'][index].link,
                                     seen:this.notification_data['Notification'][index].seen
                                  }
                                  this.notifications.push(object)
                             }
                             _this.notify_count=this.notification_data['count']
                             return this.notifications
                          }
                      },
                      destroyed () {
                        document.getElementById(this.containerId).removeEventListener('scroll', this.handleScroll);
                      },
                      mounted(){
                          this.number = $('.not li').length - 1,
                          this.channel = pusher.subscribe('private-notification.{{\Auth::id()}}');
                          var _this = this;
                          this.channel.bind('notify-event', function(data) {
                              let object={
                                      name:data.send_user.name ,
                                      subject:data.message,
                                      link:data.link,
                                      seen:data.seen
                                  }
                                var x = '<li class="notify" style="width:100%"><a href="'+data.link+'">\
                                                <p class="green hover_remove"><strong>'+data.send_user.name+'</strong> '+data.message+'</p>\
                                           </a></li>';
                                $('.nav-header').after(x)
                              $('.fa-bell').addClass('anim-swing')
                              let audio = new Audio("{{url('files/facebook_sound.mp3')}}");
                              audio.play();
                              $('.badge-important').html(parseInt($('.badge-important').html()) + 1)
                              _this.notify_count = _this.notify_count+1;
                                 // Let's check whether notification permissions have already been granted
                                  if (Notification.permission === "granted") {
                                    // If it's okay let's create a notification
                                      var notification = new window.Notification("{{__('front.title')}}!", {
                                        body: data.send_user.name+' '+data.message,
                                        icon: "{{url('public/frontv2/images/logo/01.png')}}",
                                      });
                                    notification.onclick = function(event) {
                                      event.preventDefault();  //prevent the browser from focusing the Notification's tab, while it stays also open
                                      var new_window = window.open('','_blank'); //open empty window(tab)
                                      new_window.location = data.link; //set url of newly created window(tab) and focus
                                      this.close()
                                  };
                                }

                                // Otherwise, we need to ask the user for permission
                                else if (Notification.permission !== "denied") {
                                   Notification.requestPermission().then(function (permission) {
                                    // If the user accepts, let's create a notification
                                      var notification = new window.Notification("{{__('front.title')}}!", {
                                      body: data.send_user.name+' '+data.message,
                                      icon: "{{url('public/frontv2/images/logo/01.png')}}",
                                      });
                                    notification.onclick = function(event) {
                                      event.preventDefault();  //prevent the browser from focusing the Notification's tab, while it stays also open
                                      var new_window = window.open('','_blank'); //open empty window(tab)
                                      new_window.location = data.link; //set url of newly created window(tab) and focus
                                      this.close()
                                  };
                                })
                              }

                          }.bind(this));
                          var el = document.getElementById(this.containerId)
                          if(el){
                            el.addEventListener('scroll', this.handleScroll);
                          }
                      }

                  })
                  $(document).on('mouseenter','.hover_remove',function(){
                    $(this).removeClass('green')
                  })
              </script>
        <script>
    $('#mySwitch').on('switch-change', function (e, data) {
    var $el = $(data.el)
            , value = data.value;
    // console.log(value);
    if (value == false) {
        $('input[name="featured"]').val(0);
    } else {
        $('input[name="featured"]').val(1);
    }
    // console.log(e, $el, value);
    });
        </script>
        <script>
            $(function () {
                $("audio").on("play", function () {
                    $("audio").not(this).each(function (index, audio) {
                        audio.pause();
                    });
                    $("video").each(function (index, video) {
                        video.pause();
                    });
                });

                $("video").on("play", function () {
                    $("video").not(this).each(function (index, video) {
                        video.pause();
                    });
                    $("audio").each(function (index, audio) {
                        audio.pause();
                    });
                });
            });
        </script>
        <script>
            $(document).ready(function () {
                // $('#example').DataTable();
                var el = $('.chosen-rtl');
                if ("<?php echo App::getLocale(); ?>" == "ar") {
                    el.chosen({
                        rtl: true,
                        width: '100%'
                    });
                }
                else {
                    el.addClass("chosen");
                    el.removeClass("chosen-rtl");
                    $(".chosen").chosen();
                }
            });
        </script>

        <script>
            var check = false;

            function select_all(table_name, has_media)
            {
                if (!check)
                {
                    $('.select_all_template').prop("checked", !check);
                    $.get("{{url('get_table_ids?table_name=')}}" + table_name, function (data, status) {
                        data.forEach(function (item) {
                            collect_selected(item.id);
                        });
                    });
                    check = true;
                }
                else
                {
                    $('.select_all_template').prop("checked", !check);
                    check = false;
                    clear_selected();
                }
            }

        </script>

        <script>

            var selected_list = [];
            var checker_list = [];
            function collect_selected(element) {
                var id;
                if (!element.value)
                {
                    id = element;
                }
                else {
                    id = element.value;
                }

                if (checker_list[id])
                {
                    var index = selected_list.indexOf(id);
                    selected_list.splice(index, 1);
                    checker_list[id] = false;
                }
                else {
                    if (!selected_list.includes(id))
                    {
                        selected_list.push(id);
                        checker_list[id] = true;
                    }
                }
            }

            function clear_selected()
            {
                selected_list = [];
                checker_list = [];
            }

        </script>

        <script>
            $(document).ready(function () {
                // $('#example').DataTable();
            });


            function delete_selected(table_name) {
              console.log(selected_list);

                var confirmation = confirm('Are you sure you want to delete this ?');
                if (confirmation)
                {
                    var form = document.createElement("form");
                    var element = document.createElement("input");
                    var tb_name = document.createElement("input");
                    var csrf = document.createElement("input");
                    csrf.name = "_token";
                    csrf.value = "{{ csrf_token() }}";
                    csrf.type = "hidden";

                    form.method = "POST";
                    form.action = "{{url('delete_multiselect')}}";

                    element.value = selected_list;
                    element.name = "selected_list";
                    element.type = "hidden";

                    tb_name.value = table_name;
                    tb_name.name = "table_name";
                    tb_name.type = "hidden";

                    form.appendChild(element);
                    form.appendChild(csrf);
                    form.appendChild(tb_name);

                    document.body.appendChild(form);

                    form.submit();
                }
            }

            var initChosenWidgets = function () {
                $(".chosen").chosen();
            };
        </script>
        <script>
            $(document).ready(function () {
                $('#example').DataTable({
                    //  'lengthMenu': [5, 10, 15, 20, 25, 50, 'All']
                    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                    "pageLength": 50
                });
            });
            jQuery(document).ready(function() {
            CKEDITOR.replace( 'ckeditor1' );
            CKEDITOR.replace( 'ckeditor2' );
            });
        </script>
        <script src="{{url('js/cropper.min.js')}}" defer></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $(function () {
                $("#resizable").resizable();
            });
            try {
                $('.js-datepicker').datepicker({
                    "singleDatePicker": true,
                    "showDropdowns": true,
                    "autoUpdateInput": false,
                     dateFormat: 'yy-mm-dd'
                });



            } catch(er) {console.log(er);}
        </script>
        <script src="{{url('js/flaty-demo-codes.js')}}"></script>
    <?php } ?>
    @yield('script')

</body>
</html>
