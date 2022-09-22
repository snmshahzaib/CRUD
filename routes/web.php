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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/products', 'ProductController@Create');
Route::post('/add_product', 'ProductController@store');
Route::get('/show_product', 'ProductController@index');
Route::get('product_delete/{id}', 'ProductController@destroy');
Route::get('product_edit/{id}', 'ProductController@edit');
Route::post('product_update/{id}', 'ProductController@update')->name('product.update');


Route::post('/selected_categories', 'CategoriesController@store');

Route::get('/show_categories', 'CategoriesController@index');
Route::get('/add_categories', 'CategoriesController@create');
Route::post('/selected_categories', 'CategoriesController@store');
Route::get('/category_edit/{id}', 'CategoriesController@edit');
Route::post('/category_update/{id}', 'CategoriesController@update')->name('category.update');

Route::get('/category_detail/{id}', 'ProductController@show');
Route::get('category_detail/category_products/{id}', 'ProductController@show_catProducts');
