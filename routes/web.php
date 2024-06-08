<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\layout\controllerLogin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/registrasi', function () {
    return view('registrasi');
});

Route::get('/',[controllerLogin::class,'login']);
Route::post('/', [controllerLogin::class, 'loginPost']) ->name('login.post');
Route::get('/registrasi',[controllerLogin::class,'register']);
Route::post('/registrasi',[controllerLogin::class,'registerPost']);
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');
Route::post('products/{product}/purchase', [PurchaseController::class, 'purchase'])->name('products.purchase');

Route::resource('products', ProductController::class);







