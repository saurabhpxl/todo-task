<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Return tasks list
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $tasks = Task::all();
        return response()->json(['status' => 'success', 'tasks' => $tasks]);
    }

    /**
     * Save new task
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'task' => "required"
        ]);

        $task = new Task;
        $task->name = $request->task;
        $task->save();

        return response()->json(['status' => 'success']);
    }
}
