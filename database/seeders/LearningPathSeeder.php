<?php

namespace Database\Seeders;

use App\Models\LearningPath;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LearningPathSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LearningPath::truncate();

        $learningPaths = [
            [
                'name' => 'Lộ trình học Front-end',
                'description' => 'Lập trình viên Front-end là người xây dựng ra giao diện websites. Trong phần này F8 sẽ chia sẻ cho bạn lộ trình để trở thành lập trình viên Front-end nhé.',
            ],
            [
                'name' => 'Lộ trình học Back-end',
                'description' => 'Trái với Front-end thì lập trình viên Back-end là người làm việc với dữ liệu, công việc thường nặng tính logic hơn. Chúng ta sẽ cùng tìm hiểu thêm về lộ trình học Back-end nhé.',
            ],
        ];

        foreach ($learningPaths as $key => $learningPath) {
            LearningPath::create([
                ...$learningPath,
                'slug' => Str::slug($learningPath['name']),
                'content' => fake()->realText(500),
            ])
                ->addMediaFromDisk('learning-paths/'.$key + 1 .'.png', 'public')
                ->toMediaCollection('learning-paths');
        }
    }
}
