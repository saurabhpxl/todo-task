<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Return tasks list
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() : JsonResponse
    {
        $tasks = Task::latest()->get(['name']);
        $tasks = $tasks->pluck('name');
        return response()->json(['status' => 'success', 'tasks' => $tasks]);
    }

    /**
     * Save new task
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request) : JsonResponse
    {
        $request->validate([
            'task' => "required"
        ]);

        $task = new Task;
        $task->name = $request->task;
        $task->save();

        if($task->save()) {
            return response()->json(['status' => 'success']);
        }

        return response()->json(['status' => 'error'], 500);

    }
}
