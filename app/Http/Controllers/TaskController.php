<?php

namespace App\Http\Controllers;

use App\Models\Mongo\Task;
use App\Repositories\TaskRepository;
use App\Services\TaskService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TaskController extends BaseCrudController
{
    public function __construct()
    {
        parent::__construct(new Task());
        $this->repository = new TaskRepository();
        $this->service = new TaskService();
    }

    public function store(Request $request): JsonResponse
    {
        $attributes = $request->validate([
            'name' => 'required|string|min:3|max:100',
            'statusId' => 'required|string|exists:statuses,_id',
        ]);

        return $this->jsonResponse($this->service->createTask($request->statusId, $attributes));
    }

    public function getTasksByStatus(Request $request): JsonResponse
    {
        try {
            $statusId = $request->get('statusId', false);

            if (!$statusId) {
                throw new \Exception('statusId is required', 400);
            }

            return $this->jsonResponse($this->repository->getTasksByStatus($statusId));
        } catch (\Exception $exception) {
            return $this->jsonError($exception);
        }

    }

    public function moveTask(Request $request, Task $task): JsonResponse
    {
        $request->validate([
            'order' => 'required|integer',
            'statusId' => 'required|integer'
        ]);

        $statusId = (int)$request->get('statusId');
        $order = $request->get('order');

        try {
            if ($statusId !== $task->status->id) {
                $this->repository->changeTaskStatus($task, $statusId);
            }

            return $this->jsonResponse(true);
        } catch (\Exception $exception) {
            return $this->jsonError($exception);
        }
    }
}
