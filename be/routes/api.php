<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::post('profile/upload-gambar', [ProfileController::class, 'uploadGambar']);
