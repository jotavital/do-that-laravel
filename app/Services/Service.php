<?php

namespace App\Services;

use App\Models\Status;
use App\Repositories\Repository;
use Illuminate\Database\Eloquent\Collection;

class Service
{
    public function __construct(protected Repository $repository = new Repository(new Status))
    {
    }

    public function getAll(): Collection
    {
        return $this->repository->all();
    }
}
