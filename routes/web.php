<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

// Welcome Page
Route::get('/', fn() => view('welcome'))->name('welcomeRoute');

// Eksplorasi atau Pencarian Page
Route::get('/pencarian', fn() => view('pencarian'))->name('pencarianRoute');

// Tentang Page
Route::get('/tentang', fn() => view('tentang'))->name('tentangRoute');

// Login Route
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('loginRoute');
Route::post('/login', [LoginController::class, 'login'])->name('loginPostRoute');

// Register Route
Route::get('/register', fn() => view('register.register'))->name('registerRoute');
Route::get('/register/peserta', [RegisterController::class, 'showFormPeserta'])->name('registerPesertaRoute');
Route::post('/register/peserta', [RegisterController::class, 'registerPeserta'])->name('registerPostPesertaRoute');
Route::get('/register/penyelenggara', fn() => view('register.penyelenggara'))->name('registerPenyelenggaraRoute');