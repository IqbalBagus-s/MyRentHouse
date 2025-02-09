<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingTransactionResource\Pages;
use App\Filament\Resources\BookingTransactionResource\RelationManagers;
use App\Models\BookingTransaction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookingTransactionResource extends Resource
{
    protected static ?string $model = BookingTransaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('name')
                ->maxLength(255)
                ->required(),
                
                Forms\Components\TextInput::make('booking_trx')
                ->maxLength(255)
                ->required(),
                
                Forms\Components\TextInput::make('phone_number')
                ->maxLength(255)
                ->required(),

                Forms\Components\TextInput::make('total_amount')
                ->numeric()
                ->minValue(0)
                ->prefix('IDR')
                ->required(),

                Forms\Components\TextInput::make('duration')
                ->numeric()
                ->minValue(0)
                ->prefix('Days')
                ->required(),

                Forms\Components\DatePicker::make('started_at')
                ->required(),

                Forms\Components\DatePicker::make('ended_at')
                ->required(),
                
                Forms\Components\Select::make('is_paid')
                ->options([
                    true => 'Paid',
                    false => 'Not Paid'
                ])
                ->required(),
                    
                Forms\Components\Select::make('house_id')
                ->relationship('house', 'name')
                ->searchable()
                ->preload()
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBookingTransactions::route('/'),
            'create' => Pages\CreateBookingTransaction::route('/create'),
            'edit' => Pages\EditBookingTransaction::route('/{record}/edit'),
        ];
    }
}
