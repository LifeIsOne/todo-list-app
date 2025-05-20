<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <title>Todo App</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="d-flex flex-column min-vh-100">
@include('components.appbar')
<div class="container mt-4 flex-grow-1" >
    @yield('text') {{-- 할 일 --}}
</div>
{{-- 푸터 --}}
<footer class="bg-light p-5 text-center">
    <h4>Created by Miraclecoding</h4>
    <h5>☎ 010-9603-2291</h5>
    <a href="https://elated-value-48d.notion.site/Laravel-PHP-Framework-1f5d91c8ac0e805b93e9ca5af38f15bd?pvs=4
" class="btn btn-outline-primary">기술 블로그</a>

</footer>

</body>
</html>
