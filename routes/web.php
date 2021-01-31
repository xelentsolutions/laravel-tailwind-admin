<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SettingController;
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
        Route::get('/', 'CityController@index')->name('cities.index');
        Route::get('/create', 'CityController@create')->name('cities.create');
        Route::post('/store', 'CityController@store')->name('cities.store');
        Route::get('/{id}/edit', 'CityController@edit')->name('cities.edit');
        Route::post('/update', 'CityController@update')->name('cities.update');
        Route::get('/{id}/delete', 'CityController@delete')->name('cities.delete');
    });
});
