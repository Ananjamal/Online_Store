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
    Route::get('admin/categories', [CategoryController::class, 'index']);
    Route::get('admin/category/{id}', [CategoryController::class, 'show']);

    Route::get('admin/products', [ProductController::class, 'index']);
    Route::get('admin/product/{id}', [ProductController::class, 'show']);

    Route::post('admin/create/category', [CategoryController::class, 'store']);
    Route::post('admin/update/category/{id}', [CategoryController::class, 'update']);
    Route::post('admin/delete/category/{id}', [CategoryController::class, 'destroy']);

    Route::post('admin/create/product', [ProductController::class, 'store']);
    Route::post('admin/update/product/{id}', [ProductController::class, 'update']);
    Route::post('admin/delete/product/{id}', [ProductController::class, 'destroy']);

    Route::get('admin/messages', [MessageController::class, 'index']);
    Route::get('admin/user/{id}/messages', [MessageController::class, 'show']);

    Route::get('admin/orders', [OrderController::class, 'index']);
    Route::get('admin/order/{id}/details', [OrderController::class, 'show']);
    Route::post('admin/complete/order/{id}', [OrderController::class, 'completeOrder']);
});

Route::middleware('jwt.verify')->group(function () {
    Route::get('categories', [App\Http\Controllers\Api\Website\ShopController::class, 'categories']);
    Route::get('products', [App\Http\Controllers\Api\Website\ShopController::class, 'products']);
    Route::post('addToFavorites/user/{id}', [App\Http\Controllers\Api\Website\ShopController::class, 'addToFavorite']);
    Route::post('addToCart/user/{id}', [App\Http\Controllers\Api\Website\ShopController::class, 'addToCart']);

    Route::get('user/{id}/orders', [App\Http\Controllers\Api\Website\OrderController::class, 'show']);
    Route::get('order/{id}/products', [App\Http\Controllers\Api\Website\OrderController::class, 'orderProducts']);
    Route::post('cancel/order/{id}', [App\Http\Controllers\Api\Website\OrderController::class, 'cancelOrder']);

    Route::get('user/{id}/favorites', [App\Http\Controllers\Api\Website\favoriteController::class, 'index']);
    Route::post('deleteFromFavorites/user/{id}', [App\Http\Controllers\Api\Website\favoriteController::class, 'deleteFromFavorites']);
});
