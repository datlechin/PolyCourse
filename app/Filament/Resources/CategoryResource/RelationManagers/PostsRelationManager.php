<?php

namespace App\Filament\Resources\CategoryResource\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;

class PostsRelationManager extends RelationManager
{
    protected static string $relationship = 'posts';

    protected static ?string $label = 'Bài viết';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('thumbnail')
                    ->label('Hình ảnh'),

                TextColumn::make('user.name')
                    ->label('Người ')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('title')
                    ->label('Tiêu đề')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('views')
                    ->label('Lượt xem')
                    ->formatStateUsing(fn (string $state): string => number_format($state)),
            ]);
    }
}
