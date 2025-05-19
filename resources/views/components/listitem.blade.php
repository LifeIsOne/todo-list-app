<li class="{{ $todo->completed ? 'text-success line-through' : '' }} list-group-item">
    <a href="/todo/{{ $todo->id }}/detail" class="text-decoration-none text-dark d-block">
        no.{{ $todo->id }} {{ $todo->text }}
    </a>
</li>
