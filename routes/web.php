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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/times/calender', 'TimeController@calender')->middleware('auth')->name('times.calender');

Route::get('/times/member_index', 'TimeController@member_index')->name('times.member_index');

Route::get('/times/member_calender', 'TimeController@member_calender')->name('times.member_calender');

Route::get('/members/index', 'MemberController@search')->middleware('auth')->name('members.search');
Route::get('/members/list', 'MemberController@search')->middleware('auth')->name('members.list');

Route::get('/members/list', 'MemberController@list')->middleware('auth')->name('members.list');

Route::resource('/members', 'MemberController')->middleware('auth');

Route::resource('/reservations', 'ReservationController')->middleware('auth');

Route::resource('/times', 'TimeController')->middleware('auth');

