<?php

namespace App\Http\Controllers;

use App\Models\Status;

class StatusController extends BaseCrudController
{
    public function __construct()
    {
        $this->model = new Status();
    }
}
