<?php

namespace App\Http\Controllers;

use App\Exceptions\NotFoundException;
use App\Models\Mongo\Status;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class StatusController extends BaseCrudController
{
    public function __construct()
    {
        $this->model = new Status();
    }

    public function statusesWithTasks(): JsonResponse
    {
        try {
            request()->validate([
                'userId' => 'required',
            ]);

            $user = User::find(request()->userId);

            if (!$user) {
                throw new NotFoundException();
            }

            return $this->jsonResponse($user->statuses()->with('tasks')->get());
        } catch (\Exception $exception) {
            return $this->jsonError($exception);
        }
    }
}
