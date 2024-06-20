<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\layout\controllerLogin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\Login;
use App\Http\Controllers\Admin\ProductController;


// Route::get('/', function () {
//     return view('login');
// });

// Route::get('/registrasi', function () {
//     return view('registrasi');
// });


Route::get('/',[controllerLogin::class,'login']);
Route::post('/', [controllerLogin::class, 'loginPost']) ->name('loginPost');
Route::get('/registrasi',[controllerLogin::class,'register']);
Route::post('/registrasi',[controllerLogin::class,'registerPost']);
Route::get('/logout', [controllerLogin::class, 'logout']);

Route::get('/loginadmin', [Login::class, 'loginAdmin'])->name('admin.login');
Route::post('/loginadmin', [Login::class, 'masukDashboard'])->name('admin.login.post');

Route::get('admin/dashboard', [ProductController::class, 'dashboard'])->name('admin.dashboard');
Route::patch('admin/updateStock/{id}', [ProductController::class, 'updateStock'])->name('admin.updateStock');
Route::delete('admin/deleteProduct/{id}', [ProductController::class, 'delete'])->name('admin.deleteProduct');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/purchase/{id}', [HomeController::class, 'purchase'])->name('purchase');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/products', [HomeController::class, 'showAllProducts'])->name('products.all');

Route::get('/topup', [HomeController::class, 'showTopUpForm'])->name('topup.update');
Route::post('/topup', [HomeController::class, 'topUpBalance'])->name('topup');





