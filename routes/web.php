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
Route::get('/','front\HomeController@indexv2')->name('front.home.index');



Route::prefix('clients')->group(function() {

 /*************** test baher ***************/
 Route::get('omar', 'front\HomeController@productsv2_test');
 Route::any('loadproductsv2_test', 'front\HomeController@loadproductsv2_test');

 /*************** end  baher***************/



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
    Route::post('cart','front\HomeController@store_cart');
    Route::get('update_cart','front\HomeController@update_cart');
    Route::get('delete_cart','front\HomeController@delete_cart');
    Route::get('service_center','front\HomeController@service_center');
    /*************** designv2 routes ****/
    Route::get('error404', 'front\HomeController@error404')->name('front.home.error404');
    // Route::get('homev2', 'front\HomeController@indexv2')->name('front.home.index');
    Route::get('service_centerv2', 'front\HomeController@service_centerv2');
    Route::get('contactv2', 'front\HomeController@contactusv2');
    Route::get('productsv2', 'front\HomeController@productsv2')->name('front.home.list');
    Route::any('loadproductsv2', 'front\HomeController@load_productsv2');
    Route::get('productv2/{id}', 'front\HomeController@inner_productv2')->name('front.home.inner');
    Route::post('add_ratev2','front\HomeController@add_ratev2')->name('front.home.rate');
    Route::post('is_availablev2','front\HomeController@is_availablev2')->name('front.home.available');
    Route::get('/registerv2', 'Auth\ClientRegisterController@showLoginForm')->name('front.client.register');
    Route::post('/registerv2', 'Auth\ClientRegisterController@register')->name('front.client.register.submit');
    Route::get('/loginv2', 'Auth\ClientLoginController@showLoginForm')->name('front.client.login');
    Route::post('/loginv2', 'Auth\ClientLoginController@login')->name('front.client.login.submit');
    Route::get('logoutv2','front\HomeController@logoutv2')->name('front.home.logout');
    Route::get('cartv2','front\HomeController@my_cartv2')->name('front.home.cart');
    Route::post('cartv2','front\HomeController@store_cartv2')->name('front.home.cart.add');
    Route::post('check_couponv2','front\HomeController@check_couponv2')->name('front.home.coupon');
    Route::get('update_cartv2','front\HomeController@update_cartv2')->name('front.home.cart.update');
    Route::get('delete_cartv2','front\HomeController@delete_cartv2')->name('front.home.cart.delete');
    Route::get('brands','front\HomeController@getBrand');
    /*************** end ***************/

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

        /*************** designv2 routes ****/
        Route::post('updatedv2','front\HomeController@updatev2')->name('front.home.update');
        Route::get('passwordv2','front\HomeController@get_passwordv2')->name('front.home.password');
        Route::post('updated_passwordv2','front\HomeController@updated_passwordv2')->name('front.home.password.update');
        Route::get('addressv2','front\HomeController@get_addressv2')->name('front.home.address');
        Route::post('updated_addressv2/{id}','front\HomeController@updated_addressv2')->name('front.home.address.update');
        Route::post('phoneStoreAjax','front\HomeController@phoneStoreAjax');
        Route::post('add_addressv2','front\HomeController@add_addressv2')->name('front.home.address.add');
        Route::get('addressv2/{id}/delete','front\HomeController@delete_addressv2')->name('front.home.address.delete');
        Route::get('ordersv2','front\HomeController@get_ordersv2')->name('front.home.order');
        Route::get('profilev2','front\HomeController@profilev2')->name('front.home.profile');
        Route::get('paymentv2','front\HomeController@paymentv2')->name('front.home.checkout.get');
        Route::post('paymentv2','front\HomeController@make_orderv2')->name('front.home.checkout.submit');
        Route::get('thanksv2','front\HomeController@thanksv2')->name('front.home.checkout.thanks');
        Route::get('order_addressv2','front\HomeController@choose_addressv2')->name('front.home.checkout.address');
        Route::get('myorderv2/{id}','front\HomeController@myorderv2')->name('front.home.inner.order');
        Route::get('confirm_order/{id}/{phone?}','front\HomeController@confirm_order')->name('front.home.confirm');
        Route::get('toggle/wishlist','front\WishListController@createOrdelete')->name('front.toggle.product.wishlist');
        Route::get('wishlist','front\WishListController@index')->name('front.home.wishlist');
        Route::get('add/wishlist/to/cart','front\WishListController@addWishlistProductToCart')->name('front.add.wishlist.to.cart');
        //nbe
        Route::get('ready_nbe/','front\HomeController@readyNbe')->name('front.home.ready.nbe');
        Route::post('createPayment/','front\HomeController@createOrderWithPayment')->name('front.home.payment.submit');
        Route::get('nbe_click_script','front\HomeController@nbe_click_script');

        //cib
        Route::get('cib_click_script','front\HomeController@cib_click_script');
        Route::get('ready_cib/','front\HomeController@readyCIB');
        Route::post('createPaymentCIB/','front\HomeController@createOrderWithPaymentCIB');

        //payment_status
        Route::post('canclePayment','front\HomeController@canclePayment');
        Route::post('failPayment','front\HomeController@failPayment');
        /*************** End****/
   });

    /*************** designv2 routes ****/
    // Route::get('homev2', 'front\HomeController@indexv2')->name('front.home.index');
    Route::get('service_centerv2', 'front\HomeController@service_centerv2');
    Route::get('about_mev2', 'front\HomeController@about_mev2');
    Route::get('terms_conv2', 'front\HomeController@terms_conv2');
    Route::View('visa_terms', 'frontv2/visa_terms');
    Route::View('visa_online', 'frontv2/visa_online');
    Route::get('contactv2', 'front\HomeController@contactusv2');
    Route::get('productsv2', 'front\HomeController@productsv2')->name('front.home.list');
    Route::any('loadproductsv2', 'front\HomeController@load_productsv2');
    Route::get('productv2/{id}/{slug?}', 'front\HomeController@inner_productv2')->name('front.home.inner');
    Route::post('add_ratev2','front\HomeController@add_ratev2')->name('front.home.rate');
    Route::post('is_availablev2','front\HomeController@is_availablev2')->name('front.home.available');
    Route::get('/registerv2', 'Auth\ClientRegisterController@showLoginForm')->name('front.client.register');
    Route::post('/registerv2', 'Auth\ClientRegisterController@register')->name('front.client.register.submit');
    Route::get('/loginv2', 'Auth\ClientLoginController@showLoginForm')->name('front.client.login');
    Route::post('/loginv2', 'Auth\ClientLoginController@login')->name('front.client.login.submit');
    Route::get('logoutv2','front\HomeController@logoutv2')->name('front.home.logout');
    Route::get('cartv2','front\HomeController@my_cartv2')->name('front.home.cart');
    Route::post('cartv2','front\HomeController@store_cartv2')->name('front.home.cart.add');
    Route::post('check_couponv2','front\HomeController@check_couponv2')->name('front.home.coupon');
    Route::get('update_cartv2','front\HomeController@update_cartv2')->name('front.home.cart.update');
    Route::get('delete_cartv2','front\HomeController@delete_cartv2')->name('front.home.cart.delete');
    /*************** end ***************/

});

