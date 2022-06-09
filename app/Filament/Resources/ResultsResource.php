<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ResultsResource\Pages;
use App\Filament\Resources\ResultsResource\RelationManagers;
use App\Models\Results;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class ResultsResource extends Resource
{
    protected static ?string $model = Results::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('course')->required(),
                Forms\Components\Select::make('result')->options([
                    "Pass"=>"Pass",
                    "Fail"=>"Fail"
                ]),
                Forms\Components\TextInput::make('classification')->type('number')->required(),
                Forms\Components\TextInput::make('year')->type('number')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('course'),
                Tables\Columns\TextColumn::make('result'),
                Tables\Columns\TextColumn::make('classification'),
                Tables\Columns\TextColumn::make('year'),
            ])
            ->filters([
                //
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
            'index' => Pages\ListResults::route('/'),
            'create' => Pages\CreateResults::route('/create'),
            'edit' => Pages\EditResults::route('/{record}/edit'),
        ];
    }
}
