@extends('layouts.app')

@section('title', 'The list of tasks')

@section('content')
  <nav class="mb-4">
    <a class="link" href="{{ route('tasks.create') }}">Add Task</a>
  </nav>
  @forelse ($tasks as $task)
    <div>
      <a href="{{ route('tasks.show', ['id' => $task->id]) }}"
        class="{{ $task->completed ? 'line-through text-gray-500' : '' }}">{{ $task->title }}</a>
    </div>
  @empty
    <div>There are no tasks!</div>
  @endforelse
  @if($tasks->hasPages())
    <nav class="mt-4">
      {{ $tasks->links() }}
    </nav>
  @endif

@endsection