<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

// 홈 화면
Route::get  ('/', [TodoController::class, 'home']);
// 상세보기 화면
Route::get  ('/todo/{id}/detail', [TodoController::class, 'detail']);
// 추가화면
Route::get  ('/todo/create',    [TodoController::class, 'create']);
// 수정화면
Route::get  ('/todo/{id}/edit', [TodoController::class, 'edit']);
// 생성
Route::post ('/todo/store',     [TodoController::class, 'store']);
// 수정
Route::put  ('/todo/{id}/update', [TodoController::class, 'update']);
// 삭제
Route::delete('/todo/{id}/delete', [TodoController::class, 'delete']);
// 완료
ROute::patch('/todo/{id}/complete', [TodoController::class, 'complete']);
