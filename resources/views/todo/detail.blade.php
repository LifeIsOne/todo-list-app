@extends('layouts.app')

@section('title', '상세보기 페이지')

@section('text')
    {{--  제목, 수정, 삭제  --}}
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
        <h2>할 일 상세보기</h2>

        <div class="d-flex gap-2 mb-3">
            <a href="/todo/{{ $todo->id }}/edit" class="btn btn-warning">수정하기</a>

            <form method="POST" action="/todo/{{ $todo->id }}/delete">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">삭제하기</button>
            </form>
        </div>
    </div>

    {{--  내용  --}}
    <p class="flex-grow-1" style="height: 150px">{{ $todo->text }}</p>
    <div class="text-end ">
        <p class="small mb-0">생성시간 : {{ $todo->created_at }}</p>
        <p class="small ">수정시간 : {{ $todo->updated_at }}</p>
    </div>
@endsection
