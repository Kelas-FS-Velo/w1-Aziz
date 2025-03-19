<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::post('/upload', [ProfileController::class, 'upload']);
