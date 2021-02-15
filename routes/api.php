<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiTodoIdController;
use App\Http\Controllers\Api\ApiAuthorController;
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

Route::group([
    'prefix' => 'todos',
], function() {
    Route::get('', [ApiTodoIdController::class, 'index']);
    Route::post('', [ApiTodoIdController::class, 'store']);
    Route::get('{id}', [ApiTodoIdController::class, 'show']);
    Route::put('{id}', [ApiTodoIdController::class, 'update']);
    Route::delete('{id}', [ApiTodoIdController::class, 'destroy']);
});
Route::fallback([ApiTodoIdController::class,'error']);

Route::group([
    'prefix' => 'authors',
], function() {
    Route::get('', [ApiAuthorController::class, 'index']);
    Route::post('', [ApiAuthorController::class, 'store']);
    Route::get('{id}', [ApiAuthorController::class, 'show']);
    Route::put('{id}', [ApiAuthorController::class, 'update']);
    Route::delete('{id}', [ApiAuthorController::class, 'destroy']);
});
Route::fallback([ApiAuthorController::class,'error']);
