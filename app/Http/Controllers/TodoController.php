<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // 홈, 할 일 목록
//    public function home() {
//        $todos = Todo::all();
//
//        return view('home', ['todos' => $todos]);
//    }
    public function home(Request $request) {
        $filter = $request->query('filter');
        $todos = Todo::when($filter === 'completed', function ($query) {$query->where('completed', true);})
                     ->when($filter === 'incomplete', function ($query) {$query->where('completed', false);})
                     ->get();

        return view('home', ['todos' => $todos, 'filter' => $filter]);
    }

    // 상세보기 페이지
    public function detail($id) {
        $todo = Todo::find($id);
        return view('todo.detail', ['todo' => $todo]);
    }

    // 추가, 할 일 추가
    public function create() {
        return view('todo.edit');
    }

    // 저장 요청
    public function store(Request $request) {
        // 유효성 검사 `text` 필수, 50자 내, 유일
        $request->validate([
            'text' => 'required|string|max:50|unique:todos,text',
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

    public function complete($id){
        $todo = Todo::find($id);
        $todo->completed = !$todo->completed;
        $todo->save();

        return redirect('/');
    }
}
