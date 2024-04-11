<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;

class BaseCrudController
{
    protected Model $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function index()
    {
        try {
            return response()->json($this->model->all());
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
