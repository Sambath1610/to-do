<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    
    public function index()
    {
        $tasks = Task::latest()->paginate(10);
        return view('index', ['tasks' => $tasks]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'long_description' => 'required|string',
        ]);


        $task = new Task();
        $task->title = $validatedData['title'];
        $task->description = $validatedData['description'];
        $task->long_description = $validatedData['long_description'] ?? '';
        $task->completed = false;
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task created successfully');
    }

    public function show($id)
    {
        $task = Task::find($id);
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        return view('show', ['task' => $task]);
    }

    public function edit($id)
    {
        $task = Task::find($id);
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        return view('edit', ['task' => $task]);
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'long_description' => 'nullable|string',
            'completed' => 'nullable|boolean',
        ]);

        $task->title = $validatedData['title'];
        $task->description = $validatedData['description'];
        $task->long_description = $validatedData['long_description'] ?? $task->long_description;
        $task->completed = $request->has('completed') ? (bool)$validatedData['completed'] : $task->completed;
        $task->save();

        return redirect()->route('tasks.show', ['id' => $task->id])->with('success', 'Task updated successfully');
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
    }

    public function toggle_completed($id){
        $task = Task::toggleComplete($id);
        return redirect()->route('tasks.show', ['id' => $task->id])->with('success', 'Task updated successfully');
    }
}
