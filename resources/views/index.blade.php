<a href="{{ route('admin') }}">Admin page</a>

<br>
<br>

@foreach($workers as $worker)

    <hr>

    <b>Worker</b>

    <p>
        {{ $worker->name }}
    </p>


    <b>Tasks</b>

    @if(count($worker->tasks))
        <ul>
            @foreach($worker->tasks as $task)
                <li>
                    @if($task->done)
                        Done
                    @else
                        Active
                    @endif
                    |
                    {{ $task->title }}
                </li>
            @endforeach
        </ul>
    @else
        <p>
            No tasks yet
        </p>
    @endif

@endforeach
