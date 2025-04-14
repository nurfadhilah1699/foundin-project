<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'Front-End',
            'Back-End',
            'Machine Learning',
            'Android Developer',
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(['name' => $category]);
        }
    }
}
