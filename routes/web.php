<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',
    [AuthController::class, 'showLoginForm'])
    ->name('login');

Route::post('/login',
    [AuthController::class, 'login'])
    ->name('login.process');

Route::get('/logout',
    [AuthController::class, 'logout'])
    ->name('logout');

// Route::get('/products', [ProductController::class, 'index']);
Route::get('/insert', [ProductController::class, 'insert']);
// Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::get('/products/delete/{id}', [ProductController::class, 'delete']);
// Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
// Route::post('/products', [ProductController::class, 'store'])->name('products.store');
// Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
// Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
// Route::delete('/products/{id}', [ProductController::class, 'update'])->name('products.update');

Route::middleware(['auth.custom'])->group(function () {

    Route::resource('categories', CategoryController::class);

    Route::resource('products', ProductController::class);

});

Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
Route::get('/', function () {return view('home');})->name('home');