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
                TextInput::make('full_name.en')
                    ->label('Full Name (EN)')
                    ->required()
                    ->regex('/^[\pL\s\-]+$/u'),

                TextInput::make('full_name.ar')
                    ->label('Full Name (AR)')
                    ->required()
                    ->regex('/^[\pL\s\-]+$/u'),

                TextInput::make('province.en')
                    ->label('Province (EN)')
                    ->required(),

                TextInput::make('province.ar')
                    ->label('Province (AR)')
                    ->required(),

                TextInput::make('course.en')
                    ->label('Course (EN)')
                    ->regex('/^[\pL\s\-]+$/u'),

                TextInput::make('course.ar')
                    ->label('Course (AR)')
                    ->regex('/^[\pL\s\-]+$/u'),

                TextInput::make('grade')
                    ->label('Grade')
                    ->required(),

                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->default(null),

                TextInput::make('phone')
                    ->label('Phone')
                    ->tel()
                    ->default(null),
            ]);


    }
}
