<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('/home', function () {
    return view('center.home');
})->middleware('auth');
Route::get('/nilai', function () {
    return view('center.nilai');
})->middleware('auth');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/siswa/main', function () {
    return view('siswa.main');
})->middleware('role:siswa')->name('siswa.beranda');
Route::get('/siswa/rapot',function(){
    return view('siswa.rapot');
})->middleware('role:siswa')->name('siswa.rapot');
Route::get('/siswa/pelangaran',function(){
    return view('siswa.pelanggaran');
})->middleware('role:siswa')->name('siswa.pelanggaran');
Route::get('/siswa/sekolah',function(){
    return view('siswa.sekolah');
})->middleware('role:siswa')->name('siswa.sekolah');

Route::get('/walas/main', function () {
    return view('walas.main');
})->middleware('role:walas')->name('walas.beranda');

Route::get('/guru/main', function () {
    return view('guru.main');
})->middleware('role:guru')->name('guru.beranda');

Route::get('/profil', [ProfileController::class, 'show'])->name('profile.show')->middleware('auth');
Route::put('/profil', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');
Route::put('/profil/password', [ProfileController::class, 'updatePassword'])->name('profile.update.password')->middleware('auth');

