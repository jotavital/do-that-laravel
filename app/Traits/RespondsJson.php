<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait RespondsJson
{
    public function jsonResponse($data, $status = 200): JsonResponse
    {
        return response()->json($data, $status);

    }

    public function jsonError(\Throwable $exception, $status = 400): JsonResponse
    {
        if ($exception->getCode() !== 0) {
            $status = $exception->getCode();
        }

        if (gettype($exception->getCode()) !== 'integer') {
            $status = 400;
        }

        return response()->json($exception->getMessage(), $status);
    }
}
