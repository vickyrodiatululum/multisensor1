<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SensorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportOzonController;
use App\Http\Controllers\Log_dataController;


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/log_data', function () {
//     return view('log_data');
// })->middleware(['auth', 'verified'])->name('log_data');

Route::middleware('auth')->group(function (){
    Route::get('/dashboard', [SensorController::class, 'index'])->name('dashboard');
    Route::get('/get-train/{train}', [SensorController::class, 'getTrainData']);
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

require __DIR__.'/auth.php';
