<!DOCTYPE html>
<html lang="ko">

<head>
    <title>Todo App</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    {{--  네비게이션바  --}}
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Miraclecoding</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/board/saveForm">글쓰기</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/user/updateForm">회원정보보기</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">로그아웃</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/joinForm">회원가입</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/loginForm">로그인</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{--  카드  --}}
{{--    <div class="card my-3 container">--}}
{{--        <div class="card-body">--}}
{{--            <h4 class="card-title mb-3">title</h4>--}}
{{--        </div>--}}
{{--    </div>--}}
    {{--  할 일 목록  --}}
    <ul class="list-group container my-3">
        @foreach($todos as $todo)
        <li class="list-group-item d-flex justify-content-between align-items-center">
{{--            <a href="/board/detail/{{$todo->id}}">{{$todo->title}}</a>--}}
            {{ $todo -> content }}
{{--            <span class="badge bg-primary rounded-pill">{{$todo->completed ? }}</span>--}}
        </li>
        @endforeach
    </ul>


    {{--  페이징  --}}
    <ul class="pagination d-flex justify-content-center">
        <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>

    {{--  푸터  --}}
    <div class="bg-light p-5 text-center">
        <h4>Created by Miraclecoding</h4>
        <h5>☎ 010-2222-7777</h5>
        <button class="btn btn-outline-primary">고객센터</button>
        <button class="btn btn-outline-primary">오시는길</button>
    </div>
</body>

</html>
