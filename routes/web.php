<?php

use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'SiteController@index');
Route::get('/login', 'UserAuthController@login');
Route::post('/login/post', 'UserAuthController@login_post');
Route::get('/register', 'UserAuthController@register');
Route::post('/register/post', 'UserAuthController@register_post');
Route::get('/logout', 'UserAuthController@logout');


Route::get('/product/detail/{id}', 'SiteController@product_detail');
Route::post('/add_cart/{id}', 'CartController@addCart');
Route::get('/cart', 'CartController@cart')->name('cart');
Route::get('/cart/plus/{id}', 'CartController@plus_cart');
Route::get('/cart/minus/{id}', 'CartController@minus_cart');
Route::get('/cart/delete/{id}', 'CartController@cart_delete');

Route::get('/checkout/shipment', 'ShipmentController@checkout')->name("checkout_shipment");
Route::get('/checkout/shipment/get-province/', 'ShipmentController@getProvince');
Route::get('/checkout/shipment/get-city/{id}', 'ShipmentController@getCity');
Route::get('/checkout/shipment/get-ongkir', 'ShipmentController@getOngkir');
Route::get('/checkout/shipment/get-district/{id}', 'ShipmentController@getDistrict');
Route::get('/checkout/shipment/get-village/{id}', 'ShipmentController@getVillage');
Route::post('/checkout/add_address', 'ShipmentController@add_address');
Route::get('/checkout_delete_session', 'ShipmentController@delete_session');

Route::get('/origin={city_origin}&destination={city_destination}&weight={weight}&courier={courier}', 'ShipmentController@getOngkir');


Route::get('/admin/login', 'AuthController@index')->name('login');
Route::post('/admin/postlogin', 'AuthController@postlogin');
Route::get('/admin/logout', 'AuthController@logout');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin/dashboard', 'DashboardController@index');
    Route::get('/admin/products', 'ProductsController@index');
    Route::get('/admin/products/print_pdf', 'ProductsController@print_pdf');
    Route::post('/admin/product/create', 'ProductsController@create');
    Route::get('/admin/product/edit/{id}', 'ProductsController@edit');
    Route::post('/admin/product/update/{id}', 'ProductsController@update');
    Route::get('/admin/product/delete/{id}', 'ProductsController@delete');
    Route::get('/admin/product/detail/{id}', 'ProductsController@detail');

    Route::get('/admin/brands', 'BrandsController@index');
    Route::post('/admin/brand/create', 'BrandsController@create');
    Route::get('/admin/brand/edit/{id}', 'BrandsController@edit');
    Route::post('/admin/brand/update/{id}', 'BrandsController@update');
    Route::get('/admin/brand/delete/{id}', 'BrandsController@delete');

    Route::get('/admin/categories', 'CategoriesController@index');
    Route::post('/admin/categories/create', 'CategoriesController@create');
    Route::post('/admin/categories/edit/{id}', 'CategoriesController@edit');
    Route::get('/admin/categories/delete/{id}', 'CategoriesController@delete');

    Route::get('/admin/customer', 'CustomerController@index');
    Route::post('/admin/customer/create', 'CustomerController@create');
    Route::get('/admin/customer/edit/{id}', 'CustomerController@edit');
    Route::get('/admin/customer/delete/{id}', 'CustomerController@delete');
    Route::post('/admin/customer/update/{id}', 'CustomerController@update');
    Route::get('/admin/customer/profile/{id}', 'CustomerController@profile');
});
