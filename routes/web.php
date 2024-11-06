<?php

use App\Http\Controllers\JawabanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LombaController;
use App\Http\Controllers\PenyelenggaraFormController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PenyelenggaraController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\FeedbackControllerController;
use Illuminate\Support\Facades\Route;

// Welcome Page
Route::get('/', fn() => view('welcome'))->name('welcomeRoute');

// Eksplorasi atau Pencarian Page
Route::get('/pencarian', [LombaController::class, 'search'])->name('pencarianRoute');
// Eksplorasi atau Pencarian Page
// Route::post('/pencarian/cari', [LombaController::class, 'search'])->name('pencarianLombaRoute');
Route::get('/pencarian/cari', [LombaController::class, 'search'])->name('pencarianLombaRoute');

// Tentang Page
Route::get('/tentang', fn() => view('tentang'))->name('tentangRoute');

// Login Route
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('loginRoute');
Route::post('/login', [LoginController::class, 'login'])->name('loginPostRoute');
Route::post('/logout', [LoginController::class, 'logout'])->name('logoutRoute');

// Register Route
Route::prefix('register')->group(function () {
    Route::get('/', fn() => view('register.register'))->name('registerRoute');
    Route::get('/peserta', [RegisterController::class, 'showFormPeserta'])->name('registerPesertaRoute');
    Route::post('/peserta', [RegisterController::class, 'registerPeserta'])->name('registerPostPesertaRoute');
    Route::get('/penyelenggara', [RegisterController::class, 'showFormPenyelenggara'])->name('registerPenyelenggaraRoute');
    Route::post('/penyelenggara', action: [RegisterController::class, 'registerPenyelenggara'])->name('registerPostPenyelenggaraRoute');
});

// Lomba
Route::get('/{id}/detail', [LombaController::class, 'show'])->name('lombaDetailRoute');
Route::get('/{id}/detail/formulir', [LombaController::class, 'showForm'])->name('lombaShowFormRoute');
Route::post('/{id}/detail/formulir', [JawabanController::class, 'storeJawaban'])->name('lombaStoreFormRoute');

/// Routes for Peserta (User Role: 'peserta')
Route::prefix('peserta')->middleware(['role:peserta'])->group(function () {
    Route::get('/', [PesertaController::class, 'index'])->name('pesertaIndexRoute');
    Route::get('/listlomba', [PesertaController::class, 'listLomba'])->name('pesertaListLombaRoute');
    Route::get('/listprestasi', [PesertaController::class, 'listPrestasi'])->name('pesertaListPrestasiRoute');
    Route::get('/listprestasi/create', [PesertaController::class, 'showFormPrestasi'])->name('showFormPrestasi');
    Route::post('/listprestasi/create', [PesertaController::class, 'kirimPrestasi'])->name('kirimPrestasi');
    Route::get('/listprestasi/delete/{prestasi_id}', [PesertaController::class, 'deletePrestasi'])->name('deletePrestasiRoute');
    Route::get('/formfeedback/{lombaId}', [PesertaController::class, 'showFormFeedback'])->name('showFormFeedback');
    Route::post('/kirimfeedback/{lombaId}', [PesertaController::class, 'kirimFeedback'])->name('kirimFeedback');
});

// Routes for Penyelenggara (User Role: 'penyelenggara')
Route::prefix('penyelenggara')->middleware(['role:penyelenggara'])->group(function () {
    Route::get('/', [PenyelenggaraController::class, 'index'])->name('penyelenggaraIndexRoute');
    Route::get('/lomba', [PenyelenggaraController::class, 'listLomba'])->name('penyelenggaraLombaRoute');
    Route::get('/lomba/{id}/detail', [PenyelenggaraController::class, 'detailLomba'])->name('penyelenggaraDetailLombaRoute');
    Route::get('/lomba/create', [PenyelenggaraController::class, 'createLomba'])->name('penyelenggaraCreateLombaRoute');
    Route::post('/lomba/create', [PenyelenggaraController::class, 'storeLomba'])->name('penyelenggaraStoreLombaRoute');
    Route::get('/show/beri-sertifikat/{peserta_id}/{lomba_id}', [PrestasiController::class, 'showFormberiSertifikat'])->name('ShowFormBeriSertifikatPeserta');
    Route::post('/beri-sertifikat', [PrestasiController::class, 'beriSertifikat'])->name('BeriSertifikatPeserta');
    Route::get('/lomba/formulir/create', [PenyelenggaraFormController::class, 'index'])->name('pylCreateFormRoute');
    Route::post('/lomba/formulir/create', [PenyelenggaraFormController::class, 'storeFormLomba'])->name('pylStoreFormRoute');
    Route::get('/lomba/formulir/{id}/show', [PenyelenggaraFormController::class, 'show'])->name('pylPreviewFormRoute');
});