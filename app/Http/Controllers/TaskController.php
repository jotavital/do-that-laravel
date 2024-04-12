<?php

namespace App\Http\Controllers;

use App\Models\Task;
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
            return $this->jsonResponse($exception->getMessage(), $exception->getCode());
        }
    }
}
