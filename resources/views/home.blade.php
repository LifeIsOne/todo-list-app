@extends('layouts.app')

@section('title', '홈')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
        <h2>할 일 목록</h2>
        <a href="/addTodo" class="btn btn-primary mb-3">할 일 추가</a>
    </div>
    <ul class="list-group">
        @foreach($todos as $todo)
            @include('components.listitem', ['todo' => $todo])
        @endforeach
    </ul>
@endsection

