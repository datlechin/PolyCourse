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
            [
                'name' => 'Cài đặt babel plugin module resolver',
                'video_url' => 'https://youtu.be/wwGkGi1WFgg',
            ],
            [
                'name' => 'SSH vào Server Ubuntu Thật ',
                'video_url' => 'https://youtu.be/ScLOfVwezKU',
            ],
            [
                'name' => 'Cài đặt NodeJS trên WSL',
                'video_url' => 'https://youtu.be/9rddrjDkmWo',
            ],
            [
                'name' => 'Tạo dự án ReactJS trên WSL',
                'video_url' => 'https://youtu.be/aj3HXDfrM2Q',
            ],
            [
                'name' => 'Chạy dự án ExpressJS trên WSL',
                'video_url' => 'https://youtu.be/MpYEUtbbFSg',
            ],
            [
                'name' => 'Cài đặt PHP 8 & Composer trên WSL',
                'video_url' => 'https://youtu.be/_Le-We25B0k',
            ],
            [
                'name' => 'Chạy dự án Laravel 8 trên WSL',
                'video_url' => 'https://youtu.be/EHlmj2KDyHU',
            ],
            [
                'name' => 'Cài Đặt Windows Terminal',
                'video_url' => 'https://youtu.be/egSxAF-Sak4',
            ],
            [
                'name' => 'Giới thiệu Windows Terminal & WSL',
                'video_url' => 'https://youtu.be/7ppRSaGT1uw',
            ],
            [
                'name' => 'React Router V6',
                'video_url' => 'https://youtu.be/5jYlY4y5Dfs',
            ],
            [
                'name' => 'useImperativeHandle() hook',
                'video_url' => 'https://youtu.be/dSzf0nv6QmM',
            ],
            [
                'name' => 'useReducer() hook',
                'video_url' => 'https://youtu.be/yn-8PVKBBn0',
            ],
            [
                'name' => 'useMemo() hook',
                'video_url' => 'https://youtu.be/TGaxZyZzB7E',
            ],
            [
                'name' => 'useEffect with dependencies',
                'video_url' => 'https://youtu.be/OOt2VRa1Oeg',
            ],
            [
                'name' => 'Todolist with useState() ',
                'video_url' => 'https://youtu.be/bpVFSiNsFHY',
            ],
            [
                'name' => 'CRA Folder Structure',
                'video_url' => 'https://youtu.be/-Ka_3RkQAvk',
            ],
            [
                'name' => 'NPM, NPX và YARN là gì?',
                'video_url' => 'https://youtu.be/7sX_8lKURqo',
            ],
            [
                'name' => 'Tạo dự án với React + Webpack',
                'video_url' => 'https://youtu.be/1EBe-l1E3pM',
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
