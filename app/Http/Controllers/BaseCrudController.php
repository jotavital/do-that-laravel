<?php

namespace App\Http\Controllers;

use App\Traits\RespondsJson;
use Illuminate\Database\Eloquent\Model;

class BaseCrudController
{
    use RespondsJson;

    protected Model $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function index()
    {
        try {
            return $this->jsonResponse($this->model->all());
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
