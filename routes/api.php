<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LineaController;
use App\Http\Controllers\KitchenController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use Illuminate\Routing\Controllers\Middleware;

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
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login', [UserController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [UserController::class, 'logout']);
Route::post('/register', [UserController::class, 'register']);

Route::post('/kitchen/store', [KitchenController::class, 'store']);
Route::post('/kitchen/id', [KitchenController::class, 'getKitchenId']);
Route::post('/kitchen/addWorker', [KitchenController::class, 'addWorker']);

Route::post('/linea/store', [LineaController::class, 'store']);
Route::post('/linea/delete', [LineaController::class, 'delete']);
Route::post('/linea/get', [LineaController::class, 'get']);
Route::post('/lineaProg/create', [LineaController::class, 'createLineaProg']);

Route::post('/suppliers/get', [SupplierController::class, 'get']);
Route::get('/products/get', [ProductController::class, 'get']);