<?php

namespace App\Filament\Resources\Labibs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class LabibsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('full_name')
                    ->searchable(),
                TextColumn::make('province')
                    ->searchable(),
                TextColumn::make('grade')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                TextColumn::make('phone')
                    ->searchable(),
                TextColumn::make('course')
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
                Filter::make('province')
                    ->form([
                        TextInput::make('value')->label('Province'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query->when(
                            $data['value'],
                            fn($q) => $q->where('province', 'like', '%' . $data['value'] . '%')
                        );
                    }),

                Filter::make('grade')
                    ->form([
                        TextInput::make('value')->label('Grade'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query->when(
                            $data['value'],
                            fn($q) => $q->where('grade', 'like', '%' . $data['value'] . '%')
                        );
                    }),

                Filter::make('course')
                    ->form([
                        TextInput::make('value')->label('Course'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query->when(
                            $data['value'],
                            fn($q) => $q->where('course', 'like', '%' . $data['value'] . '%')
                        );
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
