<?php

use App\Http\Controllers\layout\controllerLogin;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('login');
// });

// Route::get('/registrasi', function () {
//     return view('registrasi');
// });

route::view('/beranda', 'beranda');
Route::get('/',[controllerLogin::class,'login']);
Route::post('/', [controllerLogin::class, 'loginPost']) ->name('login.post');
Route::get('/registrasi',[controllerLogin::class,'register']);
Route::post('/registrasi',[controllerLogin::class,'registerPost']);




