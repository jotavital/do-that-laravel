<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;

class AuthService
{
    public function __construct(
        private $repository = new UserRepository,
        private $twoFAService = new TwoFactorAuthenticationService
    ) {
    }

    public function registerUser(array $attributes): ?User
    {
        return $this->repository->store($attributes);
    }

    public function sendAuthenticationCode(string $email): bool
    {
        if (!$email) {
            return false;
        }

        $code = $this->twoFAService->generateCode();

        dd(['sneing code ' . $code, 'email ' . $email]);

        return true;
    }
}
