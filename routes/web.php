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



Route::get('/','ProductController@showProduct')->name('home');



Route::get('admin',function (){
   return view('CoreAdmin.admin');
});


Route::prefix('products')->group(function (){
    Route::get('/','ProductController@index')->name('products.index');
    Route::get('/create','ProductController@create')->name('products.create');
    Route::post('/create','ProductController@store')->name('products.store');
    Route::get('/{id}/edit','ProductController@edit')->name('products.edit');
    Route::post('/{id}/edit','ProductController@update')->name('products.update');
    Route::get('/{id}/delete','ProductController@destroy')->name('products.delete');
    Route::get('{id}/show','ProductController@show')->name('products.show');
    Route::get('/shop','ProductController@showProductShop')->name('products.shop');
});

Route::prefix('details')->group(function (){
    Route::get('/','BillController@index')->name('details.index');
    Route::get('/{id}','BillController@edit')->name('details.byId');
    Route::post('{id}','BillController@update')->name('details.update');
    Route::post('/','BillController@searchBill')->name('details.search');
});


Route::prefix('/cart')->group(function (){
    Route::get('/','CartController@index')->name('cart.index');
    Route::get('/add-cart/{id}','CartController@addCart')->name('cart.add-cart');
    Route::get('/delete/{id}','CartController@delete')->name('cart.delete');
    Route::post('/update-cart/{id}','CartController@update')->name('cart.update');
    Route::get('/check-out','CartController@checkOut')->name('cart.check-out');
    Route::post('/placeOder','CartController@placeOder')->name('cart.place-oder');

});


