<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SettingController;
use App\Http\Controllers\CityController;
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
});
