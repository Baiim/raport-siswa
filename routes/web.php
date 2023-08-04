<?php

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
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('keluar');

// User
Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
Route::delete('/user/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');
Route::put('/user/{id}/change-level', [App\Http\Controllers\UserController::class, 'changeLevel'])->name('user.change-level');
Route::get('/user/create', [App\Http\Controllers\UserController::class, 'updatePasswordView'])->name('user.update');
Route::put('/user/update', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('user.update-password');


// Guru
Route::get('/guru', [App\Http\Controllers\GuruController::class, 'index'])->name('guru');
Route::get('/guru/create', [App\Http\Controllers\GuruController::class, 'create'])->name('guru.create');
Route::post('/guru/store', [App\Http\Controllers\GuruController::class, 'store'])->name('guru.store');

// Siswa
Route::get('/siswa', [App\Http\Controllers\SiswaController::class, 'index'])->name('siswa');
Route::get('/siswa/create', [App\Http\Controllers\SiswaController::class, 'create'])->name('siswa.create');
Route::post('/siswa/store', [App\Http\Controllers\SiswaController::class, 'store'])->name('siswa.store');


// Kelas
Route::get('/kelas', [App\Http\Controllers\KelasController::class, 'index'])->name('kelas');
Route::get('/kelas/create', [App\Http\Controllers\KelasController::class, 'create'])->name('kelas.create');
Route::post('/kelas/store', [App\Http\Controllers\KelasController::class, 'store'])->name('kelas.store');

// Mata Pelajaran
Route::get('/mapel', [App\Http\Controllers\MapelController::class, 'index'])->name('mapel');
Route::get('/mapel/create', [App\Http\Controllers\MapelController::class, 'create'])->name('mapel.create');
Route::post('/mapel/store', [App\Http\Controllers\MapelController::class, 'store'])->name('mapel.store');

// Semester
Route::get('/tahun-ajaran', [App\Http\Controllers\SemesterController::class, 'index'])->name('tahun-ajaran');
Route::get('/tahun-ajaran/create', [App\Http\Controllers\SemesterController::class, 'create'])->name('tahun-ajaran.create');
Route::post('/tahun-ajaran/store', [App\Http\Controllers\SemesterController::class, 'store'])->name('tahun-ajaran.store');

// Nilai
Route::get('/data-nilai', [App\Http\Controllers\NilaiController::class, 'index'])->name('data-nilai');
Route::get('/data-nilai/data-kelas/{kelas_id}', [App\Http\Controllers\NilaiController::class, 'dataSiswa'])->name('data-siswa');
Route::get('/data-nilai/data-kelas/input-nilai/{siswa_id}', [App\Http\Controllers\NilaiController::class, 'inputNilai'])->name('input-nilai');
Route::post('/data-nilai/data-kelas/input-nilai/store', [App\Http\Controllers\NilaiController::class, 'store'])->name('input-nilai.store');
Route::get('/data-nilai/data-kelas/update-nilai/{siswa_id}', [App\Http\Controllers\NilaiController::class, 'editNilai'])->name('update-nilai');
Route::put('/data-nilai/data-kelas/input-nilai/update/{siswa_id}', [App\Http\Controllers\NilaiController::class, 'update'])->name('update-nilai.update');

// Siswa
Route::get('/siswa/nilai-siswa', [App\Http\Controllers\SiswaController::class, 'nilai'])->name('nilai-siswa');
