@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <p>
        {{ $task->description }}
    </p>
    <p>
        {{ $task->long_description }}
    </p>
    <p>
        <a href="/task/{{ $task->id }}/edit">Edit</a>
        <a href="/tasks">Back</a>
    </p>
@endsection