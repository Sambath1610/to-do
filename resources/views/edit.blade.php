@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <form action="/task/{{ $task->id }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title', $task->title) }}">
            @error('title')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div><br/>
        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description">{{ old('description', $task->description) }}</textarea>
            @error('description')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div><br/>
        <div>
            <label for="long_description">Long Description:</label>
            <textarea id="long_description" name="long_description">{{ old('long_description', $task->long_description) }}</textarea>
            @error('long_description')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div><br/>
        <div>
            <label for="completed">Status:</label>
            <select id="completed" name="completed">
                <option value="0" {{ old('completed', $task->completed) == 0 ? 'selected' : '' }}>No</option>
                <option value="1" {{ old('completed', $task->completed) == 1 ? 'selected' : '' }}>Yes</option>
            </select>
        </div><br/>
        <button type="submit">Update Task</button>
    </form>
@endsection