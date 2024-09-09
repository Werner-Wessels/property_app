<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LandlordResource\Pages;
use App\Models\ManagingAgent;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ManagingAgentResource extends Resource
{
    protected static ?string $model = ManagingAgent::class;

    protected static ?string $slug = 'landlords';

    protected static ?string $navigationGroup = 'Management';

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Select::make('managing_agent_type_id')
                    ->relationship('managingAgentType', 'name')
                    ->label('Type')
                    ->required(),

                TextInput::make('display_name')
                    ->required(),

                TextInput::make('name')
                    ->required(),

                TextInput::make('surname')
                    ->required(),

                TextInput::make('mobile_number')
                    ->required(),

                TextInput::make('office_number'),

                TextInput::make('email')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('managingAgentType.name')
                    ->searchable()
                    ->label('Type')
                    ->sortable(),

                TextColumn::make('display_name'),

                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('surname'),

                TextColumn::make('mobile_number'),

                TextColumn::make('office_number'),

                TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLandlords::route('/'),
            'create' => Pages\CreateLandlord::route('/create'),
            'edit' => Pages\EditLandlord::route('/{record}/edit'),
        ];
    }


    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'email', 'landlordType.name', 'address.name'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        $details = [];

        if ($record->landlordType) {
            $details['ManagingAgentType'] = $record->landlordType->name;
        }

        if ($record->address) {
            $details['Address'] = $record->address->name;
        }

        return $details;
    }
}
