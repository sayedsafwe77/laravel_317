<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Admin;
use App\Models\AllOrders;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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





// guard
// gate

Route::view('/home', 'home')->name('home');


Route::middleware('auth:web,admin')->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('order.index')->middleware('can:edit-product');
    Route::get('/orders/create', [OrderController::class, 'create'])->name('order.create');
    Route::post('/orders', [OrderController::class, 'store'])->name('order.store');
});

Route::middleware(['guest', 'guest:admin'])->group(function () {
    // Route::get('login', [AuthController::class, 'loginView']);
});

// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// get post put delete
// create -> post
// update -> put
// delete -> delete
Route::put('/category/{id}/update', [CategoryController::class, 'update'])
    ->name('category.update');




Route::get('/profile', function () {
    // request life cycle   index.php => bootstrap => providers => middleware  => Route => route handler  => middleware => response
    // middleware
    // Admin::create([]);
    // dd(Auth::user());
});

Auth::routes(['verify' => true]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('login', [AuthController::class, 'login'])->name('login');
