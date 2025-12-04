<?php

namespace App\Filament\Resources\Reviews\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;

class ReviewsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('photo')
                    ->searchable(),
                TextColumn::make('name')
                    ->searchable(),
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
            Filter::make('name')
                ->form([
                    TextInput::make('name')
                        ->label('Name contains'),
                ])
                ->query(function ($query, array $data) {
                    return $query->when(
                        $data['name'],
                        fn ($q, $value) => $q->where('name', 'like', "%{$value}%")
                    );
                }),

            Filter::make('created_at')
                ->form([
                    DatePicker::make('created_from')->label('Created from'),
                    DatePicker::make('created_until')->label('Created until'),
                ])
                ->query(function ($query, array $data) {
                    return $query
                        ->when($data['created_from'], fn($q, $date) => $q->whereDate('created_at', '>=', $date))
                        ->when($data['created_until'], fn($q, $date) => $q->whereDate('created_at', '<=', $date));
                }),
            Filter::make('updated_at')
                ->form([
                    DatePicker::make('updated_from')->label('Updated from'),
                    DatePicker::make('updated_until')->label('Updated until'),
                ])
                ->query(function ($query, array $data) {
                    return $query
                        ->when($data['updated_from'], fn($q, $date) => $q->whereDate('updated_at', '>=', $date))
                        ->when($data['updated_until'], fn($q, $date) => $q->whereDate('updated_at', '<=', $date));
                }),
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
