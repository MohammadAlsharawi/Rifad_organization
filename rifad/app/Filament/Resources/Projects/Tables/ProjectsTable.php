<?php

namespace App\Filament\Resources\Projects\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ProjectsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image'),
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('total_amount')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('secured_amount')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('organization.name')
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
            Filter::make('title')
                ->form([
                    TextInput::make('value')->label('Title'),
                ])
                ->query(fn($query, array $data) =>
                    $query->when($data['value'], fn($q) =>
                        $q->where('title', 'like', '%' . $data['value'] . '%')
                    )
                ),

            Filter::make('total_amount')
                ->form([
                    TextInput::make('min')->numeric()->label('Min Total'),
                    TextInput::make('max')->numeric()->label('Max Total'),
                ])
                ->query(fn($query, array $data) =>
                    $query
                        ->when($data['min'], fn($q) => $q->where('total_amount', '>=', $data['min']))
                        ->when($data['max'], fn($q) => $q->where('total_amount', '<=', $data['max']))
                ),
            Filter::make('secured_amount')
                ->form([
                    TextInput::make('min')->numeric()->label('Min Secured'),
                    TextInput::make('max')->numeric()->label('Max Secured'),
                ])
                ->query(fn($query, array $data) =>
                    $query
                        ->when($data['min'], fn($q) => $q->where('secured_amount', '>=', $data['min']))
                        ->when($data['max'], fn($q) => $q->where('secured_amount', '<=', $data['max']))
                ),

            SelectFilter::make('organization_id')
                ->relationship('organization', 'name')
                ->label('Organization'),

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
