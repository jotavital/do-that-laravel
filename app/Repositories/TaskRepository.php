<?php

namespace App\Repositories;

use App\Models\Status;
use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

class TaskRepository
{
    public function getTasksByStatus($statusId): Collection
    {
        return Task::query()
            ->where('status_id', $statusId)
            ->orderBy('order')
            ->get();

    }

    public function changeTaskStatus(Task $task, int $statusId): bool
    {
        $newStatus = Status::find($statusId);

        $task->status()->associate($newStatus);

        return $task->save();
    }
}
