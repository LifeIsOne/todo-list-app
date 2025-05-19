@extends('layouts.app')

@section('title', '할 일 추가 페이지')

@section('text')
    <form action="/todo/store" method="POST">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
            <h2>할 일 추가 페이지</h2>
            <button type="submit" class="btn btn-success">
                추가하기
            </button>
        </div>
        @csrf
        <div class="mb-3">
            <input type="text" class="form-control" id="text" name="text" required>
        </div>
    </form>
@endsection
