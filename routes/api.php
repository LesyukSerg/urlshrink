<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('/short_urls', [\App\Http\Controllers\UrlController::class, 'makeShortUrl'])->name('url.create');
Route::get('/short_urls', [\App\Http\Controllers\UrlController::class, 'showShortUrls'])->name('url.show');
Route::get('/short_urls/{url}', [\App\Http\Controllers\UrlController::class, 'showOneShortUrl'])->name('url.one');

//CHANGE
Route::patch('/short_urls/{url}', [\App\Http\Controllers\UrlController::class, 'changeOneShortUrl'])->name('url.update');
Route::delete('/short_urls/{url}', [\App\Http\Controllers\UrlController::class, 'delShortUrl'])->name('url.delete');
