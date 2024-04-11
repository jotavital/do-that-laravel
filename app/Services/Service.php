<?php

namespace App\Services;

use App\Repositories\Repository;
use Illuminate\Database\Eloquent\Collection;

class Service
{
    public function __construct(protected Repository $repository)
    {
    }

    public function getAll(): Collection
    {
        return $this->repository->all();
    }
}
