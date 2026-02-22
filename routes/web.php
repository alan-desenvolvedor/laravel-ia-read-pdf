<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AITestController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ia', [AITestController::class, 'index'])->name('ia.index');
Route::post('/ia', [AITestController::class, 'processar'])->name('ia.processar');