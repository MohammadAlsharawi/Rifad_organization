<?php

namespace App\Filament\Resources\Anaabs\Tables;

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

class AnaabsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('phone')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                TextColumn::make('residence.name')
                    ->numeric()
                    ->sortable(),
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
                    TextInput::make('value')->label('Name'),
                ])
                ->query(fn($query, array $data) =>
                    $query->when($data['value'], fn($q) =>
                        $q->where('name', 'like', '%' . $data['value'] . '%')
                    )
                ),

            Filter::make('phone')
                ->form([
                    TextInput::make('value')->label('Phone'),
                ])
                ->query(fn($query, array $data) =>
                    $query->when($data['value'], fn($q) =>
                        $q->where('phone', 'like', '%' . $data['value'] . '%')
                    )
                ),

            Filter::make('email')
                ->form([
                    TextInput::make('value')->label('Email'),
                ])
                ->query(fn($query, array $data) =>
                    $query->when($data['value'], fn($q) =>
                        $q->where('email', 'like', '%' . $data['value'] . '%')
                    )
                ),

            SelectFilter::make('residence_id')
                ->relationship('residence', 'name')
                ->label('Residence'),

            Filter::make('created_at')
                ->form([
                    DatePicker::make('from')->label('From'),
                    DatePicker::make('until')->label('Until'),
                ])
                ->query(fn($query, array $data) =>
                    $query
                        ->when($data['from'], fn($q) => $q->whereDate('created_at', '>=', $data['from']))
                        ->when($data['until'], fn($q) => $q->whereDate('created_at', '<=', $data['until']))
                ),

            Filter::make('updated_at')
                ->form([
                    DatePicker::make('from')->label('From'),
                    DatePicker::make('until')->label('Until'),
                ])
                ->query(fn($query, array $data) =>
                    $query
                        ->when($data['from'], fn($q) => $q->whereDate('updated_at', '>=', $data['from']))
                        ->when($data['until'], fn($q) => $q->whereDate('updated_at', '<=', $data['until']))
                ),

            Filter::make('recently_updated')
                ->query(fn($query) => $query->where('updated_at', '>=', now()->subDays(7))),
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
