<?php

namespace App\Filament\Resources\ExperienceYears\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ExperienceYearForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name.en')
                    ->label('Experience Year (EN)')
                    ->required(),

                TextInput::make('name.ar')
                    ->label('Experience Year (AR)')
                    ->required()
            ]);
    }
}
