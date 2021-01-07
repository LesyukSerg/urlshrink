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
Route::post('/url_shrink', [\App\Http\Controllers\UrlController::class, 'getUrl'])->name('UrlShrink');

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('Home');

Route::get('/short/{url}', [\App\Http\Controllers\UrlController::class, 'gotoUrl'])->name('UrlRedirect');
Route::get('/stat-list', [\App\Http\Controllers\UrlController::class, 'showStatisticAll'])->name('StatUrl');
Route::get('/stat/{url}', [\App\Http\Controllers\UrlController::class, 'showStatistic'])->name('StatUrlOne');

