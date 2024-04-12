<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait RespondsJson
{
    public function jsonResponse($data, $status = 200): JsonResponse
    {
        return response()->json($data, $status);
    }
}
