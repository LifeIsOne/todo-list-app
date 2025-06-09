<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Exception;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // 메인, 할 일 리스트
    public function home(Request $req)
    {
        $filter = $req->query('filter');
        $todos = Todo::when($filter === 'completed', function ($query) {
            $query->where('completed', true);
        })
            ->when($filter === 'incomplete', function ($query) {
                $query->where('completed', false);
            })
            ->get();

        return view('home', ['todos' => $todos, 'filter' => $filter]);
    }

    // 상세보기
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
    public function store(TodoRequest $req)
    {
        try {
            Todo::create([
                'text' => $req->text,
                'completed' => false,
            ]);
            return redirect('/');
        } catch (Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }

    // 수정, 할 일 수정
    public function edit($id)
    {
        $todo = Todo::find($id);

        return view('todo.edit', ['todo' => $todo]);
    }


    public function update(TodoRequest $req, $id)
    {
        try {
            $todo = Todo::find($id);
            $todo->text = $req->text;
            $todo->save();

            return redirect('/');
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }

    public function delete($id)
    {
        $todo = Todo::find($id);
        $todo->delete();

        return redirect('/');
    }

    public function complete($id)
    {
        $todo = Todo::find($id);
        $todo->completed = !$todo->completed;
        $todo->save();

        return redirect('/');
    }
}
