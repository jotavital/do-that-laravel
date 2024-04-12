<?php

namespace App\Http\Controllers;

use App\Traits\RespondsJson;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

class BaseCrudController
{
    use RespondsJson;

    protected Model $model;
    protected $service;
    protected $repository;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function index(): JsonResponse
    {
        return $this->jsonResponse($this->model->all());
    }
}
