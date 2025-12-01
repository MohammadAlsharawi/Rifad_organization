<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm
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
                DateTimePicker::make('email_verified_at'),
                TextInput::make('password')
                    ->password()
                    ->required(),
                TextInput::make('nationality')
                    ->default(null)
                    ->regex('/^[\pL\s\-]+$/u'),
                TextInput::make('phone_number')
                    ->tel()
                    ->default(null),
                DatePicker::make('birthdate'),
                TextInput::make('address')
                    ->default(null)
                    ->regex('/^[\pL\s\-]+$/u'),
                TextInput::make('first_name')
                    ->default(null)
                    ->regex('/^[\pL\s\-]+$/u'),
                TextInput::make('father_name')
                    ->default(null)
                    ->regex('/^[\pL\s\-]+$/u'),
                TextInput::make('last_name')
                    ->default(null)
                    ->regex('/^[\pL\s\-]+$/u'),
                Select::make('gender')
                    ->options(['male' => 'Male', 'female' => 'Female'])
                    ->default(null),
            ]);
    }
}
