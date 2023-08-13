<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Auth API
Route::post('signin', 'App\Http\Controllers\AuthController@signIn');

Route::group(
    [
        'middleware' => [
            'auth:api',
        ],
    ],
    function () {
        Route::post('signout', 'App\Http\Controllers\AuthController@signOut');
        Route::apiResource('accounts', AccountController::class)->only('index','show');
        Route::post('accounts/{account}/operation', 'App\Http\Controllers\AccountOperationController@withdraw')->name('withdraw');
        Route::apiResource('transactions', TransactionController::class)->only(['index']);

    }
);
