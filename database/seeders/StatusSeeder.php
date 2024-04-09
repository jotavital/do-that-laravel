<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::insert([
            ['title' => 'Pendetes', 'color' => 'red', 'created_at' => now()],
            ['title' => 'Em Andamento', 'color' => 'blue', 'created_at' => now()],
            ['title' => 'Concluídos', 'color' => 'green', 'created_at' => now()],
        ]);
    }
}
