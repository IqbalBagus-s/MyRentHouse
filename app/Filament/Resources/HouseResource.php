<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HouseResource\Pages;
use App\Models\House;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\IconColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HouseResource extends Resource
{
    protected static ?string $model = House::class;

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';
    protected static ?string $navigationLabel = 'Houses';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('address')
                    ->required()
                    ->maxLength(255),
                
                Forms\Components\FileUpload::make('thumbnail')
                    ->image()
                    ->required(),

                Forms\Components\Textarea::make('about')
                    ->required()
                    ->cols(10)
                    ->rows(20),

                Forms\Components\Repeater::make('photos')
                    ->relationship('photos')
                    ->schema([
                        Forms\Components\FileUpload::make('photo') // FIXED
                        ->required()
                    ]),

                Forms\Components\Repeater::make('features')
                    ->relationship('features')
                    ->schema([
                        Forms\Components\TextInput::make('name') // FIXED
                        ->required()
                    ]),
                
                Forms\Components\Select::make('city_id')
                    ->relationship('city', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->prefix('IDR'),
                
                Forms\Components\TextInput::make('duration')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->prefix('Days'),
                
                Forms\Components\Select::make('is_available')
                    ->options([
                        true => 'Available',
                        false => 'Not Available'
                    ])
                    ->required(),

                Forms\Components\Select::make('is_fully_booked')
                    ->options([
                        true => 'Fully Booked', // FIXED
                        false => 'Not Fully Booked'
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('name')
                ->searchable(),

                Tables\Columns\ImageColumn::make('thumbnail'),

                Tables\Columns\TextColumn::make('city.name'),

                Tables\Columns\IconColumn::make('is_available')
                    ->boolean()
                    ->trueColor('danger')
                    ->falseColor('success')
                    ->trueIcon('heroicon-o-x-circle')
                    ->falseIcon('heroicon-o-check-circle')
                    ->label('Available'),

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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHouses::route('/'),
            'create' => Pages\CreateHouse::route('/create'),
            'edit' => Pages\EditHouse::route('/{record}/edit'),
        ];
    }
}
