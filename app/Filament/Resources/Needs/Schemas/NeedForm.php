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
                TextInput::make('name.en')
                    ->label('Need Name (EN)')
                    ->required(),

                TextInput::make('name.ar')
                    ->label('Need Name (AR)')
                    ->required(),
            ]);
    }
}
