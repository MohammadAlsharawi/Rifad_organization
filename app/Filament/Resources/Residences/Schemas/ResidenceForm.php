<?php

namespace App\Filament\Resources\Residences\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ResidenceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name.en')
                    ->label('Residence Name (EN)')
                    ->required(),

                TextInput::make('name.ar')
                    ->label('Residence Name (AR)')
                    ->required(),
            ]);
    }
}
