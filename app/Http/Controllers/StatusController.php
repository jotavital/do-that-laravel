<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Repositories\Repository;
use App\Services\Service;

class StatusController extends Controller
{
    public function __construct()
    {
        $this->service = new Service(new Repository(new Status()));
    }
}
