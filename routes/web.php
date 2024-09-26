<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminController;

    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::get('/admin-register', [AdminController::class, 'register'])->name('admin.register');
    Route::post('save',[AdminController::class,'save']);

      
        Route::get('dashboard',[AdminController::class,'dashboard'])->name('dashboard');
        Route::get('logout',[AdminController::class,'logout'])->name('logout');
        Route::get('users',[AdminController::class,'users'])->name('users');
        Route::get('userData',[AdminController::class,'getUserData'])->name('userData');
        Route::get('deletUser/{id}' ,[AdminController::class,'deletUser'])->name('deletUser');

        Route::get('/hotels', [HotelController::class, 'index'])->name('hotels');
        Route::get('/hotelData', [HotelController::class, 'getHotelData'])->name('hotelData');
        Route::get('/hotels/{id}', [HotelController::class, 'show'])->name('hotels.show');

        Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
        Route::get('/rooms/{id}', [RoomController::class, 'show'])->name('rooms.show');

        Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
   


    


