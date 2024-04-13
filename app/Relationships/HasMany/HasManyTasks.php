<?php

namespace App\Relationships\HasMany;

use App\Models\Task;
use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasManyTasks
{
    use HasRelationships;

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
