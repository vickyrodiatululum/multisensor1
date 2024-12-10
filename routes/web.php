<?php

use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SensorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Log_dataController;
use App\Http\Controllers\ReportOzonController;

Route::middleware('auth')->group(function (){
    Route::get('/', [SensorController::class, 'index'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/report', [ReportOzonController::class, 'index'])->name('report.index');
    Route::post('/report', [ReportOzonController::class, 'store'])->name('report.store');
});
Route::middleware('auth')->group(function () {
    Route::get('/log_data', [Log_dataController::class, 'index'])->name('log_data.index');
    Route::post('/log_data/{train}', [Log_dataController::class, 'store'])->name('log_data.train');
    Route::get('/chart-data', [Log_dataController::class, 'getChartData']);
});
Route::middleware([IsAdmin::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::post('/admin/create', [AdminController::class, 'store'])->name('admin.store');
});


require __DIR__.'/auth.php';
