<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/course', [UserController::class, 'index'])->name('course.index');
    Route::get('/register-course', [UserController::class, 'registerForm'])->name('course.register');
    Route::post('/register-course', [UserController::class, 'store'])->name('course.store');

    Route::get('/invoice', [UserController::class, 'invoice'])->name('course.invoice');
    Route::post('/checkout/{id?}', [UserController::class, 'checkout'])->name('invoice.checkout');
    Route::get('/payment/success', [UserController::class, 'success'])->name('payment.success');
});

require __DIR__.'/auth.php';
