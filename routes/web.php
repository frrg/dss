<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BobotKriteriaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PelamarController;
use App\Http\Controllers\PenilaianController;
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

	
	Route::get('pelamar/ajaxtable', [PelamarController::class, 'ajaxTable'])->name('pelamar.ajaxtable');
	Route::resource('pelamar', PelamarController::class);
	
	Route::get('penilaian/ajaxtable', [PenilaianController::class, 'ajaxTable'])->name('penilaian.ajaxtable');
	Route::resource('penilaian', PenilaianController::class);

	Route::resource('pelamar-penilaian',PenilaianController::class);

	Route::get('bobot-kriteria/ajaxtable/{kriterium}', [BobotKriteriaController::class, 'ajaxTable'])->name('bobot-kriteria.ajaxtable');
	Route::resource('kriteria.bobot-kriteria', BobotKriteriaController::class);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
