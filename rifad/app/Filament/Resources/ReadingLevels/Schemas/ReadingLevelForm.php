<?php

namespace App\Filament\Resources\ReadingLevels\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ReadingLevelForm
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
