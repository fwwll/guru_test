<?php

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

Route::prefix('v1')->group(function () {
    Route::prefix('tasks')->group(function () {
        Route::get('list', [\App\Http\Controllers\Api\v1\TasksController::class, 'list']);
        Route::get('{id}', [\App\Http\Controllers\Api\v1\TasksController::class, 'getById']);
        Route::post('update', [\App\Http\Controllers\Api\v1\TasksController::class, 'create']);
        Route::put('{task}', [\App\Http\Controllers\Api\v1\TasksController::class, 'done']);
        Route::delete('{task}', [\App\Http\Controllers\Api\v1\TasksController::class, 'delete']);
    });
});
