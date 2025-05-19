<li class="list-group-item d-flex justify-content-between">
    no.{{ $todo->id }} {{ $todo->text }}
    <div>
        <a href="/todo/{{ $todo->id }}/edit" class="btn btn-sm btn-warning">수정</a>
        <form method="POST" action="/todo/{{ $todo->id }}/delete" style="display:inline">
            @csrf @method('DELETE')
            <button class="btn btn-sm btn-danger">삭제</button>
        </form>
    </div>
</li>
