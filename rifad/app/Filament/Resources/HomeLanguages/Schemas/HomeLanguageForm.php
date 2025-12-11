<?php

namespace App\Filament\Resources\HomeLanguages\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class HomeLanguageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name.en')
                    ->label('Home Language (EN)')
                    ->required(),

                TextInput::make('name.ar')
                    ->label('Home Language (AR)')
                    ->required()
            ]);
    }
}
