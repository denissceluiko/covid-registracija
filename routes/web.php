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

Route::group(['prefix' => 'attendance'], function() {
    Route::get('create/{room?}', 'AttendanceController@create')->name('attendance.create');
});
Route::resource('attendance', 'AttendanceController')->except('create');

Route::group(['prefix' => 'person'], function() {
    Route::get('forget', 'PersonController@forget');
    Route::get('me', 'PersonController@me');
});
Route::resource('person', 'PersonController')->only(['create', 'store']);

Route::group(['prefix' => 'room'], function() {
    Route::get('{room}/poster', 'RoomController@poster');
});
Route::resource('room', 'RoomController');
