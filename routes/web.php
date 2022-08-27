<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{BukuController, PinjamController, stokController};

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
    return view('welcome');
});

Route::get('/buku/index', [BukuController::class, 'index'])->name('bukus');
Route::post('/buku/store', [BukuController::class, 'store']);
// pinjam
Route::get('/pinjam/index', [PinjamController::class, 'index']);
Route::get('/pinjam/auto/{id}', [PinjamController::class, 'auto'])->name('auto');
Route::post('/pinjam/store', [PinjamController::class, 'store']);
Route::get('/pinjam/{id}/kembali', [PinjamController::class, 'kembali']);

// stok buku
Route::get('/stok/index', [StokController::class, 'index']);
Route::get('/stok/lihat/{id}', [StokController::class, 'lihat'])->name('lihat');

