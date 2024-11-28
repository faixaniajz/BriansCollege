<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create([
            'name' => 'Junaid Subahni',
            'email' => 'brainscolelge@gmail.com',
            'password' => Hash::make('brains786'),
            'branch' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Junaid Subahni',
            'email' => 'brainsqueen@gmail.com',
            'password' => Hash::make('baghbanpurateam'),
            'branch' => 'queen',
        ]);

        User::factory()->create([
            'name' => 'Junaid Subahni',
            'email' => 'brainswalton@gmail.com',
            'password' => Hash::make('baghbanpurateam'),
            'branch' => 'walton',
        ]);
    }
}
