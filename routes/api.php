<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\AuthController;
use App\Http\Controllers\V1\FactoryOrderController;
use App\Http\Controllers\V1\FactoryOrderTemplateController;
use App\Http\Controllers\V1\ItemController;
use App\Http\Controllers\V1\OrderController;
use App\Http\Controllers\V1\RawMaterialController;
use App\Http\Controllers\V1\StoreController;
use App\Http\Controllers\V1\StoreItemController;
use App\Http\Controllers\V1\StoreRawMaterialController;
use App\Models\FactoryOrderTemplate;

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

Route::prefix('v1')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});

Route::group(['prefix' => 'v1', 'middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::resource('item', ItemController::class);
    Route::resource('raw-material', RawMaterialController::class);
    Route::resource('store', StoreController::class);
    Route::resource('order', OrderController::class);
    Route::resource('factory-order', FactoryOrderController::class);

    Route::post('/store-item', [StoreItemController::class, 'store']);
    Route::get('/store-item/{id}', [StoreItemController::class, 'show']);
    Route::post('/store-raw-material', [StoreRawMaterialController::class, 'store']);
    Route::get('/store-raw-material/{id}', [StoreRawMaterialController::class, 'show']);

    Route::post('/factory-order-template', [FactoryOrderTemplateController::class, 'store']);
    Route::get('/factory-order-template', [FactoryOrderTemplateController::class, 'show']);
});
