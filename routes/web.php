<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\layout\controllerLogin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;



<<<<<<< HEAD

=======
>>>>>>> e616fbe (Mencoba membuat beranda)
Route::get('/',[controllerLogin::class,'login']);
Route::post('/', [controllerLogin::class, 'loginPost']) ->name('loginPost');
Route::get('/registrasi',[controllerLogin::class,'register']);

Route::post('/registrasi', [ControllerLogin::class, 'registerPost']);

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/logout', [controllerLogin::class, 'logout']);
Route::get('/purchase/{id}', [HomeController::class, 'purchase'])->name('purchase');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');


Route::post('/registrasi',[controllerLogin::class,'registerPost']);
Route::get('/logout', [controllerLogin::class, 'logout']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/logout', [controllerLogin::class, 'logout']);
Route::get('/purchase/{id}', [HomeController::class, 'purchase'])->name('purchase');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');




<<<<<<< HEAD
=======



>>>>>>> a0dfb3a (testing beranda)
