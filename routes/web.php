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
Route::get('/warning/{user}','UserController@showDanger')->name('email.warning');
Route::get('/warning/{user}','UserController@showDanger')->name('email.warning');
Route::get('/passwordUpdate/{user}','EmailController@showForm')->name('email.showForm');
Route::post('/passwordUpdate/{user}','EmailController@update')->name('email.password');
Route::get('/home', 'HomeController@index')->name('home');
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:admin')->group(function() {
    Route::get('damagesCenter/{center}','CenterController@damage')->name('centers.damage');
    Route::get('centerDelete/{center}','CenterController@delete')->name('centers.delete');
    Route::resource('users', 'UserController');
    Route::resource('centers', 'CenterController');
    Route::get('main','MainController@index')->name('main');
    Route::get('/changeStatus/{damage}','UserController@changeStatus')->name('status.edit');
    Route::post('/statusStore/{damage}','UserController@soreStatus')->name('damages.store');
    Route::get('/deleteDamage/{damage}','UserController@deleteDamage')->name('damages.removeDamage');
    Route::post('/delete/{damage}','UserController@delete')->name('damage.delete');

});
Route::namespace('Officer')->prefix('officer')->name('officer.')->middleware('can:officer')->group(function() {
    Route::resource('damages', 'DamageController');
    Route::get('main','MainDamageCotroller@index')->name('main');
});