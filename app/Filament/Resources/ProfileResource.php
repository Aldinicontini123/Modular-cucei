<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfileResource\Pages;
use App\Models\Profile;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table; // Asegúrate de esta importación
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;

class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->label('Usuario')
                    ->required(),

                Select::make('degree_id')
                    ->relationship('degree', 'name')
                    ->label('Carrera')
                    ->required(),

                DatePicker::make('end_studies_date')
                    ->label('Fecha de finalizacion de estudios'),

                TextInput::make('actual_job')
                    ->label('Trabajo actual'),

                TextInput::make('actual_company')
                    ->label('Compañia actual'),

                TextInput::make('time_current_company')
                    ->label('Tiempo en la empresa actual'),

                TextInput::make('first_job')
                    ->label('Primer trabajo'),

                Textarea::make('description_first_job')
                    ->label('Descripcion del primer trabajo'),

                Textarea::make('hardskills')
                    ->label('Habilidades duras'),

                Textarea::make('technologies')
                    ->label('Tecnologias'),

                Textarea::make('certifications')
                    ->label('Certificaciones'),

                Textarea::make('softskills')
                    ->label('Habilidades blandas'),

                Textarea::make('proyects_practicies')
                    ->label('Projectos y Practicas'),

                Textarea::make('extras_cources')
                    ->label('Cursos extras'),

                TextInput::make('council')
                    ->label('Consejo')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('user.name')->label('User Name'),
                TextColumn::make('degree.name')->label('Degree Name'),
                TextColumn::make('actual_job')->label('Actual Job'),
                TextColumn::make('actual_company')->label('Company'),
                TextColumn::make('created_at')->date()->label('Created At'),
            ])
            ->filters([
                // Agrega filtros personalizados si es necesario
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
            // Agrega cualquier relación adicional si es necesario
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProfiles::route('/'),
            'create' => Pages\CreateProfile::route('/create'),
            'edit' => Pages\EditProfile::route('/{record}/edit'),
        ];

    }
    public static function getModelLabel(): string
    {
        return __('Perfil');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Perfiles');
    }
}
