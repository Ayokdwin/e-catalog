<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;


Route::get('/',[LandingPageController::class,'index'])->name('index');


Route::middleware('auth')->group(function () {
    // dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    // product
    Route::get('/admin/products', [ProductController::class, 'show_products'])->name('admin.show_products');
    Route::get('/admin/products/create', [ProductController::class, 'create_product'])->name('admin.create_product');
    Route::post('/admin/products', [ProductController::class, 'store_product'])->name('admin.store_product');
    Route::get('/admin/products/{id}/delete', [ProductController::class, 'destroy_product'])->name('admin.destroy_product');
    Route::post('/admin/products/{id}/sembunyikan', [ProductController::class, 'sembunyikan_product'])->name('sembunyikan_product');
    Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit_product'])->name('admin.edit_product');
    Route::put('/admin/products/{id}/update', [ProductController::class, 'update_product'])->name('admin.update_product');
    // material
    Route::get('/admin/materials', [MaterialController::class, 'show_materials'])->name('admin.show_materials');
    Route::get('/admin/materials/create', [MaterialController::class, 'create_material'])->name('admin.create_material');
    Route::post('/admin/materials/create', [MaterialController::class, 'store_material'])->name('admin.store_material');
    Route::get('/admin/materials/{id}/delete', [MaterialController::class, 'destroy_material'])->name('admin.destroy_material');
    Route::get('/admin/materials/{id}/edit', [MaterialController::class, 'edit_material'])->name('admin.edit_material');
    Route::put('/admin/materials/{id}/update', [MaterialController::class, 'update_material'])->name('admin.update_material');

    // category
    Route::get('/admin/categories', [CategoryController::class, 'show_categories'])->name('admin.show_categories');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
