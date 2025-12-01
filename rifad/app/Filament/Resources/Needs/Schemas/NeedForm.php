<?php

namespace App\Filament\Resources\Needs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class NeedForm
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
