<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testt;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\RetribusiController;
use App\Http\Controllers\WilayahController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/data/pasar', [testt::class, 'index']);
Route::get('/test', [testt::class, 'pasar']);
Route::post('/jenis/store', [testt::class, 'store'])->name('jenis.store');
Route::get('/jenis/{id}/edit', [testt::class, 'edit'])->name('jenis.edit');
Route::put('/jenis/{id}', [testt::class, 'update'])->name('jenis.update');

//Retribusi
Route::get('/retribusi', [RetribusiController::class, 'index']);
Route::get('/data/retribusi/{id}/edit', [RetribusiController::class, 'edit'])->name('retribusi.edit');
Route::put('/data/retribusi/{id}', [RetribusiController::class, 'update'])->name('retribusi.update');
Route::delete('/retribusi/{id}', [RetribusiController::class, 'destroy'])->name('retribusi.destroy');
Route::get('/retribusi/create', [RetribusiController::class, 'create'])->name('retribusi.create');
Route::post('/retribusi', [RetribusiController::class, 'store'])->name('retribusi.store');

//Sub-Wilayah
Route::get('/wilayah', [WilayahController::class, 'index']);
Route::get('/data/wilayah/{id}/edit', [WilayahController::class, 'edit'])->name('wilayah.edit');
Route::put('/data/wilayah/{id}', [WilayahController::class, 'update'])->name('wilayah.update');
Route::delete('/wilayah/{id}', [WilayahController::class, 'destroy'])->name('wilayah.destroy');
Route::get('/wilayah/create', [WilayahController::class, 'create'])->name('wilayah.create');
Route::post('/wilayah', [WilayahController::class, 'store'])->name('wilayah.store');


