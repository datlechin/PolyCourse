<?php

namespace App\Filament\Resources;

use App\Enums\InstructionalLevel;
use App\Filament\Resources\CourseResource\Pages;
use App\Models\Course;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Support\Str;

class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $label = 'Khoá học';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Wizard::make([
                    Forms\Components\Wizard\Step::make('Thông tin')
                        ->schema([
                            Forms\Components\Card::make()
                                ->schema([
                                    Forms\Components\Select::make('category_id')
                                        ->label('Danh mục')
                                        ->relationship('category', 'name')
                                        ->required()
                                        ->preload()
                                        ->searchable(),

                                    Forms\Components\TextInput::make('trailer')
                                        ->placeholder('Link video trailer'),

                                    Forms\Components\TextInput::make('name')
                                        ->label('Tên')
                                        ->required()
                                        ->reactive()
                                        ->afterStateUpdated(fn (string|null $state, callable $set) => $set('slug', Str::slug($state))),

                                    Forms\Components\TextInput::make('slug')
                                        ->required()
                                        ->unique(ignoreRecord: true)
                                        ->disabled(),

                                    Forms\Components\Textarea::make('subtitle')
                                        ->label('Mô tả ngắn')
                                        ->required()
                                        ->rows(2)
                                        ->columnSpanFull(),

                                    Forms\Components\MarkdownEditor::make('description')
                                        ->label('Mô tả')
                                        ->columnSpanFull(),

                                    Forms\Components\Select::make('level')
                                        ->label('Cấp độ')
                                        ->required()
                                        ->options(collect(InstructionalLevel::cases())->mapWithKeys(fn (InstructionalLevel $level) => [$level->value => $level->label()])),

                                    Forms\Components\TextInput::make('price')
                                        ->label('Giá')
                                        ->placeholder('Nhập 0 để miễn phí')
                                        ->required()
                                        ->numeric()
                                        ->default(0),

                                    Forms\Components\SpatieMediaLibraryFileUpload::make('media')
                                        ->label('Hình ảnh')
                                        ->collection('courses')
                                        ->columnSpanFull(),
                                ])
                                ->columns(),
                        ]),

                    Forms\Components\Wizard\Step::make('Kết quả học được')
                        ->schema([
                            Forms\Components\Card::make()
                                ->schema([
                                    Forms\Components\Repeater::make('learnGoals')
                                        ->label('Kết quả đạt được sau khoá học')
                                        ->relationship()
                                        ->schema([
                                            Forms\Components\TextInput::make('text')
                                                ->label('Nội dung'),
                                        ])
                                        ->createItemButtonLabel('Thêm dòng mới'),
                                ]),
                        ]),

                    Forms\Components\Wizard\Step::make('Điều kiện yêu cầu')
                        ->schema([
                            Forms\Components\Card::make()
                                ->schema([
                                    Forms\Components\Repeater::make('requirements')
                                        ->label('Điều kiện cần thiết để học')
                                        ->relationship()
                                        ->schema([
                                            Forms\Components\TextInput::make('text')
                                                ->label('Nội dung'),
                                        ])
                                        ->createItemButtonLabel('Thêm dòng mới'),
                                ]),
                        ]),

                    Forms\Components\Wizard\Step::make('Bài học')
                        ->schema([
                            Forms\Components\Card::make()
                                ->schema([
                                    Forms\Components\Repeater::make('lessons')
                                        ->label('Bài học')
                                        ->relationship()
                                        ->schema([
                                            Forms\Components\TextInput::make('name')
                                                ->label('Tên bài học')
                                                ->required(),

                                            Forms\Components\TextInput::make('youtube_id')
                                                ->label('Video')
                                                ->placeholder('Link video Youtube'),

                                            Forms\Components\TextInput::make('time_duration')
                                                ->label('Thời lượng video')
                                                ->numeric()
                                                ->placeholder('Thời lượng của video tính bằng giây'),

                                            Forms\Components\MarkdownEditor::make('content')
                                                ->label('Nội dung')
                                                ->placeholder('Nội dung bài học'),
                                        ]),
                                ]),
                        ]),
                ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('media')
                    ->label('Hình ảnh')
                    ->collection('courses'),

                Tables\Columns\TextColumn::make('name')
                    ->label('Tên')
                    ->description(fn (Course $record): string => Str::limit($record->subtitle, 50))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\BadgeColumn::make('price')
                    ->label('Giá')
                    ->formatStateUsing(fn (int $state): string => $state === 0 ? 'Miễn phí' : number_format($state).'đ')
                    ->colors([
                        'danger',
                        'success' => static fn ($state): bool => $state === 0,
                    ])
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tạo lúc')
                    ->date()
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
            'index' => Pages\ListCourses::route('/'),
            'create' => Pages\CreateCourse::route('/create'),
            'edit' => Pages\EditCourse::route('/{record}/edit'),
        ];
    }
}
