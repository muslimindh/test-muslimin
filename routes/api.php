<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('transactions')->name('transactions.')->group(function () {
    Route::post('/create', [TransactionController::class, 'store']);
    Route::get('/all', [TransactionController::class, 'index']);
    Route::get('/detail/{transaction}', [TransactionController::class, 'show']);
    Route::delete('/delete/{transaction}', [TransactionController::class, 'destroy']);
    Route::put('/edit/{transaction}', [TransactionController::class, 'update']);
});

Route::get('/', function () {
    return view('welcome');
});