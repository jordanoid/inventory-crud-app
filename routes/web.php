<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\PJController;
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

Route::redirect('/', '/login');

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/dashboard', [InventarisController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix' => 'barang', 'middleware' => 'auth'], function(){
    Route::get('/', [BarangController::class, 'index'])->name('barang.index');
    Route::get('add', [BarangController::class, 'create'])->name('barang.create');
    Route::post('store', [BarangController::class, 'store'])->name('barang.store');
    Route::get('edit/{id}', [BarangController::class, 'edit'])->name('barang.edit');
    Route::post('update/{id}', [BarangController::class, 'update'])->name('barang.update');
    Route::post('delete/{id}', [BarangController::class, 'delete'])->name('barang.delete');
    Route::get('soft/{id}', [BarangController::class, 'soft'])->name('barang.soft');
    Route::get('restore', [BarangController::class, 'restore'])->name('barang.restore');
});

Route::group(['prefix' => 'ruangan', 'middleware' => 'auth'], function(){
    Route::get('/', [RuanganController::class, 'index'])->name('ruangan.index');
    Route::get('add', [RuanganController::class, 'create'])->name('ruangan.create');
    Route::post('store', [RuanganController::class, 'store'])->name('ruangan.store');
    Route::get('edit/{id}', [RuanganController::class, 'edit'])->name('ruangan.edit');
    Route::post('update/{id}', [RuanganController::class, 'update'])->name('ruangan.update');
    Route::post('delete/{id}', [RuanganController::class, 'delete'])->name('ruangan.delete');
    Route::get('soft/{id}', [RuanganController::class, 'soft'])->name('ruangan.soft');
    Route::get('restore', [RuanganController::class, 'restore'])->name('ruangan.restore');
});

Route::group(['prefix' => 'pj', 'middleware' => 'auth'], function(){
    Route::get('/', [PJController::class, 'index'])->name('pj.index');
    Route::get('add', [PJController::class, 'create'])->name('pj.create');
    Route::post('store', [PJController::class, 'store'])->name('pj.store');
    Route::get('edit/{id}', [PJController::class, 'edit'])->name('pj.edit');
    Route::post('update/{id}', [PJController::class, 'update'])->name('pj.update');
    Route::post('delete/{id}', [PJController::class, 'delete'])->name('pj.delete');
    Route::get('soft/{id}', [PJController::class, 'soft'])->name('pj.soft');
    Route::get('restore', [PJController::class, 'restore'])->name('pj.restore');
});


require __DIR__.'/auth.php';
