<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;

class AuthService
{
    public function __construct(private $repository = new UserRepository)
    {
    }

    public function registerUser(array $attributes): ?User
    {
        return $this->repository->store($attributes);
    }
}
