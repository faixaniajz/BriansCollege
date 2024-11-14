<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResultController;


// Route::get('/', function () {
//     return view('welcome');
// })->name('coming-soon');



Route::get('/', [ResultController::class, 'index'])->name('results.index');
Route::post('/results/search', [ResultController::class, 'search'])->name('results.search');


Route::get('/results/create', [uploadControllerController::class, 'create'])->name('results.create');
Route::post('/results', [tController::class, 'store'])->name('results.store');