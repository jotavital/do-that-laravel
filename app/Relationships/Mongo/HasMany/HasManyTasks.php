<?php

namespace App\Relationships\Mongo\HasMany;

use App\Models\Mongo\Task;
use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use MongoDB\Laravel\Relations\EmbedsMany;

trait HasManyTasks
{
    use HasRelationships;

    public function tasks(): EmbedsMany
    {
        return $this->embedsMany(Task::class);
    }
}
