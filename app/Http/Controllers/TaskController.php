<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return Task::with('user')->get();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'task_name' => 'required',
            'description' => 'required',
            'schedule_date' => 'required|date',
            'priority' => 'required',
            'assigned_to' => 'required|exists:users,id'
        ]);

        return Task::create($validatedData);
    }

    public function show($id)
    {
        return Task::with('user')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $validatedData = $request->validate([
            'task_name' => 'required',
            'description' => 'required',
            'schedule_date' => 'required|date',
            'priority' => 'required',
            'assigned_to' => 'required|exists:users,id'
        ]);

        $task->update($validatedData);

        return $task;
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return response(null, 204);
    }
}
