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
Route::delete('/guru/delete/{id}', [App\Http\Controllers\GuruController::class, 'destroy'])->name('guru.destroy');
Route::get('/guru/edit/{id}', [App\Http\Controllers\GuruController::class, 'edit'])->name('guru.edit');
Route::put('/guru/update/{id}', [App\Http\Controllers\GuruController::class, 'update'])->name('guru.update');

// Siswa
Route::get('/siswa', [App\Http\Controllers\SiswaController::class, 'index'])->name('siswa');
Route::get('/siswa/create', [App\Http\Controllers\SiswaController::class, 'create'])->name('siswa.create');
Route::post('/siswa/store', [App\Http\Controllers\SiswaController::class, 'store'])->name('siswa.store');
Route::delete('/siswa/delete/{id}', [App\Http\Controllers\SiswaController::class, 'destroy'])->name('siswa.destroy');
Route::get('/siswa/edit/{id}', [App\Http\Controllers\SiswaController::class, 'edit'])->name('siswa.edit');
Route::put('/siswa/update/{id}', [App\Http\Controllers\SiswaController::class, 'update'])->name('siswa.update');


// Kelas
Route::get('/kelas', [App\Http\Controllers\KelasController::class, 'index'])->name('kelas');
Route::get('/kelas/create', [App\Http\Controllers\KelasController::class, 'create'])->name('kelas.create');
Route::post('/kelas/store', [App\Http\Controllers\KelasController::class, 'store'])->name('kelas.store');
Route::delete('/kelas/delete/{id}', [App\Http\Controllers\KelasController::class, 'destroy'])->name('kelas.destroy');
Route::get('/kelas/edit/{id}', [App\Http\Controllers\KelasController::class, 'edit'])->name('kelas.edit');
Route::put('/kelas/update/{id}', [App\Http\Controllers\KelasController::class, 'update'])->name('kelas.update');


// Mata Pelajaran
Route::get('/mapel', [App\Http\Controllers\MapelController::class, 'index'])->name('mapel');
Route::get('/mapel/create', [App\Http\Controllers\MapelController::class, 'create'])->name('mapel.create');
Route::post('/mapel/store', [App\Http\Controllers\MapelController::class, 'store'])->name('mapel.store');
Route::delete('/mapel/delete/{id}', [App\Http\Controllers\MapelController::class, 'destroy'])->name('mapel.destroy');
Route::get('/mapel/edit/{id}', [App\Http\Controllers\MapelController::class, 'edit'])->name('mapel.edit');
Route::put('/mapel/update/{id}', [App\Http\Controllers\MapelController::class, 'update'])->name('mapel.update');



// Semester
Route::get('/tahun-ajaran', [App\Http\Controllers\SemesterController::class, 'index'])->name('tahun-ajaran');
Route::get('/tahun-ajaran/create', [App\Http\Controllers\SemesterController::class, 'create'])->name('tahun-ajaran.create');
Route::post('/tahun-ajaran/store', [App\Http\Controllers\SemesterController::class, 'store'])->name('tahun-ajaran.store');
Route::delete('/tahun/delete/{id}', [App\Http\Controllers\SemesterController::class, 'destroy'])->name('tahun.destroy');
Route::get('/tahun/edit/{id}', [App\Http\Controllers\SemesterController::class, 'edit'])->name('tahun.edit');
Route::put('/tahun/update/{id}', [App\Http\Controllers\SemesterController::class, 'update'])->name('tahun.update');


// Nilai
Route::get('/data-nilai', [App\Http\Controllers\NilaiController::class, 'index'])->name('data-nilai');
Route::get('/data-nilai/data-kelas/{kelas_id}', [App\Http\Controllers\NilaiController::class, 'dataSiswa'])->name('data-siswa');
Route::get('/data-nilai/data-kelas/input-nilai/{siswa_id}', [App\Http\Controllers\NilaiController::class, 'inputNilai'])->name('input-nilai');
Route::post('/data-nilai/data-kelas/input-nilai/store', [App\Http\Controllers\NilaiController::class, 'store'])->name('input-nilai.store');
Route::get('/data-nilai/data-kelas/update-nilai/{siswa_id}', [App\Http\Controllers\NilaiController::class, 'editNilai'])->name('update-nilai');
Route::put('/data-nilai/data-kelas/input-nilai/update/{siswa_id}', [App\Http\Controllers\NilaiController::class, 'update'])->name('update-nilai.update');

// Siswa
Route::get('/siswa/nilai-siswa', [App\Http\Controllers\SiswaController::class, 'nilai'])->name('nilai-siswa');

// Jurusan
Route::get('/jurusan', [App\Http\Controllers\JurusanController::class, 'index'])->name('jurusan');
Route::get('/jurusan/create', [App\Http\Controllers\JurusanController::class, 'create'])->name('jurusan.create');
Route::post('/jurusan/store', [App\Http\Controllers\JurusanController::class, 'store'])->name('jurusan.store');
Route::delete('/jurusan/delete/{id}', [App\Http\Controllers\JurusanController::class, 'destroy'])->name('jurusan.destroy');
Route::get('/jurusan/edit/{id}', [App\Http\Controllers\JurusanController::class, 'edit'])->name('jurusan.edit');
Route::put('/jurusan/update/{id}', [App\Http\Controllers\JurusanController::class, 'update'])->name('jurusan.update');

