<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Exception;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return response()->json($todos);
    }


    public function app(Request $req)
    {
        $filter = $req->query('filter');
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
    public function detail($id) {
        $todo = Todo::find($id);
        return view('views.detail', ['views' => $todo]);
    }

    // 추가, 할 일 추가
    public function create() {
        return view('todo.edit');
    }

    // 저장 요청
    public function store(Request $req)
    {
        // 유효성 검사 `text` 필수, 50자 내, 유일
        try {
            $req->validate([
                'text' => 'required|string|min:2|max:50|unique:todos,text'], [
                'text.required' => '내용을 입력해주세요!',
                'text.min' => '2자 이상 50자 이하여야 합니다!',
                'text.max' => '2자 이상 50자 이하여야 합니다!',
                'text.unique' => '중복된 내용입니다!',
            ]);

            Todo::create([
                'text' => $req->text,
                'completed' => false,
            ]);
            return redirect('/');
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }

    // 수정, 할 일 수정
    public function edit($id) {
        $todo = Todo::find($id);

        return view('views.edit', ['views' => $todo]);
    }


    public function update(Request $req, $id)
    {
        try {
            $req->validate([
                'text' => 'required|string|min:2|max:50|unique:todos,text'], [
                'text.required' => '내용을 입력해주세요!',
                'text.min' => '2자 이상 50자 이하여야 합니다!',
                'text.max' => '2자 이상 50자 이하여야 합니다!',
                'text.unique' => '중복된 내용입니다!',
            ]);

            $todo = Todo::find($id);
            $todo->text = $req->text;
            $todo->save();

            return redirect('/');
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage())
                ->withInput();
        }
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
