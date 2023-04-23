<?php

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

Route::get('/', function () {
    return view('welcome');
});




// Sign up route
Route::get('/signup', 'App\Http\Controllers\UserController@showSignupForm');
Route::post('/signup', 'App\Http\Controllers\UserController@signup');

// Sign in route
Route::get('/signin', 'App\Http\Controllers\UserController@showSigninForm');
Route::post('/signin', [App\Http\Controllers\UserController::class, 'signin'])->name('signin');

// Dashboard


Route::get('/signout', [App\Http\Controllers\DashboardController::class, 'signout'])->name('signout');

Route::middleware(['auth', \App\Http\Middleware\AuthenticateDashboard::class])->group(function () {
   Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/deposit', [App\Http\Controllers\DepositController::class, 'create'])->name('deposit.create');
    Route::post('/deposit', [App\Http\Controllers\DepositController::class, 'store'])->name('deposit.store');
    Route::get('/deposit/{id}', [App\Http\Controllers\DepositController::class, 'show'])->name('deposit.show');
    Route::get('/deposit/{id}/edit', [App\Http\Controllers\DepositController::class, 'edit'])->name('deposit.edit');
    Route::put('/deposit/{id}', [App\Http\Controllers\DepositController::class, 'update'])->name('deposit.update');
    Route::delete('/deposit/{id}', [App\Http\Controllers\DepositController::class, 'destroy'])->name('deposit.destroy');
    Route::get('/dashboard', [App\Http\Controllers\DepositController::class, 'index'])->name('dashboard');
    Route::get('/users/deposits/total', 'App\Http\Controllers\DepositController@index')->name('users.deposits.total');


});



