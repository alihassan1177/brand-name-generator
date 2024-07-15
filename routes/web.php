<?php

use App\Http\Controllers\ChatGPTController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index');
Route::post('/suggestions', [ChatGPTController::class, 'index'])->name('suggestions');
