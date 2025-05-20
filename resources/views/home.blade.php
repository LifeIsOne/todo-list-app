@extends('layouts.app')

@section('title', '홈')

@section('text')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
        <h2>할 일 목록</h2>
        <a href="/todo/create" class="btn btn-primary mb-3">할 일 추가</a>
    </div>

    {{-- 필터 버튼 --}}
    <div class="btn-group my-3">
        <a href="{{ url('/'.'?filter=all') }}"
           class="btn btn-outline-primary {{ ($filter ?? 'all') == 'all' ? 'active' : '' }}">
            전체
        </a>
        <a href="{{ url('/'.'?filter=completed') }}"
           class="btn btn-outline-success {{ $filter == 'completed' ? 'active' : '' }}">
            완료
        </a>
        <a href="{{ url('/'.'?filter=incomplete') }}"
           class="btn btn-outline-secondary {{ $filter == 'incomplete' ? 'active' : '' }}">
            미완료
        </a>
    </div>

    <table class="table" style="table-layout: fixed">
        <tr>
            <th style="width:15%">완료 여부</th>
            <th style="width:5%" >ID</th>
            <th style="width:55%">할 일</th>
            <th style="width:25%">생성시간</th>
        </tr>

        @foreach($todos as $todo)
            @include('components.listitem', ['todo' => $todo])
        @endforeach
    </table>

@endsection
