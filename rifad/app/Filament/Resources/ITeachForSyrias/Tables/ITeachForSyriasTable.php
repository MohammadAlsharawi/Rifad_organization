<?php

namespace App\Filament\Resources\ITeachForSyrias\Tables;

use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class ITeachForSyriasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->searchable(false)
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
                    ->fileName('ITeachFroSyria'),
            ])
            ->filters([
                SelectFilter::make('gender')
                    ->options([
                        'male' => 'Male',
                        'female' => 'Female',
                    ]),

                TernaryFilter::make('confirmed')
                    ->label('Confirmed')
                    ->trueLabel('Confirmed')
                    ->falseLabel('Not Confirmed'),

                SelectFilter::make('degree_id')
                    ->relationship('degree', 'name')
                    ->label('Degree'),

                SelectFilter::make('sector_id')
                    ->relationship('sector', 'name')
                    ->label('Sector'),

                SelectFilter::make('experience_year_id')
                    ->relationship('experienceYear', 'name')
                    ->label('Experience Years'),

                SelectFilter::make('training_type_id')
                    ->relationship('trainingType', 'name')
                    ->label('Training Type'),

                SelectFilter::make('need_id')
                    ->relationship('need', 'name')
                    ->label('Need'),

                SelectFilter::make('course_id')
                    ->relationship('course', 'name')
                    ->label('Course'),

                Filter::make('created_at')
                    ->form([
                        DatePicker::make('from')->label('From'),
                        DatePicker::make('until')->label('Until'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when($data['from'], fn($q) => $q->whereDate('created_at', '>=', $data['from']))
                            ->when($data['until'], fn($q) => $q->whereDate('created_at', '<=', $data['until']));
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
