<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

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

Route::prefix('transactions')->name('transactions.')->group(function () {
    Route::post('/create', [TransactionController::class, 'store']);
    Route::get('/all', [TransactionController::class, 'index']);
    Route::get('/detail/{transaction}', [TransactionController::class, 'show']);
    Route::delete('/delete/{transaction}', [TransactionController::class, 'destroy']);
    Route::put('/edit/{transaction}', [TransactionController::class, 'update']);
});

Route::get('/p', function () {
    return view('welcome');
});
