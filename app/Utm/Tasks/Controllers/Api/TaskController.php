<?php

namespace App\Utm\Tasks\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Utm\Tasks\Models\Task;
use App\Utm\Tasks\Requests\TaskRequest;
use App\Utm\Tasks\Resources\TaskResource;
use App\Utm\Tasks\Services\TaskService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class TaskController
 * @package App\Utm\Tasks\Controllers\Api
 */
class TaskController extends Controller
{
    /**
     * @var TaskService
     */
    private $service;

    /**
     * @param TaskService $service
     */
    public function __construct(TaskService $service)
    {
        $this->service = $service;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $list = $this->service->findAll();
        return TaskResource::collection($list);
    }

    /**
     * @param TaskRequest $request
     * @return JsonResponse
     */
    public function store(TaskRequest $request): JsonResponse
    {
        $task = $this->service->store($request->validated());
        return response()->json($task, Response::HTTP_CREATED);
    }

    /**
     * @param Task $task
     * @return JsonResponse
     */
    public function show(Task $task): JsonResponse
    {
        return response()->json($task, Response::HTTP_OK);
    }

    /**
     * @param TaskRequest $request
     * @param Task $task
     * @return JsonResponse
     */
    public function update(TaskRequest $request, Task $task): JsonResponse
    {
        $task = $this->service->update($task, $request->validated());
        return response()->json($task, Response::HTTP_OK);
    }

    /**
     * @param Task $task
     * @return JsonResponse
     */
    public function enable(Task $task): JsonResponse
    {
        $task = $this->service->enable($task);
        return response()->json($task, Response::HTTP_OK);
    }

    /**
     * @param Task $task
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function disable(Task $task): JsonResponse
    {
        $this->authorize('disable', $task);
        $task = $this->service->disable($task);
        return response()->json($task, Response::HTTP_OK);
    }

    /**
     * @param Task $task
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function destroy(Task $task): JsonResponse
    {
        $this->authorize('destroy', $task);
        $this->service->destroy($task);
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
