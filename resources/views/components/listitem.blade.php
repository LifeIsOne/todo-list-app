<tr class="{{ $todo->completed ? 'table-success' : '' }}">
    <td>
        <form action="{{'/views/' . $todo->id . '/complete'}}" method="POST">
            @csrf
            @method('PATCH')
            <button class="btn btn-sm">
                {{ $todo->completed ? '✅' : '☑️' }}
            </button>
        </form>
    </td>

    <td>{{ $todo->id }}</td>
    <td>
        <a href="/todo/{{ $todo->id }}/detail" class="text-decoration-none text-dark d-block">
            {{ $todo->text }}
        </a>
    </td>
    {{--  대 소문자 구분  --}}
    <td>{{ $todo->created_at->format('y-m-d H:i')}}</td>
</tr>
