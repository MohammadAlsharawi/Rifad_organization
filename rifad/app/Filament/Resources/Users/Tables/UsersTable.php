<?php

namespace App\Filament\Resources\Users\Tables;

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

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                TextColumn::make('email_verified_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('nationality')
                    ->searchable(),
                TextColumn::make('phone_number')
                    ->searchable(),
                TextColumn::make('birthdate')
                    ->date()
                    ->sortable(),
                TextColumn::make('address')
                    ->searchable(),
                TextColumn::make('first_name')
                    ->searchable(),
                TextColumn::make('father_name')
                    ->searchable(),
                TextColumn::make('last_name')
                    ->searchable(),
                TextColumn::make('gender'),
            ])
             ->filters([
                Filter::make('name')
                    ->form([TextInput::make('value')->label('Name')])
                    ->query(fn($query, $data) => $query->when($data['value'], fn($q) => $q->where('name', 'like', "%{$data['value']}%"))),

                Filter::make('email')
                    ->form([TextInput::make('value')->label('Email')])
                    ->query(fn($query, $data) => $query->when($data['value'], fn($q) => $q->where('email', 'like', "%{$data['value']}%"))),

                Filter::make('nationality')
                    ->form([TextInput::make('value')->label('Nationality')])
                    ->query(fn($query, $data) => $query->when($data['value'], fn($q) => $q->where('nationality', 'like', "%{$data['value']}%"))),

                Filter::make('phone_number')
                    ->form([TextInput::make('value')->label('Phone Number')])
                    ->query(fn($query, $data) => $query->when($data['value'], fn($q) => $q->where('phone_number', 'like', "%{$data['value']}%"))),

                Filter::make('address')
                    ->form([TextInput::make('value')->label('Address')])
                    ->query(fn($query, $data) => $query->when($data['value'], fn($q) => $q->where('address', 'like', "%{$data['value']}%"))),

                Filter::make('first_name')
                    ->form([TextInput::make('value')->label('First Name')])
                    ->query(fn($query, $data) => $query->when($data['value'], fn($q) => $q->where('first_name', 'like', "%{$data['value']}%"))),

                Filter::make('father_name')
                    ->form([TextInput::make('value')->label('Father Name')])
                    ->query(fn($query, $data) => $query->when($data['value'], fn($q) => $q->where('father_name', 'like', "%{$data['value']}%"))),

                Filter::make('last_name')
                    ->form([TextInput::make('value')->label('Last Name')])
                    ->query(fn($query, $data) => $query->when($data['value'], fn($q) => $q->where('last_name', 'like', "%{$data['value']}%"))),

                Filter::make('email_verified_at')
                    ->form([
                        DatePicker::make('from')->label('From'),
                        DatePicker::make('until')->label('Until'),
                    ])
                    ->query(fn($query, $data) =>
                        $query
                            ->when($data['from'], fn($q) => $q->whereDate('email_verified_at', '>=', $data['from']))
                            ->when($data['until'], fn($q) => $q->whereDate('email_verified_at', '<=', $data['until']))
                    ),

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

                Filter::make('birthdate')
                    ->form([
                        DatePicker::make('from')->label('From'),
                        DatePicker::make('until')->label('Until'),
                    ])
                    ->query(fn($query, $data) =>
                        $query
                            ->when($data['from'], fn($q) => $q->whereDate('birthdate', '>=', $data['from']))
                            ->when($data['until'], fn($q) => $q->whereDate('birthdate', '<=', $data['until']))
                    ),

                SelectFilter::make('gender')
                    ->options([
                        'male' => 'Male',
                        'female' => 'Female',
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
