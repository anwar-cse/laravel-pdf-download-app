<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\SlipController;

Route::get('/slip', [SlipController::class, 'show']);
Route::get('/slip/pdf', [SlipController::class, 'downloadPdf'])->name('slip.pdf');
