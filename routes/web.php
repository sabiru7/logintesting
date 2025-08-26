<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/auth', function () {
    return view('auth.auth');
})->name('auth');

// Proses Auth
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); 

// Dashboard 
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/pengaturan', function () {
        return view('pengaturan');
    })->name('pengaturan'); // ✅ Tambah route pengaturan
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/pengaturan', function () {
        return view('pengaturan');
    })->name('pengaturan');
});
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    
});
//profil
use App\Http\Controllers\ProfileController;

Route::middleware(['auth'])->group(function () {
    // Tampilkan profil
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');

    // Halaman pengaturan
    Route::get('/profile/settings', [ProfileController::class, 'settings'])->name('pengaturan');

    // Update profil 
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    // Update avatar 
    Route::put('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar.update');
    Route::get('/pengaturan', [ProfileController::class, 'settings'])->name('pengaturan');

});
// API Al-Qur'an
use App\Http\Controllers\ApiController;
Route::get('/api', [ApiController::class, 'index'])->name('api.index');
