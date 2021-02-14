<?php

use App\ClientRate;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\DeleteAll;
use App\Events\Notifications;
use App\RouteModel;
use App\Product;
use App\Notification;
use App\Advertisement;
use App\OrderDetail;

function delete_multiselect(Request $request) // select many contract from index table and delete them
{
  $selected_list = explode(",", $request['selected_list']);
  foreach ($selected_list as $item) {
    DB::table($request['table_name'])->where('id', $item)->delete();
  }
  \Session::flash('success', \Lang::get('messages.custom-messages.deleted'));
}

function restore($table_name, $record_id)
{
  \DB::table($table_name)->where('id', $record_id)->update(['rectype_id' => 2]);
}

function get_delete_all_flag()
{
  $route = \Route::getFacadeRoot()->current()->uri();
  $get_route = RouteModel::where('route', $route)->where('method', 'get')->first();
  $flag = $get_route->delete_all_model;
  if ($flag)
    return true;
  return false;
}

function get_static_routes()
{

  Route::get('/test', 'DashboardController@test');

  // // Authentication Routes...
  // Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
  // Route::post('login', 'Auth\LoginController@login');
  // Route::post('logout', 'Auth\LoginController@logout')->name('logout');
  //
  // // Registration Routes...
  // Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
  // Route::post('register', 'Auth\RegisterController@register');
  //
  // // Password Reset Routes...
  // Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
  // Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
  // Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
  // Route::post('password/reset', 'Auth\ResetPasswordController@reset');
  Auth::routes();

  Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);

  Route::get('/', 'DashboardController@index');

  Route::group(['middleware' => 'auth'], function () {
    Route::resource('static_translation', '\App\Http\Controllers\StaticTranslationController');
    Route::get('read_notify', function () {
      \App\Notification::where('notified_id', \Auth::id())->update([
        'seen' => 1
      ]);
    });
  });

  Route::group(['middleware' => ['auth', "role:super_admin"]], function () {
    Route::get('routes_v2', 'RouteController@create_v2');
    Route::get('routes/index_v2', 'RouteController@index_v2');
    Route::get('get_controller_methods', 'RouteController@get_methods_for_selected_controller');
    Route::post('routes/store_v2', 'RouteController@store_v2');
    Route::get('get_notify/{id}', 'OrderController@load_notify');
    Route::get('order/allData', 'OrderController@allData');
    Route::get('offer_image/{id}/delete', 'CategoryController@offer_image_delete');

    Route::get('ldap', 'DashboardController@ldap');
    Route::get('export_DB', 'DashboardController@export_DB_backup');
    Route::get('database_backups', 'DashboardController@list_backups');
    Route::get('delete_backup', 'DashboardController@delete_backup');
    Route::get('import_DB', 'DashboardController@import_DB_backup');
    Route::get('download_backup', 'DashboardController@download_backup');
    Route::get('/clear-cache', 'DashboardController@clear_cache');
    Route::get('admin/elfinder', 'ElfinderController@getIndex');
    Route::post('admin/elfinder', 'ElfinderController@getIndex');
    Route::get('admin/seed_manager', 'DashboardController@seed_manager');
    Route::post('admin/seed_tables', 'DashboardController@seed_tables');
    Route::get('admin/migrate_manager', 'DashboardController@migrate_manager');
    Route::post('admin/migrate_tables', 'DashboardController@migrate_tables');
    Route::post('admin/product/delete/all', 'ProductController@delete_all_product')->name('admin.product.delete.all');
    Route::post('admin/product/update/all', 'ProductController@update_all_product')->name('admin.product.update.all');
    Route::resource('admin/product/image', 'ImageController', ['as' => 'admin']);
    Route::post('admin/image/order/{id}', 'ImageController@orderImage');
    Route::get('image/{id}/delete', 'ImageController@destroy');
    Route::get('product/{id}/dublicate', 'ProductController@dublicate_product');
    Route::get('remove/old/order/details', 'OrderController@removeProductFromOrderDeatilsThatNotHaveOrder');
    Route::get('add/solid/count', 'ProductController@updateOldSolidCountInProduct');
    /*****************start design v2 */
    Route::get('homepage/slides', 'HomeController@slidesv2');
    Route::get('slides/{id}/edit', 'HomeController@editv2');
    Route::post('slides/{id}/edit', 'HomeController@adsUpdatev2');
    Route::get('homepage/change_state', 'HomeController@change_state');
    Route::get('homepage/recently_added', 'HomeController@recently_added');
    Route::get('homepage/selected_for_you', 'HomeController@selected_for_you');
    Route::get('homepage/homepage_category', 'HomeController@homepage_category');
    Route::get('homepage/change_order', 'HomeController@change_order');
    Route::get('homepage/banners', 'HomeController@bannersv2');
    Route::get('homepage/recently_addedv', 'HomeController@Recently_Addedv');
    Route::get('homepage/selected_for_youv', 'HomeController@selected_for_youv');
    Route::get('homepage/selected_HPcat', 'HomeController@selected_HPcat');
    Route::get('homepage/offer', 'HomeController@makeOffer');
    Route::get('brands/home/flag', 'BrandController@updateBrandHomeFlag');
    Route::get('brands/{id}/discount', 'BrandController@getHandleDiscountPage');
    Route::post('brands/{id}/discount', 'BrandController@handleDiscount');
    Route::get("product_update_price_excel" ,'ProductController@product_update_price_excel');
    /*****************************end */
  });


  Route::post('delete_multiselect', function (Request $request) {
    if (strlen($request['selected_list']) == 0) {
      \Session::flash('failed', \Lang::get('messages.custom-messages.no_selected_item'));
      return back();
    }
    delete_multiselect($request);
    return back();
  });
  Route::get('get_table_ids', 'DashboardController@get_table_ids_list');
}

