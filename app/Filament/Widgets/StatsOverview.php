<?php

namespace App\Filament\Widgets;

use App\Models\Course;
use App\Models\CourseUser;
use App\Models\Post;
use App\Models\Review;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = -4;

    protected function getCards(): array
    {
        return [
            Card::make('Học viên', number_format(CourseUser::count())),
            Card::make('Khoá học', number_format(Course::count())),
            Card::make('Bài viết', number_format(Post::count())),
            Card::make('Đánh giá', number_format(Review::count())),
        ];
    }
}
