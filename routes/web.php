<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ProductInController;
use App\Http\Controllers\Admin\ProductOutController;
Use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    
    // Category
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category-create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category-create', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category-edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category-create/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

    // Supplier 
    Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier.index');
    Route::get('/supplier-create', [SupplierController::class, 'create'])->name('supplier.create');
    Route::post('/supplier-create', [SupplierController::class, 'store'])->name('supplier.store');
    Route::get('/supplier-edit/{id}', [SupplierController::class, 'edit'])->name('supplier.edit');
    Route::put('/supplier-create/{id}', [SupplierController::class, 'update'])->name('supplier.update');
    Route::delete('/supplier/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');

    // Product
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product-create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product-create', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product-edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/product-create/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');


    // Customer
    Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('/customer-create', [CustomerController::class, 'create'])->name('customer.create');
    Route::post('/customer-create', [CustomerController::class, 'store'])->name('customer.store');
    Route::get('/customer-edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::put('/customer-create/{id}', [CustomerController::class, 'update'])->name('customer.update');
    Route::delete('/customer/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');


     // Product In
     Route::get('/product-in', [ProductInController::class, 'index'])->name('product-in.index');
     Route::get('/product-in-create', [ProductInController::class, 'create'])->name('product-in.create');
     Route::post('/product-in-create', [ProductInController::class, 'store'])->name('product-in.store');
     Route::get('/product-in-cetak_pdf', [ProductInController::class, 'exportProductInAll'])->name('product-in.exportAll');
     Route::get('/product-in-invoice_pdf/{id}', [ProductInController::class, 'exportInvoice'])->name('product-in.exportInvoice');
     Route::delete('/product-in/{id}', [ProductInController::class, 'destroy'])->name('product-in.destroy');
 
     // Product Out
     Route::get('/product-out', [ProductOutController::class, 'index'])->name('product-out.index');
     Route::get('/product-out-create', [ProductOutController::class, 'create'])->name('product-out.create');
     Route::post('/product-out-create', [ProductOutController::class, 'store'])->name('product-out.store');
     Route::get('/product-out-cetak_pdf', [ProductOutController::class, 'cetak_pdf'])->name('product-out.cetakpdf');
     Route::get('/product-out-invoice_pdf/{id}', [ProductOutController::class, 'exportInvoice'])->name('product-out.exportInvoice');
     Route::delete('/product-out/{id}', [ProductOutController::class, 'destroy'])->name('product-out.destroy');
    
});

Auth::routes();
