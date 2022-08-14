<a href="{{ route('admin') }}">< Back</a>

<br>
<br>

<button type="button" onclick="location.href = '{{ route('tasks.create') }}'">+ Add task</button>

<br>
<br>

<h3>Total tasks: {{ count($tasks) }}</h3>

@foreach($tasks as $task)

    <hr>

    <b>Title</b>
    <p>
        {{ $task->title }}
    </p>

    <b>Worker</b>
    <p>
        {{ $task->worker->name }}
    </p>

    <b>Status</b>
    <p>
        @if($task->done)
            Done
        @else
            Active
        @endif
    </p>

    <form action="{{ route('tasks.destroy', $task) }}" method="POST">
        @method('DELETE')

        @csrf

        <button type="button" onclick="location.href = '{{ route('tasks.edit', $task) }}'">Edit</button>

        <button type="submit">Remove</button>
    </form>

@endforeach
