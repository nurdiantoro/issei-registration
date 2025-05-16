<?php

namespace App\Filament\Resources;

use App\Filament\Exports\RegistrationExporter;
use App\Filament\Exports\UserExporter;
use App\Filament\Resources\RegistrationResource\Pages\CreateRegistration;
use App\Filament\Resources\RegistrationResource\Pages\EditRegistration;
use App\Filament\Resources\RegistrationResource\Pages\ListRegistrations;
use App\Models\User;
use Filament\Actions\Exports\Enums\ExportFormat;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class RegistrationResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'Registration';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('barcode')
                    ->disabled(),
                Select::make('salutation')
                    ->required()
                    ->options([
                        'Mr.' => 'Mr.',
                        'Ms.' => 'Ms.',
                        'Mrs.' => 'Mrs.',
                    ]),
                TextInput::make('email')
                    ->disabled(),
                TextInput::make('name')
                    ->required()
                    ->required()
                    ->maxLength(255),
                TextInput::make('telephone')
                    ->required()
                    ->tel()
                    ->maxLength(255),
                TextInput::make('company')
                    ->required()
                    ->maxLength(255),
                TextInput::make('job')
                    ->required()
                    ->maxLength(255),
                Select::make('interest')
                    ->required()
                    ->options([
                        'Seminar' => 'Seminar',
                        'Exhibition' => 'Exhibition',
                        'Seminar & Exhibition' => 'Seminar & Exhibition',
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('barcode')
                    ->searchable(),
                TextColumn::make('salutation')
                    ->searchable(),
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('telephone')
                    ->searchable(),
                TextColumn::make('company')
                    ->searchable(),
                TextColumn::make('job')
                    ->searchable(),
                TextColumn::make('interest')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Registration Date')
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([])
            ->actions([
                EditAction::make()->visible(fn() => auth()
                    ->user()
                    ->role_id == 'root'),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->headerActions([
                ExportAction::make()
                    ->exporter(UserExporter::class)
                    ->formats([
                        ExportFormat::Xlsx,
                    ])
                    ->fileName(now()->format('d-m-Y') . ' Registration Database ISSEI2025.xlsx')
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRegistrations::route('/'),
            'create' => CreateRegistration::route('/create'),
            'edit' => EditRegistration::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('role_id', 'user');
    }
}
