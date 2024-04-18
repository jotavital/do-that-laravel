<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::find(1)) {
            User::insert([
                ['id' => 1, 'name' => 'João Teste', 'email' => 'joao@g.com', 'created_at' => now()],
            ]);
        }
    }
}
