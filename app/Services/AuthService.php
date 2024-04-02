<?php

namespace App\Services;

use App\Mail\SendAuthenticationCode;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Mail;

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

    public function sendAuthenticationCode(User $user): bool
    {
        if (!$user) {
            return false;
        }

        $code = $this->twoFAService->generateCode();

        Mail::to($user)->queue(new SendAuthenticationCode($user, $code));

        return true;
    }
}
