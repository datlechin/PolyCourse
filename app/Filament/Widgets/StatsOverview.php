<?php

namespace App\Filament\Widgets;

use App\Models\Course;
use App\Models\Post;
use App\Models\Review;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = -4;

    protected function getCards(): array
    {
        return [
            Card::make('Người dùng', number_format(User::count())),
            Card::make('Khoá học', number_format(Course::count())),
            Card::make('Bài viết', number_format(Post::count())),
            Card::make('Đánh giá', number_format(Review::count())),
        ];
    }
}
