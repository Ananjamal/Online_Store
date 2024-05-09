<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Admin\OrderController;
use App\Http\Controllers\Api\Admin\MessageController;
use App\Http\Controllers\Api\Admin\ProductController;
use App\Http\Controllers\Api\Admin\CategoryController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(
    [
        'middleware' => 'api',
        'prefix' => 'auth',
    ],
    function ($router) {
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/register', [AuthController::class, 'register']);
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::post('/refresh', [AuthController::class, 'refresh']);
        Route::get('/user-profile', [AuthController::class, 'userProfile']);
    },
);

Route::middleware('jwt.verify', 'role:admin')->group(function () {
    ///////////////////Routes For Admin////////////////////////
    Route::post('create/category', [CategoryController::class, 'store']);
    Route::post('update/category/{id}', [CategoryController::class, 'update']);
    Route::post('delete/category/{id}', [CategoryController::class, 'destroy']);

    Route::post('create/product', [ProductController::class, 'store']);
    Route::post('update/product/{id}', [ProductController::class, 'update']);
    Route::post('delete/product/{id}', [ProductController::class, 'destroy']);

    Route::get('messages', [MessageController::class, 'index']);
    Route::get('user/{id}/messages', [MessageController::class, 'show']);

    Route::get('orders', [OrderController::class, 'index']);
    Route::get('order/{id}/details', [OrderController::class, 'show']);
    Route::post('complete/order/{id}', [OrderController::class, 'completeOrder']);

    ///////////////////Routes For Website////////////////////////
});

Route::middleware('jwt.verify')->group(function () {
    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('category/{id}', [CategoryController::class, 'show']);

    Route::get('products', [ProductController::class, 'index']);
    Route::get('product/{id}', [ProductController::class, 'show']);

    Route::get('user/{id}/orders', [App\Http\Controllers\Api\Website\OrderController::class, 'show']);
    Route::get('order/{id}/products', [App\Http\Controllers\Api\Website\OrderController::class, 'orderProducts']);
    Route::post('cancel/order/{id}', [App\Http\Controllers\Api\Website\OrderController::class, 'cancelOrder']);
});
