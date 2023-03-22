<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\DepositToBankController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\FundController;
use App\Models\bank_account;
use App\Transaction;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('account', AccountController::class);
Route::resource('fund', FundController::class);
Route::resource('deposit', DepositToBankController::class);
Route::resource('expense', ExpensesController::class);




