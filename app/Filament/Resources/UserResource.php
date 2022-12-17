<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $label = 'Người dùng';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Họ tên')
                            ->required(),

                        Forms\Components\TextInput::make('username')
                            ->label('Tên đăng nhập')
                            ->unique()
                            ->required(),

                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->unique()
                            ->required(),

                        Forms\Components\TextInput::make('phone')
                            ->label('Số điện thoại')
                            ->unique()
                            ->required(),

                        Forms\Components\TextInput::make('password')
                            ->label('Mật khẩu')
                            ->required()
                            ->minLength(6)
                            ->password()
                            ->dehydrateStateUsing(fn (string $state) => Hash::make($state)),

                        Forms\Components\TextInput::make('password_confirmation')
                            ->label('Nhập lại mật khẩu')
                            ->password(),

                        Forms\Components\Textarea::make('bio')
                            ->label('Giới thiệu')
                            ->nullable()
                            ->columnSpanFull(),

                        Forms\Components\SpatieMediaLibraryFileUpload::make('avatar')
                            ->label('Ảnh đại diện')
                            ->nullable()
                            ->columnSpanFull(),
                    ])
                    ->columns(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('avatar_url')
                    ->label('Ảnh đại diện')
                    ->circular(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Họ tên')
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->searchable(),

                Tables\Columns\TextColumn::make('username')
                    ->label('Tên người dùng')
                    ->searchable(),
            ])
            ->filters([
                //
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
