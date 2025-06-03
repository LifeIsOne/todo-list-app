<?php

use App\Http\Controllers\TodoApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::GET('/todos', [TodoApiController::class, 'index']);
Route::POST('/todos', [TodoApiController::class, 'store']);
Route::PATCH('/todos/{id}/toggle', [TodoApiController::class, 'toggle']);
Route::DELETE('/todos/{id}', [TodoApiController::class, 'destroy']);
