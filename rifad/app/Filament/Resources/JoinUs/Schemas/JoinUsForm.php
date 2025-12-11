<?php

namespace App\Filament\Resources\JoinUs\Schemas;

use Filament\Forms\Components\FileUpload;
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
                TextInput::make('name.en')
                    ->label('Name (EN)')
                    ->required()
                    ->regex('/^[\pL\s\-]+$/u'),

                TextInput::make('name.ar')
                    ->label('Name (AR)')
                    ->required()
                    ->regex('/^[\pL\s\-]+$/u'),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('address.en')
                    ->label('Address (EN)')
                    ->default(null)
                    ->regex('/^[\pL\s\-]+$/u'),

                TextInput::make('address.ar')
                    ->label('Address (AR)')
                    ->default(null)
                    ->regex('/^[\pL\s\-]+$/u'),
                TextInput::make('phone')
                    ->tel()
                    ->default(null),
                Textarea::make('comments')
                    ->default(null)
                    ->columnSpanFull()
                    ->regex('/^[\pL\s\-]+$/u'),
                FileUpload::make('cv')
                    ->disk('public')
                    ->directory('cvs')
                    ->acceptedFileTypes(['application/pdf'])
                    ->required()
                    ->downloadable()
                    ->openable()
                    ->preserveFilenames(),
                Toggle::make('confirmed')
                    ->required(),
            ]);
    }
}
