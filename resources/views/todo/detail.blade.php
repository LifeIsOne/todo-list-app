@extends('layouts.app')

@section('title', '상세보기 페이지')

@section('text')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
        <h2>할 일 상세보기</h2>

        <div class="d-flex gap-2">
            <a href="/todo/{{ $todo->id }}/edit" class="btn btn-warning">수정하기</a>

            <form method="POST" action="/todo/{{ $todo->id }}/delete">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">삭제하기</button>
            </form>
        </div>
    </div>
    <p>{{ $todo->text }}</p>
@endsection
