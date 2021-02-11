<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiTodoIdController;
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

//// apiResource legt entsprechende http-Methoden gemäß der REST-Norm fest (PUT, GET, DELETE, POST)
//Route::apiResource('todos', ApiTodoController::class);



// Route group
Route::group([
    'prefix'    => 'todos',
], function() {
    // Route zur Listenansicht
    Route::get('', [ApiTodoIdController::class, 'index']);
// Route zur Einzelansicht
    Route::get('{id}', [ApiTodoIdController::class, 'show']);
    Route::post('', [ApiTodoIdController::class, 'store']);
    Route::put('{id}', [ApiTodoIdController::class, 'update']);
    Route::delete('{id}', [ApiTodoIdController::class, 'destroy']);
});

Route::fallback([ApiTodoIdController::class, 'error']);
