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
                TextInput::make('name')
                    ->required()
                    ->regex('/^[\pL\s\-]+$/u'),
            ]);
    }
}
