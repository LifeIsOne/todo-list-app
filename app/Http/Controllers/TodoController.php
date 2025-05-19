<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // 홈, 할 일 목록
    public function home() {
        $todos = Todo::all();

        return view('home', ['todos' => $todos]);
    }
    public function add() {
        return view('todo.add');
    }
    // 추가, 할 일 추가
    public function create() {
        return view('todo.edit');
    }

    // 저장 요청
    public function store(Request $request) {
        // 유효성 검사 `text` 필수
        $request->validate([
            'text' => 'required',
        ]);
        // DB에 저장
        Todo::create([
            'text' => $request->text,
        ]);
        // 리다이렉션
        return redirect('/');
    }

    // 수정, 할 일 수정
    public function edit($id) {
        $todo = Todo::find($id);

        return view('todo.edit', ['todo' => $todo]);
    }


    public function update(Request $request, $id) {
        $request->validate([
            'text' => 'required',
        ]);

        $todo = Todo::find($id);
        $todo->text = $request->text;
        $todo->save();

        return redirect('/');
    }

    public function delete($id) {
        $todo = Todo::find($id);
        $todo->delete();

        return redirect('/');
    }
}
