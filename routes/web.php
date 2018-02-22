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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::prefix('dashboard')->name('dashboard.')->namespace('Dashboard')->group(function () {


	Route::middleware(['guest:admin'])->group(function () {

		Route::get('login', 'AuthController@showLoginPage')->name('login');
		Route::post('login', 'AdminController@login')->name('login.post');
		Route::get('password/reset', 'AuthController@showResetLinkRequestPage')->name('password.request');
		Route::post('password/email', 'AuthController@sentResetLinkEmail')->name('password.email');
		Route::get('password/reset/{token}', 'AuthController@showPasswordResetPage')->name('password.reset');
		Route::post('password/reset', 'AuthController@resetPassword')->name('password.reset.post');

	});


	Route::middleware(['auth.admin'])->group(function () {

		Route::post('logout', 'AuthController@logout')->name('logout');

		Route::get('/', 'IndexController')->name('index');

	});


});