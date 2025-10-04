@extends('layouts.app')

@section('title', 'All Tasks')

@section('content')

    <a href="{{ route('tasks.create') }}">➕ Create New Task</a>
    <ul class="task-list">
    @forelse ($tasks as $task)
        <li>
            <strong>{{ $task->title }}</strong> - {{ $task->completed == 1 ? '✅ Completed' : '🕒 Pending' }}
            <a href="{{ route('tasks.show', $task->id) }}">View</a>
            <a href="{{ route('tasks.edit', $task->id) }} ">Edit</a>
            <form action="{{ route('tasks.delete', $task->id) }}" method="post">
                @method('DELETE')
                @csrf
                <input type="submit" value="Delete" onclick="return confirm('Are you sure?');">
            </form>
        </li>
    
    @empty
        <li>No tasks found.</li>
    @endforelse
    </ul>
@endsection
