<?php

namespace App\Filament\Resources\Donors\Tables;

use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class DonorsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->searchable(false)
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                TextColumn::make('phone')
                    ->searchable(),
                TextColumn::make('donated_amount')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('project.title')
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
                    TextColumn::make('donate')
                    ->label('Donation Type')
                    ->sortable()
                    ->badge()
                    ->colors([
                        'success' => 'monthly',
                        'warning' => 'one_time',
                    ]),
                    TextColumn::make('status')
                        ->badge()
                        ->colors([
                            'warning' => 'pending',
                            'success' => 'success',
                        ])
            ])
            
        ->bulkActions([
            DeleteBulkAction::make(),
        ])
            ->headerActions([
                FilamentExportHeaderAction::make('export')
                    ->label('Export')
                    ->fileName('Donors'),
            ])
            ->filters([
                SelectFilter::make('status')
                ->label('Donation Status')
                ->options([
                    'pending' => 'Pending',
                    'success' => 'Success',
                ]),
            Filter::make('name')
                ->form([
                    TextInput::make('value')->label('Name'),
                ])
                ->query(fn($query, array $data) =>
                    $query->when($data['value'], fn($q) =>
                        $q->where('name', 'like', '%' . $data['value'] . '%')
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

            Filter::make('phone')
                ->form([
                    TextInput::make('value')->label('Phone'),
                ])
                ->query(fn($query, array $data) =>
                    $query->when($data['value'], fn($q) =>
                        $q->where('phone', 'like', '%' . $data['value'] . '%')
                    )
                ),
            Filter::make('donated_amount')
                ->form([
                    TextInput::make('min')->numeric()->label('Min Amount'),
                    TextInput::make('max')->numeric()->label('Max Amount'),
                ])
                ->query(fn($query, array $data) =>
                    $query
                        ->when($data['min'], fn($q) => $q->where('donated_amount', '>=', $data['min']))
                        ->when($data['max'], fn($q) => $q->where('donated_amount', '<=', $data['max']))
                ),

            SelectFilter::make('project_id')
                ->relationship('project', 'title')
                ->label('Project'),

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
            SelectFilter::make('donate')
                ->options([
                    'monthly'  => 'Monthly',
                    'one_time' => 'One Time',
                ]),
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
