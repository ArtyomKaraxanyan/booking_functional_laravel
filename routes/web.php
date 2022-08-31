<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;


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

Route::get('/', [App\Http\Controllers\HotelPageController::class,'index'])->name('search_hotels');
Route::get('/send/email', [App\Http\Controllers\HotelPageController::class,'send_email'])->name('send_email');
Route::get('/hotel/{id}', [App\Http\Controllers\HotelPageController::class,'hotel'])->name('book_hotel');
Route::get('/booking/room/{id}', [App\Http\Controllers\HotelPageController::class,'booking_room'])->name('booking_room');
Route::get('/rooms', [App\Http\Controllers\HotelPageController::class,'rooms'])->name('rooms');

Route::get('/hotel/rooms/{id}', [App\Http\Controllers\HotelPageController::class,'check_availability'])->name('check_availability');
Route::get('/save/room/{id}', [App\Http\Controllers\HotelPageController::class,'saveRoom'])->name('save_room');
Route::get('/save/rooms/', [App\Http\Controllers\HotelPageController::class,'ShowSaveRoom'])->name('show_save_room')->middleware('save_rooms');
Route::get('/forgot/rooms/{id}', [App\Http\Controllers\HotelPageController::class,'forgotRoom'])->name('forgot_room');
Route::get('/get-api', [App\Http\Controllers\HomeController::class,'get_api'])->name('get_api');


Route::get('admin', function () {
    if (Auth::user()){
        return redirect('hotels-management');
    }
    return view('admin/login');
})->name('admin');

Route::resource('hotels-management', 'App\Http\Controllers\Admin\HotelsManagementController');
Route::delete('hotels-management/destroy/{id}', 'App\Http\Controllers\Admin\\HotelsManagementController@destroy');
Route::delete('/destroy/image/{id}', 'App\Http\Controllers\Admin\\HotelsManagementController@destroy_image');


Route::resource('rooms-management', 'App\Http\Controllers\Admin\RoomsManagementController');
Route::delete('rooms-management/destroy/{id}', 'App\Http\Controllers\Admin\\RoomsManagementController@destroy');
Route::delete('/destroy/room-image/{id}', 'App\Http\Controllers\Admin\\RoomsManagementController@destroy_image');
Route::get('/send-notification', [NotificationController::class, 'sendOfferNotification']);

//Route::resource('services-management', 'Admin\ServiceManagementController');
//Route::delete('services-management/destroy/{id}', 'Admin\\ServiceManagementController@destroy');
//
//Route::resource('about-management', 'Admin\AboutManagementController');
//Route::delete('about-management/destroy/{id}', 'Admin\\AboutManagementController@destroy');
//Route::resource('orders-management', 'Admin\OrdersController');

Auth::routes();


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
