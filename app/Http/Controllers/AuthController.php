<?php

namespace App\Http\Controllers;

use App\Exceptions\GenericException;
use App\Http\Requests\UserRequest;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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

            throw new GenericException(trans('user.errors.store'));
        } catch (GenericException $e) {
            throw $e;
        }
    }

    public function sendAuthenticationCode(Request $request): JsonResponse
    {
        try {
            $request->validate(['email' => 'required|string|email|exists:users']);

            $codeSent = $this->service->sendAuthenticationCode($request->email);

            if (!$codeSent) {
                throw new GenericException(trans('auth.authentication_code.failed'));
            }

            return response()->json(['success' => $codeSent]);
        } catch (GenericException $e) {
            throw $e;
        }
    }
}
