<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'Create Users']);
        Permission::create(['name' => 'Edit Users']);
        Permission::create(['name' => 'Delete Users']);
        Permission::create(['name' => 'Create Roles']);
        Permission::create(['name' => 'Edit Roles']);
        Permission::create(['name' => 'Delete Roles']);
        Permission::create(['name' => 'Create Permissions']);
        Permission::create(['name' => 'Edit Permissions']);
        Permission::create(['name' => 'Delete Permissions']);
    }
}
