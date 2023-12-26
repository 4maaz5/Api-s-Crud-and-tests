<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\StudentController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/test', function () {
    return p('Works');
});
Route::post('/login',[UserController::class, 'login']);

//Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/store', [UserController::class, 'insert']);
    Route::get('/showdata', [UserController::class, 'show']);
    Route::get('/edit/{id}', [UserController::class, 'edit']);
    Route::put('/update/{id}', [UserController::class, 'update']);
    Route::GET('/delete/{id}', [UserController::class, 'destroy']);
    Route::get('/search/{id}', [UserController::class, 'search']);
    Route::post('/logout',[UserController::class, 'logout']);
});
