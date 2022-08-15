<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;

class TasksController extends Controller
{
    /**
     * Get list of tasks.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function list()
    {
        return response()->json(TaskResource::collection(Task::all()), 200);
    }

    /**
     * Get task by id.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getById(int $id)
    {
        $task = Task::find($id);

        if (!$task) return response()->json(['error' => true, 'message' => 'Not found'], 404);

        return response()->json(new TaskResource($task), 200);
    }

    /**
     * Create new task.
     *
     * @param TaskRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(TaskRequest $request)
    {
        $task = Task::create($request->only(['title', 'worker_id']));

        return response()->json($task, 201);
    }

    /**
     * Set task status as done.
     *
     * @param Task $task
     * @return \Illuminate\Http\JsonResponse
     */
    public function done(Task $task)
    {
        if (!$task->done) $task->update(['done' => 1]);

        return response()->json($task, 200);
    }

    /**
     * Delete task.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Task $task)
    {
        $task->delete();

        return response()->json('', 204);
    }
}
