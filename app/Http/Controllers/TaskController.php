<?php

namespace App\Http\Controllers;

use App\Models\Mongo\Task;
use App\Repositories\TaskRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TaskController extends BaseCrudController
{
    public function __construct()
    {
        parent::__construct(new Task());
        $this->repository = new TaskRepository();
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
