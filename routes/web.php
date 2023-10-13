<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\AllOrders;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/category', [CategoryController::class, 'index']);


Route::get('/category/{id}/edit', [CategoryController::class, 'edit']);

Route::get('/category/create/form', [CategoryController::class, 'create'])->name('category.create');
Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');

Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');

Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');



Route::get('/orders', [OrderController::class, 'index'])->name('order.index');
Route::get('/orders/create', [OrderController::class, 'create'])->name('order.create');
Route::post('/orders', [OrderController::class, 'store'])->name('order.store');
// get post put delete
// create -> post
// update -> put
// delete -> delete
Route::put('/category/{id}/update', [CategoryController::class, 'update'])
    ->name('category.update');
