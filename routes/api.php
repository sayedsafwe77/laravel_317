<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get(
    '/test',
    function () {
        return 'welcome from api file';
    }
);

Route::get('order', [OrderController::class, 'index'])->name('index');
Route::post('order', [OrderController::class, 'getAll'])->name('getAll');



Route::get('product', [ProductController::class, 'index'])->name('product.index');
Route::post('product', [ProductController::class, 'store'])->name('product.store');
Route::delete('product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::post('login', [AuthController::class, 'login'])->name('login');


Route::get('profile', [AuthController::class, 'profile'])->name('profile')->middleware('auth:sanctum');
