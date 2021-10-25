<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ReadingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('home');
Route::get('/patient', [PatientController::class, 'index'])->name('patient.add');

Route::get('/patient/pressure/{id}', [ReadingController::class, 'index'])->name('patient.reading.add');