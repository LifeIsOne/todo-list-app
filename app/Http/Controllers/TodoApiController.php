<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoApiController extends Controller
{
    // 할 일 목록 보기
    public function index()
    {
        $todos = Todo::all();
        return response()->json($todos);
    }

    // 할 일 생성
    public function store(Request $request)
    {
        // 유효성 검사
        $request->validate([
            'text' => 'required|string|max:50|unique:todos,text',
        ]);

        $todo = Todo::create([
            'text' => $request->text,
            'completed' => false
        ]);

        return response()->json($todo);
    }

    public function update(Request $request, $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->update([
            'completed' => $request->input('completed'),
        ]);
        return response()->json($todo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();
        return response()->json(null);
    }

    public function toggle($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->completed = !$todo->completed;
        $todo->save();
        return response()->json($todo);
    }
}
