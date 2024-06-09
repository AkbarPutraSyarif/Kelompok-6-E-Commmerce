<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\layout\controllerLogin;
use Illuminate\Support\Facades\Route;


Route::get('/',[controllerLogin::class,'login']);
Route::post('/', [controllerLogin::class, 'loginPost']) ->name('login.post');
Route::get('/registrasi',[controllerLogin::class,'register']);
Route::post('/registrasi', [ControllerLogin::class, 'registerPost']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/logout', [controllerLogin::class, 'logout']);
Route::get('/purchase/{id}', [HomeController::class, 'purchase'])->name('purchase');









