<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testt;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\RetribusiController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\PasarController;
use App\Http\Controllers\ItemRetribusiController;
use App\Http\Controllers\KabupatenController;
use App\Http\Controllers\AtributController;
use App\Http\Controllers\KontrakController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KedinasanController;
use App\Http\Controllers\BendaharaController;
use App\Models\Kabupaten;

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


Route::get('/jenis', [PasarController::class, 'index']);
Route::get('/Error403', [IndexController::class, 'danger']);
Route::post('/jenis/store', [PasarController::class, 'store'])->name('jenis.store');
Route::get('/jenis/edit', [PasarController::class, 'edit'])->name('jenis.edit');
// Route::put('/jenis/{id}', [PasarController::class, 'update'])->name('jenis.update');
// Route::post('/jenis/{id}', 'JenisController@update')->name('jenis.update');
// Route::put('/jenis/edit/{id}', [PasarController::class, 'update'])->name('jenis.update');
Route::put('/jenis/{post}', [PasarController::class, 'update'])->name('jenis.update');

Route::middleware(['check.role.byname:Admin'])->group(function () {

    Route::get('/pdf', [KontrakController::class, 'testt']);
    Route::get('/surat/{id}', [KontrakController::class, 'detailkontrak'])->name('surat.detail');
    Route::post('/kontrak/store', [KontrakController::class, 'store'])->name('kontrak.store');
    Route::get('/generate-pdf/{id}', [KontrakController::class, 'generatePDFkontrak'])->name('generate-pdfkontrak');
    Route::get('/kontrak', [KontrakController::class, 'index'])->name('kontrak');
    Route::put('/kontrak/{id}/update-status', [KontrakController::class, 'updateStatus'])->name('kontrak.updateStatus');


    //Atribut
    Route::get('/atribut', [AtributController::class, 'index'])->name('atribut');
    Route::post('/atribut/store', [AtributController::class, 'store'])->name('atribut.store');
    Route::match (['post', 'put'], '/atribut/update/{id}', [AtributController::class, 'update'])->name('atribut.update');
    Route::get('/atributsampah', [AtributController::class, 'indexsampah'])->name('atributsampah');
    Route::post('/atributsampah/store', [AtributController::class, 'storesampah'])->name('atributsampah.store');
    Route::match (['post', 'put'], '/atributsampah/update/{id}', [AtributController::class, 'updatesampah'])->name('atributsampah.update');

    
    Route::post('/jenis/store', [PasarController::class, 'store'])->name('jenis.store');
    Route::get('/jenis/edit', [PasarController::class, 'edit'])->   name('jenis.edit');
    Route::put('/jenis/{post}', [PasarController::class, 'update'])->name('jenis.update');

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

    //Item-Retribusi
    Route::get('/item', [ItemRetribusiController::class, 'index'])->name('item.index');
    Route::post('/item/store', [ItemRetribusiController::class, 'store'])->name('item.store');
    Route::get('/item/show', [ItemRetribusiController::class, 'show'])->name('item.show');
    Route::get('/item/{post}/edit', [ItemRetribusiController::class, 'edit'])->name('item.edit');
    Route::put('/item/edit/{id}', [ItemRetribusiController::class, 'update'])->name('item.update');

    // Route::delete('/posts/{post}', ItemRetribusiController::class .'@destroy')->name('posts.destroy');

    //Kabupaten
    Route::get('/kabupaten', [KabupatenController::class, 'index']);
    Route::post('/kabupaten/store', [KabupatenController::class, 'store'])->name('kabupaten.store');
    Route::get('/kabupaten/show', [KabupatenController::class, 'show'])->name('kabupaten.show');
    Route::get('/kabupaten/edit', [KabupatenController::class, 'edit'])->name('kabupaten.edit');
    Route::put('/kabupaten/{post}', [KabupatenController::class, 'update'])->name('kabupaten.update');

    //Kedinasan
    Route::get('/kedinasan', [KedinasanController::class, 'index']);
    Route::get('/data/kedinasan/{id}/edit', [kedinasanController::class, 'edit'])->name('kedinasan.edit');
    Route::put('/data/kedinasan/{id}', [kedinasanController::class, 'update'])->name('kedinasan.update');
    Route::delete('/kedinasan/{id}', [kedinasanController::class, 'destroy'])->name('kedinasan.destroy');
    Route::get('/kedinasan/create', [kedinasanController::class, 'create'])->name('kedinasan.create');
    Route::post('/kedinasan', [kedinasanController::class, 'store'])->name('kedinasan.store');
 
});
Route::middleware(['check.role.byname:Bendahara'])->group(function () {
    //bendahara
    Route::get('/tagihan', [BendaharaController::class, 'indextagihan']);
    Route::get('/tagihansampah', [BendaharaController::class, 'tagihansampah']);


    Route::get('/setoran', [BendaharaController::class, 'indexsetor']);
    Route::put('/setor/{id}/update-status', [BendaharaController::class, 'updateStatus'])->name('setor.updateStatus');
  


});


//ADMIN
Route::get('/', [AuthController::class, 'loginview']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/loginCheck', [AuthController::class, 'loginCheck'])->name('login');


// Route::put('/jenis/{id}', [PasarController::class, 'update'])->name('jenis.update');
// Route::post('/jenis/{id}', 'JenisController@update')->name('jenis.update');
// Route::put('/jenis/edit/{id}', [PasarController::class, 'update'])->name('jenis.update');
