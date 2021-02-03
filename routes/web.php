<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SettingController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\UomController;
use App\Http\Controllers\PaymentTermController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
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


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('users', UsersController::class);

    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');


    Route::group(['prefix'  =>   'cities'], function () {
        Route::get('/', [CityController::class, 'index'])->name('cities.index');
        Route::get('/create', [CityController::class,'create'])->name('cities.create');
        Route::post('/store', [CityController::class,'store'])->name('cities.store');
        Route::get('/{id}/edit', [CityController::class,'edit'])->name('cities.edit');
        Route::post('/update', [CityController::class,'update'])->name('cities.update');
        Route::get('/{id}/delete', [CityController::class,'delete'])->name('cities.delete');
    });

    Route::group(['prefix'  =>   'uoms'], function () {
        Route::get('/', [UomController::class, 'index'])->name('uoms.index');
        Route::get('/create', [UomController::class,'create'])->name('uoms.create');
        Route::post('/store', [UomController::class,'store'])->name('uoms.store');
        Route::get('/{id}/edit', [UomController::class,'edit'])->name('uoms.edit');
        Route::post('/update', [UomController::class,'update'])->name('uoms.update');
        Route::get('/{id}/delete', [UomController::class,'delete'])->name('uoms.delete');
    });

    Route::group(['prefix'  =>   'payment-terms'], function () {
        Route::get('/', [PaymentTermController::class, 'index'])->name('payment-terms.index');
        Route::get('/create', [PaymentTermController::class,'create'])->name('payment-terms.create');
        Route::post('/store', [PaymentTermController::class,'store'])->name('payment-terms.store');
        Route::get('/{id}/edit', [PaymentTermController::class,'edit'])->name('payment-terms.edit');
        Route::post('/update', [PaymentTermController::class,'update'])->name('payment-terms.update');
        Route::get('/{id}/delete', [PaymentTermController::class,'delete'])->name('payment-terms.delete');
    });

    Route::group(['prefix'  =>   'taxes'], function () {
        Route::get('/', [TaxController::class, 'index'])->name('taxes.index');
        Route::get('/create', [TaxController::class,'create'])->name('taxes.create');
        Route::post('/store', [TaxController::class,'store'])->name('taxes.store');
        Route::get('/{id}/edit', [TaxController::class,'edit'])->name('taxes.edit');
        Route::post('/update', [TaxController::class,'update'])->name('taxes.update');
        Route::get('/{id}/delete', [TaxController::class,'delete'])->name('taxes.delete');
    });

    Route::group(['prefix'  =>   'customers'], function () {
        Route::get('/', [CustomerController::class, 'index'])->name('customers.index');
        Route::get('/create', [CustomerController::class,'create'])->name('customers.create');
        Route::post('/store', [CustomerController::class,'store'])->name('customers.store');
        Route::get('/{id}/edit', [CustomerController::class,'edit'])->name('customers.edit');
        Route::get('/{id}/show', [CustomerController::class,'show'])->name('customers.show');
        Route::post('/update', [CustomerController::class,'update'])->name('customers.update');
        Route::get('/{id}/destroy', [CustomerController::class,'destroy'])->name('customers.destroy');
        Route::post('/customer-detail-destroy', [CustomerController::class,'customer_contact_destroy'])->name('customers.customer_contact_destroy');
    });

    Route::group(['prefix'  =>   'products'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('products.index');
        Route::get('/create', [ProductController::class,'create'])->name('products.create');
        Route::post('/store', [ProductController::class,'store'])->name('products.store');
        Route::get('/{id}/edit', [ProductController::class,'edit'])->name('products.edit');
        Route::get('/{id}/show', [ProductController::class,'show'])->name('products.show');
        Route::post('/update', [ProductController::class,'update'])->name('products.update');
        Route::get('/{id}/destroy', [ProductController::class,'destroy'])->name('products.destroy');
    });
});
