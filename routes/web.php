<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

// 홈 화면
Route::get ('/', function () {
    return view('app');
});
// 목록 조회
Route::get('/todos', [TodoController::class, 'index']);
// 할 일 생성
Route::post('/todos', [TodoController::class, 'store']);
// 완료 여부 토글
Route::patch('/todos/{id}/toggle', [TodoController::class, 'toggle']);
