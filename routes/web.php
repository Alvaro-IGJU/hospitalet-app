<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\BookingController;
use App\Models\Apartment;
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

Route::get('/', [ApartmentController::class, 'index']);


Route::prefix('apartments')->group(function () {
    Route::get('{id}', [ApartmentController::class, 'show'])->name('apartments.show');
});

Route::prefix('patrunco')->group(function () {
    Route::get('/login', [AdminController::class,'loginView'])->name('admin.loginview');
    Route::post('/login', [AdminController::class,'login'])->name('admin.login');
});

Route::prefix('patrunco')->middleware('auth')->group(function () {
    Route::put('apartments/{id}', [ApartmentController::class, 'updateEnabledStatus'])->name('apartments.updateEnabledStatus');
    Route::get('bookings/{id?}', [BookingController::class, 'getAll'])->name('bookings.getAll');
    Route::get('{id?}', [AdminController::class, 'read'])->name('admin.read');
    Route::put('/bookings/{id}', [BookingController::class,'update'])->name('bookings.update');
    Route::post('/bookings', [BookingController::class,'create'])->name('bookings.create');
    Route::delete('/bookings/{id}', [BookingController::class,'delete'])->name('bookings.delete');
    Route::post('/bookings/automatic', [BookingController::class,'automaticWeeks'])->name('bookings.automatic');
    Route::get('/bookings/excel/{id}', [BookingController::class,'generateExcel'])->name('bookings.excel');
});
