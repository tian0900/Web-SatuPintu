<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasarController;
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

<<<<<<< Updated upstream
Route::get('/data/pasar', [testt::class, 'index']);
Route::get('/test', [testt::class, 'pasar']);
Route::post('/jenis/store', [testt::class, 'store'])->name('jenis.store');
Route::get('/jenis/{id}/edit', [testt::class, 'edit'])->name('jenis.edit');
Route::put('/jenis/{id}', [testt::class, 'update'])->name('jenis.update');
=======
Route::get('/', [PasarController::class, 'index']);
Route::post('/jenis/store', [PasarController::class, 'store'])->name('jenis.store');
Route::get('/jenis/edit', [PasarController::class, 'edit'])->name('jenis.edit');
// Route::put('/jenis/{id}', [PasarController::class, 'update'])->name('jenis.update');
// Route::post('/jenis/{id}', 'JenisController@update')->name('jenis.update');
// Route::put('/jenis/edit/{id}', [PasarController::class, 'update'])->name('jenis.update');
Route::put('/jenis/{post}', [PasarController::class, 'update'])->name('jenis.update');
>>>>>>> Stashed changes

