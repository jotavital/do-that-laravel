<?php

namespace App\Models;

use App\Relationships\HasMany\HasManyTasks;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory, HasManyTasks;
}
