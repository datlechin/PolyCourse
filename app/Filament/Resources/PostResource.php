<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $label = 'Bài viết';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Select::make('user_id')
                            ->label('Nguời đăng')
                            ->required()
                            ->relationship('author', 'name')
                            ->preload()
                            ->searchable(),

                        Select::make('category_id')
                            ->label('Danh mục')
                            ->required()
                            ->relationship('category', 'name')
                            ->preload()
                            ->searchable(),

                        TextInput::make('title')
                            ->label('Tiêu đề')
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(fn (string|null $state, callable $set) => $set('slug', Str::slug($state))),

                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->disabled(),

                        Textarea::make('excerpt')
                            ->label('Trích dẫn')
                            ->rows(3)
                            ->columnSpanFull(),

                        MarkdownEditor::make('content')
                            ->label('Nội dung')
                            ->required()
                            ->columnSpanFull(),

                        SpatieMediaLibraryFileUpload::make('media')
                            ->label('Hình ảnh')
                            ->collection('posts')
                            ->columnSpanFull(),

                        Placeholder::make('created_at')
                            ->label('Tạo lúc')
                            ->hiddenOn('create')
                            ->content(fn (?Post $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                        Placeholder::make('updated_at')
                            ->label('Cập nhật lúc')
                            ->hiddenOn('create')
                            ->content(fn (?Post $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
                    ])
                    ->columns(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('media')
                    ->label('Hình ảnh')
                    ->collection('posts'),

                Tables\Columns\TextColumn::make('author.name')
                    ->label('Người đăng'),

                Tables\Columns\TextColumn::make('title')
                    ->label('Tiêu đề')
                    ->searchable(),

                Tables\Columns\TextColumn::make('views')
                    ->label('Lượt xem')
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
