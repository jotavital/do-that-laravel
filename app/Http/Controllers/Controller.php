<?php

namespace App\Http\Controllers;

use App\Services\Service;
use Illuminate\Http\JsonResponse;

class Controller
{
    public function __construct(
        protected $service = new Service
    ) {
    }

    public function index(): JsonResponse
    {
        return $this->jsonResponse($this->service->getAll());
    }

    public function jsonResponse($data): JsonResponse
    {
        return response()->json($data);
    }
}
