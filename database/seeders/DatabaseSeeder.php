<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Michael Jackson',
            'user_code' => '0001',
            'email' => 'MichaelJackson@example.com',
            'description' => '役職：社長'
        ]);
    
        User::factory()->create([
            'name' => 'Paul Smith',
            'user_code' => '0002',
            'email' => 'PaulSmith@example.com',
            'description' => '役職：部長'
        ]);
    
        User::factory()->create([
            'name' => 'David Marks',
            'user_code' => '0003',
            'email' => 'DavidMarks@example.com',
            'description' => '役職：主任'
        ]);
    }
}
