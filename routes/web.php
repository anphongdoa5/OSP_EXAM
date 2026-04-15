<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Controller3; 
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    //return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    
    Route::get('/products', [Controller3::class, 'danhsach']); 
    Route::get('/products/show/{id}', [Controller3::class, 'show']);
    Route::get('/products/delete/{id}', [Controller3::class, 'delete']);
    Route::get('/products/create', [Controller3::class, 'create']);
    Route::post('/products/store', [Controller3::class, 'store']);
    
});

require __DIR__.'/auth.php';