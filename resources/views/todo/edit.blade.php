@extends('layouts.app')

@section('title', isset($todo) ? '수정 페이지' : '추가 페이지')

@section('text')
    <form action="{{ isset($todo) ? '/views/' . $todo->id . '/update' : '/views/store' }}" method="POST">
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
        <div class="mb-3 d-flex justify-content-center">
            <input type="text" class="form-control" id="text" name="text"
                   value="{{ $todo->text ?? '' }}" required>
        </div>
        {{-- 에러 메세지 출력 --}}
        @error('text')
        <div class="invalid-feedback d-block">
            중복된 내용인지 확인해 주세요!
        </div>
        @enderror
    </form>

@endsection
