<?php

namespace Database\Seeders;

use App\Models\PostCategory;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    public function run(): void
    {
        PostCategory::create(['name' => 'default']);
        PostCategory::create(['name' => 'products']);
        PostCategory::create(['name' => 'ta-ta-ta']);
        PostCategory::create(['name' => '235tg']);
    }
}
