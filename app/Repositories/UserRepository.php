<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends Repository
{
    public function store(array $attributes): ?User
    {
        $user = new User();

        $user->fill($attributes);

        return $user->save() ? $user : false;
    }
}