function get_dynamic_routes()
{
  $route = \Request::url();
  $request_method = strtolower(\Request::method());
  $action = "";
  $checker = false;
  $url_to = \URL::to('');
  $start_from = strpos($route, $url_to);
  for ($i = strlen($url_to) + 1; $i < strlen($route); $i++) {
    // ex : url = http://localhost/ivas_template_v2/users => so i want to skip all before users
    if (is_numeric($route[$i])) {
      if (!$checker) {
        if ($route[$i - 1] == "/") {
          // it may be a route with name index_v2,without this validation it will be index_v{id}
          $action .= "{id}";
          // for the edit request , language/9/edit => language/{id}/edit
          $checker = true;
        } else
          $action .= $route[$i];
      } else
        continue;
    } else {
      $action .= $route[$i];
    }
  }
  try {
    $query = "SELECT * FROM routes
                      JOIN role_route ON routes.id = role_route.route_id
                      JOIN roles ON role_route.role_id = roles.id
                      WHERE routes.route = '" . $action . "' AND routes.method='" . $request_method . "'";
    $route_model = \DB::select($query);
    if (count($route_model) > 0) {
      dynamic_routes($route_model, true);
    } else {
      $query_2 = "SELECT * FROM routes
                            WHERE routes.route = '" . $action . "'
                            AND routes.method='" . $request_method . "'";
      $route_model = \DB::select($query_2);
      dynamic_routes($route_model, false);
    }
  } catch (Illuminate\Database\QueryException $e) {

  }

}

function dynamic_routes($route_model, $found_roles)
{
  $roles = "";
  if (count($route_model) == 0) {
    return;
  }
  $route = $route_model[0]->route;
  $controller_method =
    $route_model[0]->controller_name . "@" . $route_model[0]->function_name;
  $route_method = $route_model[0]->method;
  if ($found_roles) {
    for ($i = 0; $i < count($route_model); $i++) {
      $roles .= $route_model[$i]->name;
      if ($i < count($route_model) - 1)
        $roles .= "|";
    }
    Route::group(['middleware' => ['auth', "role:" . $roles]],
      function () use ($route_model, $route_method, $route, $controller_method) {
        if ($route_method == "resource")
          Route::resource($route, $controller_method);
        else if ($route_method == "get")
          Route::get($route, $controller_method);
        else if ($route_method == "post")
          Route::post($route, $controller_method);
        else if ($route_method == "put")
          Route::put($route, $controller_method);
        else if ($route_method == "patch")
          Route::patch($route, $controller_method);
        else if ($route_method == "delete")
          Route::delete($route, $controller_method);
      });
  } else {
    Route::group(['middleware' => ['auth']],
      function () use ($route_model, $route_method, $route, $controller_method) {
        if ($route_method == "resource")
          Route::resource($route, $controller_method);
        else if ($route_method == "get")
          Route::get($route, $controller_method);
        else if ($route_method == "post")
          Route::post($route, $controller_method);
        else if ($route_method == "put")
          Route::put($route, $controller_method);
        else if ($route_method == "patch")
          Route::patch($route, $controller_method);
        else if ($route_method == "delete")
          Route::delete($route, $controller_method);
      });
  }
}

function categorys()
{
  $categorys = \App\Category::whereNull('parent_id')->get();
  return $categorys;
}

function categoryInFooter()
{
  $categorys = \App\Category::whereNull('parent_id')->withCount('sub_cats')->orderBy('sub_cats_count','asc')->get();
  return $categorys;
}

