<?php

namespace App\Filament\Resources\JoinUs\Tables;

use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class JoinUsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->searchable(false)
            ->columns([
                TextColumn::make('name')
                    ->label(__('Course Name'))
                    ->getStateUsing(fn ($record) =>
                        $record->getTranslation('name', app()->getLocale())
                    )
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                TextColumn::make('address')
                    ->label(__('Address'))
                    ->getStateUsing(fn ($record) =>
                        $record->getTranslation('address', app()->getLocale())
                    )
                    ->searchable(),
                TextColumn::make('phone')
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
            ->headerActions([
                FilamentExportHeaderAction::make('export')
                    ->label('Export')
                    ->fileName('joinUs'),
            ])
            ->filters([
                Filter::make('search')
                    ->form([
                        TextInput::make('value')
                            ->label('Search')
                            ->placeholder('Enter name, email, address...'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query->when(
                            $data['value'],
                            fn($q) => $q->where(function ($q) use ($data) {
                                $q->where('name', 'like', '%' . $data['value'] . '%')
                                ->orWhere('email', 'like', '%' . $data['value'] . '%')
                                ->orWhere('address', 'like', '%' . $data['value'] . '%')
                                ->orWhere('phone', 'like', '%' . $data['value'] . '%')
                                ->orWhere('cv', 'like', '%' . $data['value'] . '%');
                            })
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
