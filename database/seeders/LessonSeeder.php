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
//        Lesson::truncate();

        $coursesCount = Course::count();

        $lessons = [
            [
                'name' => 'Nhận được gì sau khóa học?',
                'youtube_id' => 'R6plN3FvzFY',
            ],
            [
                'name' => 'HTML, CSS là gì?',
                'youtube_id' => 'zwsPND378OQ',
            ],
            [
                'name' => 'Cài đặt babel plugin module resolver',
                'youtube_id' => 'wwGkGi1WFgg',
            ],
            [
                'name' => 'SSH vào Server Ubuntu Thật ',
                'youtube_id' => 'ScLOfVwezKU',
            ],
            [
                'name' => 'Cài đặt NodeJS trên WSL',
                'youtube_id' => '9rddrjDkmWo',
            ],
            [
                'name' => 'Tạo dự án ReactJS trên WSL',
                'youtube_id' => 'aj3HXDfrM2Q',
            ],
            [
                'name' => 'Chạy dự án ExpressJS trên WSL',
                'youtube_id' => 'MpYEUtbbFSg',
            ],
            [
                'name' => 'Cài đặt PHP 8 & Composer trên WSL',
                'youtube_id' => '_Le-We25B0k',
            ],
            [
                'name' => 'Chạy dự án Laravel 8 trên WSL',
                'youtube_id' => 'EHlmj2KDyHU',
            ],
            [
                'name' => 'Cài Đặt Windows Terminal',
                'youtube_id' => 'egSxAF-Sak4',
            ],
            [
                'name' => 'Giới thiệu Windows Terminal & WSL',
                'youtube_id' => '7ppRSaGT1uw',
            ],
            [
                'name' => 'React Router V6',
                'youtube_id' => '5jYlY4y5Dfs',
            ],
            [
                'name' => 'useImperativeHandle() hook',
                'youtube_id' => 'dSzf0nv6QmM',
            ],
            [
                'name' => 'useReducer() hook',
                'youtube_id' => 'yn-8PVKBBn0',
            ],
            [
                'name' => 'useMemo() hook',
                'youtube_id' => 'TGaxZyZzB7E',
            ],
            [
                'name' => 'useEffect with dependencies',
                'youtube_id' => 'OOt2VRa1Oeg',
            ],
            [
                'name' => 'Todolist with useState() ',
                'youtube_id' => 'bpVFSiNsFHY',
            ],
            [
                'name' => 'CRA Folder Structure',
                'youtube_id' => '-Ka_3RkQAvk',
            ],
            [
                'name' => 'NPM, NPX và YARN là gì?',
                'youtube_id' => '7sX_8lKURqo',
            ],
            [
                'name' => 'Tạo dự án với React + Webpack',
                'youtube_id' => '1EBe-l1E3pM',
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
