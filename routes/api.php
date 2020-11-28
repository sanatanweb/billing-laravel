<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;

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
Route::post('/login',[AuthController::class, 'login'])->name('login');
Route::middleware(['auth:sanctum'])->prefix('v1')->group(function(){
    // Route::get('items', [ItemController::class, 'index']);
    Route::apiResource('item', ItemController::class);
    Route::apiResource('unit', UnitController::class);
    Route::apiResource('customer', CustomerController::class);
    Route::apiResource('invoice', InvoiceController::class);
});
