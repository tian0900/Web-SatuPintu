<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testt;
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
Route::post('/jenis/store', [testt::class, 'store'])->name('jenis.store');
Route::get('/jenis/{id}/edit', [testt::class, 'edit'])->name('jenis.edit');
Route::put('/jenis/{id}', [testt::class, 'update'])->name('jenis.update');

