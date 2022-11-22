<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lesson::truncate();

        $coursesCount = Course::count();

        $lessons = [
            [
                'name' => 'Nhận được gì sau khóa học?',
                'video_url' => 'https://youtu.be/R6plN3FvzFY',
            ],
            [
                'name' => 'HTML, CSS là gì?',
                'video_url' => 'https://youtu.be/zwsPND378OQ',
            ],
        ];

        foreach ($lessons as $lesson) {
            Lesson::create([
                ...$lesson,
                'course_id' => rand(1, $coursesCount),
                'time_duration' => random_int(10, 600),
            ]);
        }
    }
}
