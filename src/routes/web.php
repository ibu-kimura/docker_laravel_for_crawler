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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/keywords_settings', [App\Http\Controllers\HomeController::class, 'keywords_settings'])->name('keywords_settings');
Route::get('/Twitter', [App\Http\Controllers\TwitterController::class, 'Twitter'])->name('Twitter');
Route::get('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');