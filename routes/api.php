<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DetailedProductController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
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

Route::post('auth/login', [AuthController::class, 'login']);
Route::get('auth/logout', [AuthController::class, 'logout']);
Route::post('auth/refresh', [AuthController::class, 'refresh']);
Route::post('auth/me', [AuthController::class, 'me']);

Route::group(['perfix'=> 'v1'],function()
{
    Route::apiResource('provider', ProviderController::class);
    Route::apiResource('category', CategoryController::class);
    Route::apiResource('product', ProductController::class);
    Route::get('consultar-ruc/{rucNumber}', [ProviderController::class, 'consultarRuc']);
    Route::apiResource('inventory', InventoryController::class);
    Route::apiResource('rol', RolController::class);
    Route::apiResource('user', UserController::class);
    Route::apiResource('detailedProduct', DetailedProductController::class);
}
);
