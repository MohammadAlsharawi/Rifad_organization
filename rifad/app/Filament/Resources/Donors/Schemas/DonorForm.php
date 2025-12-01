<?php

namespace App\Filament\Resources\Donors\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DonorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->regex('/^[\pL\s\-]+$/u'),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->default(null),
                TextInput::make('phone')
                    ->tel()
                    ->default(null),
                TextInput::make('donated_amount')
                    ->required()
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(15),
                    Select::make('project_id')
                        ->label('Project')
                        ->relationship('project', 'title') // assumes Donor model has project() relation
                        ->searchable()
                        ->required()
                        ->preload()
                        ->rules(['exists:projects,id']),
            ]);
    }
}
