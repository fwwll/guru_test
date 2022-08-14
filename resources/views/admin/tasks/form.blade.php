<a href="{{ route('tasks.index') }}">< Back</a>

<br>
<br>

<form action="{{ isset($task) ? route('tasks.update', $task) : route('tasks.store') }}" method="POST">

    @if(isset($task))
        @method('PUT')
    @endif

    @csrf

    <textarea name="title" placeholder="Task title" rows="5" cols="100">{{ isset($task) ? $task->title : '' }}</textarea>

    @error('title')
        <div>{{ $message }}</div>
    @enderror

    <br>
    <br>

    <select name="worker_id">
        <option value="0">Select worker ...</option>
        @foreach($workers as $worker)
            <option value="{{ $worker->id }}" @if(isset($task) && $task->worker_id == $worker->id) selected @endif>
                {{ $worker->name }}
            </option>
        @endforeach
    </select>

        @error('worker_id')
        <div>{{ $message }}</div>
        @enderror

        @if(isset($task))
            <br>
            <br>
            <input type="checkbox" id="done" name="done" value="1" @if($task->done) checked @endif>
            <label for="done">
                Done
            </label>
            @error('done')
            <div>{{ $message }}</div>
            @enderror
        @endif



    <br>
    <br>

    <button type="submit">Save</button>
</form>
