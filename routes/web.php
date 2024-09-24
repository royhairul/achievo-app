<?php

use Illuminate\Support\Facades\Route;

// Welcome Page
Route::get('/', fn() => view('welcome'))->name('welcomeRoute');

// Eksplorasi atau Pencarian Page
Route::get('/pencarian', fn() => view('pencarian'))->name('pencarianRoute');

// Tentang Page
Route::get('/tentang', fn() => view('tentang'))->name('tentangRoute');

// Login Route
Route::get('/login', fn() => view('login'))->name('loginRoute');

// Register Route
Route::get('/register', fn() => view('register.register'))->name('registerRoute');
Route::get('/register/peserta', fn() => view('register.peserta'))->name('registerPesertaRoute');
Route::get('/register/pengelola', fn() => view('register.penyelenggara'))->name('registerPenyelenggaraRoute');