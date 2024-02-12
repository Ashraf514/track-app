<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
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
Route::group(['middleware'=>'guest:api'], function(){
    Route::post('login', [LoginController::class, 'store']);
    Route::get('track-order-detail/{id}', [OrderController::class, 'trackOrderDetail']);
});

Route::middleware('auth:sanctum')->get('/home', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource("product",ProductController::class);
    Route::apiResource("orders",OrderController::class);
    Route::apiResource("address",AddressController::class);
});
