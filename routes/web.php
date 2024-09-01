<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});




Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.users.index');
    Route::post('/admin/users/search', [AdminController::class, 'search'])->name('admin.users.search');

});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/reports', [ReportController::class, 'index'])->name('admin.reports.index');
    Route::post('/admin/reports/search', [ReportController::class, 'search'])->name('admin.reports.search');

});
