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
    Route::get('/get-train/{train}', [SensorController::class, 'getTrainData']);
    Route::post('/update-train-status', [SensorController::class, 'updateStatus']);
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
    Route::post('/admin/{id}/reset', [AdminController::class, 'reset'])->name('admin.reset');
    Route::delete('/user/{id}', [AdminController::class, 'delete']);
});


require __DIR__.'/auth.php';
