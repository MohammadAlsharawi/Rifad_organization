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

                Select::make('qualification_id')
                    ->label('Qualification')
                    ->relationship('qualification', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('preferred_type_id')
                    ->label('Preferred Type')
                    ->relationship('preferredType', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Toggle::make('photo_consent')
                    ->required(),
            ]);
    }
}
