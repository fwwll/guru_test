<a href="{{ route('workers.index') }}">< Back</a>

<br>
<br>

<form action="{{ isset($worker) ? route('workers.update', $worker) : route('workers.store') }}" method="POST">

    @if(isset($worker))
        @method('PUT')
    @endif

    @csrf

    <input type="text" name="name" placeholder="Worker name" value="{{ isset($worker) ? $worker->name : '' }}">

    @error('name')
        <div>{{ $message }}</div>
    @enderror

    <br>
    <br>

    <button type="submit">Save</button>
</form>
