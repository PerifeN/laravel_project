<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        
        // Dodaj użytkownika o ID 1 jako admina
        User::create([
            'name' => 'Site',
            'surname' => 'Admin',
            'email' => 'admin@admin.pl',
            'password' => bcrypt('zaq1@WSX'),
            'role' => 'admin',
        ]);
        User::factory(20)->create();
    }
}
