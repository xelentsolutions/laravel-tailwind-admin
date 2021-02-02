<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SettingController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\UomController;
use App\Http\Controllers\PaymentTermController;
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

    Route::resource('users', \App\Http\Controllers\UsersController::class);

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

});
