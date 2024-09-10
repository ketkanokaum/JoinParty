<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


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


Route::get('/admin/dashboard', [AdminController::class, 'index']);
Route::match(['get', 'post'], '/admin/create', [AdminController::class, 'createParty']);

Route::get('/admin/dashboard', [AdminController::class, 'showUser']);


