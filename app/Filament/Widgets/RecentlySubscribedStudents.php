<?php

namespace App\Filament\Widgets;

use App\Models\CourseUser;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class RecentlySubscribedStudents extends BaseWidget
{
    protected static ?string $heading = 'Học viên đăng ký gần đây';

    protected function getTableQuery(): Builder
    {
        return CourseUser::query()
            ->with(['user', 'course'])
            ->latest();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('user.name')
                ->label('Học viên'),

            Tables\Columns\TextColumn::make('course.name')
                ->label('Khoá học'),

            Tables\Columns\TextColumn::make('created_at')
                ->label('Đăng ký lúc')
                ->since(),
        ];
    }
}
