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

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $label = 'Khoá học';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->required(),

                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->required(),

                TextInput::make('name')
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),

                TextInput::make('slug')
                    ->disabled()
                    ->required()
                    ->unique(Course::class, 'slug', fn ($record) => $record),

                TextInput::make('subtitle')
                    ->required(),

                TextInput::make('description')
                    ->required(),

                TextInput::make('level')
                    ->required()
                    ->integer(),

                TextInput::make('price')
                    ->required()
                    ->numeric(),

                TextInput::make('trailer'),

                Placeholder::make('created_at')
                    ->label('Created Date')
                    ->content(fn (?Course $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                Placeholder::make('updated_at')
                    ->label('Last Modified Date')
                    ->content(fn (?Course $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Tên')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('subtitle')
                    ->label('Mô tả'),

                TextColumn::make('price')
                    ->label('Giá'),

                TextColumn::make('created_at')
                    ->label('Tạo lúc'),
            ]);
    }
}
