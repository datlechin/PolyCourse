<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::truncate();

        $categories = Category::pluck('id')->toArray();
        $users = User::pluck('id')->toArray();

        $courses = [
        ];

        foreach ($courses as $course) {
            Course::create([
                'user_id' => array_rand($users),
                'category_id' => array_rand($categories),
                ...$course,
            ]);
        }
    }
}
