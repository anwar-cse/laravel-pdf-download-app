<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\SlipController;

Route::get('/', [SlipController::class, 'show']);
Route::get('/slip/pdf', [SlipController::class, 'downloadPdf'])->name('slip.pdf');
