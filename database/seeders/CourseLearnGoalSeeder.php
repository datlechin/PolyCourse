<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseLearnGoal;
use Illuminate\Database\Seeder;

class CourseLearnGoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CourseLearnGoal::truncate();

        $courses = Course::all();
        $learnGoals = [
            'Các kiến thức cơ bản, nền móng của ngành IT',
            'Các mô hình, kiến trúc cơ bản khi triển khai ứng dụng',
            'Các khái niệm, thuật ngữ cốt lõi khi triển khai ứng dụng',
            'Hiểu hơn về cách internet và máy vi tính hoạt động',
        ];

        foreach ($courses as $course) {
            foreach ($learnGoals as $learnGoal) {
                $course->learnGoals()->create([
                    'text' => $learnGoal,
                ]);
            }
        }
    }
}
