@extends("layouts.app")

@section('title', 'Create a New Task')

@section('content')

    <form action="/task" method="POST">
        @csrf
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title">
            @error('title')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div><br/>
        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description"></textarea>
            @error('description')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div><br/>
        <div>
            <label for="long_description">Long Description:</label>
            <textarea id="long_description" name="long_description"></textarea>
        </div><br/>
        <div>
            <label for="completed">Status:</label>
            <select id="completed" name="completed">
                <option value="0">No</option>
                <option value="1">Yes</option>
        </div><br/>
        <button type="submit">Create Task</button>
    </form>
@endsection