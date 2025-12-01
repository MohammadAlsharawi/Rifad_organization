<?php

namespace App\Filament\Resources\VolunteerTypes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class VolunteerTypeForm
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
