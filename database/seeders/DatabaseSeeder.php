<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Van;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $testUser = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Van::factory()->create([
            'user_id' => $testUser->id,
            'is_primary' => true,
        ]);

        Van::factory(2)->create([
            'user_id' => $testUser->id,
            'is_primary' => false,
        ]);

        // Create 10 vans belonging to 10 users.
        Van::factory(10)->create();
    }
}
