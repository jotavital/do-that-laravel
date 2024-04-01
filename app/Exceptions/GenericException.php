<?php

namespace App\Exceptions;

use Exception;

class GenericException extends Exception
{

    public function context(): array
    {
        return ['message' => $this->getMessage()];
    }
}
