<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::view('/{path?}', 'layouts.app');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/home', 'HomeController@index')->name('admin.index');
    Route::resource('/admin/category', 'CategoryController');
    Route::resource('/admin/bank', 'BankController');
    Route::resource('/admin/item', 'ItemController');
    Route::post('/admin/item/feature', 'ItemController@feature')->name('item.feature');
    Route::delete('/admin/item/feature/{feature}', 'ItemController@featureDestroy')->name('feature.destroy');
    Route::post('/admin/item/activity', 'ItemController@activity')->name('item.activity');
    Route::delete('/admin/item/activity/{activity}', 'ItemController@activityDestroy')->name('activity.destroy');
    Route::get('/admin/booking', 'BookingController@index')->name('booking.index');
    Route::get('/admin/booking/{id}', 'BookingController@show')->name('booking.show');
    Route::get('/admin/booking/{id}/confirmation', 'BookingController@confirmation')->name('booking.confirmation');
    Route::get('/admin/booking/{id}/reject', 'BookingController@reject')->name('booking.reject');
});
