<?php

namespace App\Filament\Resources\PreferredTimes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PreferredTimeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name.en')
                    ->label('Preferred Time (EN)')
                    ->required(),

                TextInput::make('name.ar')
                    ->label('Preferred Time (AR)')
                    ->required()
            ]);
    }
}
