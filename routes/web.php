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
Route::get('/passwordUpdate/{user}','EmailController@showForm')->name('email.showForm');
Route::post('/passwordUpdate/{user}','EmailController@update')->name('email.password');
Route::get('/home', 'HomeController@index')->name('home');
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:admin')->group(function() {
    Route::get('centerDelete/{center}','CenterController@delete')->name('centers.delete');
    Route::resource('users', 'UserController');
    Route::resource('centers', 'CenterController');
    Route::get('main','MainController@index')->name('main');

});
Route::namespace('Officer')->prefix('officer')->name('officer.')->middleware('can:officer')->group(function() {
    Route::resource('damages', 'DamageController');
});