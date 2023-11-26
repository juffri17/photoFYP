<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = \App\Models\User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'su@photo.com',
            'password' => bcrypt('password'),
        ]);

        $superAdmin->assignRole('Super Admin');

        $photographer = \App\Models\User::factory()->create([
            'name' => 'photo Admin',
            'email' => 'photo_admin@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $photographer->assignRole('Photographer');

        $client = \App\Models\User::factory()->create([
            'name' => 'client 1',
            'email' => 'client1@gamil.com',
            'password' => bcrypt('password'),
        ]);

        $client->assignRole('Client');
    }
}
