<?php

namespace App\Filament\Resources\Labibs\Tables;

use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
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
            ->searchable(false)
            ->columns([
                TextColumn::make('full_name')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                TextColumn::make('phone')
                    ->searchable(),
                TextColumn::make('province')
                ->label('Province')
                ->sortable(),
                TextColumn::make('grade')
                ->label('Grade')
                ->sortable(),
                TextColumn::make('course')
                ->label('Course')
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
            ->headerActions([
                FilamentExportHeaderAction::make('export')
                    ->label('Export')
                    ->fileName('labibs'),
            ])
            ->filters([
            Filter::make('full_name')
                ->form([
                    TextInput::make('value')->label('Full Name'),
                ])
                ->query(fn($query, array $data) =>
                    $query->when($data['value'], fn($q) =>
                        $q->where('full_name', 'like', '%' . $data['value'] . '%')
                    )
                ),

            Filter::make('province')
                ->form([
                    TextInput::make('value')->label('Province'),
                ])
                ->query(fn($query, array $data) =>
                    $query->when($data['value'], fn($q) =>
                        $q->where('province', 'like', '%' . $data['value'] . '%')
                    )
                ),

            Filter::make('grade')
                ->form([
                    TextInput::make('value')->label('Grade'),
                ])
                ->query(fn($query, array $data) =>
                    $query->when($data['value'], fn($q) =>
                        $q->where('grade', 'like', '%' . $data['value'] . '%')
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

            Filter::make('course')
                ->form([
                    TextInput::make('value')->label('Course'),
                ])
                ->query(fn($query, array $data) =>
                    $query->when($data['value'], fn($q) =>
                        $q->where('course', 'like', '%' . $data['value'] . '%')
                    )
                ),

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
