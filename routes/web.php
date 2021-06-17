<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\HomeController;

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
})->middleware('auth');


Route::get('/register', 'App\Http\Controllers\Auth\RegisterController@register')->name('register');

Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@storeUser');

Route::get('/login', 'App\Http\Controllers\Auth\LoginController@login')->name('login');
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@authenticate');
Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/home', 'App\Http\Controllers\HomeController@home')->name('home');

Route::get('/forget-password', 'App\Http\Controllers\Auth\ForgotPasswordController@getEmail');
Route::post('/forget-password', 'App\Http\Controllers\Auth\ForgotPasswordController@postEmail');

Route::get('/reset-password/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@getPassword');
Route::post('/reset-password', 'App\Http\Controllers\Auth\ResetPasswordController@updatePassword');

