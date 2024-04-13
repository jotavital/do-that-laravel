<?php

namespace App\Relationships\BelongsTo;

use App\Models\Status;
use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToStatus
{
    use HasRelationships;

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
}
