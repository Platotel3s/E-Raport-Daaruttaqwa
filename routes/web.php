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
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.page');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth', 'role:siswa'])->group(function () {
    Route::get('/siswa/main', function () {
        return view('siswa.main');
    })->name('siswa.beranda');
    Route::get('/siswa/rapot',function(){
        return view('siswa.rapot');
    })->name('siswa.rapot');
    Route::get('/siswa/pelanggaran',function(){
        return view('siswa.pelanggaran');
    })->name('siswa.pelanggaran');
    Route::get('/siswa/sekolah',function(){
        return view('siswa.sekolah');
    })->name('siswa.sekolah');
    Route::patch('/profile',[AuthController::class,'update'])->name('profile.update');
    Route::patch('/password',[AuthController::class,'updatePassword'])->name('update.password');
});

Route::middleware(['auth', 'role:walas'])->group(function () {
    Route::get('/walas/main', function () {
        return view('walas.main');
    })->name('walas.beranda');
});

Route::middleware(['auth', 'role:guru'])->group(function () {
    Route::get('/guru/main', function () {
        return view('guru.main');
    })->name('guru.beranda');
});

Route::get('/profil', [ProfileController::class, 'show'])->name('profile.show')->middleware('auth');
Route::put('/profil', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');
Route::put('/profil/password', [ProfileController::class, 'updatePassword'])->name('profile.update.password')->middleware('auth');

