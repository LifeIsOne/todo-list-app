<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

// 메인 페이지
Route::get  ('/', [TodoController::class, 'home']);
Route::post ('/todo/store',     [TodoController::class, 'store']);
// 상세보기 페이지
Route::get  ('/todo/{id}/detail', [TodoController::class, 'detail']);

Route::get  ('/todo/create',    [TodoController::class, 'create']);

Route::get  ('/todo/{id}/edit', [TodoController::class, 'edit']);

Route::put  ('/todo/{id}/update', [TodoController::class, 'update']);
// 삭제하기
Route::delete('/todo/{id}/delete', [TodoController::class, 'delete']);
