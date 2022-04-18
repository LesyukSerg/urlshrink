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
//Route::post('/url_shrink', [\App\Http\Controllers\UrlController::class, 'makeShortUrl'])->name('UrlShrink');
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('Home');
Route::get('/s/{url}', [\App\Http\Controllers\UrlController::class, 'gotoUrl'])->name('shortUrl');

Route::get('/links', [\App\Http\Controllers\UrlController::class, 'showStatisticAll'])->name('StatUrl');
Route::get('/links/{url}', [\App\Http\Controllers\UrlController::class, 'showStatistic'])->name('StatUrlOne');

