<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
});

// CRUD User Data
// Create
Route::post('/register', [UserController::class, 'createUser']);
// Retrieve 
Route::post('/login', [UserController::class,'userLogin']);

