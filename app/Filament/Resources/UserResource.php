<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Nombre'),
                Forms\Components\TextInput::make('last_name')
                    ->label('Apellido')
                    ->nullable(),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->label('Correo Electrónico'),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required()
                    ->label('Contraseña'),
                Forms\Components\TextInput::make('code')
                    ->label('Código')
                    ->maxLength(9)
                    ->nullable(),
                Forms\Components\TextInput::make('rfc')
                    ->label('RFC')
                    ->maxLength(13)
                    ->nullable(),
                Forms\Components\Select::make('gender')
                    ->options([
                        'M' => 'Masculino',
                        'F' => 'Femenino',
                    ])
                    ->nullable()
                    ->label('Género'),
                Forms\Components\Toggle::make('active')
                    ->default(true)
                    ->label('Activo'),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Nombre')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('last_name')->label('Apellido')->sortable(),
                Tables\Columns\TextColumn::make('email')->label('Correo Electrónico')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('code')->label('Código')->sortable(),
                Tables\Columns\TextColumn::make('rfc')->label('RFC')->sortable(),
                Tables\Columns\BooleanColumn::make('active')->label('Activo'),
                Tables\Columns\TextColumn::make('created_at')->label('Creado')->date(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
    public static function getModelLabel(): string
    {
        return __('User');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Users');
    }

}
