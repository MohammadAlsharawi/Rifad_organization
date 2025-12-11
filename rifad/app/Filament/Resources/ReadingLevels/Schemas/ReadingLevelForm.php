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
                TextInput::make('name.en')
                    ->label('Reading level name (EN)')
                    ->required(),

                TextInput::make('name.ar')
                    ->label('Reading level name (AR)')
                    ->required()
            ]);
    }
}
