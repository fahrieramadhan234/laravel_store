<?php

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

Route::get('/product_detail/{id}', 'SiteController@product_detail');

Route::get('/admin/login', 'AuthController@index')->name('login');
Route::post('/admin/postlogin', 'AuthController@postlogin');
Route::get('/admin/logout', 'AuthController@logout');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin/dashboard', 'DashboardController@index');
    Route::get('/admin/products', 'ProductsController@index');
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
});
