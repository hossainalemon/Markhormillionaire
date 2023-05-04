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
Route::get('/product', function () {
    return view('product');
});
Route::get('/about', function () {
    return view('about');
});

// Packges\

Route::get('/sub', 'App\Http\Controllers\PackageController@subrip');

// Sign up route
Route::get('/signup', 'App\Http\Controllers\UserController@showSignupForm');
Route::post('/signup', 'App\Http\Controllers\UserController@signup');
Route::get('/register/{referral_code}', 'App\Http\Controllers\UserController@register');

Route::resource('packages', 'App\Http\Controllers\PackageController');
Route::post('/feature/{package_id}', [App\Http\Controllers\FeatureController::class, 'store'])->name('feature');



// Sign in route
Route::get('/signin', 'App\Http\Controllers\UserController@showSigninForm');
Route::post('/signin', [App\Http\Controllers\UserController::class, 'signin'])->name('signin');

// Dashboard


Route::get('/signout', [App\Http\Controllers\DashboardController::class, 'signout'])->name('signout');

Route::middleware(['auth', \App\Http\Middleware\AuthenticateDashboard::class])->group(function () {
   Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    
    //withdraw

    Route::get('/withdrawals/create', [App\Http\Controllers\WithdrawalController::class, 'showWithdrawalForm'])->name('withdrawals.create');
    Route::post('/withdrawals', [App\Http\Controllers\WithdrawalController::class, 'store'])->name('withdraws.store');
    // deposit
    Route::get('/deposit', [App\Http\Controllers\DepositController::class, 'create'])->name('deposit.create');
    Route::post('/deposit', [App\Http\Controllers\DashboardController::class, 'dipoststore'])->name('deposit.store');
    Route::get('/deposit/{id}', [App\Http\Controllers\DepositController::class, 'show'])->name('deposit.show');
    Route::get('/deposit/{id}/edit', [App\Http\Controllers\DepositController::class, 'edit'])->name('deposit.edit');
    Route::get('/deposit/{id}', [App\Http\Controllers\DashboardController::class, 'dipositupdate'])->name('deposit.update');

    Route::get('/deposit/reject/{id}', [App\Http\Controllers\DashboardController::class, 'depositreject'])->name('deposit.reject');
    Route::get('/total/deposits', [App\Http\Controllers\DepositController::class, 'getTotalDeposits'])->name('total_deposits');


    Route::get('/withdrawal/{id}', [App\Http\Controllers\DashboardController::class, 'withdrawupdate'])->name('withdrawal.update');
   Route::get('/withdrawal/reject/{id}/', [App\Http\Controllers\DashboardController::class, 'withdrawreject'])->name('withdrawal.reject');
});
    
 



