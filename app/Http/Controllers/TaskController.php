<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index() {
        return Task::paginate();
    }

    public function show(Task $task) {
        return $task;
    }

    public function store(Request $request) {
        $task = Task::create($request->all(), $this->validateTask());

        return $task;
    }

    public function update(Request $request, Task $task) {
        $task->update($request->all(), $this->validateTask());
        return response()->json('Updated.');
    }

    public function destroy(Task $task) {
        $task->delete();
        return response()->json('Deleted.');
    }

    public function validateTask() {
        return request()->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
    }
}
