<?php

namespace App\Services;

class TwoFactorAuthenticationService
{
    public function generateCode(): string
    {
        $code = strval(random_int(100000, 999999));

        return $code;
    }
}
