<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\User;
use App\Models\Product;
use App\Models\Queue;
use App\Models\Serve;
use App\Models\Stock;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\PermissionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        Product::factory(10)->create();
        Category::factory(10)->create();
        // Stock::factory(10)->create();
        // Queue::factory(10)->create();
        // Serve::factory(10)->create();

        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(AdminSeeder::class);
        
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
