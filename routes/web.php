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

Route::get('/', 'PersonController@create')->name('home');

Route::resource('attendance', 'AttendanceController');

Route::group(['prefix' => 'person'], function() {
    Route::get('forget', 'PersonController@forget');
});
Route::resource('person', 'PersonController')->only(['create', 'store']);

Route::resource('room', 'RoomController');