// 5123450000000008 - 05 / 21 - 100
Route::View('test_nbe_integration',"frontv2/test_nbe_integration");

Route::get('token','front\HomeController@get_token');
Route::post('create_paymentv2','front\HomeController@create_paymentv2');
Route::post('execute_paymentv2','front\HomeController@execute_paymentv2');
Route::get('getProperty','front\HomeController@getProperty');
Route::get('getChild','front\HomeController@getChild');


Route::get('/facebook_redirect', 'SocialAuthFacebookController@redirect');
Route::get('/facebook_callback', 'SocialAuthFacebookController@callback');

/**newsletter routes */
Route::get('newsletter', 'NewsletterController@index');
Route::get('newsletter/testmail', 'NewsletterController@testmail');
Route::get('newsletter/send', 'NewsletterController@send');
Route::post('newsletter/store', 'NewsletterController@store');
Route::get('newsletter/{id}/delete', 'NewsletterController@delete');
Route::post('newsletter/send_message', 'NewsletterController@sendMessage');
Route::get('newsletter/send_message/{message}', 'NewsletterController@sendMessage');
/**end newsletter routes */
Route::get('category/{sub_category_id?}/{slug?}/{property?}', 'front\HomeController@productsv2Slug')->name("front.home.search.category");
Route::get('brand/{brand_id?}/{slug?}', 'front\HomeController@productsv2Slug');
Route::get('parent/{category_id?}/{slug?}', 'front\HomeController@productsv2Slug');
Route::get('filter/{category_name?}/{brands_name?}', 'front\HomeController@productsv2Filter');

Route::get("discount" ,'ProductController@updateOldProductWithDiscount');
Route::get("solid" ,'ProductController@updateOldSolidCountInProduct');
Route::get("old_order_details" ,'OrderController@removeProductFromOrderDeatilsThatNotHaveOrder');
