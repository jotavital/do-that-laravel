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
            ['title' => 'Pendetes', 'color' => 'red', 'user_id' => 1, 'created_at' => now()->toDateTimeString()],
            ['title' => 'Em Andamento', 'color' => 'blue', 'user_id' => 1, 'created_at' => now()->toDateTimeString()],
            ['title' => 'Concluídos', 'color' => 'green', 'user_id' => 1, 'created_at' => now()->toDateTimeString()],
        ]);
    }
}
