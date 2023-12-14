<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::create([
            'username' => 'cahzello',
            'email' => 'cahzello@gmail.com',
            'password'=> bcrypt('password'),
            'role' => 'admin'
        
        ]);
        User::create([
            'username' => 'yukina minato',
            'email' => 'yukina@gmail.com',
            'password'=> bcrypt('password'),
            'role' => 'user'
        ]);

    }
}
