<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

// 메인 페이지
Route::get  ('/', [TodoController::class, 'home']);
Route::post ('/todo/store',     [TodoController::class, 'store']);

Route::get  ('/todo/create',    [TodoController::class, 'create']);

Route::get  ('/todo/{id}/edit', [TodoController::class, 'edit']);

Route::put  ('/todo/{id}/update', [TodoController::class, 'update']);
Route::delete('/todo/{id}/delete', [TodoController::class, 'delete']);
