<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KantorController;
use App\Http\Controllers\AlamatKantorController;
use App\Http\Controllers\KaryawanController;

// Rute untuk tampilan utama
Route::get('/', function () {
    return view('welcome');
});

// Rute resource untuk KantorController
Route::resource('kantor', KantorController::class);

// Rute untuk melihat alamat kantor
Route::get('/alamat-kantor/{id}', [AlamatKantorController::class, 'show'])->name('alamatKantor.show');
// Rute untuk menyimpan perubahan alamat
Route::put('/alamat-kantor/{alamatKantor}', [AlamatKantorController::class, 'update'])->name('alamatKantor.update');

// Rute untuk menampilkan formulir edit alamat
Route::get('/alamat-kantor/{alamatKantor}/edit', [AlamatKantorController::class, 'edit'])->name('alamatKantor.edit');

// Rute untuk menyimpan perubahan alamat
Route::put('/alamat-kantor/{alamatKantor}', [AlamatKantorController::class, 'update'])->name('alamatKantor.update');

Route::get('/alamat/create/{kantor_id}', [AlamatKantorController::class, 'create'])->name('alamat.create');
Route::post('/alamat', [AlamatKantorController::class, 'store'])->name('alamat.store');

Route::get('/alamat/create/{id}', [AlamatKantorController::class, 'create'])->name('alamat.create');

// Rute untuk menyimpan karyawan
Route::post('/karyawan', [KaryawanController::class, 'store'])->name('karyawan.store');

// Rute untuk menampilkan halaman edit karyawan
Route::get('/karyawan/{id_karyawan}/edit', [KaryawanController::class, 'edit'])->name('karyawan.edit');

// Rute untuk memperbarui karyawan
Route::put('/karyawan/{id_karyawan}', [KaryawanController::class, 'update'])->name('karyawan.update');

// Rute untuk menghapus karyawan
Route::delete('/karyawan/{id_karyawan}', [KaryawanController::class, 'destroy'])->name('karyawan.destroy');

Route::get('kantor/{id_kantor}', [KantorController::class, 'show'])->name('kantor.show');
