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

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->label('User')
                    ->required(),

                Select::make('degree_id')
                    ->relationship('degree', 'name')
                    ->label('Degree')
                    ->required(),

                DatePicker::make('end_studies_date')
                    ->label('End Studies Date'),

                TextInput::make('actual_job')
                    ->label('Actual Job'),

                TextInput::make('actual_company')
                    ->label('Actual Company'),

                TextInput::make('time_current_company')
                    ->label('Time at Current Company'),

                TextInput::make('first_job')
                    ->label('First Job'),

                Textarea::make('description_first_job')
                    ->label('Description of First Job'),

                Textarea::make('hardskills')
                    ->label('Hard Skills'),

                Textarea::make('technologies')
                    ->label('Technologies'),

                Textarea::make('certifications')
                    ->label('Certifications'),

                Textarea::make('softskills')
                    ->label('Soft Skills'),

                Textarea::make('proyects_practicies')
                    ->label('Projects and Practices'),

                Textarea::make('extras_cources')
                    ->label('Extra Courses'),

                TextInput::make('council')
                    ->label('Council')
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
}
