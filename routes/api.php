<?php

use App\Http\Controllers\itemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::post('/task', [itemController::class, 'task']);
Route::get('/items', [itemController::class, 'index']);
Route::prefix('/item')->group(function () {
    Route::post('/store', [itemController::class, 'store']);
    Route::put('/{id}', [itemController::class, 'update']);
    Route::delete('/{id}', [itemController::class, 'destroy']);
});
