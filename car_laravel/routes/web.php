<?php
 
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

Route::resource('car', CarController::class); // Tidak perlu menambahkan create lagi di sini
