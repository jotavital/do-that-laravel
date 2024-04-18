<?php

namespace App\Exceptions;

use Exception;

class NotFoundException extends Exception
{
    public function __construct()
    {
        $this->message = trans('errors.not_found');
    }
}
