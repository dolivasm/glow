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

Route::get('/','HomeController@index');
Route::get('contact','HomeController@contact');
Route::get('abaut','HomeController@abaut');
Route::get('newsDetail','NewsController@news_detail');
Route::get('filter-news/{value?}','NewsController@search');
Route::get('filter-products/{value?}','ProductController@search');
Route::get('filter-services/{value?}','ServiceController@search');

Route::get('editMyInfo', 'UserController@editMyInfo');

Route::get('productsDetail','ProductController@products_detail');
Route::get('servicesDetail','ServiceController@services_detail');
Route::get('appointmentList','AppointmentController@details');

Route::get('serviceAvailable/{id}/{date}','AppointmentController@timesAvailable');
Route::get('addAppointment/{date}', 'AppointmentController@add');

Route::post('update-news','NewsController@updateNews');
Route::post('update-services','ServiceController@updateServices');
Route::post('update-products','ProductController@updateProducts');
Route::put('update-users','UserController@update');
Route::put('activateUser/{value?}', 'UserController@activate');
Route::post('sendContact', 'HomeController@sendContactEmail');

Route::put('changePassword', 'UserController@changePassword');
Route::put('updateMyInfo', 'UserController@updateMyInfo');

Auth::routes();

Route::resource('services','ServiceController');
Route::resource('news','NewsController');
Route::resource('products','ProductController');
Route::resource('users', 'UserController');
Route::resource('appointment', 'AppointmentController');

Route::get('/home', 'HomeController@index');