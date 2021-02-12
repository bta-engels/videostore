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

//// apiResource legt entsprechende http-Methoden gemäß der REST-Norm fest (PUT, GET, DELETE, POST)
//Route::apiResource('todos', ApiTodoController::class);



// Route group apitodos
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

// Route group apiauthors
Route::group([
    'prefix'    => 'authors',
], function() {
    // Route zur Listenansicht
    Route::get('', [ApiAuthorController::class, 'index']);
// Route zur Einzelansicht
    Route::get('{id}', [ApiAuthorController::class, 'show']);
    Route::post('', [ApiAuthorController::class, 'store']);
    Route::put('{id}', [ApiAuthorController::class, 'update']);
    Route::delete('{id}', [ApiAuthorController::class, 'destroy']);
});

// Fallback routes
Route::fallback([ApiTodoIdController::class, 'error']);
Route::fallback([ApiAuthorController::class, 'error']);

