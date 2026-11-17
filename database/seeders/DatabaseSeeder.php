<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(ProjectSeeder::class);

        User::factory()->create([
            'name' => 'Luis Marques',
            'email' => 'admin@example.com',
        ]);
    }
}
