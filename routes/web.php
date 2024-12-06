<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportOzonController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/log_data', function () {
    return view('log_data');
})->middleware(['auth', 'verified'])->name('log_data');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/report', [ReportOzonController::class, 'index'])->name('report.index');
    Route::post('/report', [ReportOzonController::class, 'store'])->name('report.store');

});

require __DIR__.'/auth.php';
