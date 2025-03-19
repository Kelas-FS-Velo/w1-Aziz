<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('api/profile/upload-gambar', [ProfileController::class, 'uploadGambar']);
