<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


// Public routes
Route::get('/', function () {
    return redirect()->route('login');
});


Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');


Route::post('/register', [AuthController::class, 'register'])
    ->name('register.submit');


Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');


Route::post('/login', [AuthController::class, 'login'])
    ->name('login.submit');


// Routes accessible only to authenticated users
Route::middleware('auth')->group(function () {


    Route::get('/dashboard', [AuthController::class, 'dashboard'])
        ->name('dashboard');


    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');


});