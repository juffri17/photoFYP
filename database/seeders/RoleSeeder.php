<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = Role::create(['name' => 'Super Admin']);
        $photographer = Role::create(['name' => 'Photographer']);
        $client = Role::create(['name' => 'Client']);

        $superAdmin->givePermissionTo([
            'create-user',
            'edit-user',
            'delete-user',
            'add-service',
            'edit-service',
            'delete-service',
            'add-booking',
            'edit-booking',
            'delete-booking',
        ]);

        $client->givePermissionTo([
            'add-booking',
            'edit-booking',
            'delete-booking',
        ]);
    }
}
