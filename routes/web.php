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

use App\Http\Controllers\TimeController;
use App\Http\Controllers\MemberController;
// use Illuminate\Routing\Route;
// use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/times/calender', 'TimeController@calender')->middleware('auth');
Route::get('/members/index', 'MemberController@search')->middleware('auth')->name('members.search');

Route::resource('/members', 'MemberController')->middleware('auth');

Route::resource('/reservations', 'ReservationController')->middleware('auth');

Route::resource('/times', 'TimeController')->middleware('auth');

