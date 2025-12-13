<?php

namespace App\Filament\Resources\TrainingTypes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TrainingTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name.en')
                    ->label('Training type (EN)')
                    ->required(),

                TextInput::make('name.ar')
                    ->label('Training type (AR)')
                    ->required()
            ]);
    }
}
