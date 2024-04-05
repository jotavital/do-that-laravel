<?php

namespace App\Services;

use App\Mail\SendAuthenticationCode;
use App\Models\User;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;

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
        $isCodeStored = $this->twoFAService->storeCodeAtRedis($user->email, $code);

        if (!$isCodeStored) {
            return false;
        }

        Mail::to($user)->queue(new SendAuthenticationCode($user, $code));

        return true;
    }

    private function checkIfCodeMatches($email, $code)
    {
        $codeFromRedis = Redis::get("user:$email:authentication_code");

        if (!$codeFromRedis) {
            return false;
        }

        return $codeFromRedis === $code;
    }

    public function loginByAuthenticationCode(string $email, string $code)
    {
        $codeMatches = $this->checkIfCodeMatches($email, $code);

        if ($codeMatches) {
            $user = User::where('email', $email)->first();

            Auth::login($user);

            return [
                'user' => $user,
                'tokens' => [
                    'access_token' => $user->createToken(
                        'api',
                        ['*'],
                        now()->addDay()
                    )->plainTextToken
                ]
            ];
        }

        throw new Exception(trans('auth.authentication_code.invalid'));
    }
}
