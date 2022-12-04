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

Route::permanentRedirect('/', '/login');

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/dashboard', [InventarisController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix' => 'barang'], function(){
    Route::get('/', [BarangController::class, 'index'])->name('barang.index');
});

Route::group(['prefix' => 'ruangan'], function(){
    Route::get('/', [RuanganController::class, 'index'])->name('ruangan.index');
});

Route::group(['prefix' => 'pj'], function(){
    Route::get('/', [PJController::class, 'index'])->name('pj.index');
});


require __DIR__.'/auth.php';
