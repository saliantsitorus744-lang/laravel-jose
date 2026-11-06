<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\UserController; // 1. Tambahkan Import ini
use App\Http\Controllers\CvController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])
    ->name('home');

Route::post('question/store', [QuestionController::class, 'store'])
    ->name('question.store');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/home-question-respon', [QuestionController::class, 'respon']);

Route::resource('pelanggan', PelangganController::class);

// 2. Tambahkan Route Resource User ini
Route::resource('user', UserController::class);

Route::get('/cv', [CvController::class, 'index'])->name('cv.index');
Route::get('/cv/create', [CvController::class, 'create'])->name('cv.create');
Route::post('/cv', [CvController::class, 'store'])->name('cv.store');
Route::get('/cv/{cv}', [CvController::class, 'show'])->name('cv.show');
Route::get('/cv/{cv}/edit', [CvController::class, 'edit'])->name('cv.edit');
Route::put('/cv/{cv}', [CvController::class, 'update'])->name('cv.update');
Route::delete('/cv/{cv}', [CvController::class, 'destroy'])->name('cv.destroy');
