<?php

use App\Http\Controllers\AuthenController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LocationController;

// Route หน้าแรก
Route::get('/', function () {
    return view('welcome');
});

// Route สำหรับ Guest (ยังไม่เข้าสู่ระบบ)
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthenController::class, 'Register'])->name('register');
    Route::post('/register/authenticate', [AuthenController::class, 'Store'])->name('register.authenticate');

    Route::get('/login', [AuthenController::class, 'Login'])->name('login.form');
    Route::post('/login/authenticate', [AuthenController::class, 'Authen'])->name('login.authenticate');
});

// Route สำหรับคนที่ Login แล้ว
Route::middleware('auth')->group(function () {
    Route::get('/profiles', [ProfileController::class, 'index'])->name('profiles.index'); // ✅ เปลี่ยนเส้นทางไปหน้า profiles
    Route::post('/logout', [AuthenController::class, 'Logout'])->name('logout');
});

// Route อื่นๆ
Route::resource('profiles', ProfileController::class);
Route::get('gmaps', [LocationController::class, 'gmaps'])->name('gmaps');
