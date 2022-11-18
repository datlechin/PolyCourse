<?php

namespace App\Filament\Resources\CategoryResource\RelationManagers;

use App\Models\Course;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Str;

class CoursesRelationManager extends RelationManager
{
    protected static string $relationship = 'courses';

    protected static ?string $label = 'Khoá học';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Tên')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('subtitle')
                    ->limit(50)
                    ->label('Mô tả'),

                TextColumn::make('price')
                    ->formatStateUsing(fn (string $state): string => $state == 0 ? 'Miễn phí' : $state)
                    ->label('Giá'),

                TextColumn::make('created_at')
                    ->label('Tạo lúc'),
            ]);
    }
}
