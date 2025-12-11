<?php

namespace App\Filament\Resources\LastestUpdates\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;

class LastestUpdatesTable
{
    public static function configure(Table $table): Table
    {
        return $table
                ->searchable(false)
                ->columns([
                    ImageColumn::make('photo')
                        ->square()
                        ->circular()
                        ->size(80),
                    TextColumn::make('title')
                        ->label(__('Title'))
                        ->getStateUsing(fn ($record) =>
                            $record->getTranslation('title', app()->getLocale())
                        )
                        ->searchable(),
                    TextColumn::make('date')
                        ->date()
                        ->sortable(),
                    TextColumn::make('time')
                        ->time()
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
                            TextInput::make('title')
                                ->label('Title contains'),
                        ])
                        ->query(function ($query, array $data) {
                            return $query->when(
                                $data['title'],
                                fn ($q, $value) => $q->where('title', 'like', "%{$value}%")
                            );
                        }),
                    Filter::make('date')
                        ->form([
                            DatePicker::make('date_from')->label('Date from'),
                            DatePicker::make('date_until')->label('Date until'),
                        ])
                        ->query(function ($query, array $data) {
                            return $query
                                ->when($data['date_from'], fn($q, $date) => $q->whereDate('date', '>=', $date))
                                ->when($data['date_until'], fn($q, $date) => $q->whereDate('date', '<=', $date));
                        }),

                    Filter::make('time')
                        ->form([
                            TimePicker::make('time_from')->label('Time from'),
                            TimePicker::make('time_until')->label('Time until'),
                        ])
                        ->query(function ($query, array $data) {
                            return $query
                                ->when($data['time_from'], fn($q, $time) => $q->where('time', '>=', $time))
                                ->when($data['time_until'], fn($q, $time) => $q->where('time', '<=', $time));
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
