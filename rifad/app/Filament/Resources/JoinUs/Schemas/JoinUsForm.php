<?php

namespace App\Filament\Resources\JoinUs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class JoinUsForm
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
                TextInput::make('address')
                    ->default(null)
                    ->regex('/^[\pL\s\-]+$/u'),
                TextInput::make('phone')
                    ->tel()
                    ->default(null),
                Textarea::make('comments')
                    ->default(null)
                    ->columnSpanFull()
                    ->regex('/^[\pL\s\-]+$/u'),
                TextInput::make('cv')
                    ->default(null)
                    ->acceptedFileTypes(['application/pdf']),
                Toggle::make('confirmed')
                    ->required(),
            ]);
    }
}