function filter_categorys()
{
  $categorys = \App\Category::whereNull('parent_id');
  if (request()->filled('category_id')) {
    $categorys = $categorys->where('categories.id', request()->get('category_id'));
  }
  if (request()->route('category_id')) {
    $categorys = $categorys->where('categories.id', request()->route('category_id'));
  }

  if (request()->has('brand_id') && request()->get('brand_id') != '' && !request()->has('sub_category_id')) {
    $categorys = \App\Category::join('categories AS t2', 'categories.parent_id', 't2.id')
      ->join('products', 'products.category_id', '=', 'categories.id')
      ->join('brands', 'brands.id', '=', 'products.brand_id')
      ->where('products.brand_id', request()->get('brand_id'))
      ->select('t2.*', 't2.id AS parID')
      ->groupBy('parID');
  }
  if (request()->route('brand_id')) {
    $categorys = \App\Category::join('categories AS t2', 'categories.parent_id', 't2.id')
      ->join('products', 'products.category_id', '=', 'categories.id')
      ->join('brands', 'brands.id', '=', 'products.brand_id')
      ->where('products.brand_id', request()->route('brand_id'))
      ->select('t2.*', 't2.id AS parID')
      ->groupBy('parID');
  }
  if (request()->filled('sub_category_id')) {
    $parent_ids = \App\Category::whereIn('id', (array) request()->get('sub_category_id'))->pluck('parent_id')->toArray();
    $parent_ids = array_unique($parent_ids);
    $categorys = $categorys->whereIn('categories.id', $parent_ids);
  }
  if (request()->route('category_name')) {
    $parent_ids = \App\Category::where('categories.title', str_replace("-", " ", request()->route("category_name")))->pluck('parent_id')->toArray();
    $parent_ids = array_unique($parent_ids);
    $categorys = $categorys->whereIn('categories.id', $parent_ids);
  }
  return $categorys->get();
}

function brands()
{
  if (\Session::get('applocale') == 'ar') {
    $brands = \App\Brand::join('translatables','translatables.record_id','=','brands.id')
      ->join('tans_bodies','tans_bodies.translatable_id','translatables.id')
      ->where('translatables.table_name','brands')
      ->where('translatables.column_name','title')
      ->select('brands.*','brands.id As id')
      ->orderby('body', 'ASC')
      ->groupBy('title')
      ->get();
  } else {
    $brands = \App\Brand::orderby('title', 'ASC')->get();
  }
  return $brands;
}

function filtter_brands()
{
  if (\Session::get('applocale') == 'ar') {
    $brands = \App\Brand::select('brands.*')->join('products', 'products.brand_id', '=', 'brands.id')
      ->join('translatables','translatables.record_id','=','brands.id')
      ->join('tans_bodies','tans_bodies.translatable_id','translatables.id')
      ->where('translatables.table_name','brands')
      ->where('translatables.column_name','title')
      ->select('brands.*','brands.id As id')
      ->orderby('body', 'ASC')
      ->groupBy('title');

    if (request()->has('sub_category_id') && request()->get('sub_category_id') != '') {
      $brands = $brands->where('products.category_id', request()->get('sub_category_id'));
    }
    if (request()->has('category_id') && request()->get('category_id') != '') {
      $category_ids = \App\Category::where('parent_id', request()->get('category_id'))->pluck('id')->toArray();
      $brands = $brands->whereIn('products.category_id', $category_ids);
    }
    return $brands->groupBy('brands.id')->orderby('body', 'ASC')->get();
  } else {
    $brands = \App\Brand::select('brands.*')->join('products', 'products.brand_id', '=', 'brands.id');
    if (request()->has('sub_category_id') && request()->get('sub_category_id') != '') {
      $brands = $brands->where('products.category_id', request()->get('sub_category_id'));
    }
    if (request()->has('category_id') && request()->get('category_id') != '') {
      $category_ids = \App\Category::where('parent_id', request()->get('category_id'))->pluck('id')->toArray();
      $brands = $brands->whereIn('products.category_id', $category_ids);
    }
    return $brands->groupBy('brands.id')->orderby('title', 'ASC')->get();
  }
}

function getCode()
{

  $code = App::getLocale();
  return $code;
}

function get_limit_paginate()
{
  return setting('page_limit');
}

function setting($key)
{
  $data = \DB::table('settings')->where('key', 'like', '%' . $key . '%')->first();
  return $data ? $data->value : '';
}

function setting_2($key)
{
  return \App\StaticTranslation::getBodyByKeyWord($key, getCode());
}

