<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::insert([
            ['name' => 'Politics'],
            ['name' => 'Business'],
            ['name' => 'Technology'],
            ['name' => 'Sports'],
            ['name' => 'Entertainment'],
        ]);
    }
}
