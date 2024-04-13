<?php

namespace App\Repositories;

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
}
