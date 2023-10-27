<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class, 'home']);

Route::get('/login', function() {
    return view("login");
});

Route::get('/register', function() {
    return view("register");
});

Route::post('/auth/login', [\App\Http\Controllers\AuthController::class, 'login'])->name("login");

Route::post('/auth/register', [\App\Http\Controllers\AuthController::class, 'register'])->name("register");
