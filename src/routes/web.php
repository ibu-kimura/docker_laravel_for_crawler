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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/keywords_settings', [App\Http\Controllers\Keywords_settingsController::class, 'keywords_settings'])->name('keywords_settings');
Route::post('/post_keywords_settings', [App\Http\Controllers\Keywords_settingsController::class, 'insert_keyword'])->name('insert_keyword');
Route::get('/Twitter', [App\Http\Controllers\TwitterController::class, 'Twitter'])->name('Twitter');
Route::post('/post_Twitter', [App\Http\Controllers\TwitterController::class, 'post_comment'])->name('post_comment');
Route::get('/search', [App\Http\Controllers\SearchController::class, 'search'])->name('search');
Route::post('/post_search', [App\Http\Controllers\SearchController::class, 'calc_datas'])->name('calc_datas');