<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiTodoIdController;
use App\Http\Controllers\Api\ApiAuthorController;
use App\Http\Controllers\Api\ApiLoginController;

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
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::post('login', [ApiLoginController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'auth:sanctum',
    'prefix' => 'todos',
], function() {
    Route::post('', [ApiTodoIdController::class, 'store']);
    Route::put('{id}', [ApiTodoIdController::class, 'update']);
    Route::delete('{id}', [ApiTodoIdController::class, 'destroy']);
});
Route::get('todos', [ApiTodoIdController::class, 'index']);
Route::get('todos/{id}', [ApiTodoIdController::class, 'show']);

Route::group([
    'middleware'=> 'auth:sanctum',
    'prefix' => 'authors',
], function() {
    Route::post('', [ApiAuthorController::class, 'store']);
    Route::put('{id}', [ApiAuthorController::class, 'update']);
    Route::delete('{id}', [ApiAuthorController::class, 'destroy']);
});
Route::get('authors', [ApiAuthorController::class, 'index']);
Route::get('authors/{id}', [ApiAuthorController::class, 'show']);

Route::fallback(function () {
    return response()->json(['error' => 'route not found']);
});
