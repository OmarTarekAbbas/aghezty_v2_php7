<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

get_static_routes() ;
get_dynamic_routes();
define('DS', DIRECTORY_SEPARATOR);
Route::get('/',function(){
    return view('front.index');
});
Route::prefix('clients')->group(function() {
    Route::get('/register', 'Auth\ClientRegisterController@showLoginForm')->name('client.register');
    Route::post('/register', 'Auth\ClientRegisterController@register')->name('client.register.submit');
    Route::get('/login', 'Auth\ClientLoginController@showLoginForm')->name('client.login');
    Route::post('/login', 'Auth\ClientLoginController@login')->name('client.login.submit');
    Route::get('home','front\HomeController@index');
    Route::get('products','front\HomeController@products');
    Route::get('loadproduct','front\HomeController@load_products');
    Route::get('product/{id}','front\HomeController@inner_product');
    Route::get('sub_categorys','front\HomeController@list_sub');
    Route::get('all_brand','front\HomeController@list_brands');
    Route::get('contact','front\HomeController@contact_index');
    Route::post('contact','front\HomeController@contact_store');
    Route::post('is_available','front\HomeController@is_available');
    Route::get('city/{id}','front\HomeController@get_city');
    Route::get('cart','front\HomeController@my_cart');

    /* Start Baher Routes */
    Route::get('cartv2',function(){
        return view('frontv2.cart');
    });

    Route::get('contact_usv2',function(){
        return view('frontv2.contact_us');
    });

    Route::get('loginv2',function(){
        return view('frontv2.login');
    });

    Route::get('maintenancev2',function(){
        return view('frontv2.maintenance');
    });

    Route::get('myorderv2',function(){
        return view('frontv2.myorder');
    });

    Route::get('addressv2',function(){
        return view('frontv2.address');
    });

    Route::get('ordersv2',function(){
        return view('frontv2.orders');
    });

    Route::get('passwordv2',function(){
        return view('frontv2.password');
    });

    Route::get('paymentv2',function(){
        return view('frontv2.payment');
    });

    Route::get('profilev2',function(){
        return view('frontv2.profile');
    });

    Route::get('innerv2',function(){
        return view('frontv2.inner-page');
    });

    Route::get('registerv2',function(){
        return view('frontv2.register');
    });
    /* End Baher Routes */

    Route::post('cart','front\HomeController@store_cart');
    Route::get('update_cart','front\HomeController@update_cart');
    Route::get('delete_cart','front\HomeController@delete_cart');
    Route::get('service_center','front\HomeController@service_center');
    Route::get('mail',function(){
        return view('front.mail');
    });

    Route::group(['middleware' => 'auth:client'], function () {
        Route::get('profile','front\HomeController@profile');
        Route::post('updated','front\HomeController@update');
        Route::post('updated_password','front\HomeController@updated_password');
        Route::post('updated_address/{id}','front\HomeController@updated_address');
        Route::post('add_address','front\HomeController@add_address');
        Route::get('address/{id}/delete','front\HomeController@delete_address');
        Route::get('choose_address','front\HomeController@choose_address');
        Route::post('check_coupon','front\HomeController@check_coupon');
        Route::post('add_rate','front\HomeController@add_rate');
        Route::get('payment','front\HomeController@payment');
        Route::post('payment','front\HomeController@make_order');
        Route::get('thanks','front\HomeController@thanks');
        Route::get('logout','front\HomeController@logout');
   });

    /*************** designv2 routes ****/
    Route::get('homev2', 'front\HomeController@indexv2');
    Route::get('service_centerv2', 'front\HomeController@service_centerv2');
    Route::get('contactv2', 'front\HomeController@contactusv2');
    Route::get('productsv2', 'front\HomeController@productsv2');
    Route::any('loadproductsv2', 'front\HomeController@load_productsv2');
    Route::get('productv2/{id}', 'front\HomeController@inner_productsv2')->name('front.home.inner');
    /*************** end ***************/

});
Route::get('token','front\HomeController@get_token');
