<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['product_category' => 'Donmono']);
        Category::create(['product_category' => 'Ippin']);
        Category::create(['product_category' => 'Kushiyaki']);
        Category::create(['product_category' => 'Makizushi']);
        Category::create(['product_category' => 'Men']);
        Category::create(['product_category' => 'Nigirizushi']);
        Category::create(['product_category' => 'Ochazuke']);
        Category::create(['product_category' => 'Ramen']);
        Category::create(['product_category' => 'Salad']);
        Category::create(['product_category' => 'Sashimi']);
        Category::create(['product_category' => 'Tempura']);
        Category::create(['product_category' => 'Yakizakana']);
        Category::create(['product_category' => 'Zensai']);
        Category::create(['product_category' => 'Addons']);

    }
}
