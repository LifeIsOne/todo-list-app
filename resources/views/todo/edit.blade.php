@extends('layouts.app')

@section('title', isset($todo) ? '수정 페이지' : '추가 페이지')

@section('text')
    <form action="{{ isset($todo) ? '/todo/' . $todo->id . '/update' : '/todo/store' }}" method="POST">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
            <h2>{{ isset($todo) ? '할 일 수정' : '할 일 추가' }}</h2>
            <button class="btn btn-success mb-3">
                {{ isset($todo) ? '수정하기' : '추가하기' }}
            </button>
        </div>
        @csrf
        @if(isset($todo))
            @method('PUT')
        @endif
        <div class="mb-3">
            <input type="text" class="form-control @error('text') is-invalid @enderror"
                   id="text" name="text" value="{{ old('text', $todo->text ?? '') }}" required>
            @error('text')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>
    </form>

@endsection
