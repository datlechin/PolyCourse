<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseRequirement;
use Illuminate\Database\Seeder;

class CourseRequirementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CourseRequirement::truncate();

        $courses = Course::all();
        $requirements = [
            'Hiểu biết về mô hình Client-Server',
            'Phân biệt rõ ràng được Front-end & Back-end',
            'Nắm chắc HTML, CSS, đã có sản phẩm tự tay làm',
            'Nắm chắc Javascript cơ bản và nâng cao',
        ];

        foreach ($courses as $course) {
            foreach ($requirements as $requirement) {
                $course->requirements()->create([
                    'text' => $requirement,
                ]);
            }
        }
    }
}
