<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Todo App')</title>
    <title>Todo App</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
@include('components.appbar') {{-- AppBar --}}
<div class="container mt-4">
    @yield('content') {{-- 페이지별 내용 --}}
</div>
{{-- 푸터 --}}
<footer class="bg-light p-5 text-center">
    <h4>Created by Miraclecoding</h4>
    <h5>☎ 010-9603-2291</h5>
    <button class="btn btn-outline-primary">고객센터</button>
    <button class="btn btn-outline-primary">오시는길</button>
</footer>

</body>
</html>
