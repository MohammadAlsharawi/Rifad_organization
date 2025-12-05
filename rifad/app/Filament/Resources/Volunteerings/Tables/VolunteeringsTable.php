<?php

namespace App\Filament\Resources\Volunteerings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class VolunteeringsTable
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
                TextColumn::make('gender'),
                TextColumn::make('address')
                    ->searchable(),
                TextColumn::make('phone')
                    ->searchable(),
                TextColumn::make('age')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('qualification.name')
                    ->label('Qualification')
                    ->sortable(),
                TextColumn::make('preferredType.name')
                    ->label('Preferred Type')
                    ->sortable(),

                IconColumn::make('photo_consent')
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
                Filter::make('name')
                    ->form([TextInput::make('value')->label('Name')])
                    ->query(fn($query, $data) => $query->when($data['value'], fn($q) => $q->where('name', 'like', "%{$data['value']}%"))),

                Filter::make('email')
                    ->form([TextInput::make('value')->label('Email')])
                    ->query(fn($query, $data) => $query->when($data['value'], fn($q) => $q->where('email', 'like', "%{$data['value']}%"))),

                Filter::make('address')
                    ->form([TextInput::make('value')->label('Address')])
                    ->query(fn($query, $data) => $query->when($data['value'], fn($q) => $q->where('address', 'like', "%{$data['value']}%"))),

                Filter::make('phone')
                    ->form([TextInput::make('value')->label('Phone')])
                    ->query(fn($query, $data) => $query->when($data['value'], fn($q) => $q->where('phone', 'like', "%{$data['value']}%"))),

                Filter::make('age')
                    ->form([
                        TextInput::make('min')->numeric()->label('Min Age'),
                        TextInput::make('max')->numeric()->label('Max Age'),
                    ])
                    ->query(fn($query, $data) =>
                        $query
                            ->when($data['min'], fn($q) => $q->where('age', '>=', $data['min']))
                            ->when($data['max'], fn($q) => $q->where('age', '<=', $data['max']))
                    ),

                SelectFilter::make('qualification_id')
                    ->relationship('qualification', 'name')
                    ->label('Qualification'),

                SelectFilter::make('preferred_type_id')
                    ->relationship('preferredType', 'name')
                    ->label('Preferred Type'),

                SelectFilter::make('gender')
                    ->options([
                        'male' => 'Male',
                        'female' => 'Female',
                    ]),
                TernaryFilter::make('photo_consent')
                    ->label('Photo Consent')
                    ->trueLabel('Consented')
                    ->falseLabel('Not Consented'),

                Filter::make('created_at')
                    ->form([
                        DatePicker::make('from')->label('From'),
                        DatePicker::make('until')->label('Until'),
                    ])
                    ->query(fn($query, $data) =>
                        $query
                            ->when($data['from'], fn($q) => $q->whereDate('created_at', '>=', $data['from']))
                            ->when($data['until'], fn($q) => $q->whereDate('created_at', '<=', $data['until']))
                    ),

                Filter::make('updated_at')
                    ->form([
                        DatePicker::make('from')->label('From'),
                        DatePicker::make('until')->label('Until'),
                    ])
                    ->query(fn($query, $data) =>
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
