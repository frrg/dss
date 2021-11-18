<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KriteriaController;
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

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
	Route::get('/', [HomeController::class, 'index']);
	Route::get('kriteria/ajaxtable', [KriteriaController::class, 'ajaxTable'])->name('kriteria.ajaxtable');
	Route::resource('kriteria', KriteriaController::class);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
