<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
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
            'name' => 'Junaid Subahni',
            'email' => 'brainscolelge@gmail.com',
            'password' => Hash::make('brains786'),
        ]);

        User::factory()->create([
            'name' => 'Junaid Subahni',
            'email' => 'brainsqueen@gmail.com',
            'password' => Hash::make('baghbanpurateam'),
        ]);

        User::factory()->create([
            'name' => 'Junaid Subahni',
            'email' => 'brainswalton@gmail.com',
            'password' => Hash::make('baghbanpurateam'),
        ]);
    }
}
