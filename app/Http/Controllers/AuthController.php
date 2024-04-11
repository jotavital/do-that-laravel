<?php

namespace App\Http\Controllers;

use App\Exceptions\GenericException;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->service = new AuthService(new UserRepository(new User()));
    }

    public function login(LoginRequest $request)
    {
        try {
            if (!$request->password) {
                return $this->service->loginByAuthenticationCode($request->email, $request->authentication_code);
            }
        } catch (GenericException $e) {
            throw $e;
        }
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
            $request->validate(['email' => 'required|string|email']);
            $user = User::where('email', $request->email)->first();

            if (!$user) {
                throw new GenericException(trans('validation.exists', ['attribute' => 'e-mail']));
            }

            $codeSent = $this->service->sendAuthenticationCode($user);

            if (!$codeSent) {
                throw new GenericException(trans('auth.authentication_code.failed'));
            }

            return response()->json(['success' => $codeSent]);
        } catch (GenericException $e) {
            throw $e;
        }
    }
}
