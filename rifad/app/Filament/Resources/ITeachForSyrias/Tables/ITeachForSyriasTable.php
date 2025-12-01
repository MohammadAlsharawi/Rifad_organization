<?php

namespace App\Filament\Resources\ITeachForSyrias\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ITeachForSyriasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('full_name')
                    ->searchable(),
                TextColumn::make('phone')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                TextColumn::make('residence')
                    ->searchable(),
                TextColumn::make('birth_year'),
                TextColumn::make('gender'),
                TextColumn::make('degree.name')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('sector.name')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('experienceYear.name')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('trainingType.name')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('need.name')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('course.name')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('confirmed')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(), 
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
