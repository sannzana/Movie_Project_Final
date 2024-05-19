<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;




use App\Models\Task;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
        ]);

        Task::create([
            'description' => $request->description,
            'is_completed' => false,
        ]);

        return redirect()->route('admin.dashboard');
    }

    public function update(Request $request, Task $task)
    {
        $task->update([
            'is_completed' => $request->has('is_completed'),
        ]);

        return redirect()->route('admin.dashboard');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('admin.dashboard');
    }
}