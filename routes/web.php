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

Route::get('/', 'MainController@index')->name('main');
Route::get('registration', 'Auth\RegisterController@index')->name('register.index');
Route::post('registration', 'Auth\RegisterController@register')->name('register.register');
Route::get('registration/success', 'Auth\RegisterController@success')->name('register.success');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login.showLoginForm');
Route::post('login','Auth\LoginController@login')->name('login.login');
Route::get('logout', 'Auth\LoginController@logout')->name('login.logout');