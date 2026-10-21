<?php

use App\Http\Controllers\BookCategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SubscriptionPackageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/kategori/{category}', [HomeController::class, 'category'])->name('category.books');
Route::get('/search', [HomeController::class, 'search'])->name('search');

//kelompok route yang boleh diakses setelah login

Route::middleware(['IsLoggedIn'])->group(function () {
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    Route::prefix('admin')->name('admin.')->middleware('IsAdmin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');


        Route::resource('book-categories', BookCategoryController::class);
        Route::resource('paket-langganan', SubscriptionPackageController::class);
        Route::resource('books', BookController::class);
    });
});

Route::middleware(['IsGuest'])->group(function () {
    Route::get('/register', function () {
        return view('register');
    })->name('register');

    Route::post('/register', [UserController::class, 'register'])->name('register.store');

    Route::get('/login', function () {
        return view('login');
    })->name('login');

    Route::post('/login', [UserController::class, 'login'])->name('login.store');
});
