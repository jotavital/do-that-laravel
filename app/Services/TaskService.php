<?php

namespace App\Services;

use App\Models\Mongo\Status;
use App\Models\Mongo\Task;

class TaskService
{
    public function createTask(string $statusId, array $attributes)
    {
        $status = Status::find($statusId);
        $task = new Task();
        $task->name = $attributes['name'];

        $status->tasks()->save($task);

        return $task;
    }
}
