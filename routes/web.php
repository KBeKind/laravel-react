<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('test');
});

Route::get('/test', function () {
    return view('test');
});

//PRODUCT INDEX
Route::get('products/index',[ProductController::class, 'index'])->name('products.index');

//PRODUCT CREATE
Route::resource('products', ProductController::class);
Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('products', [ProductController::class, 'store'])->name('products.store');


//PRODUCT EDIT
Route::get('products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::put('products/{id}/editSave', [ProductController::class, 'editSave'])->name('products.editSave');

?>