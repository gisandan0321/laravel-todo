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
        $task = Task::create($request->all());

        return $task;
    }

    public function update(Request $request, Task $task) {
        $task->update($request->all());
        return response()->json('Updated');
    }

    public function destroy(Task $task) {
        $task->delete();
        return response()->json('Deleted');
    }
}
