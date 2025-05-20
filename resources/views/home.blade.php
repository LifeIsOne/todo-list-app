@extends('layouts.app')

@section('title', '홈')

@section('text')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
        <h2>할 일 목록</h2>
        <a href="/todo/create" class="btn btn-primary mb-3">할 일 추가</a>
    </div>

    <table class="table">
        <tr>
            <th>완료 여부</th>
            <th>ID</th>
            <th>할 일</th>
            <th>생성시간</th>
        </tr>

        @foreach($todos as $todo)
            @include('components.listitem', ['todo' => $todo])
        @endforeach
    </table>

@endsection
