<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers\CoursesRelationManager;
use App\Filament\Resources\CategoryResource\RelationManagers\PostsRelationManager;
use App\Models\Category;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Str;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $slug = 'categories';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $label = 'Danh mục';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    TextInput::make('name')
                        ->label('Tên')
                        ->required()
                        ->reactive()
                        ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state))),

                    TextInput::make('slug')
                        ->disabled()
                        ->required()
                        ->unique(Category::class, 'slug', fn($record) => $record),

                    MarkdownEditor::make('description')
                        ->label('Mô tả')
                        ->columnSpan('full'),

                    SpatieMediaLibraryFileUpload::make('image')
                        ->label('Hình ảnh')
                        ->columnSpan('full'),

                    Placeholder::make('created_at')
                        ->label('Tạo lúc')
                        ->content(fn(?Category $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                    Placeholder::make('updated_at')
                        ->label('Cập nhật lúc')
                        ->content(fn(?Category $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
                ])
                ->columns()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('Hình ảnh'),

                TextColumn::make('name')
                    ->label('Tên')
                    ->description(fn (Category $record): string => Str::limit($record->description, 50))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Ngày tạo')
                    ->date()
                    ->sortable()
            ]);
    }

    public static function getRelations(): array
    {
        return [
            CoursesRelationManager::class,
            PostsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'slug'];
    }
}
