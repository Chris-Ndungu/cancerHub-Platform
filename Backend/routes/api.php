<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// CRUD User Data
// Create
Route::post('/register', [UserController::class, 'createUser']);
// Retrieve 
Route::post('/login', [UserController::class,'userLogin']);

// Create booking
Route::post('/booking', [BookingController::class, 'store']);

