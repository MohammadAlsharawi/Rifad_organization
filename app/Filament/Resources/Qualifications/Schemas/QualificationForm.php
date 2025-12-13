<?php

namespace App\Filament\Resources\Qualifications\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class QualificationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name.en')
                    ->label('Qualification (EN)')
                    ->required(),

                TextInput::make('name.ar')
                    ->label('Qualification (AR)')
                    ->required()
            ]);
    }
}
