<?php

namespace Database\Seeders;

use App\Enums\InstructionalLevel;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::truncate();

        $categoriesCount = Category::count();

        $courses = [
            [
                'name' => 'Kiến thức nhập môn IT',
                'subtitle' => 'Để có cái nhìn tổng quan về ngành IT - Lập trình web các bạn nên xem các videos tại khóa này trước nhé.',
            ],
            [
                'name' => 'HTML CSS từ Zero đến Hero',
                'subtitle' => 'Trong khóa này chúng ta sẽ cùng nhau xây dựng giao diện 2 trang web là The Band & Shopee.',
            ],
            [
                'name' => 'Responsive với Grid System',
                'subtitle' => 'Trong khóa này chúng ta sẽ học về cách xây dựng giao diện web responsive với Grid System, tương tự Bootstrap 4.',
            ],
            [
                'name' => 'Lập trình JavaScript cơ bản',
                'subtitle' => 'Học Javascript cơ bản phù hợp cho người chưa từng học lập trình. Với hơn 100 bài học và có bài tập thực hành sau mỗi bài học.',
            ],
            [
                'name' => 'Lập trình JavaScript nâng cao',
                'subtitle' => 'Hiểu sâu hơn về cách Javascript hoạt động, tìm hiểu về IIFE, closure, reference types, this keyword, bind, call, apply, prototype, ...',
            ],
            [
                'name' => 'Làm việc với Terminal & Ubuntu',
                'subtitle' => 'Sở hữu một Terminal hiện đại, mạnh mẽ trong tùy biến và học cách làm việc với Ubuntu là một bước quan trọng trên con đường trở thành một Web Developer.',
            ],
            [
                'name' => 'Xây dựng Website với React JS',
                'subtitle' => 'Khóa học ReactJS từ cơ bản tới nâng cao, kết quả của khóa học này là bạn có thể làm hầu hết các dự án thường gặp với ReactJS. Cuối khóa học này bạn sẽ sở hữu một dự án giống Tiktok.com, bạn có thể tự tin đi xin việc khi nắm chắc các kiến thức được chia sẻ trong khóa học này.',
            ],
            [
                'name' => 'Node & ExpressJS',
                'subtitle' => 'Học Back-end với Node & ExpressJS framework, hiểu các khái niệm khi làm Back-end và xây dựng RESTful API cho trang web.',
            ],
        ];

        foreach ($courses as $key => $course) {
            Course::query()
                ->create([
                    ...$course,
                    'category_id' => rand(1, $categoriesCount),
                    'slug' => Str::slug($course['name']),
                    'level' => InstructionalLevel::Beginner,
                ])
                ->addMediaFromDisk('courses/'.$key + 1 .'.png', 'public')
                ->toMediaCollection('courses');
        }
    }
}
