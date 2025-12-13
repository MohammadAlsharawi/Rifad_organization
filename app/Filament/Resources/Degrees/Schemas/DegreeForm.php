<?php

namespace App\Filament\Resources\Degrees\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DegreeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name.en')
                    ->label('Degree (EN)')
                    ->required(),

                TextInput::make('name.ar')
                    ->label('Degree (AR)')
                    ->required()
            ]);
    }
}
