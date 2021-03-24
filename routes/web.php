<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\ApiController;

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
    return redirect('/index');});

Route::get('/index', [MoviesController::class,'index'])->name('index');
Route::get('/movie/{movie}', [MoviesController::class,'show'])->name('show');
Route::get('/tvShow/{tvShow}', [MoviesController::class,'showTvShow'])->name('showTvShow');


Route::get('search', [ApiController::class,'index'])->name('search');
Route::get('res-search', [ApiController::class,'search'])->name('res-search');



