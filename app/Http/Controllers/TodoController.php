<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return response()->json($todos);
    }


    public function app(Request $request)
    {
        $filter = $request->query('filter');
        $todos = Todo::when($filter === 'completed', function ($query) {
            $query->where('completed', true);
        })
            ->when($filter === 'incomplete', function ($query) {
                $query->where('completed', false);
            })
            ->get();

        return response()->json([
            'todos' => $todos,
            'filter' => $filter,
        ]);
    }

    // 상세보기 페이지
    public function detail($id)
    {
        $todo = Todo::find($id);
        return view('todo.detail', ['todo' => $todo]);
    }

    // 추가, 할 일 추가
    public function create()
    {
        return view('todo.edit');
    }

    // 저장 요청
    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required|string|max:50|unique:todos,text',
        ]);

        $todo = Todo::create([
            'text' => $request->text,
            'completed' => false
        ]);

        return response()->json($todo);
    }

    // 수정, 할 일 수정
    public function edit($id)
    {
        $todo = Todo::find($id);

        return view('todo.edit', ['todo' => $todo]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'text' => 'required',
        ]);

        $todo = Todo::find($id);
        $todo->text = $request->text;
        $todo->save();

        return redirect('/');
    }

    public function delete($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();

        return response()->json(null);
    }

    public function complete($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->completed = !$todo->completed;
        $todo->save();

        return response()->json($todo);
    }
}
