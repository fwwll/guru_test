<a href="{{ route('admin') }}">< Back</a>

<br>
<br>

<button type="button" onclick="location.href = '{{ route('workers.create') }}'">+ Add worker</button>

<br>
<br>

<h3>Total workers: {{ count($workers) }}</h3>

@foreach($workers as $worker)

    <hr>

    <b>Name</b>

    <p>
        {{ $worker->name }}
    </p>

    <b>Total tasks</b>

    <p>
        {{ count($worker->tasks) }}
    </p>

    <form action="{{ route('workers.destroy', $worker) }}" method="POST">
        @method('DELETE')

        @csrf

        <button type="button" onclick="location.href = '{{ route('workers.edit', $worker) }}'">Edit</button>

        <button type="submit">Remove</button>
    </form>

@endforeach
