<tr class="{{ $todo->completed ? 'text-success text-decoration-line-through' : '' }}">
    <td>{{ $todo->completed ? '✅' : '☑️🟩' }}</td>

    <td>{{ $todo->id }}</td>
    <td>
        <a href="/todo/{{ $todo->id }}/detail" class="text-decoration-none text-dark d-block">
            {{ $todo->text }}
        </a>
    </td>
    <td>{{ $todo->created_at->format('Y-m-d H:i')}}</td>
</tr>
