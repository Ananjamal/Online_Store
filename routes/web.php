<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/laravel', function () {
    return view('welcome2');
});
// Route::get('/info', function () {
//     return view('info_page');
// })->name('info_details');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/', App\Http\Livewire\Website\Home::class)->name('home');
Route::get('/shop', App\Http\Livewire\Website\Shop\Shop::class)->name('shop');

Route::get('/product/{id}/details', App\Http\Livewire\Website\Details\productDetails::class)->name('productDetails');

Route::get('/about', App\Http\Livewire\Website\About\About::class)->name('about');
Route::get('/contact', App\Http\Livewire\Website\Contact\Contact::class)->name('contact');
Route::get('/carts', App\Http\Livewire\Website\Carts\Carts::class)->name('cart');
Route::get('/favorites', App\Http\Livewire\Website\Favorites\Favorites::class)->name('favorites');
Route::get('/checkout', App\Http\Livewire\Website\checkout\checkout::class)
    ->name('checkout')
    ->middleware('auth');
Route::get('/my_orders', App\Http\Livewire\Website\orders\Orders::class)
    ->name('my_orders')
    ->middleware('auth');
Route::get('/order/{id}/details', App\Http\Livewire\Website\orders\OrdersDetalis::class)->name('orders_details');

Route::middleware('auth', 'role:admin')->group(function () {
    Route::get('/admin/dashborad', App\Http\Livewire\Admin\Dashboard::class)->name('dashboard');
    Route::get('/admin/order/{id}/details', App\Http\Livewire\Admin\Orders\OrderDetails::class)->name('order_detail');
});

// Route::get('admin/categories', App\Livewire\Admin\Categories\Categories::class)->name('categories');
// Route::get('admin/products', App\Livewire\Admin\Products\Products::class)->name('products');
