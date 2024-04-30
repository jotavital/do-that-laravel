<?php

namespace Database\Seeders;

use App\Models\Mongo\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::insert([
            ['title' => 'Pendentes', 'color' => 'red', 'user_id' => 1, 'created_at' => now()->toIso8601String()],
            ['title' => 'Em Andamento', 'color' => 'blue', 'user_id' => 1, 'created_at' => now()->toIso8601String()],
            ['title' => 'Concluídos', 'color' => 'green', 'user_id' => 1, 'created_at' => now()->toIso8601String()],
        ]);
    }
}
