<tr class="{{ $todo->completed ? 'table-success' : '' }}">
    <td>
        <form action="{{'/todo/' . $todo->id . '/complete'}}" method="POST">
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
    <td>{{ $todo->created_at->format('Y-m-d H:i')}}</td>
</tr>
