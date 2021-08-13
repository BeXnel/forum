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
Route::get('/posty/kategoria/{category}', 'App\Http\Controllers\Posty@category');
Route::get('/posty/statystyki/{category}', 'App\Http\Controllers\Posty@stats');
Route::get('/posty/kategoria/{category}/{id}', 'App\Http\Controllers\Posty@show_more')->name('show_more');

Route::post('/posty/opublikuj', "App\Http\Controllers\Posty@publish");
Route::post('/posty/cofnij_publikacje', "App\Http\Controllers\Posty@unpublish");
Route::post('/posty/edycja', "App\Http\Controllers\Posty@edit");
Route::post('/posty/edycja/zapisz', "App\Http\Controllers\Posty@save");
Route::post('/posty/usun', "App\Http\Controllers\Posty@delete");

Route::post('/posty/kategoria/{category}', "App\Http\Controllers\Posty@comment");

Route::get('konto', "App\Http\Controllers\AccountController@show")->name('account');

Route::post('/home','App\Http\Controllers\HomeController@store');
Route::post('/home/search','App\Http\Controllers\HomeController@search');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
