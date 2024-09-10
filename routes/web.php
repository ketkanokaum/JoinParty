<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PartyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Middleware สำหรับการรับรองความถูกต้อง (authentication) และการยืนยันตัวตน (verified)
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// เส้นทางสำหรับ admin (ใช้ middleware 'auth' และ 'admin')
Route::middleware(['auth', 'admin'])->group(function () {
    // เส้นทางสำหรับการจัดการผู้ใช้
    Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.users.index');
    Route::post('/admin/users/search', [AdminController::class, 'search'])->name('admin.users.search');
    Route::get('/admin/users/{id}', [AdminController::class, 'show'])->name('admin.users.show');

    // เส้นทางสำหรับการจัดการรายงาน
    Route::get('/admin/reports', [ReportController::class, 'index'])->name('admin.reports.index');
    Route::post('/admin/reports/search', [ReportController::class, 'search'])->name('admin.reports.search');
    Route::get('/admin/reports/{id}', [ReportController::class, 'show'])->name('admin.reports.show');

    // เส้นทางสำหรับการจัดการงานปาร์ตี้
    Route::get('/admin/parties', [PartyController::class, 'index'])->name('admin.parties.index');
    Route::post('/admin/parties/search', [PartyController::class, 'search'])->name('admin.parties.search');
    Route::get('/admin/parties/create', [PartyController::class, 'create'])->name('admin.parties.create');
    Route::post('/admin/parties/store', [PartyController::class, 'store'])->name('admin.parties.store');
});
