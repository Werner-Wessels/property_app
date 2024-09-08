<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionResource\Pages;
use App\Models\Property;
use App\Models\Transaction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    protected static ?string $navigationGroup = 'Accounts';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('date')
                    ->required(),
                Forms\Components\Select::make('property_id')
                    ->relationship('property', 'name')
                    ->required(),
                Forms\Components\TextInput::make('amount')
                    ->numeric()
                    ->required(),
                Forms\Components\Select::make('transaction_type')
                    ->options([
                        'income' => 'Income',
                        'expense' => 'Expense',
                    ])
                    ->required(),
                Forms\Components\Select::make('type_id')
                    ->relationship('type', 'name')
                    ->required(),
                Forms\Components\TextInput::make('comment')
                    ->maxLength(255),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('property.nickname')
                    ->label('Property')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('amount')
                    ->sortable(),
                Tables\Columns\TextColumn::make('type.name')
                    ->label('TransactionType')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('comment')->limit(20),
                Tables\Columns\TextColumn::make('amount')
                    ->formatStateUsing(fn ($record) => $record->transaction_type === 'expense' ? '- ' . number_format($record->amount, 2) : number_format($record->amount, 2))
                    ->sortable(),

            ])
            ->filters([
                SelectFilter::make('property')
                    ->label('Properties')
                    ->multiple()
                    ->relationship('property', 'nickname')->searchable(),
                Filter::make('date_range')
                    ->form([
                        Forms\Components\DatePicker::make('start_date')
                            ->label('Start Date')
                            ->placeholder('Select start date'),
                        Forms\Components\DatePicker::make('end_date')
                            ->label('End Date')
                            ->placeholder('Select end date'),
                    ])
                    ->query(function (Builder $query, array $data) {
                        if (!empty($data['start_date'])) {
                            $query->whereDate('date', '>=', $data['start_date']);
                        }

                        if (!empty($data['end_date'])) {
                            $query->whereDate('date', '<=', $data['end_date']);
                        }

                        return $query;
                    })
                    ->label('Date Range')
            ])
            ->persistFiltersInSession()
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            TransactionResource\Widgets\TransactionOverview::class,
        ];
    }
}
