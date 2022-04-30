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


Route::get('/','HomeController@index')->name('welcome');

Auth::routes();

Route::view('login','auth.login')->name('login');
Route::post('/reservation', 'ReservationController@store')->name("reservation.store");
Route::post('/contact', 'ContactController@store')->name("contact.store");

Route::group(['middleware' => ['auth','admin']],function(){
    Route::get('admin/dashboard','Admin\DashboardController@index')->name('dashboard');
    Route::view('admin/register','auth.register')->name('register');
    Route::post('admin/register','auth\RegisterController@register')->name('register');

    Route::get('admin/admins','Admin\AdminController@admins')->name('admins');
    Route::get('admin/{user}/edit','Admin\AdminController@edit')->name('edit');
    Route::patch('admin/{user}/update','Admin\AdminController@update')->name('updateuser');
    Route::delete('admin/{user}/delete','Admin\AdminController@destroy')->name('deleteuser');

    Route::resource('admin/slider','Admin\SliderController');
    Route::resource('admin/category','Admin\CategoryController');
    Route::resource('admin/item','Admin\ItemController');

    Route::get('admin/reservations','Admin\ReservationController@index')->name("reservations");
    Route::post('admin/reservation/{status}','Admin\ReservationController@status')->name("reservation.status");
    Route::delete('admin/reservation/{status}','Admin\ReservationController@destroy')->name("reservation.delete");

    Route::get('admin/messages','Admin\ContactController@index')->name("messages");
    Route::delete('admin/message/{message}','Admin\ContactController@destroy')->name("message.delete");
    Route::get('admin/{message}/message','Admin\ContactController@show')->name("message.show");

});




























































