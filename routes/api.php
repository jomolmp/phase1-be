<?php

use Illuminate\Http\Request;
use App\Http\Controllers\taskController;
use App\Http\Controllers\AuthController;
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
//Route::get('/tasks', [taskController::class, 'index']);
//Route::post('/tasks',[taskController::class, 'store']);

//public routes

Route::post('/register', [AuthController::class, 'register']);
Route::get('/tasks', [taskController::class, 'index']);
Route::get('/tasks/{id}', [taskController::class, 'show']);


//protected routes
Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::post('/tasks',[taskController::class, 'store']);
    Route::put('/tasks/{id}',[taskController::class, 'update']);
    Route::delete('/tasks/{id}',[taskController::class, 'destroy']);
   
    
});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});