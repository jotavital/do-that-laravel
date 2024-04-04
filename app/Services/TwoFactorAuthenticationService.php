<?php

namespace App\Services;

use Illuminate\Support\Facades\Redis;

const CODETTL = 300;

class TwoFactorAuthenticationService
{
    public function generateCode(): string
    {
        $code = strval(random_int(100000, 999999));

        return $code;
    }

    public function storeCodeAtRedis(string $email, string $code): bool
    {
        return Redis::set("user:$email:authentication_code", $code, 'EX', CODETTL);
    }
}
