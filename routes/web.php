<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller2;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller3; 

Route::get('/', [HomeController::class, 'index']);
Route::get('/caycanh/theloai/{id}', [ProductController::class, 'byCategory'])->name('category');
Route::get('/san-pham/{id}', [ProductController::class, 'show'])->name('product.show');
Route::post('/add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart');
Route::get('/gio-hang', [ProductController::class, 'viewCart'])->name('cart.view');
Route::post('/update-cart', [ProductController::class, 'updateCart'])->name('cart.update');
Route::get('/remove-from-cart/{id}', [ProductController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/checkout', [ProductController::class, 'checkout'])->name('checkout');



Route::get('/', [HomeController::class, 'index']);

Route::get('/search', [Controller2::class, 'search'])->name('search');

Route::match(['get', 'post'], '/timkiem', function (Request $request) {
    return redirect()->route('search', [
        'keyword' => $request->keyword
    ]);
});

Route::get('/dashboard', function () {
    //
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    
    Route::get('/products', [Controller3::class, 'danhsach']); 
    Route::get('/products/show/{id}', [Controller3::class, 'show']);
    Route::get('/products/delete/{id}', [Controller3::class, 'delete']);
    Route::get('/products/create', [Controller3::class, 'create']);
    Route::post('/products/store', [Controller3::class, 'store']);
    
});

require __DIR__.'/auth.php';