function count_session_cart()
{
  $count = 0;
  if (isset($_COOKIE['carts'])) {
    $carts = unserialize($_COOKIE['carts']);
    $count = count($carts);
  }
  return $count;
}

function product($id)
{
  return \App\Product::find($id);
}

function all_notify()
{
  $Notification = Notification::with('send_user')->where('notified_id', \Auth::id())->latest()->take(5)->get();
  $count_Notification = Notification::where('seen', 0)->where('notified_id', \Auth::id())->count();
  return ['Notification' => $Notification, 'count' => $count_Notification];
}

function send_notification($message, $client_id, $link)
{
  $user = \App\User::find(1);
  Notification::create([
    'notifier_id' => $client_id,
    'notified_id' => $user->id,
    'subject' => $message,
    'link' => $link
  ]);
  broadcast(new Notifications($message, $user, $link))->toOthers();
}

function ar_en()
{
  if (\App::getLocale() == 'ar') {
    return 'text-right';
  } else {
    return 'text-left';
  }
}

function dir_ar_en()
{
  if (\App::getLocale() == 'ar') {
    return 'rtl';
  } else {
    return 'ltr';
  }
}

function is_buy($p_id)
{
  if (\Auth::guard('client')->check()) {
    $order = \App\Order::join('order_details', 'orders.id', '=', 'order_details.order_id')
      ->join('products', 'products.id', '=', 'order_details.product_id')
      ->where('orders.client_id', \Auth::guard('client')->user()->id)
      ->where('orders.status', 3)
      ->where('products.id', $p_id)->first();
    if ($order) {
      return true;
    }
  }
  return false;
}

function is_not_rate($p_id)
{
  $rate = ClientRate::where('client_id', \Auth::guard('client')->user()->id)
    ->where('product_id', $p_id)->first();
  if ($rate) {
    return false;
  }
  return true;
}

function ads()
{
  $ads = \App\Advertisement::all();
  return $ads;
}

function last_price($price)
{
  $coupons = \App\Coupon::where('client_id', \Auth::guard('client')->user()->id)->where('used', 1)->sum('value');
  return $price - $coupons;
}

function advertisements($order)
{
  $ads = Advertisement::where('type', 'homeads')->where('active', 1)->where('order', $order)->first();
  // dd($ads);
  return $ads;
}

function count_product($id)
{
  // dd($id);
  // $count_product = OrderDetail::where('product_id', $id)->count();
  $count_product = OrderDetail::select('*')
            ->join('orders', 'orders.id', '=', 'order_details.order_id')
            ->where('orders.status','=', 3)
            ->where('order_details.product_id','=', $id)
            ->count();
  return $count_product;



}

function count_quantities($id)
{

  //$count_quantities = OrderDetail::where('product_id', $id)->sum('quantity');
  $count_quantities = OrderDetail::select('*')
  ->join('orders', 'orders.id', '=', 'order_details.order_id')
  ->where('orders.status','=', 3)
  ->where('order_details.product_id','=', $id)
  ->sum('quantity');
  //dd($count_quantities);
  return $count_quantities;
}

// Here I want to auto generate slug based on the title
function setSlug($title){
  //dd($title);
  $string=  str_slug($title , "-");
  $separator = '-';
  $string = trim($title);
  // Lower case everything
  // using mb_strtolower() function is important for non-Latin UTF-8 string | more info: https://www.php.net/manual/en/function.mb-strtolower.php
  // $string = mb_strtolower($string, "UTF-8");;

  // Make alphanumeric (removes all other characters)
  // this makes the string safe especially when used as a part of a URL
  // this keeps latin characters and arabic charactrs as well
  $string = preg_replace("/[^a-z0-9_\s\-ءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]#u/", "", $string);

  // Remove multiple dashes or whitespaces
  $string = preg_replace("/[\s-]+/", " ", $string);

  $string = str_replace("،", "", $string);
  $string = str_replace(",", "", $string);
  $string = str_replace('/', "", $string);
  $string = str_replace('(', "", $string);
  $string = str_replace(')', "", $string);
  $string = str_replace("\\", "", $string);


  // Convert whitespaces and underscore to the given separator
  $string = preg_replace("/[\s_]/", $separator, $string);

  return $string;
}

function checkbuyLimit($product_id)
{
  if(auth()->guard("client")->check()) {
    $countOrder = OrderDetail::where("product_id", $product_id)->whereHas("order",function($query) {
      $query->where("client_id", auth()->guard("client")->id());
    })->sum("quantity");
    if($countOrder < 2) {
      return ['status' => true ,'count' => $countOrder];
    }
    return ['status' => false ,'count' => 0];
  } else {
    return ['status' => true ,'count' => 0];
  }
}
