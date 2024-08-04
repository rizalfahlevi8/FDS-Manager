<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

//------------------------------------- AUTH -----------------------------------------
//login
Route::get('/', [AuthController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');

//logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('PreventBackHistory')
    ->name('logout');

//---------------------------------- PROFILE -----------------------------------------

Route::prefix('profile')->middleware(['auth'])->group(function () {
    //Data Profile
    Route::get('/index/{id}', [ProfileController::class, 'index'])->name('profile-index');
    Route::put('/update/{id}', [ProfileController::class, 'update'])->name('profile-update'); 
    //Ganti-Password
    Route::post('/changePassword', [ProfileController::class, 'changePassword'])->name('profile-changePassword'); 
});


//---------------------------------- DASHBORD -----------------------------------------
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

//---------------------------------MANAJEMEN OWNER -----------------------------------------
Route::prefix('manajemen-owner')->middleware(['superadmin'])->group(function () {
    Route::get('/index', [OwnerController::class, 'index'])->name('manajemen-owner-index');
    Route::get('/create', [OwnerController::class, 'create'])->name('manajemen-owner-create');
    Route::get('/edit/{id}', [OwnerController::class, 'edit'])->name('manajemen-owner-edit');
    Route::post('/store', [OwnerController::class, 'store'])->name('manajemen-owner-store');
    Route::put('/update/{id}', [OwnerController::class, 'update'])->name('manajemen-owner-update'); 
    Route::delete('/delete/{id}', [OwnerController::class, 'delete'])->name('manajemen-owner-delete'); 
});

//---------------------------------MANAJEMEN OWNER -----------------------------------------
Route::prefix('manajemen-kasir')->middleware(['owner'])->group(function () {
    Route::get('/index', [KasirController::class, 'index'])->name('manajemen-kasir-index');
    Route::get('/create', [KasirController::class, 'create'])->name('manajemen-kasir-create');
    Route::get('/edit/{id}', [KasirController::class, 'edit'])->name('manajemen-kasir-edit');
    Route::post('/store', [KasirController::class, 'store'])->name('manajemen-kasir-store');
    Route::put('/update/{id}', [KasirController::class, 'update'])->name('manajemen-kasir-update'); 
    Route::delete('/delete/{id}', [KasirController::class, 'delete'])->name('manajemen-kasir-delete'); 
});