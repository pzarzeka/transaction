<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('ping', [ApiController::class, 'ping'])->name('ping');
Route::post('amount', [ApiController::class, 'createTransaction'])->name('createTransaction');
Route::get('transaction/{transaction_id}', [ApiController::class, 'getTransaction'])->name('getTransaction');
Route::get('balance/{account_id}', [ApiController::class, 'getAccountBalance'])->name('getAccountBalance');
Route::get('max_transaction_volume', [ApiController::class, 'getMaxTransactionVolume'])
    ->name('getMaxTransactionVolume');