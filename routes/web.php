<?php

use App\Http\Controllers\BookCategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SubscriptionPackageController;
use App\Http\Controllers\SubscriptionPackageBookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/kategori/{category}', [HomeController::class, 'category'])->name('category.books');
Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::get('/books/{id}', [BookController::class, 'show'])
    ->name('books.show');
Route::resource('books', BookController::class)->except(['show']);


Route::get('/paket-langganan/{id}', [HomeController::class, 'packageDetail'])
    ->name('package.detail');

//kelompok route yang boleh diakses setelah login

Route::middleware(['IsLoggedIn'])->group(function () {
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    Route::get('/subscription-packages/{id}/checkout', [SubscriptionPackageController::class, 'checkoutPage'])
        ->name('subscription-packages.checkout.page');
    Route::post('/subscription-packages/{id}/checkout', [SubscriptionPackageController::class, 'checkout'])
        ->name('subscription-packages.checkout');

    Route::get('/profile', [UserController::class, 'profile'])->name('profile');

    Route::get('/carts', [CartController::class, 'index'])->name('carts');
    Route::post('/carts', [CartController::class, 'store'])->name('carts.store');
    Route::delete('/carts/{id}', [CartController::class, 'destroy'])->name('carts.destroy');


    Route::prefix('admin')->name('admin.')->middleware('IsAdmin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::get('subscription-packages/{id}/books', [SubscriptionPackageBookController::class, 'show'])->name('subscription-packages.books');
        Route::post('subscription-packages/{id}/books', [SubscriptionPackageBookController::class, 'store'])->name('subscription-packages.store');

        Route::get('book-categories/export', [BookCategoryController::class, 'export'])
            ->name('book-categories.export');
        Route::resource('book-categories', BookCategoryController::class);

        Route::get('subscription-packages/export', [SubscriptionPackageController::class, 'export'])
            ->name('subscription-packages.export');
        Route::resource('paket-langganan', SubscriptionPackageController::class);

        Route::get('books/export', [BookController::class, 'export'])
            ->name('books.export');
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
