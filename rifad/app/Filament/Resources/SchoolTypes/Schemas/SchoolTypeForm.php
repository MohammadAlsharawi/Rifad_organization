<?php

namespace App\Filament\Resources\SchoolTypes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SchoolTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name.en')
                    ->label('School type (EN)')
                    ->required(),

                TextInput::make('name.ar')
                    ->label('School type (AR)')
                    ->required(),
            ]);
    }
}
