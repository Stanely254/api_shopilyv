<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProductsController;
use App\Http\Controllers\API\ShopiStoresController;
use App\Http\Controllers\API\StoresController;

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

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::apiResource('products', ProductController::class)->middleware('auth:api');
Route::apiResource('shopi_stores', ShopiStoresController::class)->middleware('auth:api');
Route::apiResource('stores', StoresController::class)->middleware('auth:api');
#