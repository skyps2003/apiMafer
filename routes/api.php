<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerTypeController;
use App\Http\Controllers\DetailedProductController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRoleController;
use App\Models\CustomerType;
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
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function($router){
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::middleware('auth:api')->group(function()
{
    Route::apiResource('category', CategoryController::class);
    Route::post('category/amount', [CategoryController::class, 'amount']);
    Route::apiResource('provider', ProviderController::class);
    Route::apiResource('product', ProductController::class);
    Route::apiResource('detailedProduct', DetailedProductController::class);
    Route::apiResource('company', CompanyController::class);
});


Route::group(['prefix'=> 'v1'],function()
{
   
    Route::apiResource('inventory', InventoryController::class);
    Route::get('consultar-ruc/{rucNumber}', [ProviderController::class, 'consultarRuc']);
    Route::apiResource('rol', RolController::class);
    Route::apiResource('user', UserController::class);
    Route::apiResource('userRole', UserRoleController::class);
    Route::put('userRole/role/{rol}', [UserRoleController::class, 'role']);
    Route::apiResource('customerType', CustomerTypeController::class);
    Route::apiResource('customer', CustomerController::class);
}
);
