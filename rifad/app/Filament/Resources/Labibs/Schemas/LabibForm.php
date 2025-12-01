<?php

namespace App\Filament\Resources\Labibs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LabibForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('full_name')
                    ->required()
                    ->regex('/^[\pL\s\-]+$/u'),
                TextInput::make('province')
                    ->required(),
                TextInput::make('grade')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->default(null),
                TextInput::make('phone')
                    ->tel()
                    ->default(null),
                TextInput::make('course')
                    ->default(null)
                    ->regex('/^[\pL\s\-]+$/u'),
            ]);
    }
}
