<?php
Route::post('/register', 'HomeController@register');
Route::post('/login', 'HomeController@login');

Route::get('/home', 'HomeController@index');
Route::get('/categorys', 'HomeController@categorys');
Route::get('/products', 'HomeController@products');
Route::get('/brands', 'HomeController@brands');
Route::get('/inner_product/{id}', 'HomeController@inner_product');
Route::get('/setting', 'HomeController@getSettign');
Route::post('contact', 'HomeController@contact');
Route::get('governorate', 'HomeController@governorate');
Route::get('city', 'HomeController@city');

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('/edit_profile', 'HomeController@edit_profile');
    Route::post('updated_password','HomeController@updated_password');
    Route::get('/addresses', 'HomeController@addresses');
    Route::get('/delete_address/{id}', 'HomeController@delete_address');
    Route::post('add_address', 'HomeController@add_address');
    Route::post('updated_address/{id}', 'HomeController@updated_address');
    Route::get('/my_cart', 'HomeController@my_cart');
    Route::get('/delete_cart/{id}', 'HomeController@delete_cart');
    Route::post('add_cart', 'HomeController@store_cart');
    Route::post('updated_cart/{id}', 'HomeController@update_cart');
    Route::post('check_coupon', 'HomeController@check_coupon');
    Route::post('check_out', 'HomeController@make_order');
    Route::post('add_rate', 'HomeController@add_rate');
    Route::post('available', 'HomeController@is_available');
    Route::get('client', 'HomeController@details_client');
});
