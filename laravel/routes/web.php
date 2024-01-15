<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

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
Route::prefix('yonetim')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.showLoginForm');
    Route::post('/login', [AuthController::class, 'login'])->name('admin.login');

Route::middleware(['yonetim'])->group(function () {

Route::get('/all',[ProductController::class, 'index'])->name('product.all');
Route::get('/',[ProductController::class, 'create'])->name('product.create');
Route::post('/',[ProductController::class, 'store'])->name('product.store');
Route::get('/logout',[AuthController::class, 'logout'])->name('admin.logout');
});
});