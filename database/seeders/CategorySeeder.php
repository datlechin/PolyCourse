<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::truncate();

        $categories = [
            'Lập trình web',
            'Khoa học dữ liệu',
            'Lập trình mobile',
            'Lập trình game',
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'slug' => Str::slug($category),
                'description' => fake()->realText(),
            ]);
        }
    }
}
