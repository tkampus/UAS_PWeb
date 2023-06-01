<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\sellerController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\previewController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('register', [registerController::class, 'register'])->name('register');
Route::post('actionregister', [registerController::class, 'actionregister'])->name('actionregister');

Route::get('login', [loginController::class, 'login'])->name('login');
Route::post('actionlogin', [loginController::class, 'actionlogin'])->name('actionlogin');
Route::get('actionlogout', [loginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

// seller
Route::get('seller', function () {
    return redirect('seller/profil');
});
Route::get('seller/profil', [sellerController::class, 'profil'])->name('seller')->middleware('auth');
Route::post('seller/updateprofil', [sellerController::class, 'updateprofil'])->name('updateprofil')->middleware('auth');

Route::get('seller/produk', [sellerController::class, 'produk'])->name('produk')->middleware('auth');
Route::post('seller/createproduk', [sellerController::class, 'createproduk'])->name('createproduk')->middleware('auth');
Route::post('seller/deleteproduk', [sellerController::class, 'deleteproduk'])->name('deleteproduk')->middleware('auth');

Route::get('seller/views', [sellerController::class, 'views'])->name('views')->middleware('auth');
Route::get('seller/ulasan', [sellerController::class, 'ulasan'])->name('ulasan')->middleware('auth');

Route::post('kirimulasan', [previewController::class, 'kirimulasan'])->name('kirimulasan');

// ===========================
Route::get('faq/{param}', [previewController::class, 'faq'])->name('faq');
Route::get('/{param}', [previewController::class, 'index'])->name('preview');
