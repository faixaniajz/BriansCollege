<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\QueensController;
use App\Http\Controllers\WaltonController;


// Route::get('/', function () {
//     return view('welcome');
// })->name('coming-soon');



Route::get('/', [ResultController::class, 'index'])->name('results.index');
Route::post('/results/search', [ResultController::class, 'search'])->name('results.search');

Route::middleware(['auth'])->group(function () {
    Route::get('/lahore/index', [ResultController::class, 'in'])->name('results.in');
    Route::get('/lahore/results/destroy/{id}', [ResultController::class, 'destroy'])->name('results.destroy');
    Route::put('/lahore/results/update/{id}', [ResultController::class, 'update'])->name('results.update');
    Route::get('/lahore/results/edit/{id}', [ResultController::class, 'edit'])->name('results.edit');
    Route::get('/lahore/login', [AuthController::class, 'showLoginForm'])->name('results.login');
    Route::get('/lahore/logout', [AuthController::class, 'logout'])->name('results.logout');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/queens/index', [QueensController::class, 'in'])->name('queens.in');
    Route::get('/queens/results/destroy/{id}', [QueensController::class, 'destroy'])->name('queens.destroy');
    Route::put('/queens/results/update/{id}', [QueensController::class, 'update'])->name('queens.update');
    Route::get('/queens/results/edit/{id}', [QueensController::class, 'edit'])->name('queens.edit');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/walton/index', [WaltonController::class, 'in'])->name('walton.in');
    Route::get('/walton/results/destroy/{id}', [WaltonController::class, 'destroy'])->name('walton.destroy');
    Route::put('/walton/results/update/{id}', [WaltonController::class, 'update'])->name('walton.update');
    Route::get('/walton/results/edit/{id}', [WaltonController::class, 'edit'])->name('walton.edit');
});



Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
