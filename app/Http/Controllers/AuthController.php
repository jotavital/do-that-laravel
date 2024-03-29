<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\AuthService;
use Exception;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function __construct(private $service = new AuthService())
    {
    }

    public function register(UserRequest $request): JsonResponse
    {
        try {
            $user = $this->service->registerUser($request->validated());
            if ($user) {
                return response()->json([
                    'message' => trans('user.stored'),
                    'data' => $user
                ]);
            }

            throw new Exception(trans('user.errors.store'));
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }
}
