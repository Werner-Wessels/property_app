<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PropertyResource\Pages;
use App\Filament\Resources\PropertyResource\RelationManagers;
use App\Models\Property;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PropertyResource extends Resource
{
    protected static ?string $model = Property::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    protected static ?string $navigationGroup = 'Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('property_type_id')
                    ->label('Property Type')
                    ->relationship('property_type', 'name')
                    ->required(),
                Forms\Components\Select::make('entity_id')
                    ->label('Entity')
                    ->relationship('entity', 'name')
                    ->required(),
                Forms\Components\Select::make('property_status_id')
                    ->label('Status')
                    ->relationship('propertyStatus', 'name')
                    ->required(),
                Forms\Components\Select::make('managing_agent_id')
                    ->label('Managing Agent')
                    ->relationship('managingAgent', 'display_name')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                DatePicker::make('purchase_date')
                    ->required(),
                Forms\Components\TextInput::make('purchase_value')
                    ->label('Purchase Value')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('current_value')
                    ->label('Current Value')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('street_address')
                    ->label('Street Address')
                    ->string()
                    ->required(),
                Forms\Components\TextInput::make('address_line_2')
                    ->label('Address Line 2')
                    ->string(),
                Forms\Components\TextInput::make('suburb')
                    ->label('Suburb')
                    ->string()
                    ->required(),
                Forms\Components\TextInput::make('city')
                    ->label('City')
                    ->string()
                    ->required(),
                Forms\Components\TextInput::make('province')
                    ->label('Province')
                    ->string()
                    ->required(),
                Forms\Components\TextInput::make('postal_code')
                    ->label('Postal Code')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('entity.name')
                    ->label('Entity')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('propertyStatus.name')
                    ->label('Status')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('current_value')
                    ->label('Property Value')
                    ->money('ZAR')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                SelectFilter::make('entity')
                    ->label('Owned By')
                    ->multiple()
                    ->relationship('entity', 'nickname')->searchable(),
                SelectFilter::make('property_status')
                    ->label('Status')
                    ->multiple()
                    ->relationship('propertyStatus', 'name')->searchable(),
            ])
            ->persistFiltersInSession()
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            PropertyResource\RelationManagers\TransactionsRelationManager::class,
            PropertyResource\RelationManagers\TenantsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProperties::route('/'),
            'create' => Pages\CreateProperty::route('/create'),
            'edit' => Pages\EditProperty::route('/{record}/edit'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            //PropertyResource\Widgets\PropertyOverview::class,
        ];
    }
}
