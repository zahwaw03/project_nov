<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'firstname' => 'Hanif',
            'lastname' => 'Fadillah',
            'username' => 'Neap',
            'email' => 'haniffadillah@gmail.com',
            'password' => Hash::make('hanif123'),
            'image' => 'image',
            'role' => 'Admin',
        ]);

        User::create([
            'firstname' => 'Cahya',
            'lastname' => 'Munara',
            'username' => 'Wadidaw',
            'email' => 'cahyamunara0605@gmail.com',
            'password' => Hash::make('cahya123'),
            'image' => 'image',
            'role' => 'Author',
        ]);
    }
}
