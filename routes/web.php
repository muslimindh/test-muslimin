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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/db-test', function () {
    try {
        DB::connection()->getPdo();
        return 'Connected to the database: ' . DB::connection()->getDatabaseName();
    } catch (\Exception $e) {
        return 'Could not connect to the database. Please check your configuration.';
    }
});