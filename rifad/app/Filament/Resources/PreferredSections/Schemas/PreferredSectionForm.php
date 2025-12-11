<?php

namespace App\Filament\Resources\PreferredSections\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PreferredSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name.en')
                    ->label('Preferred Section (EN)')
                    ->required(),

                TextInput::make('name.ar')
                    ->label('Preferred Section (AR)')
                    ->required(),
            ]);
    }
}
