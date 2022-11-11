<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::truncate();

        $categoriesCount = Category::count();
        $usersCount = User::count();

        $posts = [
            [
                'title' => 'Tổng hợp các sản phẩm của học viên tại F8',
                'excerpt' => 'Bài viết này nhằm tổng hợp lại các dự án mà học viên F8 đã hoàn thành và chia sẻ trên nhóm Học lập trình web F8.',
                'content' => 'Bài viết này nhằm tổng hợp lại các dự án mà học viên F8 đã hoàn thành và chia sẻ trên nhóm Học lập trình web F8. Các dự án dưới đây được mình ngẫu nhiên lựa chọn để đăng chứ không mang tính xếp hạng các bạn nhé.',
            ]
        ];

        foreach ($posts as $post) {
            Post::create([
                ...$post,
                'user_id' => rand(1, $usersCount),
                'category_id' => rand(1, $categoriesCount),
                'slug' => Str::slug($post['title']),
            ]);
        }
    }
}
