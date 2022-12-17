<?php

namespace App\Filament\Widgets;

use App\Models\Course;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class CoursesMostStudent extends BaseWidget
{
    protected static ?string $heading = 'Khoá học nhiều học viên nhất';

    protected function getTableQuery(): Builder
    {
        return Course::query()
            ->withCount('students')
            ->orderByDesc('students_count');
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('name')
                ->label('Khoá học'),

            Tables\Columns\TextColumn::make('students_count')
                ->label('Học viên')
                ->counts('students'),
        ];
    }
}
