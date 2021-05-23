<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/posty', 'App\Http\Controllers\Posty@show');
Route::post('/posty/opublikuj', "App\Http\Controllers\Posty@publish");
Route::post('/posty/cofnij_publikacje', "App\Http\Controllers\Posty@unpublish");
Route::post('/posty/usun', "App\Http\Controllers\Posty@delete");

Route::get('konto', "App\Http\Controllers\AccountController@show");

Route::post('/home','App\Http\Controllers\HomeController@store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
