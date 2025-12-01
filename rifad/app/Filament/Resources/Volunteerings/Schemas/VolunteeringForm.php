<?php

namespace App\Filament\Resources\Volunteerings\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class VolunteeringForm
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
                    ->required(),
                Select::make('gender')
                    ->options(['male' => 'Male', 'female' => 'Female'])
                    ->default(null),
                TextInput::make('address')
                    ->default(null)
                    ->regex('/^[\pL\s\-]+$/u'),
                TextInput::make('phone')
                    ->tel()
                    ->default(null),
                TextInput::make('age')
                    ->numeric()
                    ->default(null)
                    ->minValue(15)
                    ->maxValue(120),
                TextInput::make('qualification_id')
                    ->required()
                    ->numeric()
                    ->rules(['exists:qualifications,id']),

                TextInput::make('preferred_type_id')
                    ->required()
                    ->numeric()
                    ->rules(['exists:preferred_types,id']),
                Toggle::make('photo_consent')
                    ->required(),
            ]);
    }
}
