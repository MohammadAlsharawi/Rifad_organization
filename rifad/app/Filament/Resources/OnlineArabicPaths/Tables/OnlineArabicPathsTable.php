<?php

namespace App\Filament\Resources\OnlineArabicPaths\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class OnlineArabicPathsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('full_name')
                    ->searchable(),
                TextColumn::make('birth_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('gender'),
                TextColumn::make('grade')
                    ->searchable(),
                TextColumn::make('parent_name')
                    ->searchable(),
                TextColumn::make('phone')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                TextColumn::make('origin_country')
                    ->searchable(),
                TextColumn::make('residence_country')
                    ->searchable(),
                TextColumn::make('speaks_arabic_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('reading_level_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('home_language_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('friends_language_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('school_type_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('preferred_sections_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('biggest_challenge_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('parent_reason_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('preferred_time_id')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('has_difficulty')
                    ->boolean(),
                TextColumn::make('how_found_us')
                    ->searchable(),
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
