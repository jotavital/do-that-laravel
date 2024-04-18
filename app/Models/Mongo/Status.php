<?php

namespace App\Models\Mongo;

use App\Relationships\Mongo\HasMany\HasManyTasks;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Eloquent\SoftDeletes;

class Status extends Model
{
    use HasFactory, SoftDeletes, HasManyTasks;
}
