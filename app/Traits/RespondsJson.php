<?php

namespace App\Traits;

trait RespondsJson
{
    public function jsonResponse($data)
    {
        return response()->json($data);
    }
}
