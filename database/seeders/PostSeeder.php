<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
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
            ],
            [
                'title' => 'Tạo dự án ReactJS với Webpack và Babel',
                'excerpt' => 'Hôm nay mình có quay một video trong khóa học ReactJS là “Tạo dự án ReactJS với Webpack và Babel”.',
                'content' => 'Hôm nay mình có quay một video trong khóa học ReactJS là “Tạo dự án ReactJS với Webpack và Babel”. Mình làm video này với mong muốn chia sẻ cho các bạn có thể hình dung ra dự án được tạo bởi “create-react-app” được xây dựng như thế nào. Các bạn có thể xem thêm video hướng dẫn ở đây nhé.',
            ],
            [
                'title' => 'Ký sự ngày thứ 25 học ở F8',
                'excerpt' => 'Hôm nay mình có quay một video trong khóa học ReactJS là “Tạo dự án ReactJS với Webpack và Babel”.',
                'content' => 'Hôm nay mình có quay một video trong khóa học ReactJS là “Tạo dự án ReactJS với Webpack và Babel”. Mình làm video này với mong muốn chia sẻ cho các bạn có thể hình dung ra dự án được tạo bởi “create-react-app” được xây dựng như thế nào. Các bạn có thể xem thêm video hướng dẫn ở đây nhé.',
            ],
            [
                'title' => 'Cách đưa code lên GitHub và tạo GitHub Pages',
                'excerpt' => 'Hôm nay mình có quay một video trong khóa học ReactJS là “Tạo dự án ReactJS với Webpack và Babel”.',
                'content' => 'Hôm nay mình có quay một video trong khóa học ReactJS là “Tạo dự án ReactJS với Webpack và Babel”. Mình làm video này với mong muốn chia sẻ cho các bạn có thể hình dung ra dự án được tạo bởi “create-react-app” được xây dựng như thế nào. Các bạn có thể xem thêm video hướng dẫn ở đây nhé.',
            ],
            [
                'title' => 'Các nguồn tài nguyên hữu ích cho 1 front-end developer',
                'excerpt' => 'Hôm nay mình có quay một video trong khóa học ReactJS là “Tạo dự án ReactJS với Webpack và Babel”.',
                'content' => 'Hôm nay mình có quay một video trong khóa học ReactJS là “Tạo dự án ReactJS với Webpack và Babel”. Mình làm video này với mong muốn chia sẻ cho các bạn có thể hình dung ra dự án được tạo bởi “create-react-app” được xây dựng như thế nào. Các bạn có thể xem thêm video hướng dẫn ở đây nhé.',
            ],
            [
                'title' => 'Thời gian và Động lực',
                'excerpt' => 'Hôm nay mình có quay một video trong khóa học ReactJS là “Tạo dự án ReactJS với Webpack và Babel”.',
                'content' => 'Hôm nay mình có quay một video trong khóa học ReactJS là “Tạo dự án ReactJS với Webpack và Babel”. Mình làm video này với mong muốn chia sẻ cho các bạn có thể hình dung ra dự án được tạo bởi “create-react-app” được xây dựng như thế nào. Các bạn có thể xem thêm video hướng dẫn ở đây nhé.',
            ],
            [
                'title' => 'Tổng hợp tài liệu tự học tiếng anh cơ bản.',
                'excerpt' => 'Hôm nay mình có quay một video trong khóa học ReactJS là “Tạo dự án ReactJS với Webpack và Babel”.',
                'content' => 'Hôm nay mình có quay một video trong khóa học ReactJS là “Tạo dự án ReactJS với Webpack và Babel”. Mình làm video này với mong muốn chia sẻ cho các bạn có thể hình dung ra dự án được tạo bởi “create-react-app” được xây dựng như thế nào. Các bạn có thể xem thêm video hướng dẫn ở đây nhé.',
            ],
            [
                'title' => 'Học như thế nào là phù hợp ?',
                'excerpt' => 'Hôm nay mình có quay một video trong khóa học ReactJS là “Tạo dự án ReactJS với Webpack và Babel”.',
                'content' => 'Hôm nay mình có quay một video trong khóa học ReactJS là “Tạo dự án ReactJS với Webpack và Babel”. Mình làm video này với mong muốn chia sẻ cho các bạn có thể hình dung ra dự án được tạo bởi “create-react-app” được xây dựng như thế nào. Các bạn có thể xem thêm video hướng dẫn ở đây nhé.',
            ],
        ];

        for ($i = 0; $i < count($posts); $i++) {
            $post = Post::create([
                ...$posts[$i],
                'user_id' => rand(1, $usersCount),
                'category_id' => rand(1, $categoriesCount),
                'slug' => Str::slug($posts[$i]['title']),
            ]);

            $post
                ->addMedia(Storage::disk('public')->path('posts/'.$i + 1 .'.png'))
                ->toMediaCollection('posts');
        }
    }
}
